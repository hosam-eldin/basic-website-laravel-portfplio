<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }

    public function profile(Request $request)
    {
        return view('admin.admin_profile_view', [
            'user' => $request->user()
        ]);
    }
    public function editProfile(Request $request)
    {
        return view('admin.admin_profile_edit', [
            'user' => $request->user()
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

        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully.');
    }
}