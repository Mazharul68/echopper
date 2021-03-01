<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\subcategory;
use App\Models\subsubcategory;
use carbon\carbon;


class CategoryController extends Controller
{
    //Index Category

    public function index(){
    	$categories =category::latest()->get();
    	return view('admin.category.index',compact('categories'));
    }

    //Caterogy Store

    public function CategoryStore(request $request){
    	$request->validate([
    	'category_name_en'=> 'required',
    	 'category_name_bn' => 'required',
    	 'category_icon' => 'required',
    	]);

    	category::insert([
    		'category_name_en' => $request->category_name_en,
    		'category_name_bn' => $request->category_name_bn,
    		'category_slug_en' => strtolower(str_replace(' ','-',$request->category_name_en)),
    		'category_slug_bn' => str_replace(' ','-',$request->category_name_bn),
    		'category_icon' => $request->category_icon,
    		'created_at' => carbon::now(),
    	]);

    	 $notification=array(
     'message'=>'Product added Success',
     'alert-type'=>'success'
      );
     return Redirect()->back()->with($notification);
    }

    //Categoroy Edit

    public function CategoryEdit($cat_id){

    	$category = category::findOrFail($cat_id);
    	return view('admin.category.edit',compact('category'));
    }

    //Category Update

    public function CategoryUpdate(Request $request){
    	$cat_id =$request->category_id;

    	category::findOrfail($cat_id)->update([
    		'category_name_en' => $request->category_name_en,
    		'category_name_bn' => $request->category_name_bn,
    		'category_slug_en' => strtolower(str_replace(' ','-',$request->category_name_en)),
    		'category_slug_bn' => str_replace(' ','-',$request->category_name_bn),
    		'category_icon' => $request->category_icon,
    		'created_at' => carbon::now(),
    	]);

    	 $notification=array(
     'message'=>'Category added Success',
     'alert-type'=>'success'
      );
     return Redirect()->route('category')->with($notification);
    }

   //Category Delete Here

    public function CategoryDelete($cat_id){

        category::findOrfail($cat_id)->delete();

        $notification=array(
     'message'=>'Category Delete Success',
     'alert-type'=>'success'
      );
     return Redirect()->back()->with($notification);
    }
//================================SubCategory Route Are Here
    //sub-Category Page Here

    public function SubIndex(){
        $subcategories = subcategory::latest()->get();
        $categories = category::orderBy('category_name_en','ASC')->get();
        return view('admin.subcategory.index',compact('subcategories','categories'));
    }

    //SubCategory Store

