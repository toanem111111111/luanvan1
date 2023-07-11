<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Category;
use App\Models\Brand;


class CartController extends Controller
{

    public function showcart($id_product){
        $category=Category::orderBy('id_category','DESC')->where('status_category',1)->get();
        $brand=Brand::orderBy('id','DESC')->where('status_brand',1)->get();
        $product=Product::findOrFail($id_product);
        Cart::add([
           'id'=>$id_product,
            'name'=>$product->name_product,
            'qty'=>1,
            'price'=>$product->price_product,
            'weight'=>$product->weight_product??0,
            'options'=>[
                'image'=>$product->image_product,
            ],

        ]);

        return view('pages.Cart.showcart')->with(compact('category','brand'));
    }

    public function show_cart(){

        $category=Category::orderBy('id_category','DESC')->where('status_category',1)->get();
        $brand=Brand::orderBy('id','DESC')->where('status_brand',1)->get();
        return view('pages.Cart.showcart')->with(compact('category','brand'));
    }
    public function delete_to_cart($rowId){
        $category=Category::orderBy('id_category','DESC')->where('status_category',1)->get();
        $brand=Brand::orderBy('id','DESC')->where('status_brand',1)->get();
        Cart::update($rowId,0);
        return view('pages.Cart.showcart')->with(compact('category','brand'));
    }
    public function update_cart_quantity(Request $request){
        $category=Category::orderBy('id_category','DESC')->where('status_category',1)->get();
        $brand=Brand::orderBy('id','DESC')->where('status_brand',1)->get();
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;
        Cart::update($rowId,$qty);
        return view('pages.Cart.showcart')->with(compact('category','brand'));
    }


}
