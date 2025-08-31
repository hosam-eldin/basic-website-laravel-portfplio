<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;


use Illuminate\Http\Request;

class AboutController extends Controller
{

    public function adminAbout()
    {
        $user = Auth::user();
        $aboutSlides = About::find(1);
        return view('admin.home_slide.about_slide', compact('aboutSlides', 'user'));
    }

    public function about(Request $request)
    {
        $user = Auth::user();
        $aboutSlides = About::find(1);
        return view('frontend.about', compact('aboutSlides', 'user'));
    }

    public function aboutUpdate(Request $request)
    {
        $slideId = $request->id;
        $slide = About::findOrFail($slideId);

        if ($request->file('image')) {
            $file = $request->file('image');
            $oldImage = $slide->image;

            $filename = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
            Image::make($file)->resize(523, 605)->save('upload/about/' . $filename);
            $save_url = 'upload/about/' . $filename;

            About::findOrFail($slideId)->update([
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'long_description' => $request->long_description,
                'short_description' => $request->short_description,
                'about_image' => $save_url
            ]);

            $notification = array(
                'message' => 'About Section Updated With Image Successfully',
                'alert-type' => 'success'
            );
            // حذف الصورة القديمة لو موجودة
            if ($oldImage && file_exists(public_path($oldImage))) {
                unlink(public_path($oldImage));
            }
        } else {
            About::findOrFail($slideId)->update([
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'long_description' => $request->long_description,
                'short_description' => $request->short_description,
            ]);
            $notification = array(
                'message' => 'About Section Updated Without Image Successfully',
                'alert-type' => 'success'
            );
        }
        return redirect()->back()->with($notification);
    }
}