@extends("layout.master")
@section("content-main")
    <div class="row tile_count">

        <div class="col-md-6 col-sm-6 col-xs-12 ">
            <h1>Danh Sách Thuộc Tính</h1>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 text-right">
            <h1>
                <a href="{{ route("attribute.create") }}" class="btn btn-info">THÊM THUỘC TÍNH</a>
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
                    <th scope="col">Tên</th>
                    <th scope="col">Thể Loại</th>
                    <th scope="col">Danh Mục</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>

@if(isset($data))
    <?php $count = 1 ?>
    @foreach($data as $item)
                    <tr>
                        <th scope="row">{{ $count }}</th>
                        <td>{{ $item->attr_name }}</td>
                        <td>{{ $item->getType($item->attr_type) }}</td>
                        <td>{{ $item->category->c_name }}</td>
                        <td>
                            <a href="{{ route("attribute.edit",['id'=>$item->id]) }}" class="btn btn-info">Sửa</a>
                            <a href="{{ route("attribute.delete",['id'=>$item->id]) }}" onclick="confirm('Bạn có chắc là muốn xóa ?');" class="btn btn-danger">Xóa</a>
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
