@extends('layout_admin')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê danh mục sản phẩm
    </div>
      <div class="row w3-res-tb">
          <div class="col-sm-4">
          </div>

            <form action="" class="form-inline" role="form" >
                {{csrf_field()}}
                <div class="form-group">
                    <input name="key" class="form-control" placeholder="Tìm kiếm sản phẩm"/>
                </div>
                <button type="submit" class="btn btn-primary" >Tim Kiem</button>
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
                <th>Tên danh mục</th>
                <th>Mô tả</th>
                <th>Trạng thái</th>
                <th>Quản lý</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($category as $key => $cate_pro)
          <tr>
              <td>{{$cate_pro->id_category}}</td>
              <td>{{$cate_pro->name_category}}</td>
              <td>{{$cate_pro->desc_category}}</td>
              <td><span class="text-ellipsis">
              <?php
                      if($cate_pro->status_category==0){
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
{{--              <td>{{$cate_pro->created_at}}</td>--}}
              <td>
                  <a href="{{route('danhmuc.edit',[$cate_pro->id_category])}}" class="active styling-edit" ui-toggle-class="">
                      <button class="fa fa-pencil-square-o text-success text-active"></button>
                  </a>

                  <form onclick="return confirm('Bạn có chắc là muốn xóa không?')" action="{{route('danhmuc.destroy',[$cate_pro->id_category])}}"
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
        {{ $category->links() }}
    </div>

  </div>
</div>
@endsection
