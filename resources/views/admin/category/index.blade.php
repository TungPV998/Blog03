@extends("layout.master")
@section("content-main")
    <div class="row tile_count">

        <div class="col-md-6 col-sm-6 col-xs-12 ">
           <h1>Danh Sách Danh Mục</h1>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 text-right">
            <h1>
                <a href="{{ route("category.create") }}" class="btn btn-info">THÊM DANH MỤC</a>
            </h1>

        </div>
    </div>
    <!-- /top tiles -->
<div class="row">
    <div class="col-md-12 col-xs-12">
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên danh mục</th>
                <th scope="col">Thuộc danh mục</th>
                <th scope="col">Hành động</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $menu)
            <tr>
                <th scope="row">{{ $menu['id'] }}</th>
                <td>{{ $menu['c_name'] }}</td>
                <td>{{ $menu['parent_id'] == 0 ? "Danh Mục Cha" : "Danh Mục Con" }}</td>
                <td>
                    <a href="{{ route("category.edit",["id"=>$menu['id']]) }}" class="btn btn-info">Sửa</a>
                    <a href="{{ route("category.delete",["id"=>$menu['id']]) }}" onclick="confirm('Bạn có chắc là muốn xóa ?')" class="btn btn-danger">Xóa</a>
                </td>

            </tr>
             @endforeach

            </tbody>
        </table>


    </div>
    <div class="col-md-12 col-sm-12 text-right">
        {{ $data->links() }}
    </div>
</div>

@endsection
