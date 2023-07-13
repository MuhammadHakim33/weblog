@extends('layout')

@section('content')
<header class="bg-white p-4 flex gap-4 border-y sticky top-0">
    <a href="/posts" class="btn-sm btn-outline-danger flex items-center gap-2">
        <i class="ri-close-line ri-lg"></i>
        Close
    </a>
    <a href="/posts/{{$post->id}}/edit" class="btn-sm btn-outline-light flex items-center gap-2">
        Edit
    </a>
</header>
<main class="max-w-3xl py-10 px-4 mx-auto space-y-5">
    <div class="flex">
        <p>Created by <span class="underline font-semibold">{{$post->user->name}}</span> at <span class="font-semibold">{{$post->created_at}}</span></p>
    </div>
    <div class="space-y-5">
        <img src="{{$post->thumbnail}}" alt="{{$post->slug}}" class="w-full" loading="lazy">
        <div>
            <span class="inline-block badge badge-success capitalize mb-2">{{$post->category->name}}</span>
            <h2>{{ $post->title }}</h2>
        </div>
        <div class="[&>*]:leading-relaxed">{!! $post->body !!}</div>
    </div>
</main>
@endsection