<?php

namespace App\Http\Controllers\Auth;

use App\Models\Payment;
use App\Models\Programme;
use App\Http\Controllers\Controller;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf; 

class StudentPayment extends Controller
{
    public function getAllStudentPayments()
    {
        $title = [
            'title' => 'Student Fee Payments'
        ];

        $feesPaid = Payment::join('students', 'payments.student_id', 'students.id')
            ->select([
                'students.name AS studentName',
                'students.id AS studentId',
                'payments.amount_paid AS amount',
                'payments.transaction_code AS transaction',
                'payments.payment_mode AS payment_mode',
                'payments.created_at',
            ])
            ->orderBy('payments.id', 'DESC')
            ->get();

        return view('payments.all-students', $title, compact('feesPaid'));
    }

    public function singleStudentPayments($student_id)
    {
        $title = [
            'title' => 'Fee Payments'
        ];

        $fees = Programme::join('students', 'programmes.id', 'students.programme_id')
            ->select([

                'students.name AS studentName',
                'students.reg_number AS studentRegNumber',
                'programmes.name AS programmeName',
                'programmes.fee AS programmeFee'
            ])
            ->where('students.id', $student_id)->get();

        $feesPaid = Payment::join('students', 'payments.student_id', 'students.id')
            ->select([
                'payments.amount_paid AS amount',
                'payments.transaction_code AS transaction',
                'payments.payment_mode AS payment_mode',
                'payments.created_at',
            ])
            ->where('students.id', $student_id)
            ->orderBy('payments.id', 'DESC')
            ->get();

        return view('payments.individual-payments', $title, compact('fees', 'feesPaid'));
    }

    public function generateExaminationNumber($student_id)
    {
        $student = Student::where('reg_number', $student_id)->get();

        $data = ['student' => $student];

        $pdf = Pdf::loadView('payments.examination-number', $data);

        return $pdf->download('exam-number.pdf');
    }
}
