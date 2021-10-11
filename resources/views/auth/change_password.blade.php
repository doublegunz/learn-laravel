@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">Create New User</div>
    <div class="card-body">
        <form action="{{ route('auth.change_password') }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">

            <div class="form-group">
                <label for="current_password">Current Password</label>
                <input type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password">

                <!-- error message untuk password -->
                @error('current_password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="new_password">New Password</label>
                <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password">

                <!-- error message untuk password -->
                @error('new_password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="new_password_confirmation">New Password Confirmation</label>
                <input type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror" name="new_password_confirmation">

                <!-- error message untuk password -->
                @error('new_password_confirmation')
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
