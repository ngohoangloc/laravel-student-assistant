@extends('client.client')

@section('title')
    <title>Đăng nhập | SA</title>
@endsection

@section('content')
    <div class="container login-container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 login-form text-center">
                <img src="{{ asset('img/logo-ctu.png') }}" class="rounded" alt="logo ctu" width="120px" height="120px">
                <h2>Đăng nhập</h2>
                @if ($errors->any())
                    <div class="alert alert-danger text-left">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" action="{{ route('auth.login') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" id="username" name="username"
                            placeholder="Tên đăng nhập" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="Đăng nhập" />
                    </div>
                    <div class="form-group">
                        <a href="/register" class="btn btn-primary btnSubmit"> Đăng ký </a>
                    </div>
                </form>

            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
@endsection
