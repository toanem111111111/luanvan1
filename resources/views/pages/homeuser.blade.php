@extends('layout')
@section('content')
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Sản phẩm mới nhất</h2>
        @foreach($product as $key => $pro)
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <a href="{{URL::to('/chi-tiet-san-pham/'.$pro->id_product)}}">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{URL::to('public/uploads/product/'.$pro->image_product)}}" alt="" />
                                <h2>{{number_format($pro->price_product).' '.'VNĐ'}}</h2>
                                <p>{{$pro->name_product}}</p>
                                <form action="{{URL::to('add-cart/'.$pro->id_product)}}" method="POST">
                                    {{ csrf_field() }}
                                    <span>
									<input name="productid_hidden" type="hidden"  value="{{$pro->id_product}}" />
									<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Thêm giỏ hàng
									</button>

								</span>
                                </form>
                            </div>

                        </div>
                    </a>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
                            <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div><!--features_items-->
    {{ $product->links()}}
        <!--/recommended_items-->
@endsection
