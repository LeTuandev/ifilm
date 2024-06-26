@extends('admin.layouts.index')

@section('title', 'detail movie')

@section('content')
    <h1 class="h3 mb-0">{{ Breadcrumbs::render('detail-movie', $movie) }}</h1>
    <div class="row">
        <div class="col-md-6">
            @include('admin.components.input-form', [
                'lable' => 'Movie Name',
                'name' => 'name',
                'placeholder' => 'Movie Name...',
                'isDisabled' => true,
            ])
        </div>
        <div class="col-md-6">
            @include('admin.components.select-form', [
                'lable' => 'Movie Genre',
                'name' => 'type',
                'lable' => 'Movie Genre',
                'lable' => 'Movie Genre',
                'isDisabled' => true
            ])
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-6">
            <div>
                <label for="" class="label-cinema">Movie ShowTime</label>
                <div class="input-group">
                    <input type="text"
                        name=""
                        class="form-control bg-light border-1 small"
                        placeholder="Movie ShowTime..."
                        aria-label="Search"
                        aria-describedby="basic-addon2" 
                        @disabled(true)
                        value="">
                    <div class="input-group-append d-flex align-items-center ml-4">
                        <span>Minutes</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            @include('admin.components.multiple-select-form', [
                'label' => 'Cenimas',
                'isDisabled' => true,
            ])
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-6">
            @include('admin.components.range-date-time', [
                'label' => 'Show Time'
            ])
        </div>
        <div class="col-md-6">
            @include('admin.components.multiple-select-form', [
                'label' => 'Cenimas',
                'isDisabled' => true,
            ])
        </div>
    </div>
@endsection
