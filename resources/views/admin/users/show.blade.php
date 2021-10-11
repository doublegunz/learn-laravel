@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">Detail User</div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{ $user->id }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th>Role</th>
                        <td>-</td>
                    </tr>
                </tbody>
            </table>
            <a href="{{ url()->previous() }}" class="btn btn-default mt-3">
                Back to list
            </a>
        </div>
    </div>
@endsection
