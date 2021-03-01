<?php

namespace App\Http\Controllers\User;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    //Wishlish 
    public function Wishlist(){
        return view('user.wishlist');
    }

    // Get Wishlist Product
    public function getWishlistProd(){

        $wishlist = Wishlist::with('product')->where('user_id',Auth::id())->latest()->get();
        return response()->json($wishlist);
    }

    //Wishlist Remove
    public function wishlishremove($id){

        Wishlist::where('user_id',Auth::id())->where('id',$id)->delete();
        return response()->json(['success' =>'Successfully Wishlist delete ']);

    }
    
}
