@extends('client.client')

@section('title')
    <title>Đăng ký | SA</title>
@endsection

@section('content')
    <div class="container login-container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 login-form text-center">
                <img src="{{ asset('img/logo-ctu.png') }}" class="rounded" alt="logo ctu" width="120px" height="120px">
                <h2>Đăng ký</h2>
                @if ($errors->any())
                    <div class="alert alert-danger text-left">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" action="{{ route('auth.register') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Họ và tên" />
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="college" name="college">
                            <option value="">Chọn khoa...</option>
                            @foreach ($colleges as $college)
                                <option value="{{ $college->id }}"> {{ $college->name }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="major" name="major">
                            <option value="">Chọn ngành...</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="username" name="username"
                            placeholder="Tên đăng nhập" />
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Nhập lại mật khẩu" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="Đăng ký" />
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-3 pb-5 pt-5"></div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#college').on('change', function() {
                var college_id = this.value;
                $("#major").html('');
                $.ajax({
                    url: "{{ url('showMajorsInCollege') }}",
                    type: "POST",
                    data: {
                        college_id: college_id,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#major').html('<option value="">Chọn ngành...</option>');
                        $.each(result, function(key, value) {
                            $("#major").append(
                                '<option value="' + value.id + '"> ' + value.name +
                                ' </option>'
                            );
                        });
                    }
                });
            });
        });
    </script>
@endsection

