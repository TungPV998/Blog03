@extends("layout.master")
@section("content-main")
    <div class="row tile_count">

        <div class="col-md-6 col-sm-6 col-xs-12 ">
            <h1>Thêm Sản Phẩm</h1>
        </div>

    </div>
    <!-- /top tiles -->
    <div class="row">
        <form method="post" action="{{ route("products.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="col col-sm-7">
                <div class="form-group">
                    <label for="pro_name">Tên sản phẩm:</label>
                    <p></p>
                    <input type="text" class="form-control" value="{{ old("pro_name") }}" placeholder="Iphone 6s" name="pro_name" id="pro_name">
                    @if ($errors->has('pro_name'))
                        <p class="error">
                            <i style="color: red;font-style: italic">(*){{ $errors->first('pro_name') }}</i>
                        </p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="unit_price">Giá Gốc:</label>
                    <p></p>
                    <input type="number" class="form-control" placeholder="10.000 VND" value="{{ old("unit_price") }}" name="unit_price" id="unit_price">
                    @if ($errors->has('unit_price'))
                        <p class="error">
                            <i style="color: red;font-style: italic">(*){{ $errors->first('unit_price') }}</i>
                        </p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="discount">% Giảm Giá:</label>
                    <p></p>
                    <input type="text"  class="form-control" placeholder="10%" value="{{ old("discount") }}" name="discount" id="discount">
                    @if ($errors->has('discount'))
                        <p class="error">
                            <i style="color: red;font-style: italic">(*){{ $errors->first('discount') }}</i>
                        </p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="quatity">Số lượng</label>
                    <p></p>
                    <input type="number" class="form-control" value="{{ old("quatity") }}" placeholder="325 sản phẩm" name="quatity" id="quatity">
                    @if ($errors->has('quatity'))
                        <p class="error">
                            <i style="color: red;font-style: italic">(*){{ $errors->first('quatity') }}</i>
                        </p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="pro_description">Mô tả sản phẩm:</label>
                    <p></p>
                        <textarea name="pro_description" class="form-control" rows="5" id="pro_description" >{{ old("pro_description") }}</textarea>
                    @if ($errors->has('pro_description'))
                        <p class="error">
                            <i style="color: red;font-style: italic">(*){{ $errors->first('pro_description') }}</i>
                        </p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="pro_content">Nội dung</label>
                    <p></p>
                        <textarea class="form-control" name="pro_content" rows="5" id="pro_content">{{ old("pro_content") }}</textarea>
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
                <input type="file" id="pro_img" name="pro_img">
                </div>
                <div class="form-group">
                    <label>Chọn nhiều ảnh chi tiết:</label>
                    <input required type="file" id="pro_multi_img" name="pro_multi_img[]" multiple="multiple" >
                    @if ($errors->has('pro_multi_img'))
                        <p class="error">
                            <i style="color: red;font-style: italic">{{ $errors->first('pro_multi_img') }}</i>
                        </p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Active</label>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" checked value="0" class="form-check-input" name="active">Hiện
                        </label>
                        <label class="form-check-label">
                            <input type="radio" value="1" class="form-check-input" name="active">Ẩn
                        </label>

                    </div>
                </div>
                <h4>Thuộc Tính Sản Phẩm</h4>
                @foreach($attribute as $attr)
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="attr_pro[]" value="{{$attr->id}}">{{$attr->attr_name}}
                    </label>
                </div>
                @endforeach
            </div>
    <div class="col-sm-12">
        <button type="submit" class="btn btn-info">Thêm mới</button>
    </div>
        </form>
</div>

@endsection
