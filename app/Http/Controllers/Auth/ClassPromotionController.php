<?php

namespace App\Http\Controllers\Auth;

use App\Models\Classes;
use App\Models\Student;
use App\Models\Programme;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use App\Models\ClassPromotion;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ClassPromotionRequest;

class ClassPromotionController extends Controller
{
    public function create()
    {
        $title = [
            'title' => 'Promote class'
        ];

        $programmes = Programme::all();
        $classes = Classes::all();
        $years = AcademicYear::all();

        return view('classes.promotion', $title, compact('programmes', 'classes', 'years'));
    }

    public function save(ClassPromotionRequest $request)
    {
        $validatedData = $request->validated(); 
        $class_id = $validatedData['from_class_name'];

        DB::beginTransaction();
        $class = Classes::findOrFail($class_id);

        if ($class) {
            $students = Student::where('class_id', $class->id)->get();

            foreach ($students as $student) {
                $student_ids = explode(',', $student->id);
                Student::whereIn('id', $student_ids)->update([
                    'class_id' =>  $request->to_class_name,
                    'programme_id' => $request->to_programme_name
                ]);

                ClassPromotion::updateOrCreate([
                    'class_id' => $request->from_class_name,
                    'programme_id' => $request->from_programme_name,
                    'academic_year_id' => $request->from_year_name,
                    'to_programme_id' => $request->to_programme_name,
                    'to_class_id' => $request->to_class_name,
                    'new_academic_year_id' => $request->to_year_name
                ]);

                $class->update([
                    'academic_year_id' => $request->to_year_name
                ]);
            }

            DB::commit();

            return redirect()->route('classes')->with('success', 'Class has been promoted successfully!');
        } else {
            echo 'Something went wrong';
        }
    }
}
