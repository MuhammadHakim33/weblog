@extends('operator.profile.layout')

@section('form')
<form action="/change-password" method="post" class="p-4 space-y-4">
    @method('put')
    @csrf
    <div>
        <label for="old_password">Old Password</label>
        <input type="password" id="old_password" name="old_password" class="form-input w-full">
        @error('old_password')
        <small class="block mt-2 text-danger">{{$message}}</small>
        @enderror
    </div>
    <div>
        <label for="password">New Password</label>
        <small class="block text-warning">Your new password must be different from previous used password</small>
        <input type="password" id="password" name="password" class="form-input w-full">
        @error('password')
        <small class="block mt-2 text-danger">{{$message}}</small>
        @enderror
    </div>
    <div>
        <label for="password_confirmation">Password Confirmation</label>
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-input w-full">
        @error('password_confirmation')
        <small class="block mt-2 text-danger">{{$message}}</small>
        @enderror
    </div>
    <div>
        <button class="btn btn-primary">Change password</button>
    </div>
</form>
@endsection
