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
            <h2>Authors</h2>
        </div>
        <a href="/authors/create" class="btn btn-outline-primary flex items-center">
            <i class="ri-add-line ri-xl md:mr-2"></i>
            <p class="hidden md:block">New author</p>
        </a>
    </header>
    <!-- Alert -->
    @if(session('status-success'))
    <div class="m-4 p-4 rounded alert-success">{{session('status-success')}}</div>
    @elseif(session('status-danger'))
    <div class="m-4 p-4 rounded alert-danger">{{session('status-danger')}}</div>
    @endif
    <div class="bg-white mx-4 my-8 border rounded-sm">
        <div class="p-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
            <h4>Authors <span class="opacity-60">({{$count}})</span></h4>
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
                        <th scope="col" class="py-3 px-4 border-y w-2/5">Name</th>
                        <th scope="col" class="py-3 px-4 border-y">Joined</th>
                        <th scope="col" class="py-3 px-4 border-y">Posts</th>
                        <th scope="col" class="py-3 px-4 border-y w-28">Status</th>
                        <th scope="col" class="py-3 px-4 border-y w-12"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($authors as $author)
                    <tr>
                        <td class="border-y p-4 align-top flex gap-3">
                            <div>
                                <img src="{{$author->avatar}}" alt="" class="inline h-14 rounded-sm">
                            </div>
                            <div class="flex flex-col justify-center">
                                <a href="/authors/{{$author->slug}}" class="hover:underline hover:text-primary">
                                    {{$author->name}}
                                </a>
                                <small class="text-black/60">{{$author->email}}</small>
                            </div>
                        </td>
                        <td class="border-y p-4 align-top">
                            <p>{{$author->created_at}}</p>
                            <small class="text-black/60">Added</small>
                        </td>
                        <td class="border-y p-4 align-top capitalize">{{$author->post_count}}</td>
                        <td class="border-y p-4 align-top">
                            @if($author->userRole->status === 1)
                            <span class="badge badge-success capitalize">active</span>
                            @else
                            <span class="badge badge-danger capitalize">inactive</span>
                            @endif
                        </td>
                        <td class="border-y p-4 align-top ">
                            <div class="md:relative" x-data="{dropdown: false}">
                                <button x-on:click="dropdown = !dropdown" class="btn-sm flex items-center hover:bg-black/5">
                                    <i class="ri-more-2-line ri-xl"></i>
                                </button>
                                <div x-show="dropdown" x-on:click.outside="dropdown = false" class="z-10 absolute right-4 md:right-0 flex flex-col rounded border bg-white shadow-lg w-32">
                                    <!-- disabled -->
                                    @if($author->userRole->status === 1)
                                    <form action="/authors/{{$author->id}}/disabled" method="post">
                                        @method('put')
                                        @csrf
                                        <button class="w-full text-left py-2 px-4 text-sm hover:bg-primary/10" onclick="return confirm('Are you sure?')">Disabled</button>
                                    </form>
                                    <!-- activated -->
                                    @else
                                    <form action="/authors/{{$author->id}}/activated" method="post">
                                        @method('put')
                                        @csrf
                                        <button class="w-full text-left py-2 px-4 text-sm hover:bg-primary/10" onclick="return confirm('Are you sure?')">Activated</button>
                                    </form>
                                    @endif
                                    <!-- Delete -->
                                    <form action="/authors/{{$author->id}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="w-full text-left py-2 px-4 text-sm hover:bg-red-700/10 text-red-700" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="p-4"><p class="w-fit mx-auto italic text-black/60">empty</p></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection