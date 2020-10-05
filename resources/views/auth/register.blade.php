@extends("frontend.master")
@section('main')

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="customer-register my-account ">
                    <form action="{{ route('register.store') }}" method="post"  class="register">
                        <div class="form-fields">
                            <h2>Đăng Ký</h2>
                            @csrf
                            <p class="form-row form-row-wide">
                                <label for="reg_email">Họ và tên <span class="required">*</span></label>
                                <input type="text" class="input-text" name="name" id="fullname" value="">
                            </p>
                            @if ($errors->has('name'))
                                <p class="error">
                                    <i style="color: red;font-style: italic">(*){{ $errors->first('name') }}</i>
                                </p>
                            @endif

                            <p class="form-row form-row-wide">
                                <label for="reg_password">Mật khẩu <span class="required">*</span></label>
                                <input type="password" class="input-text" name="password" id="reg_password">
                            </p>
                            @if ($errors->has('password'))
                                <p class="error">
                                    <i style="color: red;font-style: italic">(*){{ $errors->first('password') }}</i>
                                </p>
                            @endif

                            <p class="form-row form-row-wide">
                                <label for="reg_password">Email <span class="required">*</span></label>
                                <input type="email" class="input-text" name="email" id="email">
                            </p>
                            @if ($errors->has('email'))
                                <p class="error">
                                    <i style="color: red;font-style: italic">(*){{ $errors->first('email') }}</i>
                                </p>
                            @endif

                            <p class="form-row form-row-wide">
                                <label for="reg_password">Số điện thoại <span class="required">*</span></label>
                                <input type="number" class="input-text" name="telephone" id="tel">
                            </p>
                            @if ($errors->has('telephone'))
                                <p class="error">
                                    <i style="color: red;font-style: italic">(*){{ $errors->first('telephone') }}</i>
                                </p>
                            @endif

                            <p class="form-row form-row-wide">
                                <label for="reg_password">Địa chỉ<span class="required">*</span></label>
                                <input type="text" class="input-text" name="address" id="address">
                            </p>
                            @if ($errors->has('address'))
                                <p class="error">
                                    <i style="color: red;font-style: italic">(*){{ $errors->first('address') }}</i>
                                </p>
                            @endif
                        </div>
                        <div class="form-action">
                            <div class="actions-log">
                                <input type="submit" class="button" name="register" value="Đăng Ký">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
