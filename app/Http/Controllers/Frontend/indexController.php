<?php

namespace App\Http\Controllers\Frontend;


use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\MultiImg;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class indexController extends Controller
{
   public function index(){

      $categories = Category::orderBy('category_name_en','ASC')->get();
      $sliders = Slider::where('status',1)->orderBy('id','DESC')->limit(5)->get();
      $products = Product::where('status',1)->orderBy('id','DESC')->get();
      $featureds = Product::where('featured',1)->where('status',1)->orderBy('id','DESC')->get();

      // $hot_deals = Product::where('hot_deals',1)->where('status', 1)->where('discount_price', '!=',NULL)->orderBy('id', 'DESC')->get();

      $special_offers = Product::where('special_offer',1)->where('status',1)->where('discount_price','!=',NULL)->orderBy('id', 'DESC')->get();

      $special_deals = Product::where('special_deals',1)->where('status',1)->where('discount_price','!=',NULL)->orderBy('id','DESC')->get();
      //Skip Category
     
      $skin_category_0 = Category::skip(0)->first();
      $skin_category_1 = Category::skip(1)->first();
      $skin_category_2 = Category::skip(3)->first();

      $skip_product_0 = Product::where('status',1)->where('category_id',$skin_category_0->id)->orderBy('id','DESC')->get();

      $skip_product_1 = Product::where('status',1)->where('category_id',$skin_category_1->id)->orderBy('id','DESC')->get();

      $skip_product_2 = Product::where('status',1)->where('category_id',$skin_category_2->id)->orderBy('id','DESC')->get();

   	 return view('frontend.index', compact('categories','sliders', 'products', 'featureds','special_offers','special_deals','skin_category_0','skip_product_0','skin_category_1','skip_product_1','skin_category_2','skip_product_2'));

   }
   // Sigle Product Dedails

   public function sigleProduct($product_id, $slug){

      $product = Product::findOrFail($product_id);
      //Product color
      $color_en = $product->product_color_en;
      $product_color_en = explode(',',$color_en);

      $color_bn = $product->product_color_bn;
      $product_color_bn = explode(',',$color_bn);

      //Product size
      $size_en = $product->product_size_en;
      $product_size_en = explode(',',$size_en);
      
      $size_bn = $product->product_size_bn;
      $product_size_bn = explode(',',$size_bn);

      $multiImg= MultiImg::where('product_id',$product_id)->get();

      $cat_id = $product->category_id;
      $relatedProducts= Product::where('category_id',$cat_id)->where('id','!=',$product_id)->orderBy('id','DESC')->get();
      
      return view('frontend.single_product', compact('product','multiImg','product_color_en','product_color_bn','product_size_en','product_size_bn','relatedProducts'));
   }

   // Product wise Tags
   public function productTags($tag){

       $products = Product::where('status',1)->where('product_tags_en',$tag)->orwhere('product_tags_bn',$tag)->orderBy('id','DESC')->paginate();

       $categories = Category::orderBy('category_name_en','ASC')->get();

       return view('frontend.product_tags.tags', compact('products','categories'));
   }
   // Subcategory Product Show
   public function subcatProductShow($subcat_id,$slug){

      $products = Product::where('status',1)->where('subcategory_id',$subcat_id)->orderBy('id','DESC')->paginate();

      $categories = Category::orderBy('category_name_en','ASC')->get();

      return view('frontend.sub_category_product', compact('products','categories'));
   }
   //subsubCat wise Product show

   public function subsubcatProductShow($subsubcat_id,$slug){

      $products = Product::where('status',1)->where('subsubcategory_id',$subsubcat_id)->orderBy('id','DESC')->paginate();

      $categories = Category::orderBy('category_name_en','ASC')->get();

      return view('frontend.sub_subcategory_product', compact('products','categories'));
   }

   // Product View With Modal
   public function prodViewModal($id){

      $product = Product::with('category','brand')->findOrFail($id);

      $color_en = $product->product_color_en;
      $product_color_en = explode(',',$color_en);

      // $color_bn = $product->product_color_bn;
      // $product_color_bn = explode(',',$color_bn);

      //Product size
      $size_en = $product->product_size_en;
      $product_size_en = explode(',',$size_en);
      
      // $size_bn = $product->product_size_bn;
      // $product_size_bn = explode(',',$size_bn);

      return response()->json(array(
         'product'=>$product,
         'color_en' => $product_color_en,
         'size_en' => $product_size_en,
      ));
   }
   
}
