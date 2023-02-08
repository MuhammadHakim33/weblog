@extends('operator.layout')

@section('content')
    <header class="container mx-auto py-2 border-b border-black/10">
        <img src="{{asset('assets/img/logo-black.png')}}" alt="" class="inline h-14">
        <small class="badge badge-primary">Operator only</small>
    </header>

    <form action="/login" method="POST" class="max-w-xs mx-auto mt-14">
        @csrf
        <!-- Alert -->
        @if(session('status-success'))
        <div class="w-full mb-4 p-4 rounded alert-success">{{session('status-success')}}</div>
        @endif
        @if(session('status-danger'))
        <div class="w-full mb-4 p-4 rounded alert-danger">{{session('status-danger')}}</div>
        @endif

        <div class="mb-5 space-y-2">
            <h3 class="text-2xl font-semibold">Login to your account</h3>
            <p>Enter your email address and password to access operator panel.</p>
        </div>
        <div class="space-y-4">
            <div>
                <label for="email">Email</label>
                <input id="email" name="email" type="text" class="form-input w-full" value="{{ old('email') }}">
                @error('email')
                    <small class="block mt-2 text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div>
                <label for="password">Password</label>
                <input id="password" name="password" type="password" class="form-input w-full">
                @error('password')
                    <small class="block mt-2 text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div>
                <button type="submit" class="btn btn-primary w-full">Login</button>
            </div>
            <hr class="border-black/10">
            <div class="flex justify-center">
                <a href="/forget-password" class="btn btn-link-danger">forget password?</a>
            </div>
        </div>
    </form>
@endsection