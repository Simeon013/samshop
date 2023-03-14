<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function addproduct(){
        $categories = Category::All();
        return view('admin.addproduct')->with('categories', $categories);
    }

    public function saveproduct(Request $request){
        $this->validate($request, [ 'product_name' => 'required|unique:products',
                                    'product_price' => 'required',
                                    'category_id' => 'required',
                                    'product_image' => 'image|nullable|max:1999']
                                );

        if($request->hasFile('product_image')){
            //1 - get file name with extension
            $fileNameWithExt = $request->file('product_image')->getClientOriginalName();
            //2 - get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //3 - get just file extension
            $extension = $request->file('product_image')->getClientOriginalExtension();
            //4 - file name to store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            //uploader l'image
            $path = $request->file('product_image')->storeAs('public/product_images', $fileNameToStore);
        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }

        $product = new Product();
        $product->product_name = $request->input('product_name');
        $product->product_price = $request->input('product_price');
        $product->category_id = $request->input('category_id');
        $product->product_image = $fileNameToStore;
        $product->status = 1;

        $product->save();

        return redirect(route('addproduct'))->with('status', 'Le produit ' . $product->product_name . ' a été ajouté avec succès.');

        // print($request->input('product_category'));
    }

    public function products(){

        // $category = Category::get();
        // // $products = Product::get();
        // $products = $category->products()->get();
        // return view('admin.products')->with('products', $products);

        $products = Product::with('category')->get();
        return view('admin.products' , compact('products'));
    }

    public function editproduct($id){
        
        $product = Product::findOrFail($id);

        $categories = Category::All();

        return view('admin.editproduct')->with('categories', $categories)->with('product', $product);
    }

    public function updateproduct(Request $request){

        $this->validate($request, [ 'product_name' => 'required',
                                    'product_price' => 'required',
                                    'category_id' => 'required',
                                    'product_image' => 'image|nullable|max:1999']
                                );

        $product = Product::findOrFail($request->input('id'));
        $product->product_name = $request->input('product_name');
        $product->product_price = $request->input('product_price');
        $product->category_id = $request->input('category_id');

        if($request->hasFile('product_image')){
            //1 - get file name with extension
            $fileNameWithExt = $request->file('product_image')->getClientOriginalName();
            //2 - get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //3 - get just file extension
            $extension = $request->file('product_image')->getClientOriginalExtension();
            //4 - file name to store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            //uploader l'image
            $path = $request->file('product_image')->storeAs('public/product_images', $fileNameToStore);

            if($product->product_image != 'noimage.jpg'){
                Storage::delete('public/product_images/'.$product->product_image);
            }

            $product->product_image = $fileNameToStore;
        }
        $product->update();

        return redirect(route('products'))->with('status', 'Le produit ' . $product->product_name . ' a été modifié avec succès.');

    }

    public function deleteproduct($id){

        $product = Product::findOrFail($id);

        if($product->product_image != 'noimage.jpg'){
            Storage::delete('public/product_images/'.$product->product_image);
        }

        $product->delete();

        return redirect(route('products'))->with('status', 'Le produit ' . $product->product_name . ' a été supprimé avec succès.');
    }

    public function activerproduct($id){
        $product = Product::findOrFail($id);

        $product->status = 1;

        $product->update();

        return redirect(route('products'))->with('status', 'Le produit ' . $product->product_name . ' a été activé avec succès.');
    }

    public function desactiverproduct($id){
        $product = Product::findOrFail($id);

        $product->status = 0;

        $product->update();

        return redirect(route('products'))->with('status', 'Le produit ' . $product->product_name . ' a été désactivé avec succès.');
    }
}
