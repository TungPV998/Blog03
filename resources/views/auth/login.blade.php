@extends("frontend.master")
@section('main')

    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 col-xs-12">
                <div class="customer-register my-account ">
                    <form method="post" action="{{ route("login.checkLogin") }}" class="register">
                        <div class="form-fields">
                            <h2>Đăng Nhập</h2>
                            @csrf
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
                                <label for="reg_password">Mật khẩu <span class="required">*</span></label>
                                <input type="password" class="input-text" name="password" id="reg_password">
                            </p>
                            @if ($errors->has('password'))
                                <p class="error">
                                    <i style="color: red;font-style: italic">(*){{ $errors->first('password') }}</i>
                                </p>
                            @endif
                            <div class="form-row form-row-wide remember">
                                <input type="checkbox" value="1" name="remember">Ghi Nhớ
                            </div>
                        </div>
                        <div class="form-action">
                            <div class="actions-log">
                                <input type="submit" class="button" name="login" value="Đăng Nhập">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

@endsection
