<?php

namespace App\Http\Controllers;

use App\Models\HomeSlide;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeSliderController extends Controller
{
    public function homeSlider(Request $request)
    {
        $user = Auth::user();
        $homeSlides = HomeSlide::first();
        return view('admin.home_slide.home_slide_all', compact('homeSlides', 'user'));
    }
}