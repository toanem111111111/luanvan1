@extends('layout')
@section('content')

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
                    <li class="active">Thanh toán giỏ hàng</li>
                </ol>
            </div>

{{--            <div class="register-req">--}}
{{--                <p>Vui lòng đăng ký hoặc đăng nhập để thanh toán giỏ hàng và xem lại lịch sử mua hàng</p>--}}
{{--            </div><!--/register-req-->--}}
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

            <div class="shopper-informations">
                <div class="row">

                    <div class="col-sm-12 clearfix">
                        <div class="bill-to">
                            <p>Điền thông tin gửi hàng</p>
                            <div class="form-one">
                                <form action="{{URL::to('/add-shipping')}}" method="POST">
                                    {{csrf_field()}}
                                    <input type="text" value="{{old('email')}}" name="email" placeholder="Email">
                                    <input type="text" value="{{old('name')}}" name="name" placeholder="Họ và tên">
                                    <input type="text" value="{{old('address')}}" name="address" placeholder="Địa chỉ">
                                    <input type="text" value="{{old('phone')}}" name="phone" placeholder="Phone">
                                    <textarea name="note"  placeholder="Ghi chú đơn hàng của bạn" rows="16">{{old('note')}}</textarea>
                                    <input type="submit" value="Gửi" name="send_order" class="btn btn-primary btn-sm">
                                </form>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section> <!--/#cart_items-->

@endsection
