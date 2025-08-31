<?php

namespace App\Http\Controllers;

use App\Models\HomeSlide;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;


class HomeSliderController extends Controller
{
    public function homeSlider(Request $request)
    {
        $user = Auth::user();
        $homeSlides = HomeSlide::first();
        return view('admin.home_slide.home_slide_all', compact('homeSlides', 'user'));
    }

    public function homeSliderUpdate(Request $request)
    {
        $slideId = $request->id;
        $slide = HomeSlide::findOrFail($slideId);

        if ($request->file('image')) {
            $file = $request->file('image');
            $oldImage = $slide->image;

            $filename = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
            Image::make($file)->resize(636, 852)->save('upload/home_slide/' . $filename);
            $save_url = 'upload/home_slide/' . $filename;

            HomeSlide::findOrFail($slideId)->update([
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'video_url' => $request->video_url,
                'image' => $save_url
            ]);

            $notification = array(
                'message' => 'Home Slide Updated With Image Successfully',
                'alert-type' => 'success'
            );
            // حذف الصورة القديمة لو موجودة
            if ($oldImage && file_exists(public_path($oldImage))) {
                unlink(public_path($oldImage));
            }
        } else {
            HomeSlide::findOrFail($slideId)->update([
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'video_url' => $request->video_url
            ]);
            $notification = array(
                'message' => 'Home Slide Updated Without Image Successfully',
                'alert-type' => 'success'
            );
        }
        return redirect()->back()->with($notification);
    }
}
