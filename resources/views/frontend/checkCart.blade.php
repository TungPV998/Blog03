@extends("frontend.master")
@section('main')
    <div class="container">
        <!-- row -->
        <div class="row">
            <form id="checkout-form" class="shopping_cart">
                <div class="col-md-12 text-center">
                    <h2>Giỏ hàng của bạn</h2>
                </div>
                <div class="col-md-12">
                    <div class="order-summary clearfix">

                        <div class="section-title">
                            <h3 class="title">Các sản phẩm đã mua</h3>
                        </div>
                        <table class="shopping-cart-table table">
                            <thead>
                            <tr>
                                <th>Sản Phẩm</th>
                                <th></th>
                                <th class="text-center">Giá</th>
                                <th class="text-center">Số lượng</th>
                                <th class="text-center">Tổng</th>
                                <th class="text-right"></th>
                            </tr>
                            </thead>
                            <tbody>
@foreach($carts as $item)
                            <tr>
                                <td class="thumb" ><img src="{{$item->options->img  }}" alt=""></td>
                                <td class="details">
                                    <a >{{ $item->name }}</a>
                                    <ul>
                                        <li><span>Ram: 4GB</span></li>
                                        <li><span>CPU: i7</span></li>
                                    </ul>
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
                            </tbody>
                            <tfoot>
                            <tr>
                                <th class="empty" colspan="3"></th>
                                <th>SHIPING</th>
                                <td colspan="2">Miễn Phí</td>
                            </tr>
                            <tr>
                                <th class="empty" colspan="3"></th>
                                <th>Tổng tiền cần thanh toán</th>
                                <th colspan="2" class="total">{{ \Cart::subtotal()  }}
                                </th>
                            </tr>
                            <tr>
                                <th class="empty" colspan="3"></th>
                                <th colspan="3" class="text-center"  >
                                    <button class="btn btn-primary">Mua Hàng</button>
                                </<th>
                            </tr>
                            </tfoot>
                        </table>

                    </div>

                </div>
            </form>
        </div>
        <!-- /row -->
    </div>

@endsection
