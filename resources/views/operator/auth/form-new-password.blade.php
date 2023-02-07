@extends('operator.layout')

@section('content')
<header class="container mx-auto py-2 border-b border-black/10">
    <img src="{{asset('assets/img/logo-black.png')}}" alt="" class="inline h-14">
    <small class="badge badge-primary">Operator only</small>
</header>

<form action="/" method="POST" class="max-w-xs mx-auto mt-14">
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
            <label for="new_password">New Password</label>
            <input type="password" id="new_password" name="new_password" class="form-input w-full">
            @error('new_password')
            <small class="block mt-2 text-danger">{{$message}}</small>
            @enderror
        </div>
        <div>
            <label for="retype_password">Retype Password</label>
            <input type="password" id="retype_password" name="retype_password" class="form-input w-full">
            @error('retype_password')
            <small class="block mt-2 text-danger">{{$message}}</small>
            @enderror
        </div>
        <div>
            <button type="submit" class="btn btn-primary w-full">Save</button>
        </div>
    </div>
</form>
@endsection