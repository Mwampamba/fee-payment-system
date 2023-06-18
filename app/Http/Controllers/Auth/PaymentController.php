<?php

namespace App\Http\Controllers\Auth;

use Throwable;
use Omnipay\Omnipay;
use App\Models\Payment;
use App\Models\Student;
use App\Models\Programme;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;

class PaymentController extends Controller
{
    private $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);
    }

    public function singleStudentPayments()
    {
        $title = [
            'title' => 'Fee Payments'
        ];

        $student_id = Auth::guard('student')->user()->id;
        $fees = Programme::join('students', 'programmes.id', 'students.programme_id')
            ->select([
                'students.name AS studentName',
                'students.reg_number AS studentRegNumber',
                'programmes.name AS programmeName',
                'programmes.fee AS programmeFee',
                'programmes.fee AS programmeFee'
            ])
            ->where('students.id', $student_id)->get();

        $feesPaid = Payment::join('students', 'payments.student_id', 'students.id')
            ->select([
                'payments.amount_paid AS amount',
                'payments.transaction_code AS transaction',
                'payments.payment_mode AS payment_mode',
                'payments.created_at AS payment_date',
            ])
            ->where('students.id', $student_id)
            ->orderBy('payments.id', 'DESC')
            ->get();

        return view('payments.index', $title, compact('fees', 'feesPaid'));
    }

    public function createPayments()
    {
        $title = [
            'title' => 'Fee Payment'
        ];

        $student_id = Auth::guard('student')->user()->id;
        $fees = Programme::join('students', 'programmes.id', 'students.programme_id')
            ->select([
                'programmes.fee AS programmeFee'
            ])
            ->where('students.id', $student_id)->get();

        return view('payments.create', $title, compact('fees'));
    }

    public function generateInvoice()
    {
        $student_id = Auth::guard('student')->user()->id;
        $student = Student::findOrFail($student_id);

        $data = ['student' => $student];

        $pdf = Pdf::loadView('payments.invoice', $data);

        return $pdf->download('exam-number.pdf');

    }

    public function pay(Request $request)
    {
        try {
            if ($request->isMethod('post')) {

                $rules = [
                    'amount' => 'required'
                ];

                $messages = [ 
                    'amount.required' => 'Amount field is required.',
                ];

                $this->validate($request, $rules, $messages);
            }

            $response = $this->gateway->purchase([
                'amount' => $request->amount,
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => url('success'),
                'cancelUrl' => url('error')
            ])->send();

            if ($response->isRedirect()) {
                $response->redirect();
            } else {
                return $response->getMessage();
            }
        } catch (Throwable $e) {
            return $e->getMessage();
        }
    }

    public function success(Request $request)
    {
        $transaction_number = Str::random(10);

        if ($request->paymentId && $request->PayerID) {
            $transaction = $this->gateway->completePurchase([
                'payer_id' => $request->PayerID,
                'transactionReference' => $request->paymentId
            ]);

            $response = $transaction->send();

            if ($response->isSuccessful()) {
                $arr = $response->getData();

                $payment = new Payment();
                $payment->student_id = Auth::guard('student')->user()->id;
                $payment->transaction_code = $transaction_number . '-' . now();
                $payment->amount_paid = $arr['transactions'][0]['amount']['total'];
                $payment->payment_mode = 'PayPal';

                $payment->save();

                $body = "Fee payment has been successfully completed. 
                Transaction number: " . $payment->transaction_code .
                    " Amount paid: " . $payment->amount_paid . ' USD.';

                $current_date = now()->format('d-m-Y') . ', ' . now()->format('H:i:s');

                Mail::send(
                    'payments.payment-verification',
                    ['body' => $body, 'current_date' => $current_date],

                    function ($message) {
                        $message->from('info@uaut.ac.tz', 'Fee Management System');
                        $message->to(Auth::guard('student')->user()->email)
                            ->subject('Fee Payment');
                    }
                );

                return redirect()->route('studentPayments')->with('success', "Fees has been paid successful!");
            } else {
                return $response->getMessage();
            }
        }
    }
    public function error()
    {
        return redirect()->back()->with('error', 'You have cancelled the payment proccess');
    }
}
