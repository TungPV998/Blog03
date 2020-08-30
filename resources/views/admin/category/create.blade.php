@extends("layout.master")
@section("content-main")
    <div class="row tile_count">

        <div class="col-md-6 col-sm-6 col-xs-12 ">
            <h1>Thêm Danh Mục</h1>
        </div>

    </div>
    <!-- /top tiles -->
    <div class="row">
        <form method="post" action="{{ route("category.store") }}">
            @csrf
            <div class="form-group">
                @if ($errors->has('c_name'))
                    <p class="error">
                        <i style="color: red;font-style: italic">{{ $errors->get('c_name') }}</i>
                    </p>
                @endif
                <label for="txt_name_cate">Tên danh mục:</label>
                <p></p>
                <input type="text" class="form-control" name="c_name" id="txt_name_cate">
            </div>
            <div class="form-group">
                <label>Chọn danh mục cha:</label>
                <select class="form-control" name="parent_id">
                    <option value="0">Chọn danh mục cha</option>
                    {!! $htmlOption !!}
                </select>
            </div>
            <button type="submit" class="btn btn-info">Thêm mới</button>
        </form>
    </div>

@endsection
