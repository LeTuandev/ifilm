@extends('admin.layouts.index')

@section('title', 'movies')

@section('content')
    <h1 class="h3 mb-0">{{ Breadcrumbs::render('movies') }}</h1>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"
            action="{{ route('admin.movie') }}" method="GET">
            <div class="input-group">
                <input type="text" class="form-control bg-light small" placeholder="Search Cinema..." aria-label="Search"
                    aria-describedby="basic-addon2" name="search" value="{{ \Request::query()['search'] ?? '' }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm shadow-sm btn-add">
            <i class="fas fa-solid fa-plus"></i> Create new
        </a>
    </div>
    <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
        <thead>
            <tr role="row">
                <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">Id</th>
                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">Movie Name</th>
                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">MovieGenre</th>
                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">MovieShowTime</th>
                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Show time</th>
                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Actors</th>
                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Director</th>
                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Vote</th>
                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Age limit</th>
                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Descriptions</th>
                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $key => $movie)
                <tr class="odd">
                    <td class="sorting_1">{{ $movie->code ?? '' }}</td>
                    <td class="text-center">
                        <a href="{{ route('admin.movie.detail', $movie) }}">
                            {{ $movie->name ?? '' }}
                        </a>
                    </td>
                    <td class="text-center">{{ $movie->type }}</td>
                    <td class="text-center">{{ $movie->video_duration ?? '' }}</td>
                    <td class="text-center">{{ $movie->full_date ?? '' }}</td>
                    <td class="text-center">{{ $movie->actors ?? '' }}</td>
                    <td class="text-center">{{ $movie->director ?? '' }}</td>
                    <td class="text-center"></td>
                    <td class="text-center">{{ $movie->age_limit ?? '' }}</td>
                    <td class="text-center">{{ $movie->description ?? '' }}</td>
                    <td>
                        <a href="#"
                            class="btn btn-danger btn-circle btn-sm btn-delete-film"
                            data-toggle="modal"
                            data-target="#deleteModal"
                            data-title="Delete Film"
                            data-content="Do you want to delete the {{ $movie->name }}"
                            data-action="{{ route('admin.movie.delete', ['movie' => $movie]) }}"
                        >
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-3">
        {{ $movies->links('pagination::bootstrap-5') }}
    </div>
@endsection
