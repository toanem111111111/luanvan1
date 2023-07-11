@extends('layout')
@section('content')

    <section id="form"><!--form-->
        <div class="container">
            <div class="row">

                <div class="col-sm-4 col-sm-offset-1">
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

                    <div class="login-form"><!--login form-->
                        <h2>Đăng nhập tài khoản</h2>
                        <form action="{{URL::to('/login-customer')}}" method="POST">
                            {{csrf_field()}}
                            <input type="text" name="email_customer" placeholder="Tài khoản" />
                            <input type="password" name="password_customer" placeholder="Password" />
                            <span>
								<input type="checkbox" class="checkbox">
								Ghi nhớ đăng nhập
							</span>
                            <button type="submit" class="btn btn-default">Đăng nhập</button>

                        </form>
                        <style type="text/css">
                            ul.list-login{
                                margin: 10px;
                                padding: 0;
                            }
                            ul.list-login li {
                                display: inline;
                                margin: 5px;
                            }
                        </style>
                        <h5>Đăng nhập tài khoản Google</h5>
                        <ul class="list-login">
                            <li>
                                <a href="{{ route('login-google') }}">
                                    <img width="20%" alt="Đăng nhập bằng tài khoản Google" src="{{asset('public/frontend/images/gg.jpg')}}">
                                </a>
                            </li>
                        </ul>

                    </div><!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">Hoặc</h2>
                </div>
                <div class="col-sm-4">
                       <div class="signup-form"><!--sign up form-->
                        <h2>Đăng ký</h2>

                        <form action="{{URL::to('/add-customer')}}" method="POST">
                            {{ csrf_field() }}
                            <input type="text" name="name_customer" placeholder="Họ và tên"/>
                            <input type="email" name="email_customer" placeholder="Địa chỉ email"/>
                            <input type="password" name="password_customer" placeholder="Mật khẩu"/>
                            <input type="text" name="phone_customer" placeholder="Phone"/>
                            <button type="submit" class="btn btn-default">Đăng ký</button>
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->

@endsection
