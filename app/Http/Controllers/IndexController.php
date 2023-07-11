<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use DB;

class IndexController extends Controller
{
    public function home(){
        $category=Category::orderBy('id_category','DESC')->where('status_category',1)->get();
        $brand=Brand::orderBy('id','DESC')->where('status_brand',1)->get();
        $product=Product::orderBy('id_product','DESC')->where('status_product',1)->search()->paginate(6);
        return view('pages.homeuser')->with(compact('category','brand','product'));
    }

    public function show_category($id_category){
        $category=Category::orderBy('id_category','DESC')->where('status_category',1)->get();
        $brand=Brand::orderBy('id','DESC')->where('status_brand',1)->get();
        $category_id=Category::where('id_category',$id_category)->first();
        $product=Product::where('status_product',1)->where('id_category',$category_id->id_category)
            ->orderBy('id_product','DESC')->search()->paginate(6);

        return view('pages.Category.showcategory')->with(compact('category','brand','product'));
    }

    public function show_brand($id_brand){
        $category=Category::orderBy('id_category','DESC')->where('status_category',1)->get();
        $brand=Brand::orderBy('id','DESC')->where('status_brand',1)->get();
        $brand_id=Brand::where('id',$id_brand)->first();
        $product=Product::where('status_product',1)->where('id_brand',$brand_id->id)
            ->orderBy('id_product','DESC')->search()->paginate(6);
        return view('pages.Brand.showbrand')->with(compact('category','brand','product'));

    }


    public function show_product($id_product){
        $category=Category::orderBy('id_category','DESC')->where('status_category',1)->get();
        $brand=Brand::orderBy('id','DESC')->where('status_brand',1)->get();

        $details = DB::table('tbl_product')
            ->join('tbl_category','tbl_category.id_category','=','tbl_product.id_category')
            ->join('tbl_brand','tbl_brand.id','=','tbl_product.id_brand')
            ->where('tbl_product.id_product',$id_product)->get();

        foreach($details as $key => $value){
            $id_product = $value->id_category;
        }
        $related = DB::table('tbl_product')
            ->join('tbl_category','tbl_category.id_category','=','tbl_product.id_category')
            ->join('tbl_brand','tbl_brand.id','=','tbl_product.id_brand')
            ->where('tbl_product.id_product',$id_product)->whereNotIn('tbl_product.id_product',[$id_product])->get();


        return view('pages.Product.showproduct')->with(compact('category','brand','details','related'));

    }


}
