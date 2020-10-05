@extends("frontend.master")
@section('main')
    <!-- products-details Area Start -->
    <div class="product-details-area">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <div class="zoomWrapper">
                        <div id="img-1" class="zoomWrapper single-zoom">
                            <a href="#">
                                <img id="zoom1" src="{{ config("app.base_url").$detail->path_img }}" data-zoom-image="{{ config("app.base_url").$detail->path_img }}" alt="big-1">
                            </a>
                        </div>
                        <div class="single-zoom-thumb">
                            <ul class="bxslider" id="gallery_01">
                                @foreach($proImg as $item)
                                <li>
                                    <a href="#" class="elevatezoom-gallery active" data-update="" data-image="{{ config("app.base_url").$item->path_img }}"><img src="{{ config("app.base_url").$item->path_img }}" alt="zo-th-1" /></a>
                                </li>

                                    @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-sm-7 col-xs-12">
                    <div class="product-list-wrapper">
                        <div class="single-product-detail">
                            <div class="product-content">
                                <h2 class="product-name">{{ $detail->pro_name }}</h2>

                                <div class="price-boxes">
                                    <span class="new-price">{{ number_format($detail->unit_price,0,',','.') }}&#8363;</span>
                                </div>
                                <div class="price-sale">
                                    <span>{{ number_format($detail->sale_price,0,',','.') }}&#8363;</span>
                                </div>
                                <div class="motangan">
                                   {{  $detail->pro_description }}
                                </div>
                                <div class="khuyenmai">
                                    <h4>KHuyến mãi</h4>
                                    <ul>
                                        <li><i class="fa fa-gift"></i> Hỗ trợ trả góp 0% dành cho các chủ thẻ tín dụng VPBank,Sacombank, VIB và Shinhan Bank</li>
                                        <li><i class="fa fa-gift"></i>Giảm ngay 400.000đ (đã trừ vào giá)</li>
                                    </ul>
                                </div>
                                <div class="baohanh">
                                    <h4>Bảo hành</h4>
                                    <ul>
                                        <li><i class="fa fa-check"></i>Bảo hành 18 tháng chính hãng với thân máy </li>
                                        <li><i class="fa fa-check"></i>Lỗi do nhà sản xuất là đổi mới trong 1 tháng đầu</li>
                                    </ul>
                            </div>
                                <div class="btn">
                                    <a href="{{ route("shopping.buy_cart",["id"=>$detail->id]) }}" class="btn btn-info btn-buy-now">Mua Ngay</a>
                                    <a href="{{ route("shopping.add_cart",["id"=>$detail->id]) }}" class="btn btn-warning btn-add-cart">Thêm Giỏ Hàng</a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="single-product-tab">
                    <!-- Nav tabs -->
                    <ul class="details-tab">
                        <li class="active"><a href="#home" data-toggle="tab">Mô tả</a></li>
                        <li class=""><a href="#messages" data-toggle="tab"> Đánh Giá</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <div class="product-tab-content">
                                {!! $detail->pro_content !!}
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="messages">
                            <div class="single-post-comments col-md-6 col-md-offset-3">
                                <div class="comments-area">
                                    <h3 class="comment-reply-title">Tất cả các bình luận của mọi người</h3>
                                    <div class="comments-list">
                                        <ul>
                                            <li>
                                                <div class="comments-details">
                                                    <div class="comments-list-img">
                                                        <img src="img/user-1.jpg" alt="">
                                                    </div>
                                                    <div class="comments-content-wrap">
															<span>
																<b><a href="#">Admin - </a></b>
																<span class="post-time">October 6, 2014 at 1:38 am</span>
															</span>
                                                        <p>Lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi.</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="comment-respond">
                                    <h3 class="comment-reply-title">Viết đánh giá của bạn</h3>
                                    <span class="email-notes">Hãy nhập email và tên của bạn để đánh giá</span>
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>Name *</p>
                                                <input type="text">
                                            </div>
                                            <div class="col-md-12">
                                                <p>Email *</p>
                                                <input type="email">
                                            </div>
                                            <div class="col-md-12 comment-form-comment">
                                                <p>Viết đánh giá</p>
                                                <textarea id="message" cols="30" rows="10"></textarea>
                                                <input type="submit" value="Gửi">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- products-details Area end -->
    <!-- products section start -->
    <div class="our-product-area new-product">
        <div class="container">
            <div class="area-title">
                <h2>Có thể bạn quan tâm</h2>
            </div>
            <!-- our-products area start -->
            <section class="same-product-detail">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            @if(count($sameProduct) > 0)
                                @foreach($sameProduct as $data)
                                    <div class="col-lg-3 col-md-3 col-sm-6 col">
                                        <!-- single-products start -->
                                        <div class="single-product">
                                            @if($data->discount != 0)
                                                <span class="sale-text">{{"-".$data->discount."%"}}</span>
                                            @endif
                                            <div class="product-img">
                                                <a href="{{ route("product.detailProduct",["id"=>$data->id]) }}">
                                                    <img class="primary-image" src="{{config("app.base_url").$data->path_img}}" alt="" />
                                                </a>
                                            </div>
                                            <div class="product-content">
                                                <h2 class="product-name"><a href="{{ route("product.detailProduct",["id"=>$data->id]) }}">{{$data->pro_name}}</a></h2>
                                                <div class="price">
                                                    @if(isset($data->discount) && $data->discount != 0)
                                                        <div style="text-decoration: line-through;" class="unit-price">{{number_format($data->unit_price,0,',','.')}}&#8363;</div>
                                                        <div style="text-decoration: none;" class="sale-price">{{number_format($data->sale_price,0,',','.')}}&#8363;</div>
                                                    @else
                                                        <div class="unit-price">{{number_format($data->unit_price,0,',','.')}}&#8363;</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single-products end -->
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <!-- our-products area end -->
            </section>

        </div>
    </div>
    <!-- products section end -->
    <!-- FOOTER START -->

@endsection
