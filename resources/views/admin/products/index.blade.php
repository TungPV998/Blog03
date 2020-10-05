@extends("layout.master")
@section("content-main")
    <div class="row tile_count">

        <div class="col-md-6 col-sm-6 col-xs-12 ">
            <h1>Danh Sách Sản Phẩm</h1>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 text-right">
            <h1>
                <a href="{{ route("products.create") }}" class="btn btn-info">THÊM SẢN PHẨM</a>
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
                    <th scope="col">Tên Sản Phẩm</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Danh Muc</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Active</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>

@if(isset($data))
    <?php $count = 1 ?>
    @foreach($data as $item)
                    <tr>
                        <th scope="row">{{ $count }}</th>
                        <td>{{ $item->pro_name }}</td>
                        <td>{{ number_format($item->unit_price,0,',','.')." VNĐ" }}</td>
                        <td><span class="badge badge-success">{{ optional($item->category)->c_name }}</span></td>
                        <td>
                            <img width="200px" height="200px" src="{{ $item->path_img }}" alt="">
                        </td>
                        <td>
                            <span class="badge {{ $item->active == 0 ? 'badge-success' : "badge-primary"}} ">{{ $item->active == 0 ? 'Hiển Thị' : "An"}}</span>
                        </td>
                        <td>
                            <a href="{{ route("products.edit",['id'=>$item->id]) }}" class="btn btn-info">Sửa</a>
                            <a href="{{ route("products.delete",['id'=>$item->id]) }}" onclick="confirm('Bạn có chắc là muốn xóa ?')" class="btn btn-danger">Xóa</a>
                        </td>

                    </tr>
        <?php $count++ ?>
                    @endforeach
@endif
                </tbody>
            </table>


        </div>
        <div class="col-md-12 col-sm-12 text-right">
            {{ $data->links() }}
        </div>
    </div>

@endsection
