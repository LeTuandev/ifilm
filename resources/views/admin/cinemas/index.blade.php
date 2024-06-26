@extends('admin.layouts.index')

@section('title', 'cinemas')

@section('content')
    <h1 class="h3 mb-0">{{ Breadcrumbs::render('cinemas') }}</h1>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="{{ route('admin.cinemas') }}" method="GET">
            <div class="input-group">
                <input type="text" class="form-control bg-light small" placeholder="Search Cinema..." aria-label="Search" aria-describedby="basic-addon2" name="search" value="{{ \Request::query()['search'] ?? '' }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
        <a href="#"
            class="d-none d-sm-inline-block btn btn-sm shadow-sm btn-add btn-open-modal"
            data-toggle="modal"
            data-target="#cinemasModal"
            data-title="Create New Cinema"
            data-edit="false"
            data-action="{{ route('admin.cinemas.store') }}"
        >
            <i class="fas fa-solid fa-plus"></i> Create new
        </a>
    </div>
    <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
        <thead>
            <tr role="row">
                <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 264.797px;">Id</th>
                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 421.328px;">Cinema Name</th>
                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 194.406px;">Address</th>
                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 97.8594px;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cinemas as $key => $cinema)
                <tr class="odd">
                    <td class="sorting_1">{{ ($cinemas->currentPage() - 1) * $cinemas->perPage() + $loop->iteration }}</td>
                    <td>{{ $cinema->name }}</td>
                    <td>{{ $cinema->address }}</td>
                    <td>
                        <a href="#"
                            class="btn btn-info btn-circle btn-sm btn-open-modal"
                            data-toggle="modal"
                            data-target="#cinemasModal"
                            data-edit="true"
                            data-title="Detail Cinema"
                            data-detail="{{ json_encode($cinema) }}"
                            data-action="{{ route('admin.cinemas.update', ['cinema' => $cinema]) }}"
                        >
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a href="#"
                            class="btn btn-danger btn-circle btn-sm btn-delete-cinema"
                            data-toggle="modal"
                            data-target="#deleteModal"
                            data-title="Delete Cinema"
                            data-content="Do you want to delete the {{ $cinema->name }}"
                            data-action="{{ route('admin.cinemas.destroy', ['cinema' => $cinema]) }}"
                        >
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-3">
        {{ $cinemas->links('pagination::bootstrap-5') }}
    </div>
@endsection