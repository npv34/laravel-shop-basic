@extends('master')
@section('content')
    <div class="card">
        <div class="card-header">
            Featured
        </div>
        <div class="card-body">
            <p class="text-success">{{ session('success') }}</p>
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $key => $user)
                <tr>
                    <th scope="row">{{ $key++ }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('users.delete',['id' => $user->id]) }}">Delete</a>
                        <a href="{{ route('users.showFormChangePassword',['id' => $user->id]) }}">ChangePass</a>
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
