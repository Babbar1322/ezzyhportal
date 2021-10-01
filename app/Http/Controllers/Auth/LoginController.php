<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function login(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            // 'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt(array('email' => $input['username'], 'password' => $input['password']))) {
            $user = Auth::user();
            if ($user->hasRole('Admin')) {
                return redirect('admin/dashboard');
            } else if ($user->hasRole('subadmin')) {
                return redirect('admin/dashboard');
            } else if ($user->hasRole('dealer')) {
                return redirect('admin/dashboard');
            } else if ($user->hasRole('subdealer')) {
                return redirect('admin/dashboard');
            } else if ($user->hasRole('seller')) {
                return redirect('admin/dashboard');
            } else if ($user->hasRole('subseller')) {
                return redirect('admin/dashboard');
            } 
            else {
                return redirect("/");
            }
        } else if (auth()->attempt(array('login_code' => $input['username'], 'password' => $input['password']))) {
            $user = Auth::user();
            if ($user->hasRole('Admin')) {
                return redirect('admin/dashboard');
            } else if ($user->hasRole('subadmin')) {
                return redirect('admin/dashboard');
            } else if ($user->hasRole('dealer')) {
                return redirect('admin/dashboard');
            } else if ($user->hasRole('subdealer')) {
                return redirect('admin/dashboard');
            } else if ($user->hasRole('seller')) {
                return redirect('admin/dashboard');
            } else if ($user->hasRole('subseller')) {
                return redirect('admin/dashboard');
            } 
            else {
                return redirect("/");
            }
        }
        
        else {
            return redirect()->back()->with('error', 'Email-Address And Password Are Wrong.');
        }
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
