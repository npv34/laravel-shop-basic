@extends('master')
@section('content')
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Categories</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i></div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="col-12 col-md-12">
                    <div class="row">
                        <div class="col-12 col-md-4 p-0">
                            <a class="btn btn-success mb-2" href="">Create</a>
                        </div>
                        <div class="col-12 col-md-8">
                            <form class="form-inline my-2 my-lg-0">
                                @csrf
                                <input class="form-control mr-sm-2" type="search" placeholder="Search"
                                       aria-label="Search">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tfoot>
                    @forelse($categories as $key => $category)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>
                                <a href=""
                                   class="btn btn-primary">Edit</a>
                                <a href="" class="btn btn-danger">Delete</a>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No data</td>
                        </tr>
                    @endforelse
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    @toastr_render
@endsection
