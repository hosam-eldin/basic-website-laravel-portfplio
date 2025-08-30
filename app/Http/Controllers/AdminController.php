<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login')->with('success', 'User logout successfully.');
    }

    public function profile(Request $request)
    {
        return view('admin.admin_profile_view', [
            'user' => $request->user()
        ]);
    }
    public function editProfile(user $user)
    {
        return view('admin.admin_profile_edit', [
            'user' => Auth::user()
        ]);
    }
    public function updateProfile(Request $request)
    {
        $user = $request->user();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->user_name = $request->user_name;

        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $filename = date('YmdHi') . '_' . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            // Delete old profile photo if exists
            if ($user->profile_image && file_exists(public_path('upload/admin_images/' . $user->profile_image))) {
                unlink(public_path('upload/admin_images/' . $user->profile_image));
            }
            $user->profile_image = $filename;
        }
        $user->save();

        return redirect()->route('admin.profile')->with('success', ' ِAdmin Profile updated successfully.');
    }


    public function editPassword(Request $request)
    {
        return view('admin.admin_edit_password', [
            'user' => $request->user()
        ]);
    }


    public function changePassword(Request $request): RedirectResponse
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ]);

        $user = $request->user();
        $hashedPassword = $user->password;
        if (Hash::check($request->old_password, $hashedPassword)) {
            $user->password = bcrypt($request->new_password);
            $user->save();
        } else {
            return redirect()->back()->with('error', 'Old Password is incorrect.');
        }

        return redirect()->back()->with('success', 'Password changed successfully.');
    }
}