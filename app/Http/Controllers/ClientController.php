<?php

namespace App\Http\Controllers;
use App\Models\Slider;
use App\Models\Product;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function home(){
        $sliders = Slider::where('status', 1)->get();
        $products = Product::where('status' , 1)->get();
        return view('client.home')->with('sliders', $sliders)->with('products', $products);
    }

    public function about (){
        return view('client.about');
    }

    public function contact (){
        return view('client.contact');
    }

    public function shop (){
        return view('client.shop');
    }

    public function cart (){
        return view('client.cart');
    }
}
