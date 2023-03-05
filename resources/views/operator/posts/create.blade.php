@extends('operator.layout')

@section('content')
<header class="bg-white p-4 flex gap-4 border-y">
    <a href="/posts" class="btn-sm btn-outline-danger flex items-center gap-2">
        <i class="ri-close-line ri-lg"></i>
        Close
    </a>
</header>

<form action="/posts" method="post" enctype="multipart/form-data" x-on:submit="postSubmit($refs.body)" class="post-form my-4 p-4 grid grid-cols-1 md:grid-cols-3 gap-4">
    @csrf
    <!-- Left side -->
    <main class="md:col-span-2 space-y-4">
        <div class="bg-white p-4 rounded border">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-input w-full">
            @error('title')
            <small class="block mt-2 text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="bg-white rounded border">
            @error('body')
            <small class="block mt-2 text-danger">{{ $message }}</small>
            @enderror
            <textarea name="body" id="editor" class="text-base">{{ old('body') }}</textarea>
        </div>
    </main>
    <!-- Right side -->
    <div class="bg-white p-4 rounded border h-fit sticky top-4 space-y-4">
        <div class="">
            <div class="flex items-center justify-between">
                <label for="thumbnail">Thumbnail</label>
                <small class="text-warning">png jpg jpeg - max 2MB</small>
            </div>
            <img x-ref="previewContainer" src="{{ old('thumbnail') }}" id="preview" class="aspect-auto bg-black/5 border-2 border-black/20 border-dashed text-black/60 my-2 min-h-[150px] relative after:content-['preview'] after:inline-block after:absolute after:bottom-1/2 after:right-1/2 after:translate-x-1/2 after:translate-y-1/2">
            <input type="file" name="thumbnail" class="form-input w-full file:bg-primary/10 file:border-primary/10 file:text-primary file:rounded file:py-1 file:px-2 file:mr-4 hover:file:bg-primary/20" x-on:change="imagePreview($event.target, $refs.previewContainer)" accept=".jpg, .jpeg, .png">
            @error('thumbnail')
            <small class="block mt-2 text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div>
            <label for="category">Category</label>
            <select name="category" id="category" class="form-select w-full">
                <option value="" selected>Select</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}" @selected(old('category') == $category->id)>{{$category->name}}</option>
                @endforeach
            </select>
            @error('category')
            <small class="block mt-2 text-danger">{{ $message }}</small>
            @enderror
        </div>
        <hr>
        <div class="flex flex-wrap gap-3">
            @can('admin')
            <button type="submit" name="action" value="insert" class="btn-sm btn-primary flex-none">Publish</button>
            @else
            <button type="submit" name="action" value="insert" class="btn-sm btn-primary flex-none">Submit for review</button>
            @endcan
            <button type="submit" name="action" value="draf" class="btn-sm btn-outline-light flex-none">Draft & close</button>
        </div>
    </div>
</form>
@endsection