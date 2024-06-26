@extends('admin.auth.index')

@section('title', 'login')

@section('content')
    <div class="p-5">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Welcome Page</h1>
        </div>
        @if (\Session::has('error'))
            <div class="alert alert-danger" role="alert">
                {!! \Session::get('error') !!}
            </div>
        @endif
        <form class="user" action="{{ route('admin.login') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="email" class="form-control form-control-user"
                    id="exampleInputEmail" aria-describedby="emailHelp"
                    placeholder="Enter Email Address..." name="email" value="{{ old('email' ?? '') }}">
                @if($errors->has('email'))
                    <div class="text-danger">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <div class="form-group">
                <input type="password" class="form-control form-control-user"
                    id="exampleInputPassword" placeholder="Password" name="password" value="">
                @if($errors->has('password'))
                    <div class="text-danger">{{ $errors->first('password') }}</div>
                @endif
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox small">
                    <input type="checkbox" class="custom-control-input" id="customCheck">
                    <label class="custom-control-label" for="customCheck">Remember
                        Me</label>
                </div>
            </div>
            <button type="submmit" class="btn btn-primary btn-user btn-block btn-login">
                Login
            </button>
            {{-- <hr> --}}
            {{-- <a href="index.html" class="btn btn-google btn-user btn-block">
                <i class="fab fa-google fa-fw"></i> Login with Google
            </a>
            <a href="index.html" class="btn btn-facebook btn-user btn-block">
                <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
            </a> --}}
        </form>
        <hr>
        <div class="text-center">
            <a class="small" href="forgot-password.html">Forgot Password?</a>
        </div>
        <div class="text-center">
            <a class="small" href="{{ route('admin.view_register') }}">Create an Account!</a>
        </div>
    </div>
@endsection
