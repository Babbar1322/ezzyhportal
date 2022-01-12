<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\user_form;
use App\Models\logController;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard(Request $request)
    {
        if (Auth::user()->roles[0]->name == "Admin" || Auth::user()->roles[0]->name == 'subadmin') {
            // $customer = User::role('customer')->count();
            $customer = user_form::count();
            $dealer = User::role('dealer')->count();
            $subdealer = User::role('subdealer')->count();
            $subadmin = User::role('subadmin')->count();
            $seller = User::role('seller')->count();
            $subseller = User::role('subseller')->count();
               
            // get all user
            // $alluser = User::orderBy('id','DESC')->paginate(5);
            $alluser = user_form::where('sid',Auth::user()->id)->latest()->paginate(5);
            if(Auth::user()->roles[0]->name == "Admin" || Auth::user()->roles[0]->name == "subadmin"){
                $alluser = user_form::latest()->paginate(5);
               }
            $activity = logController::orderBy('id','DESC')->paginate(5);
              
            return view('admin.dashboard', compact('customer','dealer','subdealer','subadmin','seller','alluser','activity','subseller','subdealer'));
        } else {
            // $customer = User::role('customer')->where("spid", Auth::user()->id)->count();
            $customer = user_form::where("sid", Auth::user()->id)->count();
            $dealer = User::role('dealer')->where("spid", Auth::user()->id)->count();
            $subdealer = User::role('subdealer')->where("spid", Auth::user()->id)->count();
            $subadmin = User::role('subadmin')->where("spid", Auth::user()->id)->count();
            $seller = User::role('seller')->where("spid", Auth::user()->id)->count();
            $subseller = User::role('subseller')->where("spid", Auth::user()->id)->count();

             // get all user
            //  $alluser = User::orderBy('id','DESC')->paginate(5);
            $alluser = user_form::where('sid',Auth::user()->id)->paginate(5);
           
            $activity = logController::orderBy('id','DESC')->paginate(5);
           

            // if(Auth::user()->roles[0]->name == "seller"){
            //     $subseller = User::role('subseller')->where("id",Auth::user()->id)->count();
            // }
            // if(Auth::user()->roles[0]->name == "dealer"){
            //     $subdealer = User::role('subdealer')->where("id",Auth::user()->id)->count();
            // }

            return view('admin.dashboard', compact('customer', 'dealer', 'subdealer', 'subadmin', 'seller', 'alluser', 'activity','subseller','subdealer'));
        }
    }

   
    public function mailpage(Request $request){
        return view('admin.mailuser');
    }

    public function mailsend(Request $request)
    {
        $role = '';
        $url = '';
        if($request->role == 1) {
            $role = "Dealer";
            $url = "https://webcyst.com/ezzyhportal/dealerRegister/".Auth::user()->id;
        } elseif($request->role == 2) {
            $role = "Subdealer";
            $url = "https://webcyst.com/ezzyhportal/subdealerRegister/".Auth::user()->id;
        } elseif($request->role == 3) {
            $role = "Seller";
            $url = "https://webcyst.com/ezzyhportal/sellerRegister/".Auth::user()->id;
        } elseif($request->role == 4) {
            $role = "Subseller";
            $url = "https://webcyst.com/ezzyhportal/subsellerRegister/".Auth::user()->id;
        } elseif($request->role == 5) {
            $role = "Customer";
            $url = "https://ezzyhportal.com/userform/".Auth::user()->id;
        } 
        elseif($request->role == 6) {
            $role = "Dropshipper";
            $url = "https://webcyst.com/ezzyhportal/dropshipperRegister/".Auth::user()->id;
        }
      
        if(!empty($url)) {
            $log = new logController();
            $log->title = "Invitation Mail to ".$role;
            $log->description = "Send Invitation Mail to ".$request->fname.' by #'. Auth::user()->id." ".Auth::user()->name ." As a " .Auth::user()->roles[0]->name;
            $log->save();

            $details = [
                'title' => 'Ezzyhportal Invitation for '.$role,
                'body' => $url,
            ];
            Mail::to([$request->email])->send(new TestMail($details));
            return redirect()->back()->with('message', 'Mail Sucessfully Send');
        } else {
            return redirect()->back()->with('message', 'Something Went Wrong');
        }
            
       
    }
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
