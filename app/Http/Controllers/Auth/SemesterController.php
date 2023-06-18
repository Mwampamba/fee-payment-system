<?php

namespace App\Http\Controllers\Auth;

use App\Models\Semester;
use App\Models\AcademicYear;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SemesterRequest;

class SemesterController extends Controller
{
    public function index()
    {
        $title = [
            'title' => 'Semesters'
        ];
        $semesters = Semester::where('status', true)->orderBy('created_at', 'DESC')->get();

        return view('semesters.index', $title, compact('semesters'));
    }

    public function create()
    {
        $title = [
            'title' => 'Add semester'
        ];

        $years = AcademicYear::where('status', true)->get();

        return view('semesters.create', $title, compact('years'));
    }

    public function save(SemesterRequest $request)
    {
        $validatedData = $request->validated();

        $semester = new Semester();
        $semester->name = $validatedData['name'];
        $semester->academic_year_id = $validatedData['year'];
        $semester->status = $validatedData['status'];

        $semester->save();
        return redirect()->route('semesters')->with('success', 'Semester saved successfully!');
    }

    // public function edit($semester_id)
    // {
    //     $title = [
    //         'title' => 'Update semester'
    //     ];

    //     $semester = Semester::findOrFail($semester_id);
    //     $years = AcademicYear::all();
    //     return view('admin.semesters.edit-semester', $title, compact('semester', 'years'));
    // }

    // public function update(SemesterRequestForm $request, $semester_id)
    // {
    //     $semester = Semester::findOrFail($semester_id);
    //     $validatedData = $request->validated();

    //     $semester->name = $validatedData['name'];
    //     $semester->academic_year_id = $validatedData['year'];
    //     $semester->description = $validatedData['description'];
    //     $semester->status = $request->status == true ? '1' : '0';

    //     $semester->update();
    //     return redirect()->route('semesters')->with('success', 'Semester has been updated successfully!');
    // }

    // public function deactivate($semester_id)
    // {
    //     $semester = Semester::findOrFail($semester_id);

    //     if ($semester) {
    //         $semester->status = '0';
    //         $semester->update();
    //         return redirect()->route('semesters')->with('error', 'Semester has been deactivated!');
    //     }
    // }

    // public function restore_semesters($semester_id)
    // {
    //     $semester = Semester::findOrFail($semester_id);

    //     if ($semester) {
    //         $semester->status = '1';
    //         $semester->update();
    //         return redirect()->route('semesters')->with('success', 'Semester has been activated!');
    //     }
    // }

    // public function deactivated_semesters()
    // {
    //     $title = [
    //         'title' => 'Deactivated semesters'
    //     ];
    //     $semesters = Semester::where('status', '0')->orderBy('created_at', 'DESC')->get();
    //     return view('admin.semesters.archive', $title, compact('semesters'));
    // }

    // public function destroy($semester_id)
    // {
        
    // }
}

