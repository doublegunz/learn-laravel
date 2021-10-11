@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">Create New User</div>
    <div class="card-body">
        <form action="{{ route('user.update', $user->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name', $user->name) }}" required autofocus>

                <!-- error message untuk name -->
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email', $user->email) }}" required>

                <!-- error message untuk email -->
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">

                <!-- error message untuk password -->
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-large" type="submit">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
