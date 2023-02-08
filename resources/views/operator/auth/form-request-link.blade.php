@extends('operator.layout')

@section('content')
    <header class="container mx-auto py-2 border-b border-black/10">
        <img src="{{asset('assets/img/logo-black.png')}}" alt="" class="inline h-14">
        <small class="badge badge-primary">Operator only</small>
    </header>

    <form action="/forget-password" method="POST" class="max-w-xs mx-auto mt-14">
        @csrf
        <!-- Alert-->
        @if(session('status-success'))
        <div class="w-full mb-4 p-4 rounded alert-success">{{session('status-success')}}</div>
        @endif
        @if(session('status-danger'))
        <div class="w-full mb-4 p-4 rounded alert-danger">{{session('status-danger')}}</div>
        @endif

        <div class="mb-5 space-y-2">
            <h3 class="text-2xl font-semibold">Forget password ?</h3>
            <p>We will send you a password reset link to your email.</p>
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
                <button type="submit" class="btn btn-primary w-full">Send reset link</button>
            </div>
            <hr class="border-black/10">
            <div class="">
                <a href="/login" class="btn btn-outline-primary w-full block">Login</a>
            </div>
        </div>
    </form>
@endsection