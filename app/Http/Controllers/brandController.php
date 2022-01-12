<?php
    
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\brand;
use App\Models\Product;
    
class brandController extends Controller
{
    
    public function create(){
        return view('admin.products.brandAdd');
    }
    public function store(Request $request){
        brand::create([
            "name"=>$request->name
        ]);
        return redirect()->back()->with("success","brand added successfully");
    }

    public function index(){
        $brands = brand::orderBy("id","desc")->get();
        return view("admin.products.brands",compact('brands'));
    }
    public function delete($id){
        $brand = brand::findOrFail($id);
            if(!empty($brand)){
                $pro = Product::where("brand",$brand->name)->first();
                    if(!empty($pro) || isset($pro)){
                        return redirect()->back()->with("error","please delete product first with this brand name!");
                        exit;
                    }
                $brand->delete();
                return redirect()->back()->with("success","brand deleted successfully");
            }
    }
}

