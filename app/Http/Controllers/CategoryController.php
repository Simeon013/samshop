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

        return redirect(route('addcategory'))->with('status', 'La catégorie ' . $categorie->category_name . ' a été ajoutée avec succès. ');
    }

    public function categories(){
        $categories = Category::get();
        return view('admin.categories')-> with('categories', $categories);
    }

    public function editcategory($id){
        $category = Category::findOrFail($id);

        return view('admin.editcategory')->with('category', $category);
    }

    public function updatecategory(Request $request){

        $this->validate($request, ['category_name' => 'required|unique:categories']);

        $categorie = Category::findOrFail($request->input('id'));

        $categorie->category_name = $request->input('category_name');

        $categorie->update();

        return redirect(route('categories'))->with('status', 'La catégorie ' . $categorie->category_name . ' a été modifiée avec succès. ');
    }

    public function deletecategory($id){
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect(route('categories'))->with('status', 'La catégorie ' . $category->category_name . ' a été supprimée avec succès. ');
    }

}
