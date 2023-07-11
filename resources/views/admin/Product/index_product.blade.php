@extends('layout_admin')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt kê sản phẩm
            </div>
            <div class="row w3-res-tb">
                <div class="col-sm-4">
                </div>
                <form action="" class="form-inline" role="form" >
                    {{csrf_field()}}
                    <div class="form-group">
                        <input name="key" class="form-control" placeholder="Tìm kiếm sản phẩm"/>
                    </div>
                    <button type="submit" class="btn btn-primary" >Tìm kiếm</button>
                </form>
            </div>
            <div class="table-responsive">
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
                ?>
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
{{--                        <th style="width:20px;">--}}
{{--                            <label class="i-checks m-b-none">--}}
{{--                                <input type="checkbox"><i></i>--}}
{{--                            </label>--}}
{{--                        </th>--}}
                        <th>Mã</th>
                        <th>Tên sản phẩm</th>
                        <th>Slug</th>
                        <th>Giá</th>
                        <th>Hình sản phẩm</th>
{{--                        <th>Mô tả</th>--}}
                        <th>Khối lượng</th>
                        <th>Danh mục</th>
                        <th>Thương hiệu</th>
                        <th>Trạng thái</th>
                        <th>Đơn vị</th>
                        <th>Tình trạng</th>
                        <th>Quản lý</th>
                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($product as $key => $pro)
                        <tr>
{{--                            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>--}}
                            <td>{{ $pro->id_product }}</td>
                            <td>{{ $pro->name_product }}</td>
                            <td>{{ $pro->slug_product }}</td>
                            <td>{{ $pro->price_product }}</td>
                            <td><img src="public/uploads/product/{{ $pro->image_product }}" height="250" width="180"></td>
{{--                            <td>{{ $pro->desc_product }}</td>--}}
                            <td>{{ $pro->weigh_product }}</td>
                            <td>{{ $pro->product_category->name_category}}</td>
                            <td>{{ $pro->product_brand->name_brand }}</td>

                            <td><span class="text-ellipsis">
              <?php
                                    if($pro->status_product==0){
                                        ?>
                                        <a><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                <?php
                                    }else{
                                        ?>
                                    <a><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>

                <?php
                                    }
                                        ?>
            </span></td>


                            <td><span class="text-ellipsis">
              <?php
                                    if($pro->unit_product==0)
                                    {
                                        ?>
                                            <span >Cặp</span>
                <?php
                                    }else if($pro->unit_product==1)
                                    {
                                        ?>
                                            <span >Cái</span>
                 <?php
                                    }else if($pro->unit_product==2)
                                    {
                                        ?>
                                            <span >Bộ</span>
                 <?php
                                    }else {
                                        ?>
                                            <span >Chai</span>
                <?php
                                    }
                                        ?>
            </span></td>


                            <td><span class="text-ellipsis">
              <?php
                                    if($pro->stock_product==0){
                                        ?>
                                            <span>Hết hàng</span>
                <?php
                                    }else{
                                        ?>
                                            <span>Còn hàng</span>
                <?php
                                    }
                                        ?>
            </span></td>

                            <td>
                                <a href="{{route('sanpham.edit',[$pro->id_product])}}" class="active styling-edit" ui-toggle-class="">
                                    <button class="fa fa-pencil-square-o text-success text-active"></button>
                                </a>

                                <form onclick="return confirm('Bạn có chắc là muốn xóa không?')" action="{{route('sanpham.destroy',[$pro->id_product])}}"
                                      method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="fa fa-times text-danger text"></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $product->links()}}
            </div>

        </div>
    </div>
@endsection
