<!DOCTYPE html>
    <head>
        <title>Quản Lý Hàng Hóa</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
        Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- bootstrap-css -->
        <link rel="stylesheet" href="{{asset('public/backend/css/bootstrap.min.css')}}" >
        <!-- //bootstrap-css -->
        <!-- Custom CSS -->
        <link href="{{asset('public/backend/css/style.css')}}" rel='stylesheet' type='text/css' />
        <link href="{{asset('public/backend/css/style-responsive.css')}}" rel="stylesheet"/>
        <!-- font CSS -->
        <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <!-- font-awesome icons -->
        <link rel="stylesheet" href="{{asset('public/backend/css/font.css')}}" type="text/css"/>
        <link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('public/backend/css/morris.css')}}" type="text/css"/>
        <!-- calendar -->
        <link rel="stylesheet" href="{{asset('public/backend/css/monthly.css')}}">
        <!-- //calendar -->
        <!-- //font-awesome icons -->
        <script src="{{asset('public/backend/js/jquery2.0.3.min.js')}}"></script>
        <script src="{{asset('public/backend/js/raphael-min.js')}}"></script>
        <script src="{{asset('public/backend/js/morris.js')}}"></script>
    </head>
        <body>
            <section id="container">
            <!--header start-->
                <header class="header fixed-top clearfix">
                <!--logo start-->
                    <div class="brand">
                        <a href="index.html" class="logo">
                            ADMIN
                        </a>
                        <div class="sidebar-toggle-box">
                            <div class="fa fa-bars"></div>
                        </div>
                    </div>
                <!--logo end-->

                <div class="top-nav clearfix">
                    <!--search & user info start-->
                    <ul class="nav pull-right top-menu">
                        <!-- user login dropdown start-->
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <img alt="" src="{{('public/backend/images/2.png')}}">
                                <span class="username">
                                    <?php
                                    $name = Session::get('name');
                                    if($name){
                                        echo $name;

                                    }
                                    ?>

                                </span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu extended logout">

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                        <!-- user login dropdown end -->

                    </ul>
                    <!--search & user info end-->
                </div>
                </header>
            <!--header end-->
            <!--sidebar start-->
                <aside>
                    <div id="sidebar" class="nav-collapse">
                        <!-- sidebar menu start-->
                        <div class="leftside-navigation">
                            <ul class="sidebar-menu" id="nav-accordion">
                                <li>
                                    <a class="active" href="{{URL::to('/home')}}">
                                        <i class="fa fa-dashboard"></i>
                                        <span>Tổng quan</span>
                                    </a>
                                </li>
                                 <li class="sub-menu">
                                    <a href="javascript:;">
                                        <i class="fa fa-book"></i>
                                        <span>Đơn hàng</span>
                                    </a>
                                    <ul class="sub">
                                        <li><a href="{{URL::to('/manage-order')}}">Quản lý đơn hàng</a></li>
                                    </ul>
                                </li>
                                <li class="sub-menu">
                                    <a href="javascript:;">
                                        <i class="fa fa-book"></i>
                                        <span>Danh mục sản phẩm</span>
                                    </a>
                                    <ul class="sub">
                                        <li><a href="{{route('danhmuc.create')}}">Thêm danh mục sản phẩm</a></li>
                                        <li><a href="{{route('danhmuc.index')}}">Liệt kê danh mục sản phẩm</a></li>
                                    </ul>
                                </li>
                                 <li class="sub-menu">
                                    <a href="javascript:;">
                                        <i class="fa fa-book"></i>
                                        <span>Thương hiệu sản phẩm</span>
                                    </a>
                                    <ul class="sub">
                                        <li><a href="{{route('thuonghieu.create')}}">Thêm thương hiệu sản phẩm</a></li>
                                        <li><a href="{{route('thuonghieu.index')}}">Liệt kê thương hiệu sản phẩm</a></li>

                                    </ul>
                                </li>
                                  <li class="sub-menu">
                                    <a href="javascript:;">
                                        <i class="fa fa-book"></i>
                                        <span>Sản phẩm</span>
                                    </a>
                                    <ul class="sub">
                                        <li><a href="{{route('sanpham.create')}}">Thêm sản phẩm</a></li>
                                        <li><a href="{{route('sanpham.index')}}">Liệt kê sản phẩm</a></li>

                                    </ul>
                                </li>

                            </ul>            </div>
                        <!-- sidebar menu end-->
                    </div>
                </aside>
            <!--sidebar end-->
            <!--main content start-->
                <section id="main-content">
                    <section class="wrapper">
                        @yield('admin_content')
                    </section>
                 <!-- footer -->

                          <div class="footer">
                            <div class="wthree-copyright" align="center" style="font-weight: bolder;font-size: 42px;
							letter-spacing: 0.025em;
							color:black;">
                              <p>Quản Lý Hàng Hóa </p>
                            </div>
                          </div>
                  <!-- / footer -->
                </section>
            <!--main content end-->
            </section>
            <script src="{{asset('public/backend/js/bootstrap.js')}}"></script>
            <script src="{{asset('public/backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
            <script src="{{asset('public/backend/js/scripts.js')}}"></script>
            <script src="{{asset('public/backend/js/jquery.slimscroll.js')}}"></script>
            <script src="{{asset('public/backend/js/jquery.nicescroll.js')}}"></script>
            <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
            <script src="{{asset('public/backend/js/jquery.scrollTo.js')}}"></script>
            <script type="text/javascript">

                function ChangeToSlug()
                {
                    var slug;

                    //Lấy text từ thẻ input title
                    slug = document.getElementById("slug").value;
                    slug = slug.toLowerCase();
                    //Đổi ký tự có dấu thành không dấu
                    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                    slug = slug.replace(/đ/gi, 'd');
                    //Xóa các ký tự đặt biệt
                    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                    //Đổi khoảng trắng thành ký tự gạch ngang
                    slug = slug.replace(/ /gi, "-");
                    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                    slug = slug.replace(/\-\-\-\-\-/gi, '-');
                    slug = slug.replace(/\-\-\-\-/gi, '-');
                    slug = slug.replace(/\-\-\-/gi, '-');
                    slug = slug.replace(/\-\-/gi, '-');
                    //Xóa các ký tự gạch ngang ở đầu và cuối
                    slug = '@' + slug + '@';
                    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                    //In slug ra textbox có id “slug”
                    document.getElementById('convert_slug').value = slug;
                }
            </script>
        </body>
</html>

