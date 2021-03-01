<?php

namespace App\Http\Controllers\Admin;

use carbon\carbon;
use carbon\carboan;
use App\Models\brand;
use App\Models\Product;
use App\Models\category;
use App\Models\MultiImg;
use App\Models\subcategory;
use Illuminate\Http\Request;
use App\Models\subsubcategory;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    //add-Product

    public function AddProduct(){
        $categories = category::latest()->get();
        $brands = brand::latest()->get();
        return view('admin.product.create',compact('categories','brands'));
    }

     //SubCategory With Ajax
     public function getSubSubCat($sub_cat){
        $subsubcat = Subsubcategory::where('subcategory_id',$sub_cat)->orderBy('subsubcategory_name_en','ASC')->get();
        return json_encode($subsubcat);
    }
    //Store Product

    public function ProductStore(Request $request){

        // $request =>validate([
        //     //code here
        // ]);

        $image =$request->file('product_thambnail');
        $name_gen=uniqid().'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('uploads/product/thambnail/'.$name_gen);
        $save_url='uploads/product/thambnail/'.$name_gen;

$product_id =Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_bn' => $request->product_name_bn,
            'product_slug_en' => strtolower(str_replace(' ','-',$request->product_name_en)),
            'product_slug_bn' => str_replace(' ','-',$request->product_name_bn),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_bn' => $request->product_tags_bn,
            'product_size_en' => $request->product_size_en,
            'product_size_bn' => $request->product_size_bn,
            'product_color_en' => $request->product_color_en,
            'product_color_bn' => $request->product_color_bn,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_bn' => $request->short_descp_bn,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_bn' => $request->long_descp_bn,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'product_thambnail' => $save_url,
            'status' => 1,
            'created_at'=>carbon::now()

        ]);

        // Multiple Image Upload Start
        $image =$request->file('multi_img');

        foreach ($image as $img ) {
        $image =$request->file('product_thambnail');
        $make_name=uniqid().'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(917,1000)->save('uploads/multi-img/'.$make_name);
        $save_url='uploads/multi-img/'.$make_name;

        MultiImg::insert([
           'product_id' =>$product_id,
           'photo_name' =>$save_url,
           'created_at'=>carbon::now()
        ]);

        }

        // Multiple Image Upload end

        $notification=array(
            'message'=>'Product added Success',
            'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
    }

    // manage Product
    public function ManageProduct(){

        $products = product::latest()->get();

        return view('admin.product.index',compact('products'));
    }

    //Product Edit Page

    public function ProductEdit($product_id){
        $product = product::findOrFail($product_id);
        $categories = category::latest()->get();
        $brands = brand::latest()->get();
        $multiImags = MultiImg::where('product_id',$product_id)->latest()->get();

        return view('admin.product.edit',compact('product','categories','brands','multiImags'));

    }
    //Update Product

    public function ProductUpdate( Request $request){

        $request->validate([
            'brand_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_id' => 'required',
            'product_name_en' => 'required',
            'product_name_bn' => 'required',
            'product_name_bn' => 'required',
            'product_code' => 'required',
            'product_qty' => 'required',
            'product_tags_en' => 'required',
            'product_tags_bn' => 'required',
            'product_size_en' => 'required',
            'product_size_bn' => 'required',
            'product_color_en' => 'required',
            'product_color_bn' => 'required',
            'selling_price' => 'required',
            'discount_price' => 'required',
            'short_descp_en' => 'required',
            'short_descp_bn' => 'required',
            'long_descp_en' => 'required',
            'long_descp_bn' => 'required',
            'hot_deals' => 'required',
            'featured' => 'required',
            'special_offer' => 'required',
            'special_deals' => 'required',
            ]);

        $product_id = $request->product_id;

            Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_bn' => $request->product_name_bn,
            'product_slug_en' => strtolower(str_replace(' ','-',$request->product_name_en)),
            'product_slug_bn' => str_replace(' ','-',$request->product_name_en),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_bn' => $request->product_tags_bn,
            'product_size_en' => $request->product_size_en,
            'product_size_bn' => $request->product_size_bn,
            'product_color_en' => $request->product_color_en,
            'product_color_bn' => $request->product_color_bn,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_bn' => $request->short_descp_bn,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_bn' => $request->long_descp_bn,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'updated_at'=>carbon::now()

        ]);

        $notification=array(
            'message'=>'Product Update Successfully',
            'alert-type'=>'success'
             );
            return Redirect()->route('manage-product')->with($notification);
    }
    //MultiImage Update

    public function ProductMultiImg(Request $request){
       $imgs = $request->multiImg;

       foreach ($imgs as $id => $img) {

           $imgDel = MultiImg::findOrFail($id);
           unlink($imgDel->photo_name);

        $image =$request->file('product_thambnail');
        $make_name=uniqid().'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(917,1000)->save('uploads/multi-img/'.$make_name);
        $save_url='uploads/multi-img/'.$make_name;

        MultiImg::where('id',$id)->update([

            'photo_name' => $save_url,
            'updated_at' => carbon::now(),
        ]);


       }
       $notification=array(
        'message'=>'Product Image Update Successfully',
        'alert-type'=>'success'
         );
        return Redirect()->back()->with($notification);
    }
    //Product Thambnail Update

    public function Productthamb(Request $request){

        $pro_id =$request->product_id;
        $oldImage = $request->old_img;

        unlink($oldImage);
        $image =$request->file('product_thambnail');
        $name_gen=uniqid().'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('uploads/product/thambnail/'.$name_gen);
        $save_url='uploads/product/thambnail/'.$name_gen;

        product::findOrFail($pro_id)->update([

            'product_thambnail' => $save_url,
            'updated_at'=>carbon::now()

        ]);

        $notification=array(
            'message'=>'Product Thambnail Update Successfully',
            'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
    }

    //Product Multiimg Delete

    public function ProductMultiDel($id){

        $oldImg = MultiImg::findOrFail($id);
        unlink($oldImg->photo_name);

        MultiImg::findOrFail($id)->delete();

        $notification=array(
            'message'=>'Product MultiImg Delete Successfully',
            'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
    }
    // Product Inactive

    public function ProductInactive($id){
        product::findOrFail($id)->update(['status'=> 0]);

        $notification=array(
            'message'=>'Product Inactivated',
            'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
    }

    // Product Active

    public function ProductActive($id){

        product::findOrFail($id)->update(['status' => 1]);

        $notification=array(
            'message'=>'Product Activated',
            'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
    }

    // Prouduct Delete

    public function ProductDelete($product_id){

        $product = Product::findOrFail($product_id);
        unlink($product->product_thambnail);
        Product::findOrFail($product_id)->delete();
        $images = MultiImg::where('product_id',$product_id)->get();
        foreach ($images as $img) {
        unlink($img->photo_name);
        MultiImg::where('product_id',$product_id)->delete();
        }
        $notification=array(
            'message'=>'Product Delete Successfully',
            'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
    }
}
