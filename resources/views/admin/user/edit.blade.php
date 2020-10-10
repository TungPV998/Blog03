@extends("layout.master")
@section("content-main")
    <div class="row tile_count">

        <div class="col-md-6 col-sm-6 col-xs-12 ">
            <h1>Sửa Người Dùng</h1>
        </div>

    </div>
    <!-- /top tiles -->
    <div class="row">
        <form method="post" action="{{ route("user.update",["id"=>$user->id]) }}" enctype="multipart/form-data">
            @csrf
            <div class="col col-sm-12">
                <div class="form-group">
                    <label for="pro_name">Tên Người Dùng:</label>
                    <p></p>
                    <input type="text" class="form-control" value="{{ $user->name }}" placeholder="Nguyen Van A" name="name" id="name">
                    @if ($errors->has('name'))
                        <p class="error">
                            <i style="color: red;font-style: italic">(*){{ $errors->first('name') }}</i>
                        </p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <p></p>
                    <input type="email" class="form-control" value="{{ $user->email }}" placeholder="abc@gmail.com" name="email" id="email">
                    @if ($errors->has('email'))
                        <p class="error">
                            <i style="color: red;font-style: italic">(*){{ $errors->first('email') }}</i>
                        </p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="pro_name">Mật Khẩu:</label>
                    <p></p>
                    <input type="password" class="form-control" value="" placeholder="123456@VN" name="password" id="password">
                    @if ($errors->has('password'))
                        <p class="error">
                            <i style="color: red;font-style: italic">(*){{ $errors->first('password') }}</i>
                        </p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="pro_name">Địa Chỉ:</label>
                    <p></p>
                    <input type="text" class="form-control" value="{{ $user->address }}" placeholder="160 Tây Hồ Street" name="address" id="address">
                    @if ($errors->has('address'))
                        <p class="error">
                            <i style="color: red;font-style: italic">(*){{ $errors->first('address') }}</i>
                        </p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="pro_name">Số Điện Thoại</label>
                    <p></p>
                    <input type="text" class="form-control" value="{{ $user->telephone }}" placeholder="0254123698" name="telephone" id="telephone">
                    @if ($errors->has('telephone'))
                        <p class="error">
                            <i style="color: red;font-style: italic">(*){{ $errors->first('telephone') }}</i>
                        </p>
                    @endif
                </div>

                <div class="form-group">
                    <label>Quyền Hạn:</label>
                    <select class="form-control" name="role[]" multiple>
                        @foreach($roles as $role)
                            <option {{ $role_user->contains('id', $role->id) ? "selected" : "" }}
                                    value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-sm-12">
                <button type="submit" class="btn btn-info">Cap nhat</button>
            </div>
        </form>
    </div>

@endsection
