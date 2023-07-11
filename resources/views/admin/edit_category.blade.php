@extends('layout_admin')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật danh mục sản phẩm
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
                            <form role="form" action="{{route('danhmuc.update',[$category->id_category])}}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" value="{{$category->name_category}}" name="name_category" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="desc_category" id="exampleInputPassword1" >{{$category->desc_category}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                    <select name="status_category" class="form-control input-sm m-bot15">
                                        @if($category->status_category==0)
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
                                <button type="submit" name="" class="btn btn-info">Cập nhật danh mục</button>
                                <div class="col-sm-8">
                                </div>
                                <a href="{{route('danhmuc.index')}}" class="btn btn-info">Quay lại</a>
                            </form>

                        </div>
                </div>
            </section>
        </div>
@endsection
