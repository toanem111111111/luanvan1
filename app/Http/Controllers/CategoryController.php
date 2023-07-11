<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category=Category::orderBy('id_category','DESC')->search()->paginate(5);
        return view('admin.all_category')->with(compact('category'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add_category');
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
            'name_category'=>'required|unique:tbl_category|max:255',
//            'slug_brand'=>'required|unique:tbl_brand|max:255',
            'desc_category'=>'required|max:255',
            'status_category'=>'required',
        ],
            [
                'name_category.required' => 'Tên danh mục lỗi, trống.',
                'name_category.unique' => 'Tên danh mục này đã có.',
//                    'slug_brand.unique' => 'slug này đã có.',
                'desc_category.required' => 'Mô tả không được để trống.',
            ]
        );
        $category=new Category();
        $category->name_category=$data['name_category'];
//        $brand->slug_brand=$data['slug_brand'];
        $category->desc_category=$data['desc_category'];
        $category->status_category=$data['status_category'];
        $category->save();
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
        $category=Category::find($id);
        return view('admin.edit_category')->with(compact('category'));
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
            'name_category'=>'required|max:255',
            'desc_category'=>'required|max:255',
            'status_category'=>'required',
        ],
            [
                'name_category.required' => 'Tên danh mục lỗi, trống.',
                'desc_category.required' => 'Mô tả không được để trống.',
            ]
        );
        $category=Category::find($id);
        $category->name_category=$data['name_category'];
        $category->desc_category=$data['desc_category'];
        $category->status_category=$data['status_category'];
        $category->save();
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
            $category = Category::find($id);
            $category->delete();
            DB::commit();
            return redirect()->back()->with('message','Xóa thành công.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('message','Danh mục hiện đang có sản phẩm không thể xóa được.');
        }
    }
}
