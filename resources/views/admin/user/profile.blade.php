@extends('admin.layouts.index')

@section('title', 'My profile')

@section('content')
    <h1 class="h3 mb-0">{{ Breadcrumbs::render('profile') }}</h1>
    <form class="user" action="{{ route('admin.profile') }}" method="POST">
        @csrf
        <div class="row">
            <dv class="col-md-6">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control form-control-user"
                        id="exampleInputEmail" aria-describedby="emailHelp" placeholder="name..." name="name" value="{{ old('name') ?? ($user->name ?? '') }}">
                    @if($errors->has('name'))
                        <div class="text-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control form-control-user"
                        id="exampleInputEmail" aria-describedby="emailHelp" name="email" placeholder="email..." value="{{ old('email') ?? ($user->email ?? '') }}">
                    @if($errors->has('email'))
                        <div class="text-danger">{{ $errors->first('email') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Phone Number</label>
                    <input type="text" class="form-control form-control-user"
                        id="exampleInputEmail" aria-describedby="emailHelp" name="phone" placeholder="phone..." value="{{ old('phone') ?? ($user->phone ?? '') }}">
                    @if($errors->has('phone'))
                        <div class="text-danger">{{ $errors->first('phone') }}</div>
                    @endif
                </div>
            </dv>
            <dv class="col-md-6">
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <div class="preview-avtar d-flex justify-content-center">
                            <img src="{{ $user->avatar ? asset('storage/avatar/' . $user->avatar) : asset('images/user_default.jpg') }}" alt="avatar" class="avatar">
                        </div>
                        <div class="mt-5 d-flex justify-content-center">
                            <button id="customButton" class="btn btn-primary" type="button">Upload</button>
                            <input type="file" id="customFile" style="display: none;" accept="jpg, png, peg">
                            <input type="hidden" name="avatar">
                        </div>
                    </div>
                </div>
            </dv>
        </div>
        <div class="row mt-5">
            <div class="col-md-12 d-flex justify-content-end">
                <button type="submmit" class="btn btn-danger">
                    Update
                </button>
            </div>
        </div>
    </form>
@endsection
