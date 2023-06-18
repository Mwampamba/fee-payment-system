<?php

namespace App\Http\Controllers\Auth;

use App\Models\Classes;
use App\Models\Payment;
use App\Models\Student;
use App\Models\Programme;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ClassRequest;

class ClassController extends Controller
{
    public function studentClassPayments($student_id)
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
            'title' => 'Classes'
        ];
        $classes = Classes::orderBy('created_at', 'DESC')->get();

        return view('classes.index', $title, compact('classes'));
    }

    public function create()
    {
        $title = [
            'title' => 'Add class'
        ];

        $years = AcademicYear::all();
        $programmes = Programme::all();

        return view('classes.create', $title, compact('years', 'programmes'));
    }

    public function save(ClassRequest $request)
    {
        $validatedData = $request->validated();

        $class = new Classes();
        $class->name = $validatedData['name'];
        $class->programme_id = $validatedData['programme'];
        $class->academic_year_id = $validatedData['year'];

        $class->save();
        return redirect()->route('classes')->with('success', 'Class has been added successfully!');
    }

    public function edit($class_id)
    {
        $title = [
            'title' => 'Update class'
        ];

        $class = Classes::findOrFail($class_id); 
        $years = AcademicYear::all();
        $programmes = Programme::all();

        return view('classes.update', $title, compact('class', 'years','programmes'));
    }

    public function update(Request $request, $class_id)
    {
        $class = Classes::findOrFail($class_id);

        $data = $request->all();

        $rules = [
            'name' => 'required',
            'programme' => 'required',
            'year' => 'required'
        ];

        $messages = [
            'name.required' => 'Class name is required.',
            'programme.required' => 'Programme name is required.',
            'year.required' => 'Academic year is required.'
        ];

        $this->validate($request, $rules, $messages);
       
        $class->name = $data['name'];
        $class->programme_id = $data['programme']; 
        $class->academic_year_id = $data['year']; 

        $class->update();
        return redirect()->route('classes')->with('success', 'Class has been updated successfully!');
    }

    public function destroy($class_id)
    {
        $class = Classes::findOrFail($class_id);
        $class->delete();
        return redirect()->route('classes')->with('delete', 'Class has been deleted successfully!');
    }

    public function viewClassMembers($class_id)
    {
        $title = [
            'title' => 'Students'
        ];
        $students = Student::where('class_id', $class_id)->orderBy('name', 'ASC')->get();
        return view('students.class-students', $title, compact('students'));
    }

}
