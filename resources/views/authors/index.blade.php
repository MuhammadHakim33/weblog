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
    <!-- Table -->
    <div class="bg-white mx-4 my-8 border rounded-sm">
        <livewire:author-table />
    </div>
</main>
@endsection