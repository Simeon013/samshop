<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function addslider(){
        return view('admin.addslider');
    }

    public function saveslider(Request $request){
        $this->validate($request, [ 'description1' => 'required',
                                    'description2' => 'required',
                                    'slider_image' => 'image|nullable|max:1999']
                                );

        if($request->hasFile('slider_image')){
            //1 - get file name with extension
            $fileNameWithExt = $request->file('slider_image')->getClientOriginalName();
            //2 - get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //3 - get just file extension
            $extension = $request->file('slider_image')->getClientOriginalExtension();
            //4 - file name to store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            //uploader l'image
            $path = $request->file('slider_image')->storeAs('public/slider_images', $fileNameToStore);
        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }

        $slider = new Slider();
        $slider->description1 = $request->input('description1');
        $slider->description2 = $request->input('description2');
        $slider->slider_image = $fileNameToStore;
        $slider->status = 1;

        $slider->save();

        return redirect(route('addsliders'))->with('status', 'Le slider a été ajouté avec succès.');

    }

    public function sliders(){

        $sliders = Slider::get();
        return view('admin.sliders')->with('sliders' , $sliders);
    }

    public function editslider($id){
        $slider = Slider::findOrFail($id);

        return view('admin.editslider')->with('slider' , $slider);
    }

    public function updateslider(Request $request){
        $this->validate($request, [ 'description1' => 'required',
                                    'description2' => 'required',
                                    'slider_image' => 'image|nullable|max:1999']
    );

        $slider = Slider::findOrFail($request->input('id'));
        $slider->description1 = $request->input('description1');
        $slider->description2 = $request->input('description2');

        if($request->hasFile('slider_image')){
            //1 - get file name with extension
            $fileNameWithExt = $request->file('slider_image')->getClientOriginalName();
            //2 - get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //3 - get just file extension
            $extension = $request->file('slider_image')->getClientOriginalExtension();
            //4 - file name to store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            //uploader l'image
            $path = $request->file('slider_image')->storeAs('public/slider_images', $fileNameToStore);

            if($slider->slider_image != 'noimage.jpg'){
                Storage::delete('public/slider_images/'.$slider->slider_image);
            }

            $slider->slider_image = $fileNameToStore;
        }
        $slider->update();

        return redirect(route('sliders'))->with('status', 'Le slider ' . $slider->slider_name . ' a été modifié avec succès.');

    }

    public function deleteslider($id){

        $slider = Slider::findOrFail($id);

        if($slider->slider_image != 'noimage.jpg'){
            Storage::delete('public/slider_images/'.$slider->slider_image);
        }

        $slider->delete();

        return redirect(route('sliders'))->with('status', 'Le slider ' . $slider->slider_name . ' a été supprimé avec succès.');
    }

    public function activerslider($id){
        $slider = Slider::findOrFail($id);

        $slider->status = 1;

        $slider->update();

        return redirect(route('sliders'))->with('status', 'Le slider ' . $slider->slider_name . ' a été activé avec succès.');
    }

    public function desactiverslider($id){
        $slider = Slider::findOrFail($id);

        $slider->status = 0;

        $slider->update();

        return redirect(route('sliders'))->with('status', 'Le slider ' . $slider->slider_name . ' a été désactivé avec succès.');
    }
}
