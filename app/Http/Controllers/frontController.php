<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\user_form;
use App\Models\User;
use App\Models\banner;
use App\Models\Product;
use App\Models\seller_product;
use App\Models\logController;
use App\Models\notification;
use App\Models\notify;
use App\Models\setting;
use App\Models\capacity;
use App\Models\hide_product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use DB;
use Image;


class frontController extends Controller {

    // public function dashboard(Request $request){
    //     return view('admin.dashboard');
    // }
    public function indexpage(Request $request) {
        if (!Auth::user()) {
            $cstmrs = user_form::where('ic_number', $request->search)->first();
            $products = Product::take(5)->latest()->get();
            $lproducts = Product::take(4)->latest()->get();
            $pproducts = Product::take(8)->get();
            $sproduct = Product::first();
            $title = setting::where("name","title")->first();
            $banner1= setting::where("name","banner1")->first();
            $banner2 = setting::where("name","banner2")->first();
            $banner3 = setting::where("name","banner3")->first();
            $slider = setting::where("name","slider")->first();
            return view('user.index', compact('cstmrs', 'products','lproducts','pproducts','title','banner1','banner2','banner3','slider','sproduct'));
        } else {
            return redirect('admin/dashboard');
        }
    }

    public function userformpage(Request $request, $id) {
        $cust = User::where('id', $id)->first();
        $user = User::where("id", $id)->first();
        $sp = User::where("id",$user->spid)->first();

        if(empty($user)){
            die("invalid user id");
        }
        $ban = banner::where('user_id', $id)->orWhere("user_id", $user->spid)->orWhere("user_id",$sp->spid)->first();
        $user = User::where("id",$id)->first();

            $spid = $user->spid;
            if(!isset($spid)){
              $spid = $id;  
            }
            $suser = User::where("id",$spid)->first();
            $pid = $suser->spid;
            if(!isset($pid)){
                $pid = $id;
            }

            $roleauth = $user->roles[0]->name;

        if($roleauth == "seller" || $roleauth == "seller" || $roleauth == "subseller" || $roleauth == "dropshipper" ){
            if($roleauth == "seller"){
               $parentid =  $user->id;
            }elseif($roleauth == "dropshipper"){
                $subseller = $user->spid;
                $parentid = User::where("id",$subseller)->select("spid")->first();
                $parentid = $parentid->spid;
            }elseif($roleauth == "subseller"){
                $parentid = $user->spid;
            }

            
            // $products = product::join("hide_products","hide_products.product_id","products.id")->select("products.*,hide_products.id as hid,hp.product_id as ppi")->where('products.is_hide',0)->get();
            // $hps = hide_product::where("user_id",$parentid)->get();
            // if(count($hps) == 0 || empty($hps)){
            //     $products = DB::select("SELECT * from products");
            // }
                // $products = DB::select("SELECT p.*,hp.id as hid,hp.product_id as ppi FROM `products` as p inner join `hide_products` as hp where p.id!=hp.product_id and hp.user_id='".$parentid."' and hp.status=0");
               
                $products = DB::select("SELECT * FROM `products` WHERE id NOt IN (SELECT product_id FROM `hide_products` WHERE user_id='".$parentid."') order by id desc");
                // $capacities = DB::select("SELECT DISTINCT capacity  FROM `products` WHERE id NOt IN (SELECT product_id FROM `hide_products` WHERE user_id='".$parentid."') order by id desc");
                $capacities = capacity::all();
                $brands = DB::select("SELECT DISTINCT brand FROM `products` WHERE id NOt IN (SELECT product_id FROM `hide_products` WHERE user_id='".$parentid."') order by id desc");
                $models = DB::select("SELECT DISTINCT name FROM `products` WHERE id NOt IN (SELECT product_id FROM `hide_products` WHERE user_id='".$parentid."') order by id desc");
    
            }else{
                    $products = DB::select("SELECT * from products where is_hide=0 order by id desc");
                    // $capacities = DB::select("SELECT DISTINCT capacity from products where is_hide=0 order by id desc");
                    $capacities = capacity::all();
                    $brands = DB::select("SELECT DISTINCT brand from products where is_hide=0 order by id desc");
                    $models = DB::select("SELECT DISTINCT name from products where is_hide=0 order by id desc");
            }

            
        
//         if ( Auth::user() != null && Auth::user() && Auth::user()->roles[0]->name == "seller") {
//             $products = product::join('seller_products', 'products.id', '=', 'seller_products.product_id')->where('seller_products.seller_id', $id)->get();
// //            $collect = collect($products);
// //            $brands = $collect->unique('brand');
// //            $capacity = $collect->unique('capacity');
            
// //            $products = seller_product::with('products')->get();
//         } elseif (Auth::user() != null && Auth::user()->roles[0]->name == "subseller") {
//             $products = product::join('seller_products', 'products.id', '=', 'seller_products.product_id')->where('seller_products.seller_id', $cust->spid)->get();
// //            $collect = collect($products);
// //            $brands = $collect->unique('brand');
// //            $capacity = $collect->unique('capacity');
//         } elseif (Auth::user() != null && Auth::user()->roles[0]->name == "dropshipper") {
//             $custm = User::where('id', $cust->spid)->first();
// //            $cus = user_form::where('sid', $cust->pid)->first();
//             $products = product::join('seller_products', 'products.id', '=', 'seller_products.product_id')->where('seller_products.seller_id', $custm->spid)->get();
// //            $collect = collect($products);
// //            $brands = $collect->unique('brand');
// //            $capacity = $collect->unique('capacity');
//         } else {
//             $products = Product::all();
// //            $collect = collect($products);
// //            $brands = $collect->unique('brand');
// //            $capacity = $collect->unique('capacity');
//         }
        return view('user.userform', compact('id', 'ban', 'products','capacities','brands','models'));
    }

