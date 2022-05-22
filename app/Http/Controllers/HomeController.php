<?php

namespace App\Http\Controllers;

use App\Models\MainCategory;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::with('mainCategory','subCategory','unit')->get();
        return view('welcome',compact('products'));
    }

    public function product($name)
    {

        return view('portal.product');
    }

    public function cart()
    {
        return view('portal.cart');
    }

    public function product_by_category()
    {

    }
    public function addToCart(Request $request)
    {
       
       if(session()->get('products') == []){
        session()->put('products',[]);
        session()->put('products',$request->all());

        // $products=[];
        //    array_push($products,$request->all());
        //    $request->session()->put('products',$products);
       }
       else{
        
        // array_push($products,);
        session()->push('products',$request->all());

       }
       dd(session()->get('products'));

       
    }
}
