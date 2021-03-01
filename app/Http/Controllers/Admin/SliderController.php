<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use carbon\carbon;

class SliderController extends Controller
{
    //Sliders page Here

    public function index(){

        $sliders = Slider::latest()->get();
        return view('admin.slider.index',compact('sliders'));
    }

    //Slider Store

    public function SliderStore(Request $request){
        $request -> validate([
            'image'=> 'required',
        ]);

        $image =$request->file('image');
        $name_gen= uniqid().'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(870,370)->save('uploads/slider/'.$name_gen);
        $save_url='uploads/slider/'.$name_gen;

        Slider::insert([
            'title_en' => $request->title_en,
            'title_bn' => $request->title_bn,
            'description_en' => $request->description_en,
            'description_bn' => $request->description_bn,
            'image' => $save_url,
            'created_at' => carbon::now()
        ]);

        $notification=array(
            'message'=>'Slider Upload Success',
            'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
    }

    // Slider Edit Page
    public function SliderEdit($id){
       $slider = Slider::findOrFail($id);
       return view('admin.slider.edit',compact('slider'));
    }


    //Slider Update
    public function SliderUpdate(Request $request){
      
        $id = $request->id;
    	$old_img = $request->old_image;

    if ($request->file('image')) {
        unlink($old_img);
        
    	$image =$request->file('image');
        $name_gen=uniqid().'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(870,370)->save('uploads/slider/'.$name_gen);
        $save_url='uploads/slider/'.$name_gen;

        Slider::findOrFail($id)->update([
        
        'title_en' => $request->title_en,
        'title_bn' => $request->title_bn,
        'description_en' => $request->description_en,
        'description_bn' => $request->description_bn,
        'image' => $save_url,
        'created_at' => carbon::now()
        ]);

        $notification=array(
       'message'=>'Slider Update Success',
       'alert-type'=>'success'
      );
     return Redirect()->route('sliders')->with($notification);
    }else{
        Slider::findOrFail($id)->update([
            'title_en' => $request->title_en,
            'title_bn' => $request->title_bn,
            'description_en' => $request->description_en,
            'description_bn' => $request->description_bn,
            'created_at' => carbon::now()
            ]);
    
            $notification=array(
           'message'=>'Slider Update Success',
           'alert-type'=>'success'
          );
         return Redirect()->route('sliders')->with($notification);
      }
    }

    // Slider Delete

    public function SliderDelete($id){

        $oldImg = Slider::findOrFail($id);
        unlink($oldImg->image);

        Slider::findOrFail($id)->delete();

        $notification=array(
            'message'=>'Slider Delete Successfully',
            'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
    }

    //Slider InActive
    public function SliderInactive($id){

        Slider::findOrfail($id)->update(['status'=> 0]);

        $notification=array(
            'message'=>'Slider Inactivated',
            'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
    }

    //Slider Active
    public function SliderActive($id){
        
        Slider::findOrFail($id)->update(['status' => 1]);

        $notification=array(
            'message'=>'Slider Activated',
            'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
    }
}
