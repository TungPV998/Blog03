@extends("frontend.master")
@section('main')
    <!-- start home slider -->
    <div class="slider-area an-1 hm-1 clr">
        <!-- slider -->
        <div class="bend niceties preview-2">
            <div id="ensign-nivoslider" class="slides">
                @foreach($sliders as $slider)
                    <img src="{{config("app.base_url").$slider->img_path}}" alt="" title="#slider-direction-1"  />
                @endforeach
            </div>
        </div>
        <!-- slider end-->
    </div>
    <!-- end home slider -->
    <!-- products section start -->
    <div class="our-product-area">
        <div class="container">
            <!-- area title start -->
            <div class="area-title">
                <h2>Điện Thoại</h2>
            </div>
            <!-- area title end -->
            <!-- our-products area start -->
            <div class="block-product">
                <div class="row">
                    @foreach($phones as $phone)
                    <div class="col-lg-3 col-md-3 col-sm-6 col">
                        <!-- single-products start -->
                        <div class="single-product">
                            @if($phone->discount != 0)
                            <span class="sale-text">{{"-".$phone->discount."%"}}</span>
                            @endif
                            <div class="product-img">
                                <a href="{{ route("product.detailProduct",["id"=>$phone->id]) }}">
                                    <img class="primary-image" src="{{config("app.base_url").$phone->path_img}}" alt="" />
                                </a>
                            </div>
                            <div class="product-content">
                                <h2 class="product-name"><a href="{{ route("product.detailProduct",["id"=>$phone->id]) }}">{{$phone->pro_name}}</a></h2>
                                <div class="price">
                                    @if(isset($phone->discount) && $phone->discount != 0 )
                                        <div style="text-decoration: line-through;" class="unit-price">{{number_format($phone->unit_price,0,',','.')}}&#8363;</div>
                                    <div style="text-decoration: none;" class="sale-price">{{number_format($phone->sale_price,0,',','.')}}&#8363;</div>
                                    @else
                                        <div class="unit-price">{{number_format($phone->unit_price,0,',','.')}}&#8363;</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- single-products end -->
                    </div>
                   @endforeach
                    <div class="link-all-product">
                        <a href="#"><i>Xem thêm</i> </a>
                    </div>
                </div>
            </div>
            <!-- our-products area end -->
        </div>
    </div>
    <!-- products section end -->

    <div class="our-product-area">
        <div class="container">
            <!-- area title start -->
            <div class="area-title">
                <h2>Laptop</h2>
            </div>
            <!-- area title end -->
            <!-- our-products area start -->
            <div class="block-product">
                <div class="row">
                    @foreach($laptops as $laptop)
                        <div class="col-lg-3 col-md-3 col-sm-6 col">
                            <!-- single-products start -->
                            <div class="single-product">
                                @if($laptop->discount != 0)
                                <span class="sale-text">{{"-".$laptop->discount."%"}}</span>
                                @endif
                                <div class="product-img">
                                    <a href="{{ route("product.detailProduct",["id"=>$laptop->id]) }}">
                                        <img class="primary-image" src="{{config("app.base_url").$laptop->path_img}}" alt="" />
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h2 class="product-name"><a href="{{ route("product.detailProduct",["id"=>$laptop->id]) }}">{{$laptop->pro_name}}</a></h2>
                                    <div class="price">
                                        @if(isset($laptop->discount) && $laptop->discount != 0)
                                            <div style="text-decoration: line-through;" class="unit-price">{{number_format($laptop->unit_price,0,',','.')}}&#8363;</div>
                                            <div style="text-decoration: none;" class="sale-price">{{number_format($laptop->sale_price,0,',','.')}}&#8363;</div>
                                        @else
                                            <div class="unit-price">{{number_format($laptop->unit_price,0,',','.')}}&#8363;</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- single-products end -->
                        </div>
                    @endforeach

                    <div class="link-all-product">
                        <a href="#"><i>Xem thêm</i> </a>
                    </div>
                </div>
            </div>
            <!-- our-products area end -->
        </div>
    </div>
    <!-- products section end -->

    <!-- products section start -->
    <div class="our-product-area">
        <div class="container">
            <!-- area title start -->
            <div class="area-title">
                <h2>Tablet</h2>
            </div>
            <!-- area title end -->
            <div class="row">
                @foreach($tablets as $tablet)
                    <div class="col-lg-3 col-md-3 col-sm-6 col">
                        <!-- single-products start -->
                        <div class="single-product">
                            @if($tablet->discount != 0)
                                <span class="sale-text">{{"-".$tablet->discount."%"}}</span>
                            @endif
                            <div class="product-img">
                                <a href="{{ route("product.detailProduct",["id"=>$tablet->id]) }}">
                                    <img class="primary-image" src="{{config("app.base_url").$tablet->path_img}}" alt="" />
                                </a>
                            </div>
                            <div class="product-content">
                                <h2 class="product-name"><a href="{{ route("product.detailProduct",["id"=>$tablet->id]) }}">{{$tablet->pro_name}}</a></h2>
                                <div class="price">
                                @if(isset($tablet->discount) && $tablet->discount != 0)
                                    <div style="text-decoration: line-through;" class="unit-price">{{number_format($tablet->unit_price,0,',','.')}}&#8363;</div>
                                    <div style="text-decoration: none;" class="sale-price">{{number_format($tablet->sale_price,0,',','.')}}&#8363;</div>
                                @else
                                    <div class="unit-price">{{number_format($tablet->unit_price,0,',','.')}}&#8363;</div>
                                @endif
                                </div>
                            </div>
                        </div>
                        <!-- single-products end -->
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- products section end -->

    <!-- products section start -->
    <div class="our-product-area">
        <div class="container">
            <!-- area title start -->
            <div class="area-title">
                <h2>Phu Kiện</h2>
            </div>
            <!-- area title end -->
           <div class="row">
               @if(count($phukiens) > 0)
               @foreach($phukiens as $phukien)
                   <div class="col-lg-3 col-md-3 col-sm-6 col">
                       <!-- single-products start -->
                       <div class="single-product">
                           @if($phukien->discount != 0)
                               <span class="sale-text">{{"-".$phukien->discount."%"}}</span>
                           @endif
                           <div class="product-img">
                               <a href="{{ route("product.detailProduct",["id"=>$phukien->id]) }}">
                                   <img class="primary-image" src="{{config("app.base_url").$phukien->path_img}}" alt="" />
                               </a>
                           </div>
                           <div class="product-content">
                               <h2 class="product-name"><a href="{{ route("product.detailProduct",["id"=>$phukien->id]) }}">{{$phukien->pro_name}}</a></h2>
                               <div class="price">
                               @if(isset($phukien->discount) && $phukien->discount != 0)
                                   <div style="text-decoration: line-through;" class="unit-price">{{number_format($phukien->unit_price,0,',','.')}}&#8363;</div>
                                   <div style="text-decoration: none;" class="sale-price">{{number_format($phukien->sale_price,0,',','.')}}&#8363;</div>
                               @else
                                   <div class="unit-price">{{number_format($phukien->unit_price,0,',','.')}}&#8363;</div>
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
    <!-- products section end -->

    <!-- latestpost area start -->
    <div class="latest-post-area">
        <div class="container">
            <div class="area-title">
                <h2>Latest Post</h2>
            </div>
            <div class="row">
                <div class="all-singlepost">
                    <!-- single latestpost start -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="single-post">
                            <div class="post-thumb">
                                <a href="#">
                                    <img src="{{ asset("frontend/img/post/post-1.jpg")}}" alt="" />
                                </a>
                            </div>
                            <div class="post-thumb-info">
                                <div class="post-time">
                                    <a href="#">Beauty</a>
                                    <span>/</span>
                                    <span>Post by</span>
                                    <span>BootExperts</span>
                                </div>
                                <div class="postexcerpt">
                                    <p>Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas...</p>
                                    <a href="#" class="read-more">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single latestpost end -->
                    <!-- single latestpost start -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="single-post">
                            <div class="post-thumb">
                                <a href="#">
                                    <img src="{{ asset("frontend/img/post/post-2.jpg")}}" alt="" />
                                </a>
                            </div>
                            <div class="post-thumb-info">
                                <div class="post-time">
                                    <a href="#">Fashion</a>
                                    <span>/</span>
                                    <span>Post by</span>
                                    <span>BootExperts</span>
                                </div>
                                <div class="postexcerpt">
                                    <p>Fusce ac odio odio. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus...</p>
                                    <a href="#" class="read-more">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single latestpost end -->
                    <!-- single latestpost start -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="single-post">
                            <div class="post-thumb">
                                <a href="#">
                                    <img src="{{ asset("frontend/img/post/post-3.jpg")}}" alt="" />
                                </a>
                            </div>
                            <div class="post-thumb-info">
                                <div class="post-time">
                                    <a href="#">Brunch Network</a>
                                    <span>/</span>
                                    <span>Post by</span>
                                    <span>BootExperts</span>
                                </div>
                                <div class="postexcerpt">
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt...</p>
                                    <a href="#" class="read-more">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single latestpost end -->
                </div>
            </div>
        </div>
    </div>
    <!-- latestpost area end -->
@endsection
