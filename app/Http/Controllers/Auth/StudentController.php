<?php

namespace App\Http\Controllers\Auth;

use App\Models\Classes;
use App\Models\Payment;
use App\Models\Student;
use App\Models\Programme;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Auth\StudentRequest;

class StudentController extends Controller
{
    public function studentPayments($student_id)
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

    public function index()
    {
        $title = [
            'title' => 'Students'
        ];

        $students = Student::orderBy('id', 'DESC')->get();
        return view('students.index', $title, compact('students'));
    }

    public function create()
    {
        $title = [
            'title' => 'Add student'
        ];

        $programmes = Programme::all();
        $classes = Classes::all();

        return view('students.create', $title, compact('programmes', 'classes'));
    }

    public function save(StudentRequest $request)
    {
        $validatedData = $request->validated();

        $student = new Student;
        $student->name = $validatedData['name'];
        $student->email = $validatedData['email'];
        $student->reg_number = $validatedData['reg_number'];
        $student->class_id = $validatedData['class'];
        $student->programme_id = $validatedData['programme'];

        $password = Str::random(10);
        $hashed_password = Hash::make($password);

        $student->password = $hashed_password;

        $body = "Use this as your password";

        Mail::send(
            'authentication.default-password',
            ['password' => $password, 'body' => $body],
            function ($message) use ($request) {
                $message->from('info@uaut.ac.tz', 'Fee Payment System');
                $message->to($request->email, $request->name)
                    ->subject('Default Password');
            }
        );

        $student->save();

        return redirect()->route('students')->with('success', 'Student registered successfully!');
    }

    public function edit($student_id)
    {
        $title = [
            'title' => 'Update student'
        ];

        $student = Student::findOrFail($student_id);
        $classes = Classes::all();
        $programmes = Programme::all(); 

        if ($student) {
            return view('students.update', $title, compact('student', 'classes', 'programmes'));
        } else {
            return back()->with('message', 'No such student record founded!');
        }
    }

    public function update(Request $request, $student_id) {
        $data = $request->all();

        $rules = [
            'name' => 'required',
            'programme' => 'required',
            'class' => 'required',
        ];

        $messages = [
            'name.required' => 'Student name is required.',
            'programme.required' => 'Programme is required.',
            'class.required' => 'Class is required.'
        ];

        $this->validate($request, $rules, $messages);
        $student = Student::findOrFail($student_id);

        $student->name = $data['name'];
        $student->programme_id = $data['programme']; 
        $student->class_id = $data['class'];
        $student->update();
        return redirect()->route('students')->with('success', 'Student data has been updated successfully!');
    }

    public function destroy($student)
    {
        $user = Student::findOrFail($student);

        $user->delete();
        return redirect()->route('students')->with('error', 'Student has been deleted successfully!');
    }
}
