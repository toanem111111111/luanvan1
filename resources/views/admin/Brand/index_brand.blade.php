@extends('layout_admin')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt kê thương hiệu sản phẩm
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
                        <th>Mã</th>
                        <th>Tên thương hiệu</th>
{{--                        <th>Slug</th>--}}
                        <th>Mô tả</th>
                        <th>Hiển thị</th>
                        <th>Quản lý</th>
                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($brand as $key => $brand_pro)
                        <tr>
{{--                            <th scope="row">{{$key}}</th>--}}
                            <td>{{ $brand_pro->id }}</td>
                            <td>{{ $brand_pro->name_brand }}</td>
{{--                            <td>{{ $brand_pro->slug_brand }}</td>--}}
                            <td>{{ $brand_pro->desc_brand }}</td>
                            <td><span class="text-ellipsis">
                                      <?php
                                                            if($brand_pro->status_brand==0){
                                                                ?>
                                                             <a><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                                        <?php
                                                            }else{
                                                                ?>
                                                                <a ><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                                        <?php
                                                            }
                                                                ?>
                                    </span></td>

                            <td>
                                <a href="{{route('thuonghieu.edit',[$brand_pro->id])}}" class="active styling-edit" ui-toggle-class="">
                                    <button class="fa fa-pencil-square-o text-success text-active"></button>
                                </a>

                                <form onclick="return confirm('Bạn có chắc là muốn xóa không?')" action="{{route('thuonghieu.destroy',[$brand_pro->id])}}"
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
                {{ $brand->links()}}
            </div>
        </div>
    </div>
@endsection
