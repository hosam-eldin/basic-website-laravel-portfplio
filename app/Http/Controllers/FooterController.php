<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Footer;

class FooterController extends Controller
{

    public function footerSetup()
    {
        $user = auth()->user();
        return view('admin.footer.footer_add', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required',
            'address' => 'required',
            'sort_description' => 'required',
            'copyright' => 'required',
            'email' => 'required',
            'facebook' => 'required',
            'twitter' => 'required',
        ]);

        $footer = new Footer();
        $footer->number = $request->number;
        $footer->adress = $request->address;
        $footer->short_description = $request->description;
        $footer->copyright = $request->copyright;
        $footer->email = $request->email;
        $footer->facebook = $request->facebook;
        $footer->twitter = $request->twitter;
        $footer->save();

        $notification = array(
            'message' => 'Footer Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('footer.setup')->with($notification);
    }
    public function footerShow()
    {
        $user = auth()->user();
        $footer = Footer::findOrFail(1);
        return view('admin.footer.footer_show', compact('footer', 'user'));
    }

    public function edit($id)
    {
        $user = auth()->user();
        $footer = Footer::findOrFail($id);
        return view('admin.footer.footer_edit', compact('footer', 'user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'number' => 'required',
            'address' => 'required',
            'description' => 'required',
            'copyright' => 'required',
            'email' => 'required',
            'facebook' => 'required',
            'twitter' => 'required',
        ]);

        $footer = Footer::findOrFail($id);
        $footer->number = $request->number;
        $footer->adress = $request->address;
        $footer->short_description = $request->description;
        $footer->copyright = $request->copyright;
        $footer->email = $request->email;
        $footer->facebook = $request->facebook;
        $footer->twitter = $request->twitter;
        $footer->save();

        $notification = array(
            'message' => 'Footer Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('footer.show')->with($notification);
    }

    public function delete($id)
    {
        $footer = Footer::findOrFail($id);
        $footer->delete();

        $notification = array(
            'message' => 'Footer Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('footer.show')->with($notification);
    }
}
