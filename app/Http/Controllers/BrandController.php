<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand=Brand::orderBy('id','DESC')->search()->paginate(5);
        return view('admin.Brand.index_brand')->with(compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Brand.home_brand');
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
           'name_brand'=>'required|unique:tbl_brand|max:255',
//            'slug_brand'=>'required|unique:tbl_brand|max:255',
            'desc_brand'=>'required|max:255',
            'status_brand'=>'required',
        ],
            [
                    'name_brand.required' => 'Tên thương hiệu lỗi, trống.',
                    'name_brand.unique' => 'Tên thương hiệu này đã có.',
//                    'slug_brand.unique' => 'slug này đã có.',
                    'desc_brand.required' => 'Mô tả không được để trống.',
            ]
        );
        $brand=new Brand();
        $brand->name_brand=$data['name_brand'];
//        $brand->slug_brand=$data['slug_brand'];
        $brand->desc_brand=$data['desc_brand'];
        $brand->status_brand=$data['status_brand'];
        $brand->save();
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
       $brand=Brand::find($id);
        return view('admin.Brand.edit_brand')->with(compact('brand'));
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
            'name_brand'=>'required|max:255',
//            'slug_brand'=>'required|max:255',
            'desc_brand'=>'required|max:255',
            'status_brand'=>'required',

        ],
            [
                'name_brand.required' => 'Tên thương hiệu lỗi',
//                'slug_brand.required' => 'Slug lỗi',
                'desc_brand.required' => 'Mô tả không được để trống',
            ]
        );
        $brand=Brand::find($id);
        $brand->name_brand=$data['name_brand'];
//        $brand->slug_brand=$data['slug_brand'];
        $brand->desc_brand=$data['desc_brand'];
        $brand->status_brand=$data['status_brand'];
        $brand->save();

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

        DB::beginTransaction();
        try {
            $brand = Brand::find($id);
            $brand->delete();
            DB::commit();
            return redirect()->back()->with('message','Xóa thành công.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('message','Thương hiệu hiện đang có sản phẩm không thể xóa được.');
        }
    }
}
