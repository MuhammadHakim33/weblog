@extends('operator.layout')

@section('sidebar')
@include('operator.partials.sidebar')
@endsection

@section('content')
<!-- Main -->
<main class="md:ml-60 pb-20">
    <!-- Header -->
    <header class="flex px-4 py-4 justify-between items-center bg-white border-b">
        <div class="flex items-center gap-1">
            <button x-on:click="sidebar = true" class="md:hidden btn flex items-center"><i class="ri-menu-line ri-xl"></i></button>
            <h2>Drafts</h2>
        </div>
    </header>
    <!-- Alert -->
    @if(session('alert'))
    <p>{{session('alert')}}</p>
    @endif
    <!-- Table -->
    <div class="bg-white mx-4 my-8 border rounded-sm">
        <div class="p-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
            <h4>All Post <span class="opacity-60">({{$count}})</span></h4>
            <div class="flex gap-3 items-center">
                <input type="text" name="" class="form-input w-full sm:w-52 mt-0" placeholder="Search">
                <select class="form-select btn-sm w-20 h-9 flex-none">
                    <option selected>Sort</option>
                    <option value="">One</option>
                    <option value="">Two</option>
                </select>
            </div>
        </div>
        <div class="overflow-auto md:overflow-visible">
            <table class="w-full table-auto text-left ">
                <thead class="uppercase border-y bg-black/5 text-black/60">
                    <tr>
                        <th scope="col" class="py-3 px-4 border-y w-2/5">Title</th>
                        <th scope="col" class="py-3 px-4 border-y">Creator</th>
                        <th scope="col" class="py-3 px-4 border-y">Date</th>
                        <th scope="col" class="py-3 px-4 border-y w-28">Status</th>
                        <th scope="col" class="py-3 px-4 border-y w-12"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td class="border-y p-4 align-top"><a href="" class="hover:underline hover:text-primary">{{ $post->title }}</a></td>
                        <td class="border-y p-4 align-top">{{ $post->creator->name }}</td>
                        <td class="border-y p-4 align-top">
                            <p>{{ $post->created_at }}</p>
                            <small class="text-black/60">Added</small>
                        </td>
                        <td class="border-y p-4 align-top">
                            <span class="badge badge-warning capitalize">{{ $post->status }}</span>
                        </td>
                        <td class="border-y p-4 align-top ">
                            <div class="md:relative" x-data="{dropdown: false}">
                                <button x-on:click="dropdown = !dropdown" class="btn-sm flex items-center hover:bg-black/5">
                                    <i class="ri-more-2-line ri-xl"></i>
                                </button>
                                <div x-show="dropdown" x-on:click.outside="dropdown = false" class="z-10 absolute right-4 md:right-0 flex flex-col rounded border bg-white shadow-lg w-32">
                                    <!-- Publish -->
                                    <form action="/posts/{{$post->id}}/publish" method="post">
                                        @method('put')
                                        @csrf
                                        <button class="w-full text-left py-2 px-4 text-sm hover:bg-primary/10" onclick="return confirm('Are you sure?')">Publish</button>
                                    </form>
                                    <!-- Reject -->
                                    <form action="/posts/{{$post->id}}/reject" method="post">
                                        @method('put')
                                        @csrf
                                        <button class="w-full text-left py-2 px-4 text-sm hover:bg-primary/10" onclick="return confirm('Are you sure?')">Reject</button>
                                    </form>
                                    <hr>
                                    <!-- Edit -->
                                    <a href="/posts/{{$post->id}}/edit" class="py-2 px-4 text-sm hover:bg-primary/10">Edit</a>
                                    <!-- Delete -->
                                    <form action="/posts/{{$post->id}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="w-full text-left py-2 px-4 text-sm hover:bg-red-700/10 text-red-700" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection