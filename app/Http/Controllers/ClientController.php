<?php

namespace App\Http\Controllers;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Cart;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class ClientController extends Controller
{
    public function home(){
        $sliders = Slider::where('status', 1)->get();
        $categories = Category::get();
        $products = Product::where('status' , 1)->get();
        return view('client.home')->with('sliders', $sliders)->with('categories', $categories)->with('products', $products);
    }

    public function shop(){
        $categories = Category::get();
        $products = Product::where('status' , 1)->get();
        return view('client.shop')->with('categories', $categories)->with('products',$products);
    }

    public function cart(){
        if(!Session::has('cart')){
            return view('client.cart');
        }

        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        return view('client.cart', ['products' => $cart->items]);
    }

    public function add_to_cart($id){
        $product = Product::find($id);

        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        Session::put('cart', $cart);

        //dd(Session::get('cart'));
        return redirect('/shop');
    }

    public function update_cart(Request $request, $id){

        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->updateQty($request->id, $request->quantity);
        Session::put('cart', $cart);

        //dd(Session::get('cart'));
        return redirect('/panier');
    }

    public function remove_to_cart($id){
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        }
        else{
            Session::forget('cart');
        }

        //dd(Session::get('cart'));
        return redirect::to('/panier');
    }

    public function about (){
        return view('client.about');
    }

    public function contact (){
        return view('client.contact');
    }

}
