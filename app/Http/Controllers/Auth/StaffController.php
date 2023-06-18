<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Auth\StaffRequest;

class StaffController extends Controller
{
    public function index()
    {
        $title = [
            'title' => 'Staffs'
        ];

        $staffs = User::orderBy('id', 'DESC')->get();
        return view('staffs.index', $title, compact('staffs'));
    }

    public function addNewStaff()
    {
        $title = [
            'title' => 'New staff'
        ];

        return view('staffs.create', $title);
    }

    public function saveNewStaff(StaffRequest $request)
    {
        $validatedData = $request->validated();

        $staff = new User;
        $staff->name = $validatedData['name'];
        $staff->email = $validatedData['email'];
        $staff->role =  $validatedData['role'];
        
        $password = Str::random(10);
        $hashed_password = Hash::make($password);

        $staff->password = $hashed_password; 

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

        $staff->save();
        return redirect()->route('staffs')->with('success', 'Staff registered successfully!');
    }

    public function editStaff($staff_id)
    {
        $title = [
            'title' => 'Update staff'
        ];
        $staff = User::findOrFail($staff_id); 

        if ($staff) {
            return view('staffs.update', $title, compact('staff'));
        } else {
            return back()->with('message', 'No such staff record founded!');
        }
    }

    public function updateStaff(Request $request, $staff_id)
    {
        $data = $request->all();

        $rules = [
            'name' => 'required',
            'role' => 'required'
        ];

        $messages = [
            'name.required' => 'Staff name is required.',
            'role.required' => 'Staff role is required.'
        ];

        $this->validate($request, $rules, $messages);
        $user = User::findOrFail($staff_id);

        $user->name = $data['name'];
        $user->role = $data['role'];
        
        $user->update();
        return redirect()->route('staffs')->with('success', 'Lecturer has been updated successfully!');
    }

    public function destroy($staff_id)
    {
        $user = User::findOrFail($staff_id);

        $user->delete();
        return redirect()->route('staffs')->with('error', 'Staff has been deleted successfully!');
    }
}