    public function storeUserform(Request $request, $id) {
        $frontimg = '';
        $backimg = '';
        $slipimg = '';
        $bilimg = '';
        $bankimg = '';  
        $ssmimg = '';

        // dd($request->all());
        $image = $request->nric_front; // image base64 encoded
        // dd($image->getClientOriginalExtension());
        // dd($image->getMimeType() == "application/pdf");
        if(isset($image)){
            if($request->hasFile('nric_front') && $image->getMimeType() == "application/pdf"){
                $filename = 'file_' . time() . '.' .$image->getClientOriginalExtension();
                // Storage::disk('public')->put('front/',$image);
                $image->move(public_path("storage/front"),$filename);
                $frontimg = $filename;
            }
            else{
            preg_match("/data:image\/(.*?);/",$image,$image_extension); // extract the image extension
            $image = preg_replace('/data:image\/(.*?);base64,/','',$image); // remove the type part
            $image = str_replace(' ', '+', $image);
            // dd($image_extension);
            $imageName = 'image_' . time() . '.' . $image_extension[1]; //generating unique file name;
            $frontimg = $imageName;
            Storage::disk('public')->put('front/'.$imageName,base64_decode($image));
            // Storage::disk('public')->put('test1/'.$imageName,base64_decode($image));
            }
        }

		$image1 = $request->nric_back; // image base64 encoded
        if(isset($image1)){
            if($request->hasFile('nric_back') && $image1->getMimeType() == "application/pdf"){
                $filename = 'file_' . time() . '.' .$image1->getClientOriginalName();
                // Storage::disk('public')->put('back/',$image1);
                $image1->move(public_path("storage/back"),$filename);
                $backimg = $filename;
            }
            else{
            preg_match("/data:image\/(.*?);/",$image1,$image_extension); // extract the image extension
            $image = preg_replace('/data:image\/(.*?);base64,/','',$image1); // remove the type part
            $image = str_replace(' ', '+', $image);
            $imageName1 = 'image_' . time() . '.' . $image_extension[1]; //generating unique file name;

            $backimg = $imageName1;
            Storage::disk('public')->put('back/'.$imageName1,base64_decode($image));
            // Storage::disk('public')->put('test2/'.$imageName1,base64_decode($image));
            }
        }
		
		
		$image2 = $request->pay_slip; // image base64 encoded
        if(isset($image2)){
            if($request->hasFile('pay_slip') && $image2->getMimeType() == "application/pdf"){
                $filename = 'file_' . time() . '.' .$image2->getClientOriginalName();
                // Storage::disk('public')->put('slip/',$image2);
                $image2->move(public_path("storage/slip"),$filename);
                $slipimg = $filename;
            }
            else{
            preg_match("/data:image\/(.*?);/",$image2,$image_extension); // extract the image extension
            $image = preg_replace('/data:image\/(.*?);base64,/','',$image2); // remove the type part
            $image = str_replace(' ', '+', $image);
            // dd($image_extension);
            $imageName2 = 'image_' . time() . '.' . $image_extension[1]; //generating unique file name;

            $slipimg = $imageName2;
            Storage::disk('public')->put('slip/'.$imageName2,base64_decode($image));
            // Storage::disk('public')->put('test3/'.$imageName2,base64_decode($image));
            }
        }
		
		
		$image3 = $request->pay_bil; // image base64 encoded
        if(isset($image3)){
            if($request->hasFile('pay_bil') &&  $image3->getMimeType() == "application/pdf"){
                $filename = 'file_' . time() . '.' .$image3->getClientOriginalName();
                // Storage::disk('public')->put('bill/',$image3);
                $image3->move(public_path("storage/bill"),$filename);
                $bilimg = $filename;
            }
            else{
            preg_match("/data:image\/(.*?);/",$image3,$image_extension); // extract the image extension
            $image = preg_replace('/data:image\/(.*?);base64,/','',$image3); // remove the type part
            $image = str_replace(' ', '+', $image);
            // dd($image_extension);
            $imageName3 = 'image_' . time() . '.' . $image_extension[1]; //generating unique file name;

            $bilimg = $imageName3;
            Storage::disk('public')->put('bill/'.$imageName3,base64_decode($image));
            // Storage::disk('public')->put('test4/'.$imageName3,base64_decode($image));
            }
        }
		
		$image4 = $request->bank_statement; // image base64 encoded
        if(isset($image4)){
            if($request->hasFile('bank_statement') &&  $image4->getMimeType() == "application/pdf"){
                $filename = 'file_' . time() . '.' .$image4->getClientOriginalName();
                // Storage::disk('public')->put('bank/',$image4);
                $image4->move(public_path("storage/bank"),$filename);
                $bankimg = $filename;
            }
            else{
            preg_match("/data:image\/(.*?);/",$image4,$image_extension); // extract the image extension
            $image = preg_replace('/data:image\/(.*?);base64,/','',$image4); // remove the type part
            $image = str_replace(' ', '+', $image);
            // dd($image_extension);
            $imageName4 = 'image_' . time() . '.' . $image_extension[1]; //generating unique file name;

            $bankimg = $imageName4;
            Storage::disk('public')->put('bank/'.$imageName4,base64_decode($image));
            // Storage::disk('public')->put('test5/'.$imageName4,base64_decode($image));
            }
        }
		$image5 = $request->ssm; // image base64 encoded
        if(isset($image5)){
            if($request->hasFile('ssm') &&  $image5->getMimeType() == "application/pdf"){
                $filename = 'file_' . time() . '.' .$image5->getClientOriginalName();
                // Storage::disk('public')->put('ssm/',$image5);
                $image5->move(public_path("storage/ssm"),$filename);
                $ssmimg = $filename;
            }
            else{
            preg_match("/data:image\/(.*?);/",$image5,$image_extension); // extract the image extension
            $image = preg_replace('/data:image\/(.*?);base64,/','',$image5); // remove the type part
            $image = str_replace(' ', '+', $image);
            // dd($image_extension);
            $imageName5 = 'image_' . time() . '.' . $image_extension[1]; //generating unique file name;

            $ssmimg = $imageName5;
            Storage::disk('public')->put('ssm/'.$imageName5,base64_decode($image));
            // Storage::disk('public')->put('test6/'.$imageName5,base64_decode($image));
            }
        }

        // $this->validate($request,[
        //     "ic_number"=>"numeric|min:10|max:10"
        // ]);

        $rand = mt_rand(1000000000, 9999999999);
        $user = User::where('id', $id)->first();
        if(!isset($user)){
            return redirect()->back()->with("error","invalid user id");
            exit;
        }
        $refer_id = 0;
        $spid = $user->spid;
        if ($user->roles[0]->name == "subadmin" || $user->roles[0]->name == "Admin"){
            $pid = $id;
        }
        if ($user->roles[0]->name == "subadmin") {
            $refer_id = $id;
            $id = 1;
        }

        $role = $user->roles[0]->name;
        if($role == 'subseller' || $role == 'subdealer'){
            $pid = $spid;
        }
        if($role == 'seller' || $role == 'dealer'){
            $spid = $id;
            $pid = $id;
        }
        if($role == "dropshipper"){
            $data = User::where("id",$spid)->first();
            $pid = $data->spid;
        }

        // if ($user->spid == 0) {
        //     $spid = $id;
        // } else {
        //     $spid = $user->spid;
        // }
        // if($spid == 0){
        //     $pid = $id;
        // }
        // else{
        //     $data = User::where("id",$spid)->first();
        //     $pid = $data->spid;
        // }
       
      

        // if ($file = $request->hasFile('nric_front')) {
        //     // dd($file);
        //     $file = $request->file('nric_front');
        //     // dd($file);
        //     $filename = $file->getClientOriginalName();
        //     $img = Image::make($file->getRealPath()); 
        //     $img->resize(100, 100, function ($constraint) {
        //             $constraint->aspectRatio();
        //         })->save(public_path('/uploads/front').'/'.$filename);
        //     $file->move(public_path('/uploads/front'), $filename);
        //     $frontimg = $filename;
        // }
        // if ($file = $request->hasFile('nric_back')) {
        //     $file = $request->file('nric_back');
        //     $filename = $file->getClientOriginalName();
        //     $img = Image::make($file->getRealPath()); 
        //     $img->resize(100, 100, function ($constraint) {
        //             $constraint->aspectRatio();
        //         })->save(public_path('/uploads/back').'/'.$filename);
        //     // $file->move(public_path('/uploads/back'), $filename);
        //     $backimg = $filename;
        // }
        // if ($file = $request->hasFile('pay_slip')) {
        //     $file = $request->file('pay_slip');
        //     $filename = $file->getClientOriginalName();
        //     $img = Image::make($file->getRealPath()); 
        //     $img->resize(100, 100, function ($constraint) {
        //             $constraint->aspectRatio();
        //     })->save(public_path('/uploads/slip').'/'.$filename);
        //     // $file->move(public_path('/uploads/slip'), $filename);
        //     $slipimg = $filename;
        // }
        // if ($file = $request->hasFile('pay_bil')) {
        //     $file = $request->file('pay_bil');
        //     $filename = $file->getClientOriginalName();
        //     $img = Image::make($file->getRealPath()); 
        //     $img->resize(100, 100, function ($constraint) {
        //             $constraint->aspectRatio();
        //     })->save(public_path('/uploads/bill').'/'.$filename);
        //     // $file->move(public_path('/uploads/bill'), $filename);
        //     $bilimg = $filename;
        // }
        // if ($file = $request->hasFile('bank_statement')) {
        //     $file = $request->file('bank_statement');
        //     $filename = $file->getClientOriginalName();
        //     $img = Image::make($file->getRealPath()); 
        //     $img->resize(100, 100, function ($constraint) {
        //             $constraint->aspectRatio();
        //         })->save(public_path('/uploads/bank').'/'.$filename);
        //     // $file->move(public_path('/uploads/bank'), $filename);
        //     $bankimg = $filename;
        // }
        // if ($file = $request->hasFile('ssm')) {
        //     $file = $request->file('ssm');
        //     $filename = $file->getClientOriginalName();
        //     $img = Image::make($file->getRealPath()); 
        //     $img->resize(100, 100, function ($constraint) {
        //             $constraint->aspectRatio();
        //         })->save(public_path('/uploads/ssm').'/'.$filename);
                
        //     // $file->move(public_path('/uploads/ssm'), $filename);
        //     $ssmimg = $filename;

        // }
        
            if(isset($request->cstm_bank) || !empty($request->cstm_bank)){
                $bank = $request->cstm_bank;
            }
            else{
                $bank = $request->BANK;

            }

        $nricnum = trim($request->ic_number);
        if(strlen($nricnum)>12){
            return redirect()->back()->with("error","nric number should be 10 digit.");
        }
        
        $exist = user_form::where("ic_number",$nricnum)->first();
        if(isset($exist) && !empty($exist)){
            return redirect()->back()->with("error","nric number already exist");
        }
        else
        {
            $cstm = user_form::create([
                        "dealer_code" => $request->dealer_code,
                        "fullname" => $request->fullname,
                        "ecp1_name" => $request->ecp1_name,
                        "ecp1_add1" => $request->ecp1_add1,
                        "ecp1_add2" => $request->ecp1_add2,
                        "ecp1_post" => $request->ecp1_post,
                        "ecp1_city" => $request->ecp1_city,
                        "ecp1_state" => $request->ecp1_state,
                        "ecp1_phone" => $request->ecp1_phone,
                        "ecp1_call" => $request->ecp1_call,
                        "ecp2_name" => $request->ecp2_name,
                        "ecp2_rel" => $request->ecp2_rel,
                        "ecp2_add" => $request->ecp2_add,
                        "ecp2_add2" => $request->ecp2_add2,
                        "ecp2_post" => $request->ecp2_post,
                        "ecp2_city" => $request->ecp2_city,
                        "ecp2_state" => $request->ecp2_state,
                        "ecp2_phone" => $request->ecp2_phone,
                        "ecp2_call" => $request->ecp2_call,
                        "race" => $request->race,
                        "ic_number" => $request->ic_number,
                        "gender" => $request->gender,
                        "status" => $request->STATUS,
                        "martial" => $request->MARTIAL,
                        "bank" => $bank,
                        "account" => $request->ACCOUNT,
                        "account_no" => $request->account_no,
                        "account_name" => $request->account_name,
                        "email" => $request->email,
                        "hanphone_no" => $request->hanphone_no,
                        "address1" => $request->address1,
                        "address2" => $request->address2,
                        "postcode" => $request->postcode,
                        "city" => $request->city,
                        "state" => $request->state,
                        "length" => $request->LENGTH,
                        "call1" => $request->CALL,
                        "relationship" => $request->RELATIONSHIP,
                        "register_id" => $rand,
                        "sid" => $id,
                        "sponser_name" => $user->name,
                        "sponser_role" => $user->roles[0]->name,
                        "occupation_type" => $request->occupation_type,
                        "nature" => $request->NATURE,
                        "service_year" => $request->service_year,
                        "salary_date" => $request->salary_date,
                        "salary" => $request->salary,
                        "employment" => $request->EMPLOYMENT,
                        "company_name" => $request->company_name,
                        "company_address" => $request->company_address,
                        "company_postcode" => $request->company_postcode,
                        "company_state" => $request->company_state,
                        "company_city" => $request->company_city,
                        "office_no" => $request->office_no,
                        "document" => $request->document,
                        "brand" => $request->BRAND,
                        "model" => $request->MODEL,
                        "capacity" => $request->CAPACITY,
                        "loan" => $request->LOAN,
                        "loan_tenur" => $request->loan_tenur,
                        "spid" => $spid,
                        "pid"=>$pid,
                        "nric_front" => $frontimg,
                        "nric_back" => $backimg,
                        "pay_slip" => $slipimg,
                        "pay_bil" => $bilimg,
                        "bank_statement" => $bankimg,
                        "ssm" => $ssmimg,
                        "subadmin_refer" => $refer_id,
                        "remarks"=> $request->remarks
            ]);

            $log = new logController();
            $log->title = "Customer Form Registerd";
            $log->description = "customer " . $cstm->fullname . " is registered  By  " . $cstm->sponser_name . " As a " . $cstm->sponser_role;
            $log->type = 1;
            $cusid = $log->save();

            notify::create([
                "message" => "Hi admin Customer Register NRIC No. is " . $request->ic_number,
                "userid" => 1,
                "link" => "https://ezzyhportal.com/admin/newCustomers",
            ]);
            if ($id != 1) {
                notify::create([
                    "message" => "Hi Customer Register NRIC No. is " . $request->ic_number,
                    "userid" => $id,
                    "link" => "https://ezzyhportal.com/admin/newCustomers",
                ]);
            }
        return redirect()->route("thankU");
    }

//        return redirect()->back()->with('success', "submitted successfully");
    }

