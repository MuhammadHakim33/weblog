@extends('operator.auth.layout')

@section('title', 'Login to your account')

@section('form')
    <form action="/login" method="POST">
        @csrf
        <!-- Alert for failed login -->
        @if(session('login-failed'))
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <i class="ri-error-warning-line ri-lg me-2"></i>
                {{ session('login-failed') }}
            </div>
        @endif
        <div class="mb-3">
            <label for="input-email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="input-email" value="{{ old('email') }}">
            @error('email')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="input-password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="input-password">
            @error('password')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="d-grid gap-1">
            <button type="submit" class="btn btn-dark">Login</button>
        </div>
    </form>
@endsection

@section('btn-action')
    <a href="/password-reset" class="btn btn-link text-danger">Forget password?</a>
@endsection