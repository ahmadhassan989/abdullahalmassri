<?php

namespace App\Http\Controllers;

use App\Models\MainCategory;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
// use Session;


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
        $products = Product::with('mainCategory','subCategory','unit','productimgs')->get();
        return view('welcome',compact('products'));
    }

    public function product($name)
    {

        return view('portal.product');
    }



    public function product_by_category()
    {

    }
    public function addToCart(Request $request)
    {
        // \Session::forget('cart');

        $product = $request->product ;
        $cart = \Session::get('cart');
        $cart [$product['id']] = $product ;


        \Session::put('cart', $cart);
        // \Session::flash('success','barang berhasil ditambah ke keranjang!');
        //dd(Session::get('cart'));
        return response(\Session::get('cart'));

    }
    public function cart()
    {
        $products = \Session::get('cart') ? \Session::get('cart') : false ;

        return view('portal.cart',['products'=>$products]);
    }
}
