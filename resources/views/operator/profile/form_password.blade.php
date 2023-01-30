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
        <label for="new_password">New Password</label>
        <small class="block text-warning">Your new password must be different from previous used password</small>
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
        <button class="btn btn-primary">Change password</button>
    </div>
</form>
@endsection
