@extends('layout_admin')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật thương hiệu sản phẩm
                </header>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                <!-- <li>vui long nhap</li> -->
                            @endforeach
                        </ul>
                    </div>
                @endif
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
                ?>
                <div class="panel-body">

                    <div class="position-center">
                        <form role="form" action="{{route('thuonghieu.update',[$brand->id])}}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên thương hiệu</label>
                                <input type="text" name="name_brand" class="form-control" value="{{$brand->name_brand}}" id="exampleInputEmail1" placeholder="Tên thương hiệu... ">
                            </div>
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleInputEmail1">Slug</label>--}}
{{--                                <input type="text" name="slug_brand" class="form-control" value="{{$brand->slug_brand}}" id="exampleInputEmail1" placeholder="Tên thương hiệu... ">--}}
{{--                            </div>--}}
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                                <textarea style="resize: none" rows="8" class="form-control"  name="desc_brand" id="exampleInputPassword1" placeholder="Mô tả thương hiệu">{{$brand->desc_brand}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hiển thị</label>
                                <select name="status_brand" class="form-control input-sm m-bot15">
                                    @if($brand->status_brand==0)
                                    <option selected value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
                                    @else
                                        <option value="0">Ẩn</option>
                                        <option selected value="1">Hiển thị</option>
                                    @endif
                                </select>
                            </div>
                            <div class="col-sm-3">
                            </div>
                            <button type="submit" name="" class="btn btn-info">Cập nhật thương hiệu</button>
                            <div class="col-sm-8">
                            </div>
                            <a href="{{route('thuonghieu.index')}}" class="btn btn-info">Quay lại</a>
                        </form>
                    </div>

                </div>
            </section>

        </div>
@endsection