    public function contactus_page(Request $request) {
        return view('contact');
    }

    public function aboutus_page(Request $request) {
        return view('about');
    }
    
    public function frontText(){
        $texts = setting::orderBy("id","desc")->get();
        return view('admin.setting.index',compact('texts'));
    }
    
     public function createText(Request $request){
        return view('admin.setting.create');
    }
    
    public function storeText(Request $request){
        $imageName=null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('/uploads/front'), $imageName);
        }
        setting::create([
            "name"=> $request->name,
            "value"=>$request->value,
            "image"=>$imageName
        ]);
        
        
        return redirect()->route('front.text')->with("success","setting created successfully");
    }
    
    public function editText($id){
        $setting = setting::findOrFail($id);
        return view('admin.setting.edit',compact('setting'));
    }
    
    public function updateText(Request $request,$id){
        
        setting::where('id',$id)->update([
            "name"=> $request->name,
            "value"=>$request->value
        ]);
        
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('/uploads/front'), $imageName);
                setting::where('id',$id)->update([
                "image"=>$imageName
                ]);
        }
        
        return redirect()->route('front.text')->with("success","setting updated successfully");
    }
    
    public function deleteText($id){
        setting::where('id',$id)->delete();
        return redirect()->route('front.text')->with("success","setting deleted successfully");
    }
    
    public function thankU(){
        return view("thankyou");
    }

}
