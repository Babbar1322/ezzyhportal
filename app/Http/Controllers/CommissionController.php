<?php


namespace App\Http\Controllers;

use App\Models\user_form;
use App\Models\commission;
use App\Models\dealerCommission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommissionController extends Controller
{
    
    public function index(Request $request){
        if($request->search){
            $cstmrs = user_form::where('ic_number',$request->search)->first();
            if(!isset($cstmrs)){
                $cstmrs = "";
            }
            return response()->json($cstmrs);
        }
    }
    public function sellerCommission(Request $request){
        // $seller_ids = commission::where('status',1)->pluck('seller_id');
        // $sellers = User::role('seller')->whereNotIn('id',$seller_ids)->orderBy('id','desc')->get();
//        $sellers = User::role('seller')->orderBy('id','desc')->get();
         $sellers = User::role('seller')->where('login_code',"!=",null)->orderBy('id','desc')->get();

        $customers = "";
        if($request->seller_id){
            $customers = user_form::where('sid',$request->seller_id)->orWhere("pid",$request->seller_id)->get();
            return response()->json(compact('customers'));
        }
        return view('admin.commission.seller',compact('sellers'));
    }
    public function storeCommission(Request $request){
        
        $comm = commission::where('ic_number',$request->ic_no[0])->first();
        $ic_no = user_form::where("ic_number",$request->ic_no[0])->first();
        if($comm){
            return redirect()->back()->with("error","Commission slip already exist for this nric number");
        }
        if($ic_no){
        for($i=0;$i<count($request->ic_no);$i++){
           $commission =  commission::create([
                'seller_id'=>$request->seller,
                'customer_name'=>$request->customer[$i],
                'ic_number'=>$request->ic_no[$i],
                'item'=>$request->item[$i],
                'finance_price'=>$request->price[$i],
                'jcl_fee'=>$request->jcl_fee[$i],
                'admin_fee'=>$request->admin_fee[$i],
                'final_payment'=> $request->final_fee[$i]
            ]);

            
        }
        // $total = commission::where('seller_id',$request->seller_id)->sum('final_payment');
        return redirect()->route('commission.slip')->with(['data'=>$commission->seller_id]);
    }
    else{
        return redirect()->back()->with('error',"invalid NRIC Number");
    }

    }
    public function islip(){
        return view('admin.commission.invoice_slip');
    }

    public function updateCommission(){
        commission::where('status',0)->update([
            'status'=>1
        ]);
        return response(200);
    }

    public function dealerCommissions() {
        if(Auth::user()->roles[0]->name == 'Admin' || Auth::user()->roles[0]->name == 'subadmin'){
            $commission = dealerCommission::distinct()->orderBy('id','desc')->get()->map(function($data){
                $data->dealer_name = User::where('id',$data->dealer_id)->pluck('name');
                return $data;
            });
        //     get(['id', 'dealer_id','created_at'])->map(function($data){
        //     $data->commission = dealerCommission::where('dealer_id',$data->dealer_id)->sum('commission');
        //     $data->bonus = dealerCommission::where('dealer_id',$data->dealer_id)->sum('bonus');
        //     $data->fine = dealerCommission::where('dealer_id',$data->dealer_id)->sum('fine');
        //     $data->dealer_name = User::where('id',$data->dealer_id)->pluck('name');
        //     return $data;
        // });
    } else{
        $commission = dealerCommission::distinct()->where('dealer_id', Auth::user()->id)->orderBy('id','desc')->get()->map(function($data){
            $data->dealer_name = User::where('id',$data->dealer_id)->pluck('name');
            return $data;
        });
        // get(['id', 'dealer_id','created_at'])->map(function($data){
        //     $data->commission = dealerCommission::where('dealer_id',$data->dealer_id)->sum('commission');
        //     $data->bonus = dealerCommission::where('dealer_id',$data->dealer_id)->sum('bonus');
        //     $data->fine = dealerCommission::where('dealer_id',$data->dealer_id)->sum('fine');
        //     $data->dealer_name = User::where('id',$data->dealer_id)->pluck('name');
        //     return $data;
        // });

    }
        
        return view('admin.commission.dealerCommission',compact('commission'));
    }
    public function sellerCommissions(){
        if(Auth::user()->roles[0]->name == 'seller'){
            $commission = commission::where("seller_id",Auth::user()->id)->orderBy('id','desc')->get()->map(function($data){
            $data->seller_name = User::where('id',$data->seller_id)->pluck('name');
            return $data;
        });
        }else{
        $commission = commission::orderBy('id','desc')->get()->map(function($data){
            $data->seller_name = User::where('id',$data->seller_id)->pluck('name');
            return $data;
        });
        }
        return view('admin.commission.sellerCommission',compact('commission'));
    }
    
    public function sellerInvoice(){
        return view('admin.commission.invoice_slip');
    }
    public function dealerInvoice(Request $request, $id) {
         $dealer = dealerCommission::where('id',$id)->get(['dealer_id','commission', 'bonus', 'fine', 'status' ])->map(function($data){
            $data->deal = User::where('id',$data->dealer_id)->first();
            return $data;
          });
        return view('admin.dealer.commissionslip', compact('dealer'));
    }

    public function deleteDealerInvoice($id){
        $dealer = dealerCommission::findOrFail($id);
        $dealer->delete();
        return redirect()->back()->with("success","commission deleted successfully");
    }
    public function deleteSellerInvoice($id){
        $seller = commission::findOrFail($id);
        $seller->delete();
        return redirect()->back()->with("success","commission deleted successfully");
    }
}