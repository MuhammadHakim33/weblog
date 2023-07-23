@extends('layout')

@section('sidebar')
    @include('partials.sidebar')
@endsection

@section('content')
<main class="md:ml-60 pb-20">
    <!-- Header -->
    <header class="flex px-4 py-4 justify-between items-center bg-white border-b">
        <div class="flex items-center gap-1">
            <button x-on:click="sidebar = true" class="md:hidden btn flex items-center"><i class="ri-menu-line ri-xl"></i></button>
            <h2>Edit Category</h2>
        </div>
    </header>

    <!-- Card Form -->
    <form action="/categories/{{ $category->id }}" method="post" class="bg-white mx-4 my-8 p-4 max-w-[400px] border rounded-sm space-y-4">
        @method('put')
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-input w-full" value="{{$category->name}}">
            @error('name')
            <small class="block mt-2 text-danger">{{$message}}</small>
            @enderror
        </div>
        <div>
            <label for="description">Description <small class="text-warning">(optional)</small></label>
            <textarea id="description" name="description" class="form-input w-full" rows="4">{{old('description', $category->description)}}</textarea>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</main>
@endsection