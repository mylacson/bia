@extends('layouts.login')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ route('home')}}"><b>BI-A</b>89</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Hãy bắt đầu bằng đăng nhập</p>

            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group has-feedback">
                    <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                           placeholder="Email" name="email" value="{{ old('email') }}" autofocus>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </div>
                    @endif
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                           placeholder="Password" name="password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                </div>
                @if ($errors->has('password'))
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </div>
                @endif
                <div class="row">
                    <div class="col-xs-8">
                        {{--<div class="checkbox icheck">--}}
                        {{--<label>--}}
                        {{--<input type="checkbox"> Remember Me--}}
                        {{--</label>--}}
                        {{--</div>--}}
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng nhập</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

        {{--<div class="social-auth-links text-center">--}}
        {{--<p>- OR -</p>--}}
        {{--<a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using--}}
        {{--Facebook</a>--}}
        {{--<a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using--}}
        {{--Google+</a>--}}
        {{--</div>--}}
        <!-- /.social-auth-links -->

            <a href="#">Quên mật khẩu</a><br>
            <a href="register.html" class="text-center">Đăng kí thành viên</a>

        </div>
        <!-- /.login-box-body -->
    </div>
@endsection
