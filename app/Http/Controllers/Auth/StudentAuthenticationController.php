<?php

namespace App\Http\Controllers\Auth;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentAuthenticationController extends Controller
{
    public function dashboard()
    {
        $title = [
            'title' => 'Dashboard'
        ];
        return view('student-dashboard', $title);
    }

    public function getPasswordUpdateForm()
    {
        $title = [
            'title' => 'Update Password'
        ];

        $student = Student::find(auth()->guard('student')->id());

        return view('students.update-password', $title, compact('student'));
    }

    public function changePassword(Request $request)
    {
        $rules = [
            'old_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|min:8',
        ];

        $messages = [
            'old_password.required' => 'Old password is required',
            'new_password.required' => 'New password is required',
            'confirm_password.required' => 'Confirm password is required',
        ];

        $this->validate($request, $rules, $messages);

        if (Hash::check($request->old_password, Auth::guard('student')->user()->password)) {
            if ($request->new_password === $request->confirm_password) {
                if (strlen($request->new_password) > 7) {
                    $student = Student::findorFail(Auth::guard('student')->user()->id);
                    if ($student) {
                        $student->password = Hash::make($request->new_password);
                        $student->update();
                        return redirect()->route('studentDashboard')->with('success', 'Your password successfully updated');
                    }
                } else {
                    return redirect()->back()->with('error', 'New password should contains at least 8 characters');
                }
            } else {
                return redirect()->back()->with('error', 'New password does not match');
            }
        } else {
            return redirect()->back()->with('error', 'Current password is not correct');
        }

        return redirect()->route('studentDashboard');
    }

    public function logout()
    {
        Auth::guard('student')->logout();
        return redirect()->route('getLogin');
    }

}
