@extends('operator.layout')

@section('sidebar')
    @include('operator.partials.sidebar')
@endsection

@section('content')
<main class="md:ml-60 pb-20">
    <!-- Header -->
    <header class="flex px-4 py-4 justify-between items-center bg-white border-b">
        <div class="flex items-center gap-1">
            <button x-on:click="sidebar = true" class="md:hidden btn flex items-center"><i class="ri-menu-line ri-xl"></i></button>
            <h2>Add New Author</h2>
        </div>
    </header>

    <!-- Card Form -->
    <form action="/authors" method="post" enctype="multipart/form-data" class="bg-white mx-4 my-8 p-4 max-w-[400px] border rounded-sm space-y-4">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-input w-full" value="{{ old('name') }}">
            @error('name')
            <small class="block mt-2 text-danger">{{$message}}</small>
            @enderror
        </div>
        <div>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-input w-full" value="{{ old('email') }}">
            @error('email')
            <small class="block mt-2 text-danger">{{$message}}</small>
            @enderror
        </div>
        <div>
            <label for="password">Password</label>
            <input type="text" name="password" id="password" class="form-input w-full" value="{{ old('password') }}">
            @error('password')
            <small class="block mt-2 text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="">
            <div class="flex items-center justify-between">
                <label for="avatar">Avatar</label>
                <small class="text-warning">png jpg jpeg - max 2MB</small>
            </div>
            <img x-ref="previewContainer" src="{{ old('avatar') }}" id="preview" class="bg-black/5 border-2 border-black/20 border-dashed text-black/60 my-2 ">
            <input type="file" name="avatar" class="form-input w-full file:bg-primary/10 file:border-primary/10 file:text-primary file:rounded file:py-1 file:px-2 file:mr-4 hover:file:bg-primary/20" x-on:change="imagePreview($event.target, $refs.previewContainer)" accept=".jpg, .jpeg, .png">
            @error('avatar')
            <small class="block mt-2 text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>
</main>

@endsection