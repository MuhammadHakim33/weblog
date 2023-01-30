@extends('operator.layout')

@section('content')
<header class="bg-white p-4 flex gap-4 border-y">
    <a href="/posts" class="btn-sm btn-outline-danger flex items-center gap-2">
        <i class="ri-close-line ri-lg"></i>
        Close
    </a>
</header>

<form action="/posts/{{$post->id}}" method="post" enctype="multipart/form-data" x-on:submit="postSubmit($refs.body)" class="post-form my-4 p-4 grid grid-cols-1 md:grid-cols-3 gap-4">
    @method('put')
    @csrf
    <!-- Left side -->
    <main class="md:col-span-2 space-y-4">
        <div class="bg-white p-4 rounded border">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{old('title', $post->title)}}" class="form-input w-full">
            @error('title')
            <small class="block mt-2 text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="bg-white p-4 rounded border">
            @error('body')
            <small class="block mt-2 text-danger">{{$message}}</small>
            @enderror
            <div id="toolbar" class="bg-white shadow-md rounded">
                <div class="ql-formats">
                    <select class="ql-size">
                        <option value="normal"></option>
                        <option value="small"></option>
                        <option value="large"></option>
                        <option value="huge"></option>
                    </select>
                    <button class="ql-bold"></button>
                    <button class="ql-italic"></button>
                    <button class="ql-underline"></button>
                </div>
                <div class="ql-formats">
                    <button class="ql-header" value="1"></button>
                    <button class="ql-header" value="2"></button>
                    <button class="ql-blockquote"></button>
                    <button class="ql-code-block"></button>
                </div>
                <div class="ql-formats">
                    <select class="ql-color">
                        <option selected></option>
                        <option value="red"></option>
                        <option value="orange"></option>
                        <option value="yellow"></option>
                        <option value="green"></option>
                        <option value="blue"></option>
                        <option value="purple"></option>
                    </select>
                    <select class="ql-background">
                        <option selected></option>
                        <option value="red"></option>
                        <option value="orange"></option>
                        <option value="yellow"></option>
                        <option value="green"></option>
                        <option value="blue"></option>
                        <option value="purple"></option>
                    </select>
                </div>
                <div class="ql-formats">
                    <button class="ql-list" value="ordered"></button>
                    <button class="ql-list" value="bullet"></button>
                    <select class="ql-align">
                        <option selected></option>
                        <option value="center"></option>
                        <option value="right"></option>
                        <option value="justify"></option>
                    </select>
                    <button class="ql-direction" value="rtl"></button>
                </div>
                <div class="ql-formats">
                    <button class="ql-image"></button>
                </div>
            </div>
            <div id="editor" class="min-h-screen pt-4 mb-5 text-base !border-none"></div>
            <input name="body" x-ref="body" type="hidden" value="{{old('body', $post->body)}}">
        </div>
    </main>
    <!-- Right side -->
    <div class="bg-white p-4 rounded border h-fit sticky top-4 space-y-4">
        <div class="">
            <div class="flex items-center justify-between">
                <label for="thumbnail">Thumbnail</label>
                <small class="text-warning">png jpg jpeg - max 2MB</small>
            </div>
            <img x-ref="previewContainer" src="{{ asset('storage/'. $post->thumbnail) }}" id="preview" class="aspect-auto bg-black/5 border-2 border-black/20 border-dashed text-black/60 my-2 min-h-[150px] relative after:content-['preview'] after:inline-block after:absolute after:bottom-1/2 after:right-1/2 after:translate-x-1/2 after:translate-y-1/2">
            <input type="file" id="thumbnail" name="thumbnail" class="form-input w-full file:bg-primary/10 file:border-primary/10 file:text-primary file:rounded file:py-1 file:px-2 file:mr-4 hover:file:bg-primary/20" value="{{ $post->thumbnail }}" x-on:change="imagePreview($event.target, $refs.previewContainer)" accept=".jpg, .jpeg, .png">
            @error('thumbnail')
            <small class="block mt-2 text-danger">{{$message}}</small>
            @enderror
        </div>
        <div>
            <label for="category">Category</label>
            <select name="category" id="category" class="form-select btn w-full">
                <option value="" selected>Select</option>
                @foreach($categories as $category)
                    @if($post->category_id == $category->id) 
                        <option value="{{$category->id}}" selected>{{$category->name}}</option>
                    @else
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endif
                @endforeach
            </select>
            @error('category')
            <small class="block mt-2 text-danger">{{$message}}</small>
            @enderror
        </div>
        <hr>
        <div class="flex flex-wrap gap-3">
            <button type="submit" name="action" value="insert" class="btn-sm btn-primary flex-none">Update</button>
            <button type="submit" name="action" value="draf" class="btn-sm btn-outline-light flex-none">Draft & Close</button>
        </div>
    </div>
</form>
@endsection