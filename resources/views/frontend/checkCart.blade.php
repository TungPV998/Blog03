@extends("frontend.master")
@section('main')
    <section class="section-detail-cart">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>Giỏ hàng của bạn</h2>
                </div>
                <div class="col-md-8">
                    <form id="checkout-form" class="shopping_cart">

                        <div class="col-md-12">
                            <div class="order-summary clearfix">

                                <div class="section-title">
                                    <h3 class="title">Các sản phẩm đã mua</h3>
                                </div>
                                <table class="shopping-cart-table table">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Ảnh</th>
                                        <th class="text-center">Tên Sản Phẩm</th>
                                        <th class="text-center">Giá</th>
                                        <th class="text-center">Số lượng</th>
                                        <th class="text-center">Tổng</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($carts as $item)
                                        <tr>
                                            <td>
                                                <div class="thumb">
                                                    <img width="100%" height="100%" src="{{$item->options->img  }}" alt="">
                                                </div>
                                            </td>
                                            <td class="details">
                                                <div class="name-cart-show">
                                                    <p>{{ $item->name }}</p>
                                                </div>
                                            </td>
                                            @if($item->options->sale != 0)
                                                <td class="price text-center"><strong>{{ number_format($item->options->sale_price,0,',','.') }}₫</strong><br><del class="font-weak"><small>{{ number_format($item->options->unit_price,0,',','.') }}₫</small></del></td>
                                            @else
                                                <td class="price text-center">
                                                    <strong>{{ number_format($item->options->unit_price,0,',','.') }}₫</strong>
                                                </td>
                                            @endif
                                            <td class="qty text-center"><input class="input" type="number" value="{{ $item->qty }}"></td>
                                            <td class="total text-center"><strong class="primary-color">{{ number_format(($item->price * $item->qty),0,',','.') }}₫</strong></td>
                                            <td class="text-right"><a href="{{route("shopping.delete",["id"=>$item->rowId])}}" class="main-btn icon-btn"><i class="fa fa-close"></i></a></td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="4" style="font-size: 22px;font-weight: 600">Tổng Tiền Thanh Toán</td>
                                        <td colspan="2"><strong style="font-size: 22px;font-weight: 600;text-align: right" class="total-pament">{{ Cart::subtotal() }}₫</strong></td>
                                    </tr>

                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <div class="section-title">
                        <h3 class="title">Thông tin liên hệ</h3>
                    </div>
                    <form action="{{ route("shopping.store") }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email">Họ và tên:</label>
                            <input type="text" required class="form-control" name="name" placeholder="Nguyễn Văn A" id="email">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Địa Chỉ:</label>
                            <input type="text" required class="form-control" name="address" id="address">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Số điện thoại:</label>
                            <input type="number" required class="form-control" name="telephone"  id="telephone">
                        </div>
                        <div class="form-group">
                            <label for="comment">Ghi chú:</label>
                            <textarea class="form-control" required rows="5" name="note" id="note"></textarea>
                        </div>
                        <button type="submit" value="1" name="payment" class="btn btn-primary">Thanh Toán Khi Nhận Hàng</button>
                        <button type="submit" value="2" name="payment" class="btn btn-info">Thanh Toán Online</button>
                    </form>
                </div>

            </div>
            <!-- /row -->
        </div>
    </section>


@endsection
