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
            <h2>Categories</h2>
        </div>
        <a href="/categories/create" class="btn btn-outline-primary flex items-center">
            <i class="ri-add-line ri-xl md:mr-2"></i>
            <p class="hidden md:block">Create Category</p>
        </a>
    </header>
    <!-- Alert -->
    @if(session('status-success'))
    <div class="m-4 p-4 rounded alert-success">{{session('status-success')}}</div>
    @elseif(session('status-danger'))
    <div class="m-4 p-4 rounded alert-danger">{{session('status-danger')}}</div>
    @endif
    <!-- Table -->
    <div class="bg-white mx-4 my-8 border rounded-sm">
        <div class="p-4">
            <h4>All Category <span class="opacity-60">(xx)</span></h4>
        </div>
        <div class="overflow-auto md:overflow-visible">
            <table class="w-full table-auto text-left ">
                <thead class="uppercase border-y bg-black/5 text-black/60">
                    <tr>
                        <th scope="col" class="py-3 px-4 border-y">Name</th>
                        <th scope="col" class="py-3 px-4 border-y w-3/4">Description</th>
                        <th scope="col" class="py-3 px-4 border-y w-12"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td class="border-y p-4 align-top capitalize">{{ $category->name }}</td>
                        <td class="border-y p-4 align-top">{{ $category->description }}</td>
                        <td class="border-y p-4 align-top ">
                            <div class="md:relative" x-data="{dropdown: false}">
                                <button x-on:click="dropdown = !dropdown" class="btn-sm flex items-center hover:bg-black/5">
                                    <i class="ri-more-2-line ri-xl"></i>
                                </button>
                                <div x-show="dropdown" x-on:click.outside="dropdown = false" class="z-10 absolute right-4 md:right-0 flex flex-col rounded border bg-white shadow-lg w-32">
                                    <!-- Edit -->
                                    <a href="/categories/{{$category->id}}/edit" class="py-2 px-4 text-sm hover:bg-primary/10">Edit</a>
                                    <!-- Delete -->
                                    <form action="/categories/{{$category->id}}" method="post">
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