<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Portfolio;

class PortfolioController extends Controller
{
    public function index() //frontend
    {
        $user = Auth::user();
        $portfolios = Portfolio::paginate(1);
        return view('frontend.portfolio')->with([
            'user' => $user,
            'portfolios' => $portfolios
        ]);
    } //end method

    public function allPortfolio() //backend
    {
        $user = Auth::user();
        $portfolios = Portfolio::latest()->get();
        return view('admin.portfolio.portfolio_show_all')->with([
            'user' => $user,
            'portfolios' => $portfolios
        ]);
    } //end method

    public function addPortfolio() //backend
    {
        $user = Auth::user();
        return view('admin.portfolio.portfolio_add')->with('user', $user);
    } //end method

    public function storePortfolio(Request $request) //backend
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',

            'description' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,gif'
        ]);

        $portfolio = new Portfolio();
        $portfolio->portfolio_name = $request->name;
        $portfolio->portfolio_title = $request->title;
        $portfolio->portfolio_description = $request->description;

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/portfolio'), $filename);
            $portfolio['portfolio_image'] = 'upload/portfolio/' . $filename;
        }
        $portfolio->save();

        $notification = array(
            'message' => 'Portfolio Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.portfolio')->with($notification);
    } //end method

    public function editPortfolio($id) //backend
    {
        $user = Auth::user();
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolio.portfolio_edit')->with([
            'user' => $user,
            'portfolio' => $portfolio
        ]);
    } //end method

    public function updatePortfolio(Request $request, $id) //backend
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',

            'description' => 'required',
            'image' => 'mimes:jpg,jpeg,png,gif'
        ]);

        $portfolio = Portfolio::findOrFail($id);
        $portfolio->portfolio_name = $request->name;
        $portfolio->portfolio_title = $request->title;
        $portfolio->portfolio_description = $request->description;

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path($portfolio->portfolio_image));
            $filename = date('YmdHi') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/portfolio'), $filename);
            $portfolio['portfolio_image'] = 'upload/portfolio/' . $filename;
        }
        $portfolio->save();

        $notification = array(
            'message' => 'Portfolio Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.portfolio')->with($notification);
    } //end method

    public function deletePortfolio($id) //backend
    {
        $portfolio = Portfolio::findOrFail($id);
        $img = $portfolio->portfolio_image;
        if ($img) {
            @unlink(public_path($img));
        }
        $portfolio->delete();

        $notification = array(
            'message' => 'Portfolio Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } //end method

    public function portfolioDetails($id) //frontend
    {
        $user = Auth::user();
        $portfolio = Portfolio::findOrFail($id);
        return view('frontend.portfolio_details')->with([
            'user' => $user,
            'portfolio' => $portfolio
        ]);
    } //end method
}
