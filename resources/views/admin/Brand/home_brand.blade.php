@extends('layout_admin')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm thương hiệu sản phẩm
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
                        <form role="form" action="{{route('thuonghieu.store')}}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên thương hiệu</label>
                                <input type="text" value="{{old('name_brand')}}" onkeyup="ChangeToSlug();" name="name_brand" class="form-control" id="slug" placeholder="Tên thương hiệu... ">
                                @error('name_brand')
                                <span style="color: red;">{{$message}}</span>
                                @enderror
                            </div>
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleInputEmail1">Slug</label>--}}
{{--                                <input type="text" value="{{old('slug_brand')}}" name="slug_brand" class="form-control" id="convert_slug" placeholder="Tên thương hiệu... ">--}}
{{--                            </div>--}}
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                                <textarea style="resize: none" rows="8" class="form-control" name="desc_brand" id="exampleInputPassword1" placeholder="Mô tả thương hiệu">{{old('desc_brand')}}</textarea>
                                @error('desc_brand')
                                <span style="color: red;">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hiển thị</label>
                                <select name="status_brand" class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>

                                </select>
                            </div>
                            <button type="submit" name="add_brand" class="btn btn-info">Thêm thương hiệu</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
@endsection
