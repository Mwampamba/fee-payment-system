<?php

namespace App\Http\Controllers\Auth;

use App\Models\Programme;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ProgrammeRequest;

class ProgrammeController extends Controller
{
    public function index()
    {
        $title = [
            'title' => 'Programmes'
        ];
        $programmes = Programme::orderBy('id', 'DESC')->get();

        return view('programmes.index', $title, compact('programmes'));
    }

    public function create()
    {
        $title = [
            'title' => 'Add programme'
        ];
        return view('programmes.create', $title);
    }

    public function save(ProgrammeRequest $request)
    {
        $validatedData = $request->validated();

        $programme = new Programme();
        $programme->name = $validatedData['name'];
        $programme->fee = $validatedData['fee'];

        $programme->save();
        return redirect()->route('programmes')->with('success', 'Programme saved successfully!');
    }

    public function edit($programme_id)
    {
        $title = [
            'title' => 'Update programme'
        ];

        $programme = Programme::findOrFail($programme_id);
        return view('programmes.update', $title, compact('programme'));
    }

    public function update(Request $request, $programme_id)
    {
        $data = $request->all();

        $rules = [
            'name' => 'required',
            'fee' => 'required',
        ];

        $messages = [
            'name.required' => 'Programme name is required.',
            'fee.required' => 'Programme fee is required.'
        ];

        $this->validate($request, $rules, $messages);

        $programme = Programme::findOrFail($programme_id);

        $programme->name = $data['name'];
        $programme->fee = $data['fee'];


        $programme->update();
        return redirect()->route('programmes')->with('success', 'Programme updated!');
    }

    public function destroy($programme_id)
    {
        $programme = Programme::findOrFail($programme_id);
        $programme->delete();
        return redirect()->route('programmes')->with('success', 'Programme deleted!');
    }

}