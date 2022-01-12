<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\brand;
use App\Models\seller_product;
use App\Models\user_form;
use App\Models\User;
use App\Models\capacity;
use App\Models\hide_product;
use DB;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;


class ProductController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct() {
//        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:product-list', ['only' => ['index', 'show']]);
        $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        if($request->search !=""){
            $products = Product::where('name','Like','%'.$request->search.'%')->orWhere('brand','like','%'.$request->search.'%')->orWhere('capacity','like','%'.$request->search.'%')->orderBy('id','desc')->paginate(20);
            $products->appends(['search'=> $request->search]);
          }
        elseif (Auth::user()->roles[0]->name == 'Admin' || Auth::user()->roles[0]->name == 'subadmin') {
            $products = Product::latest()->paginate(20);
            $products->map(function ($data) {
                $data->seller_price = seller_product::where('seller_id', Auth::user()->id)->where("product_id", $data->id)->pluck("seller_price")->first();
                $status = hide_product::where('product_id',$data->id)->where("user_id",Auth::user()->id)->first();
                if(!empty($status)){
                 $data->status = $status->status;
                }
                else{
                    $data->status = "";
                }
                return $data;
            });
        } elseif (Auth::user()->roles[0]->name == 'seller') {
            // $products = Product::latest()->paginate(20);
            // $products->map(function ($data) {
            //     $data->seller_price = seller_product::where('seller_id', Auth::user()->id)->where("product_id", $data->id)->pluck("seller_price")->first();
            //     $status = hide_product::where('product_id',$data->id)->where("user_id",Auth::user()->id)->first();
            //     if(isset($status)){
            //      $data->status = 0;
            //     }else{
            //         $data->status =1;
            //     }
            //     return $data;
            // });
           $products = DB::select("SELECT *,(SELECT COUNT(*) FROM `hide_products` as hp WHERE user_id='".Auth::user()->id."' and  `hp`.`product_id` = `p`.`id`) as status FROM `products` as p order by id desc");
           $total = count($products);
           $per_page = 20;
           $current_page = $request->input("page") ?? 1;
           $starting_point = ($current_page * $per_page) - $per_page;
           $products = array_slice($products, $starting_point, $per_page, true);
           $products = new Paginator($products, $total, $per_page, $current_page, [
               'path' => $request->url(),
               'query' => $request->query(),
           ]);

        } elseif (Auth::user()->roles[0]->name == 'subseller') {
            $cust = user_form::where('sid', Auth::user()->id)->first();
            
            if(!isset($cust)){
                $cust = User::where('id', Auth::user()->id)->first();
                $pid= $cust->spid;
            }
            else{
                $pid = $cust->pid;
            }
            $products = Product::latest()->paginate(20);
         

        }
        elseif (Auth::user()->roles[0]->name == 'dropshipper') {
            $cust = user_form::where('sid', Auth::user()->id)->first();
            if(isset($cust)){
                $custm = user_form::where('pid', $cust->pid)->first();
            }
            if(isset($cust) && isset($custm)){
                $cus = user_form::where('sid', $cust->pid)->first();
            }
            
            if(!isset($cus)){
                $cust = User::where('id', Auth::user()->id)->first();
                $cus = User::where('id', $cust->spid)->first();
                $pid = $cus->spid;
            }
            else{
                $pid = $cus->pid;
            }
            $products = Product::latest()->paginate(20);
        }
        
        
        return view('admin.products.index', compact('products'))
                        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $brands = brand::all();
        $capacities = capacity::all();
        return view('admin.products.create', compact('brands','capacities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        request()->validate([
            'name' => 'required',
            // 'detail' => 'required',
            'brand' => 'required',
            'price' => 'required',
            'image' => ['required', 'file', 'mimes:jpeg,bmp,png','dimensions:max_width=300,max_height=300'],
        ]);
        $product = Product::create($request->all());
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('/uploads/product'), $imageName);
            $product->update(['image' => $imageName]);
        }
        return redirect()->route('products.index')
                        ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product) {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product) {

        $brands = brand::all();
        $prods = seller_product::where('product_id', $product->id)->where("seller_id", Auth::user()->id)->first();
        return view('admin.products.edit', compact('product', 'brands', 'prods'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product) {

        request()->validate([
            'name' => 'required',
            // 'detail' => 'required',
            'brand' => 'required',
            'price' => 'required',
            'image' => ['file', 'mimes:jpeg,bmp,png','dimensions:max_width=300,max_height=300'],

                // 'image' => ['required', 'file', 'mimes:jpeg,bmp,png'],
        ]);
        
       



        if (Auth::user()->roles[0]->name == 'seller') {
            $seller = seller_product::where("seller_id", Auth::user()->id)->where('product_id', $product->id)->first();
            if (isset($seller)) {
                seller_product::where("seller_id", Auth::user()->id)->update([
                    "admin_price" => $request->price,
                    "seller_price" => $request->seller_price,
                    "seller_id" => Auth::user()->id,
                    "product_id" => $product->id
                ]);
            } else {
                seller_product::create([
                    "admin_price" => $request->price,
                    "seller_price" => $request->seller_price,
                    "seller_id" => Auth::user()->id,
                    "product_id" => $product->id
                ]);
            }
        } else {
            $product->update($request->all());
        }
        
         if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('/uploads/product'), $imageName);
            $request->image = $imageName;
            $product->update(['image' => $imageName]);
            
        }
        if ($request->image == null || $request->image == '') {
            unset($request['image']);
        }
        
        return redirect()->route('products.index')
                        ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product) {
        $product->delete();

        return redirect()->route('products.index')
                        ->with('success', 'Product deleted successfully');
    }

    public function productVisibilty(Request $request){
        if($request->status == 0){
            
            hide_product::create([
                "product_id"=> $request->pid,
                "status"=> $request->status,
                "user_id"=>Auth::user()->id
            ]);
        }else{
            hide_product::where("product_id",$request->pid)->where("user_id",Auth::user()->id)->delete();
        }
        // if(!$exist && !isset($exist)){
        //     hide_product::create([
        //         "product_id"=> $request->pid,
        //         "status"=> $request->status,
        //         "user_id"=>Auth::user()->id
        //     ]);
        // }
        // else{
        //     hide_product::where("product_id",$request->pid)->where("user_id",Auth::user()->id)->update([
        //         "status"=> $request->status,
        //     ]);
        // }
        return response(200);
    }

}
