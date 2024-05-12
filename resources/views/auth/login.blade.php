@extends('layouts.main',['title'=>'Log In','login'=>true])
@section('content')

<style>
    .cardLogin{
        width: 350px;
        margin: 0 auto;
        margin-top: 10%;
        border-radius: 10px;
    }

    .card-body{
        border-radius: 10px;
    }

    .logo{
        text-align: center;
        margin-bottom: 20px;
    }

    .logo a{
        font-size: 30px;
        color: #007bff;
        text-decoration: none;
    }

    .logo a:hover{
        color : #0056b3;
    }

</style>
<body class="hold-transition login-page">
    <div class="card cardLogin">
        <div class="card-body card login-card-body">
            <div class="logo">
                <span><a href="/"><b>Kasirku 💸</b></a></span>
            </div>
            <p class="login-box-msg">Masuk untuk memulai sesi anda!</p>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="input-group mt-5">
                    <input name="username" class="form-control @error('username') is-invalid @enderror"
                        placeholder="Username">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                @error('username')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
                <div class="input-group mt-3">
                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                @error('password')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
                <div class="row mt-5">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember">Remember Me</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
@endsection