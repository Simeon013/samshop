<?php

namespace App\Http\Controllers;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;

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

    public function cart (){
        return view('client.cart');
    }

    public function about (){
        return view('client.about');
    }

    public function contact (){
        return view('client.contact');
    }

}
