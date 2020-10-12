@extends("layout.master")
@section("content-main")
    <div class="row tile_count">

        <div class="col-md-6 col-sm-6 col-xs-12 ">
            <h1>Danh Sách Đơn Hàng</h1>
        </div>
    </div>
    <!-- /top tiles -->
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <table class="table table-dark">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Thông Tin Người Mua</th>
                    <th scope="col">Account</th>
                    <th scope="col">Trạng Thái</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>

            @if(isset($data))
                <?php $count = 1 ?>
                @foreach($data as $item)
                    <tr style="font-size: 18px">
                        <th scope="row">{{ $count }}</th>
                        <td>
                            <ul style="font-size: 18px">
                                <li>
                                    <b>Họ và tên:</b>{{ $item->name ?? ""}}
                                </li>
                                <li>
                                    <b>Địa Chỉ:</b>{{ $item->address ?? "" }}
                                </li>
                                <li>
                                    <b>Số Điện Thoại:</b>{{ $item->telephone ?? "" }}
                                </li>
                                <li>
                                    <b>Ghi chú:</b>{{ $item->note ?? ""}}
                                </li>
                            </ul>
                        </td>
                        <td>
                            <span class="badge badge-warning">Thành Viên</span>
                        </td>
                        <td>
                            <span style="cursor: pointer" class="badge badge-info">Đang Xử Lý</span>
                        </td>
                        <td>
                            <a href="{{ route("transaction.delete",['id'=>$item->id]) }}" onclick="confirm('Bạn có chắc là muốn xóa ?')" class="btn btn-danger">Xóa</a>
                            <button type="button" class="btn btn-primary" data-links = {{route("transaction.show",['id'=>$item->id])  }} id="viewOrderDetail" data-toggle="modal" data-target="#viewOrder">
                                Xem Đơn Hàng
                            </button>
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
    <div style="width: 1200px;margin: 0 auto" class="modal" id="viewOrder">
        <div class="modal-dialog" style="width: 100%">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h3 class="modal-title text-center">Chi Tiết Đơn Hàng</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giảm Giá</th>
                            <th>Giá</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--@foreach()--}}

                       {{--@endforeach--}}
                        </tbody>
                    </table>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
@endsection