    public function SubCategoryStore(Request $request){

        $request -> validate([
            'subcategory_name_en' => 'required',
            'subcategory_name_bn' => 'required',
            'category_id' => 'required',

        ],[
            'category_id.required' => 'Select Your any Category',
        ]);

        subcategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
    		'subcategory_name_bn' => $request->subcategory_name_bn,
    		'subcategory_slug_en' => strtolower(str_replace(' ','-',$request->subcategory_name_en)),
    		'subcategory_slug_bn' => str_replace(' ','-',$request->subcategory_name_bn),
    		'created_at' => carbon::now(),
        ]);
        $notification=array(
            'message'=>'Sub-Category Added Success',
            'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
    }
    //SubCategory Edit Page
    public function SubCategoryEdit($subcat_id){

        $subcategory = subcategory::findOrFail($subcat_id);
        $categories = category::orderBy('category_name_en','ASC')->get();

        return view('admin.subcategory.edit',compact('subcategory','categories'));
    }

    //sub Category Update
    public function SubCategoryUpdate(Request $request){

       $subcat = $request->id;

       subcategory::findOrfail($subcat)->update([

        'category_id' => $request->category_id,
        'subcategory_name_en' => $request->subcategory_name_en,
        'subcategory_name_bn' => $request->subcategory_name_bn,
        'subcategory_slug_en' => strtolower(str_replace(' ','-',$request->subcategory_name_en)),
        'subcategory_slug_bn' => str_replace(' ','-',$request->subcategory_name_bn),
        'updated_at' => carbon::now(),
       ]);

       $notification=array(
        'message'=>'Sub-Category Update Success',
        'alert-type'=>'success'
         );
        return Redirect()->route('sub-category')->with($notification);
    }
    //subCategory Delete

    public function SubCategoryDelete($subcat){

        subcategory::findOrfail($subcat)->delete();

        $notification=array(
     'message'=>'Sub-Category Delete Success',
     'alert-type'=>'success'
      );
     return Redirect()->back()->with($notification);
    }

    //======================Sub Sub-Category Route Here
    // sub-sub-category Page
    public function SubSubIndex(){

        $subcategory = category::orderBy('category_name_en','ASC')->get();
        $subsubcategories = subsubcategory::latest()->get();
        return view('admin.sub_sub_category.index',compact('subcategory','subsubcategories'));
    }

    //Subcategory with Ajax
     public function getSubCat($cat_id){
        $subcat = Subcategory::where('category_id',$cat_id)->orderBy('subcategory_name_en','ASC')->get();
        return json_encode($subcat);
    }

    // Sub-Sub-Category Store

    public function SubsubCategoryStore(Request $request){

        $request -> validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_bn' => 'required',
        ],[
            'category_id.required' => 'please Select Category',
            'subcategory_id.required' => 'Please Select Category',
        ]);

        subsubcategory::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
    		'subsubcategory_name_bn' => $request->subsubcategory_name_bn,
    		'subsubcategory_slug_en' => strtolower(str_replace(' ','-',$request->subsubcategory_name_en)),
    		'subsubcategory_slug_bn' => strtolower(str_replace(' ','-',$request->subsubcategory_name_bn)),
    		'created_at' => carbon::now(),
        ]);
        $notification=array(
            'message'=>'Sub-subCategory Added Success',
            'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
        // $request -> validate([
        //     'category_id' => 'required',
        //     'subcategory_id' => 'required',
        //     'subsubcategory_name_en' => 'required',
        //     'subsubcategory_name_bn' => 'required',
        //     'subsubcategory_slug_en' => 'required',
        //     'subsubcategory_slug_bn' => 'required',
        // ]);
        // subsubcategory::insert([
        //     'category_id' => $request->category_id,
        //     'subcategory_id' => $request->subcategory_id,
        //     'subsubcategory_name_en' => $request->subsubcategory_name_en,
    	// 	'subsubcategory_name_bn' => $request->subsubcategory_name_bn,
    	// 	'subsubcategory_slug_en' => strtolower(str_replace(' ','-',$request->subsubcategory_name_en)),
    	// 	'subsubcategory_slug_bn' => str_replace(' ','-',$request->subsubcategory_name_bn),
    	// 	'created_at' => carbon::now(),
        // ]);
        // $notification=array(
        //     'message'=>'Sub-sub-Category Added Success',
        //     'alert-type'=>'success'
        //      );
        //     return Redirect()->back()->with($notification);
    }

    //Sub Sub Category Edit Page

    public function SubsubCategoryEdit($subsubcat_id){

        $subsubcat =subsubcategory::findOrFail($subsubcat_id);
        return view('admin.sub_sub_category.edit',compact('subsubcat'));
    }

    //sub-sub Category Update


    public function SubsubCategoryUpdate(Request $request){

        $subsubcat = $request->id;

       subsubcategory::findOrfail($subsubcat)->update([

        'subsubcategory_name_en' => $request->subsubcategory_name_en,
        'subsubcategory_name_bn' => $request->subsubcategory_name_bn,
        'subsubcategory_slug_en' => strtolower(str_replace(' ','-',$request->subsubcategory_name_en)),
        'subsubcategory_slug_bn' => str_replace(' ','-',$request->subsubcategory_name_bn),
        'updated_at' => carbon::now(),
       ]);

       $notification=array(
        'message'=>'Sub-SubCategory Update Success',
        'alert-type'=>'success'
         );
        return Redirect()->route('sub-sub-category')->with($notification);

    }

    //Sub sub category Delete

    public function subsubCatgoryDelete($subsubcat_id){

        subsubcategory::findOrfail($subsubcat_id)->delete();

        $notification=array(
     'message'=>'Sub-Sub-Category Delete Success',
     'alert-type'=>'success'
      );
     return Redirect()->back()->with($notification);
     }
}

