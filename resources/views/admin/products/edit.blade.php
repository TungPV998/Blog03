@extends("layout.master")
@section("content-main")
    <div class="row tile_count">

        <div class="col-md-6 col-sm-6 col-xs-12 ">
            <h1>Cập nhật thông tin Sản Phẩm</h1>
        </div>

    </div>
    <!-- /top tiles -->
    <div class="row">
        <form method="post" action="{{ route("products.update",['id'=>$product->id]) }}" enctype="multipart/form-data">
            @csrf
            <div class="col col-sm-7">
                <div class="form-group">
                    <label for="pro_name">Tên sản phẩm:</label>
                    <p></p>
                    <input type="text" class="form-control" value="{{ $product->pro_name }}" name="pro_name" id="pro_name">
                    @if ($errors->has('pro_name'))
                        <p class="error">
                            <i style="color: red;font-style: italic">(*){{ $errors->first('pro_name') }}</i>
                        </p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="unit_price">Giá Gốc:</label>
                    <p></p>
                    <input type="number" value="{{ $product->unit_price }}" class="form-control" name="unit_price" id="unit_price">
                    @if ($errors->has('unit_price'))
                        <p class="error">
                            <i style="color: red;font-style: italic">(*){{ $errors->first('unit_price') }}</i>
                        </p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="discount">% Giảm Giá:</label>
                    <p></p>
                    <input type="text" placeholder="10%" value="{{ $product->discount }}"  class="form-control" name="discount" id="discount">
                    @if ($errors->has('discount'))
                        <p class="error">
                            <i style="color: red;font-style: italic">(*){{ $errors->first('discount') }}</i>
                        </p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="quatity">Số lượng</label>
                    <p></p>
                    <input type="number" class="form-control" name="quatity"  value="{{ $product->quatity }}" id="quatity">
                    @if ($errors->has('quatity'))
                        <p class="error">
                            <i style="color: red;font-style: italic">(*){{ $errors->first('quatity') }}</i>
                        </p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="pro_description">Mô tả sản phẩm:</label>
                    <p></p>
                    <textarea name="pro_description" class="form-control"  rows="5" id="pro_description">{{ $product->pro_description }}</textarea>
                    @if ($errors->has('pro_description'))
                        <p class="error">
                            <i style="color: red;font-style: italic">(*){{ $errors->first('pro_description') }}</i>
                        </p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="pro_content">Nội dung</label>
                    <p></p>
                    <textarea class="form-control" name="pro_content"  rows="5"  id="pro_content">{{ $product->pro_content }}</textarea>
                    @if ($errors->has('pro_content'))
                        <p class="error">
                            <i style="color: red;font-style: italic">(*){{ $errors->first('pro_content') }}</i>
                        </p>
                    @endif
                </div>
            </div>
            <div class="col col-sm-1"></div>
            <div class="col col-sm-4">
                <div class="form-group">
                    <label>Chọn danh mục cha:</label>
                    <select class="form-control" name="category_id">
                        {!! $htmlOption !!}
                    </select>
                </div>
                <div class="form-group">
                    <label>Chọn ảnh đại diện:</label>
                    @if ($errors->has('pro_img'))
                        <p class="error">
                            <i style="color: red;font-style: italic">{{ $errors->first('pro_img') }}</i>
                        </p>
                    @endif
                    <input style="margin-bottom: 10px" type="file" id="pro_img" name="pro_img">
                    {{--<input type="hidden" value="{{ $product->path_img  }}" name="path_img_old">--}}
                    {{--<input type="hidden" value="{{ $product->pro_img  }}" name="pro_img_old">--}}
                </div>
                <div class="form-group">
                    <img style="width: 200px;height: 200px;overflow: hidden" src="{{ $product->path_img  }}">
                </div>
                <div class="form-group">
                    <label>Chọn nhiều ảnh chi tiết:</label>
                    <input type="file" id="pro_img" name="pro_multi_img[]" multiple="multiple" >
                    @if ($errors->has('pro_multi_img'))
                        <p class="error">
                            <i style="color: red;font-style: italic">{{ $errors->first('pro_multi_img') }}</i>
                        </p>
                    @endif

                </div>
                <div class="form-group d-flex">
                @foreach($product->productImage as $item)
                    <img style="width: 130px;height: 130px;overflow: hidden" src="{{ $item->path_img  }}">
                @endforeach
                </div>
                <div class="form-group">
                    <label>Active</label>
                    <div class="form-check-inline">
                        @if($product->active == 1)
                        <label class="form-check-label">
                            <input type="radio"  value="0" class="form-check-input" name="active">Hiện
                        </label>
                        <label class="form-check-label">
                            <input type="radio" checked value="1" class="form-check-input" name="active">Ẩn
                        </label>
                            @else
                            <label class="form-check-label">
                                <input type="radio" checked value="0" class="form-check-input" name="active">Hiện
                            </label>
                            <label class="form-check-label">
                                <input type="radio"   value="1" class="form-check-input" name="active">Ẩn
                            </label>
                            @endif
                    </div>
                </div>
                <h4>Thuộc Tính Sản Phẩm</h4>
                @foreach($attribute as $attr)
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="attr_pro[]"{{ in_array($attr->id,$attributeOld) ? "checked" : "" }} value="{{$attr->id}}">{{$attr->attr_name}}
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="col-sm-12">
                <button type="submit" class="btn btn-info">Cập nhật</button>
            </div>
        </form>
    </div>

@endsection
