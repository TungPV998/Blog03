@extends("layout.master")
@section("content-main")
    <div class="row tile_count">

        <div class="col-md-12 col-sm-12 col-xs-12 ">
            <h1>Thêm Thuộc Tính Sản Phẩm</h1>
        </div>

    </div>
    <!-- /top tiles -->
    <div class="row">
        <form method="post" action="{{ route("attribute.store") }}">
            @csrf
            <div class="col col-sm-12">
                <div class="form-group">
                    <label for="pro_name">Tên Thuộc Tính:</label>
                    <p></p>
                    <input type="text" class="form-control" placeholder="Ram 4GB" value="{{ old("attr_name") }}" name="attr_name" id="name">
                    @if ($errors->has('attr_name'))
                        <p class="error">
                            <i style="color: red;font-style: italic">(*){{ $errors->first('attr_name') }}</i>
                        </p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Chọn danh mục :</label>
                    <select class="form-control" name="attr_category_id">
                        {!! $htmlOption !!}
                    </select>
                </div>
                <div class="form-group">
                    <label for="attr_type">Thể Loại</label>
                    <select class="form-control" id="attr_type" name="attr_type">
                        <option value="1">Màn Hình</option>
                        <option value="2">Camera</option>
                        <option value="3">Bộ Nhớ Trong</option>
                        <option value="4">Pin</option>
                        <option value="5">Khác</option>
                    </select>
                </div>
            </div>
    <div class="col-sm-12">
        <button type="submit" class="btn btn-info">Thêm mới</button>
    </div>
        </form>
</div>

@endsection