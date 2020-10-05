@extends("layout.master")
@section("content-main")
    <div class="row tile_count">

        <div class="col-md-6 col-sm-6 col-xs-12 ">
            <h1>Sửa Danh Mục</h1>
        </div>

    </div>
    <!-- /top tiles -->
    <div class="row">
        <form method="post" action="{{ route("category.update",["id"=>$category->id]) }}">
            @csrf
            <div class="form-group">
                <label for="txt_name_cate">Tên danh mục:</label>
                <input type="text" value="{{ $category->c_name }}" class="form-control" name="c_name" id="txt_name_cate">
                @if ($errors->has('c_name'))
                    <p class="error">
                        <i style="color: red;font-style: italic">(*){{ $errors->first('c_name') }}</i>
                    </p>
                @endif
            </div>
            <div class="form-group">
                <label>Chọn danh mục cha:</label>
                <select class="form-control" name="parent_id">
                    <option value="0">Chọn danh mục cha</option>
                    {!! $htmlOption !!}
                </select>
            </div>
            <button type="submit" class="btn btn-info">Cập nhật mới</button>
        </form>
    </div>

@endsection
