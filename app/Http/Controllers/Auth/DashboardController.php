<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $title = [
            'title' => 'Dashboard'
        ];
        return view('dashboard', $title);
    }

    public function getPasswordUpdate()
    {
        $title = [
            'title' => 'Update Password'
        ];

        $staff = User::find(auth()->id());

        return view('staffs.update-password', $title, compact('staff'));
    }

    public function changeStaffPassword(Request $request)
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

        if (Hash::check($request->old_password, Auth::user()->password)) {
            if ($request->new_password === $request->confirm_password) {
                if (strlen($request->new_password) > 7) {
                    $student = User::findorFail(Auth::user()->id);
                    if ($student) {
                        $student->password = Hash::make($request->new_password);
                        $student->update();
                        return redirect()->route('dashboard')->with('success', 'Your password successfully updated');
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

        return redirect()->route('dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('getLogin');
    }
}
