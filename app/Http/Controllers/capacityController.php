<?php
    
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\capacity;
use App\Models\Product;
    
class capacityController extends Controller
{
    public function index(){
        $capacities = capacity::orderBy("id","desc")->get();
        return view('admin.products.capacities',compact('capacities'));
    }

    public function create(){
        return view('admin.products.capacityAdd');
    }

    public function store(Request $request){
        capacity::create([
            "name"=>$request->name
        ]);
        return redirect()->route("product.capacities")->with("success","capacity created successfully");
    }

    public function delete($id){
        $cap  = capacity::findOrFail($id);
        $cap->delete();
        return redirect()->back()->with("success","capacity deleted successfully");
    }
}
