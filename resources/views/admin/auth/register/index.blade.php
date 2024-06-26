@extends('admin.auth.index')

@section('title', 'register')

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
        <form class="user" action="{{ route('admin.register') }}" method="POST">
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
                <input type="password" class="form-control form-control-user"
                    id="exampleInputPassword" placeholder="confirm password" name="confirm_password" value="">
                @if($errors->has('confirm_password'))
                    <div class="text-danger">{{ $errors->first('confirm_password') }}</div>
                @endif
            </div>
            <button type="submmit" class="btn btn-primary btn-user btn-block btn-login">
                Register
            </button>
        </form>
    </div>
@endsection
