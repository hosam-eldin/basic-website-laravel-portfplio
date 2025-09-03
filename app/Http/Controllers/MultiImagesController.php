<?php

namespace App\Http\Controllers;

use App\Models\MultiImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class MultiImagesController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('admin.about_page.multi_images', compact('user'));
    }

    public function about(Request $request)
    {
        $user = Auth::user();
        $multiImages = MultiImages::latest()->get();
        return view('frontend.about', compact('multiImages', 'user'));
    } //end of function

    public function allMultiImages()
    {
        $user = Auth::user();
        $multiImages = MultiImages::all();
        return view('admin.about_page.all_multi_images', compact('multiImages', 'user'));
    } //end of function

    public function store(Request $request)
    {

        $images = $request->file('images');


        foreach ($images as $multiImage) {
            $filename = hexdec(uniqid()) . '.' . $multiImage->getClientOriginalExtension();
            Image::make($multiImage)->resize(220, 220)->save('upload/multi/' . $filename);
            $save_url = 'upload/multi/' . $filename;

            MultiImages::insert([

                'image' => $save_url,
                'created_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Multi Images inserted Successfully',
                'alert-type' => 'success'
            );
        }
        return redirect()->back()->with($notification);
    } //end of function

    public function edit($id)
    {
        $multiImage = MultiImages::findOrFail($id);
        $user = Auth::user();
        return view('admin.about_page.edit_multi_image', compact('multiImage', 'user'));
    } //end of function

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'required',
        ], [
            'image.required' => 'Please Select One Image',
        ]); {
            $multiImage = MultiImages::findOrFail($id);
            $oldImage = $multiImage->image;

            $image = $request->file('image');
            if ($image) {
                $filename = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(220, 220)->save('upload/multi/' . $filename);
                $save_url = 'upload/multi/' . $filename;

                if ($oldImage && file_exists(public_path($oldImage))) {
                    unlink(public_path($oldImage));
                }

                MultiImages::findOrFail($id)->update([
                    'image' => $save_url,
                    'created_at' => Carbon::now(),
                ]);

                $notification = array(
                    'message' => 'Multi Image Updated Successfully',
                    'alert-type' => 'success'
                );

                return redirect()->route('all.multi.images')->with($notification);
            }
        }
    } //end of function

    public function delete($id)
    {
        $multiImage = MultiImages::findOrFail($id);
        $oldImage = $multiImage->image;

        if ($oldImage && file_exists(public_path($oldImage))) {
            unlink(public_path($oldImage));
        }

        MultiImages::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Image Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } //end of function
}