@extends('operator.profile.layout')

@section('form')
<form action="/profile/{{$user->id}}" method="post" enctype="multipart/form-data" class="p-4 space-y-4">
    @method('put')
    @csrf
    <div>
        <label for="image">Photo</label>
        <div class="flex items-center gap-4 ">
            <img x-ref="previewContainer" src="{{asset('storage/'. $user->image)}}" id="preview" class="bg-black/5 my-2 h-20 w-20 rounded aspect-square">
            <input type="file" name="image" id="image" class=" text-black/60 file:content-['change'] file:bg-primary/10 file:border-primary/10 file:text-primary file:rounded file:mr-4 file:py-1 file:cursor-pointer file:text-sm hover:file:bg-primary/20" x-on:change="imagePreview($event.target, $refs.previewContainer)" accept=".jpg, .jpeg, .png">
        </div>
        @error('image')
        <small class="block mt-2 text-danger">{{$message}}</small>
        @enderror
    </div>
    <hr>
    <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" class="form-input w-full" value="{{$user->name}}">
        @error('name')
        <small class="block mt-2 text-danger">{{$message}}</small>
        @enderror
    </div>
    <div>
        <label for="role">Role</label>
        <input type="text" id="role" name="role" class="form-input w-full" value="{{$user->role}}" readonly>
        <small class="block mt-2 text-warning">You can't change role here, please contact other admin</small>
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" class="form-input w-full" value="{{$user->email}}">
        @error('email')
        <small class="block mt-2 text-danger">{{$message}}</small>
        @enderror
    </div>
    <div>
        <button class="btn btn-primary">Update Profile</button>
    </div>
</form>
@endsection