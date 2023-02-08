@extends('operator.layout')

@section('content')
<header class="container mx-auto py-2 border-b border-black/10">
    <img src="{{asset('assets/img/logo-black.png')}}" alt="" class="inline h-14">
    <small class="badge badge-primary">Operator only</small>
</header>

<form action="/reset-password" method="post" class="max-w-xs mx-auto mt-14">
    @csrf
    <!-- Alert for failed login -->
    @if(session('status-danger'))
    <div class="w-full mb-4 p-4 rounded alert-danger">{{session('status-danger')}}</div>
    @endif

    <div class="mb-5 space-y-2">
        <h3 class="text-2xl font-semibold">Create new password</h3>
        <p>Your new password must be different from previous used password.</p>
    </div>
    <div class="space-y-4">
        <div>
            <input id="token" name="token" type="hidden" class="form-input w-full" value="{{$token}}">
        </div>
        <div>
            <label for="email">Email</label>
            <input id="email" name="email" type="text" class="form-input w-full" value="{{old('email')}}">
            @error('email')
            <small class="block mt-2 text-danger">{{$message}}</small>
            @enderror
        </div>
        <div>
            <label for="password">New Password</label>
            <input type="password" id="password" name="password" class="form-input w-full">
            @error('password')
            <small class="block mt-2 text-danger">{{$message}}</small>
            @enderror
        </div>
        <div>
            <label for="password_confirmation">Retype Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-input w-full">
            @error('password_confirmation')
            <small class="block mt-2 text-danger">{{$message}}</small>
            @enderror
        </div>
        <div>
            <button type="submit" class="btn btn-primary w-full">Save</button>
        </div>
    </div>
</form>
@endsection