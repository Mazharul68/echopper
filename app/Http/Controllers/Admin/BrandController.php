<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Intervention\Image\Facades\Image;
use carbon\carbon;

class BrandController extends Controller
{
    public function index(){
    	$brands =Brand::latest()->get();
    	return view('admin.brand.index',compact('brands'));
    }

    //Brands Store Hare
    public function BrandStore(Request $request){

    	$request->validate([
    		'brand_name_en' => 'required',
    		'brand_name_bn' => 'required',
    		'brand_image' => 'required',
    	],[
    		'brand_name_en.required' => 'Input English Brand Name',
    		'brand_name_bn.required' => 'Input Bangla Brand Name',
    	]);

    	 $image =$request->file('brand_image');
        $name_gen=uniqid().'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(166,110)->save('uploads/brand/'.$name_gen);
        $save_url='uploads/brand/'.$name_gen;

        Brand::insert([
        'brand_name_en' =>$request->brand_name_en,
        'brand_name_bn' =>$request->brand_name_bn,
        'brand_slug_en' =>strtolower(str_replace(' ', '-',$request->brand_name_en)),
        'brand_slug_bn' =>str_replace(' ', '-',$request->brand_name_bn),
        'brand_image' => $save_url,
        'created_at' => carbon::now(),

        ]);

        $notification=array(
     'message'=>'Brand Upload Success',
     'alert-type'=>'success'
      );
     return Redirect()->back()->with($notification);
    }

    //Brand Edit Here

    public function BrandEdit($brand_id){
   	
    	 $brand = brand::findOrFail($brand_id);
    	 return view('admin.brand.edit',compact('brand'));
    }

    //brand Update

    public function BrandUpdate(Request $request){

    	$brand_id = $request->brand_id;
    	$old_img = $request->old_image;

    if ($request->file('brand_image')) {
    	unlink($old_img);
    	$image =$request->file('brand_image');
        $name_gen=uniqid().'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(166,110)->save('uploads/brand/'.$name_gen);
        $save_url='uploads/brand/'.$name_gen;

        Brand::findOrFail($brand_id)->update([
        'brand_name_en' =>$request->brand_name_en,
        'brand_name_bn' =>$request->brand_name_bn,
        'brand_slug_en' =>strtolower(str_replace(' ', '-',$request->brand_name_en)),
        'brand_slug_bn' =>str_replace(' ', '-',$request->brand_name_bn),
        'brand_image' => $save_url,
        'created_at' => carbon::now(),

        ]);

        $notification=array(
     'message'=>'Brand Update Success',
     'alert-type'=>'success'
      );
     return Redirect()->route('brands')->with($notification);
    }else{
    	Brand::findOrFail($brand_id)->update([
        'brand_name_en' =>$request->brand_name_en,
        'brand_name_bn' =>$request->brand_name_bn,
        'brand_slug_en' =>strtolower(str_replace(' ', '-',$request->brand_name_en)),
        'brand_slug_bn' =>str_replace(' ', '-',$request->brand_name_bn),
        'created_at' => carbon::now(),

         ]);

        $notification=array(
     'message'=>'Brand Update Success',
     'alert-type'=>'success'
      );
     return Redirect()->route('brands')->with($notification);

    	}

    }

    //Brand Delete Here

    public function BrandDelete($brand_id){
        $brand = brand::findOrFail($brand_id);
        $img = $brand->brand_image;
        unlink($img);
        brand::findOrfail($brand_id)->delete();
        
        $notification=array(
     'message'=>'Brand Delete Success',
     'alert-type'=>'success'
      );
     return Redirect()->back()->with($notification);
    }
}
