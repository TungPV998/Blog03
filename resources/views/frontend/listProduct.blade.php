@extends("frontend.master")
@section('main')
    <article class="wrap-list">
        <div class="container">
                    <div class="d2" style="height: 800px;">
                        <div class="our-product-area">
                            <div class="area-title-list">
                                <h2>{{ $nameChildCate }}</h2>
                            </div>
                                <div class="row">
                                    @foreach($listPro as $product)

                                    <div class="col-lg-3 col-md-4 col-sm-6 col">
                                        <!-- single-products start -->
                                        <div class="single-product">
                                            @if($product->discount != 0)
                                                <span class="sale-text">{{"-".$product->discount."%"}}</span>
                                            @endif
                                            <div class="product-img">
                                                <a href="{{ route("product.detailProduct",["id"=>$product->id]) }}">
                                                    <img class="primary-image" src="{{config("app.base_url").$product->path_img}}" alt="" />
                                                </a>
                                            </div>
                                            <div class="product-content">
                                                <h2 class="product-name"><a href="{{ route("product.detailProduct",["id"=>$product->id]) }}">{{$product->pro_name}}</a></h2>
                                                <div class="price">
                                                    @if(isset($product->discount) && $product->discount != 0 )
                                                        <div style="text-decoration: line-through;" class="unit-price">{{number_format($product->unit_price,0,',','.')}}&#8363;</div>
                                                        <div style="text-decoration: none;" class="sale-price">{{number_format($product->sale_price,0,',','.')}}&#8363;</div>
                                                    @else
                                                        <div class="unit-price">{{number_format($product->unit_price,0,',','.')}}&#8363;</div>
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
                </div>

    </article>


@endsection
