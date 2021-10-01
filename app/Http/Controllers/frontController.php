<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class frontController extends Controller
{
    // public function dashboard(Request $request){
    //     return view('admin.dashboard');
    // }
    public function indexpage(Request $request) {
        if (!Auth::user()) {
            return view('user.index');
        } else {
            return redirect('admin/dashboard');
        } 
    }
    
    public function userformpage(Request $request, $id) {
        return view('user.userform', compact('id'));
    }
    public function contactus_page(Request $request){
        return view('contact');
    }
    public function aboutus_page(Request $request){
        return view('about');
    }
}
