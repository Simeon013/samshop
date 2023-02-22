<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function addcategory() {
        return view('admin.addcategory');
    }

    public function savecategory(Request $request){

        $this->validate($request, ['category_name' => 'required|unique:categories']);

        $categorie = new Category();

        $categorie->category_name = $request->input('category_name');

        $categorie->save();

        return redirect('/addcategory')->with('status', 'La catégorie ' . $categorie->category_name . ' a été ajoutée avec succès. ');
    }

    public function categories() {
        return view('admin.categories');
    }


}
