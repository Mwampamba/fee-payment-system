<?php

namespace App\Http\Controllers\Auth;

use App\Models\AcademicYear;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AcademicYearRequest;

class AcademicYearController extends Controller
{
    public function index()
    {
        $title = [
            'title' => 'Academic years'
        ];
        $years = AcademicYear::where('status', true)->orderBy('created_at', 'DESC')->get();
        return view('academic-years.index', $title, compact('years'));
    }

    public function create()
    {
        $title = [
            'title' => 'Add academic year'
        ];

        return view('academic-years.create', $title);
    }

    public function save(AcademicYearRequest $request)
    {
        $validatedData = $request->validated();

        $year = new AcademicYear();
        $year->name = $validatedData['name'];
        $year->status = $validatedData['status'];

        $year->save();
        return redirect()->route('academicYears')->with('success', 'Academic year saved successfully!');
    }

    public function edit($year_id)
    {
        $title = [
            'title' => 'Update academic year'
        ];

        $year = AcademicYear::findOrFail($year_id);
        return view('academic-years.update', $title, compact('year'));
    }

    public function update(Request $request, $year_id)
    {
        $data = $request->all();

        $rules = [
            'name' => 'required',
            'status' => 'required',
        ];

        $messages = [
            'name.required' => 'Academic year field is required.',
            'status.required' => 'Status field is required.',
        ];

        $this->validate($request, $rules, $messages);

        $year = AcademicYear::findOrFail($year_id);
        $year->name = $data['name'];
        $year->status = $data['status'];

        $year->update();
        return redirect()->route('academicYears')->with('success', 'Academic year has been updated successfully!');
    }

    public function destory($year_id)
    {
        $year = AcademicYear::findOrFail($year_id);
        if ($year) {
            $year->delete();

            return redirect()->route('academicYears')->with('error', 'Academic year deleted!');
        }
    }
}
