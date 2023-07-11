@extends('layout_admin')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                      Cập nhật sản phẩm
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
                        <form action="{{route('sanpham.update',[$product->id_product])}}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input type="text" value="{{$product->name_product}}" onkeyup="ChangeToSlug();" name="name_product" class="form-control" id="slug" placeholder="Tên sản phẩm... ">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug</label>
                                <input type="text" value="{{$product->slug_product}}" name="slug_product" class="form-control" id="convert_slug" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá sản phẩm</label>
                                <input type="text" value="{{$product->price_product}}" name="price_product" class="form-control"  >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Khối lượng</label>
                                <input type="text" value="{{$product->weigh_product}}" name="weigh_product" class="form-control"  >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                <input type="file" name="image_product" class="form-control-file">
                                <img src="{{asset('public/uploads/product/'.$product->image_product)}}" height="250" width="180">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                <textarea style="resize: none" rows="8" class="form-control" value="{{$product->desc_product}}" name="desc_product"  placeholder="Mô tả sản phẩm">{{$product->desc_product}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                <select name="id_category" class="form-control input-sm m-bot15">
                                    @foreach($category as $key => $cate_pro)
                                        <option {{$cate_pro->id_category==$product->id_category ? 'selected' : ''}} value="{{$cate_pro->id_category}}">{{$cate_pro->name_category}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Thương hiệu</label>
                                <select name="id_brand" class="form-control input-sm m-bot15">
                                    @foreach($brand as $key => $brand_pro)
                                        <option {{$brand_pro->id==$product->id_brand ? 'selected' : ''}} value="{{$brand_pro->id}}">{{$brand_pro->name_brand}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Trạng thái</label>
                                <select name="status_product" class="form-control input-sm m-bot15">
                                    @if($product->status_product==0)
                                        <option selected value="0">Ẩn</option>
                                        <option value="1">Hiển thị</option>
                                    @else
                                        <option value="0">Ẩn</option>
                                        <option selected value="1">Hiển thị</option>
                                    @endif

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Đơn vị</label>
                                <select name="unit_product" class="form-control input-sm m-bot15">
                                    @if($product->unit_product==0)
                                        <option selected value="0">Cặp</option>
                                        <option value="1">Cái</option>
                                        <option value="2">Bộ</option>
                                        <option value="3">Chai</option>
                                    @elseif($product->unit_product==1)
                                        <option value="0">Cặp</option>
                                        <option selected value="1">Cái</option>
                                        <option value="2">Bộ</option>
                                        <option value="3">Chai</option>
                                    @elseif($product->unit_product==2)
                                        <option value="0">Cặp</option>
                                        <option value="1">Cái</option>
                                        <option selected value="2">Bộ</option>
                                        <option value="3">Chai</option>
                                    @else
                                        <option value="0">Cặp</option>
                                        <option value="1">Cái</option>
                                        <option value="2">Bộ</option>
                                        <option selected value="3">Chai</option>
                                    @endif


                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tình trạng</label>
                                <select name="stock_product" class="form-control input-sm m-bot15">
                                    @if($product->stock_product==0)
                                        <option selected value="0">Hết hàng</option>
                                        <option value="1">Còn hàng</option>
                                    @else
                                        <option value="0">Hết hàng</option>
                                        <option selected value="1">Còn hàng</option>
                                    @endif

                                </select>
                            </div>
                            <div class="col-sm-3">
                            </div>
                            <button type="submit" name="add_product" class="btn btn-info">Cập nhật sản phẩm</button>
                            <div class="col-sm-8">
                            </div>
                            <a href="{{route('sanpham.index')}}" class="btn btn-info">Quay lại</a>

                        </form>
                    </div>

                </div>
            </section>

        </div>
@endsection
