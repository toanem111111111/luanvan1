<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=Product::with('product_category','product_brand')
            ->orderBy('id_product','DESC')->search()->paginate(5);
        return view('admin.Product.index_product')->with(compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::orderBy('id_category','DESC')->get();
        $brand=Brand::orderBy('id','DESC')->get();
        return view('admin.Product.home_product')->with(compact('category','brand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'name_product'=>'required|unique:tbl_product|max:255',
            'slug_product'=>'required|unique:tbl_product|max:255',

            'price_product'=>'required',
            'weigh_product'=>'required',

            'image_product'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,
            max_width=1000,max_height=1000',

            'desc_product'=>'required',
            'id_category'=>'required',
            'id_brand'=>'required',
            'status_product'=>'required',
            'unit_product'=>'required',
            'stock_product'=>'required',
        ],
            [
                'name_product.required' => 'Tên sản phẩm lỗi, trống.',
                'name_product.unique' => 'Tên sản phẩm này đã có.',

                'slug_product.required' => 'slug sản phẩm lỗi, trống.',
//               'slug_product.unique' => 'slug sản phẩm này đã có.',

                'price_product.required' => 'Giá không được để trống.',
                'weigh_product.required' => 'Khối luợng không được để trống.',
                'image_product.required'=>'Hình ảnh sản phẩm phải có.',
                'desc_product.required' => 'Mô tả không được để trống.',
            ]
        );
        $product=new Product();
        $product->name_product=$data['name_product'];
        $product->slug_product=$data['slug_product'];
        $product->price_product=$data['price_product'];
        $product->weigh_product=$data['weigh_product'];
        //image
        $get_image=$request->image_product;
        $path='public/uploads/product/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.',$get_name_image));
        $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move($path,$new_image);
        $product->image_product=$new_image;
        //
        $product->desc_product=$data['desc_product'];
        $product->id_category=$data['id_category'];
        $product->id_brand=$data['id_brand'];
        $product->status_product=$data['status_product'];
        $product->unit_product=$data['unit_product'];
        $product->stock_product=$data['stock_product'];
        $product->save();
        return redirect()->back()->with('message','Thêm thành công.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::find($id);
        $category=Category::orderBy('id_category','DESC')->get();
        $brand=Brand::orderBy('id','DESC')->get();
        return view('admin.Product.edit_product')->with(compact('product','category','brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=$request->validate([
            'name_product'=>'required|max:255',
            'slug_product'=>'required|max:255',

            'price_product'=>'required',
            'weigh_product'=>'required',

//            'image_product'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,
//            max_width=1000,max_height=1000',

            'desc_product'=>'required',
            'id_category'=>'required',
            'id_brand'=>'required',
            'status_product'=>'required',
            'unit_product'=>'required',
            'stock_product'=>'required',
        ],
            [
                'name_product.required' => 'Tên sản phẩm lỗi, trống.',
//                'name_product.unique' => 'Tên sản phẩm này đã có.',

                'slug_product.required' => 'slug sản phẩm lỗi, trống.',
//               'slug_product.unique' => 'slug sản phẩm này đã có.',

                'price_product.required' => 'Giá không được để trống.',
                'weigh_product.required' => 'Khối lượng không được để trống.',
//                'image_product.required'=>'Hình ảnh sản phẩm phải có.',
                'desc_product.required' => 'Mô tả không được để trống.',
            ]
        );
        $product=Product::find($id);
        $product->name_product=$data['name_product'];
        $product->slug_product=$data['slug_product'];
        $product->price_product=$data['price_product'];
        $product->weigh_product=$data['weigh_product'];
        //image
        $get_image=$request->image_product;
        if($get_image) {
            $path='public/uploads/product/'.$product->image_product;
            if (file_exists($path)){
                unlink($path);
            }
            $path = 'public/uploads/product/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $product->image_product = $new_image;
        }
        //
        $product->desc_product=$data['desc_product'];
        $product->id_category=$data['id_category'];
        $product->id_brand=$data['id_brand'];
        $product->status_product=$data['status_product'];
        $product->unit_product=$data['unit_product'];
        $product->stock_product=$data['stock_product'];
        $product->save();
        return redirect()->back()->with('message','Cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);
        $path='public/uploads/product/'.$product->image_product;
        if (file_exists($path)){
            unlink($path);
        }
        Product::find($id)->delete();
        return redirect()->back()->with('message','Xóa thành công.');
    }
}
