@extends('layout')

@section('sidebar')
    @include('partials.sidebar')
@endsection

@section('content')
<!-- Main -->
<main class="md:ml-60 pb-20">
    <!-- Header -->
    <header class="flex px-4 py-4 justify-between items-center bg-white border-b">
        <div class="flex items-center gap-1">
            <button x-on:click="sidebar = true" class="md:hidden btn flex items-center"><i class="ri-menu-line ri-xl"></i></button>
            <h2>Comments</h2>
        </div>
    </header>
    <!-- Table -->
    <div class="bg-white mx-4 my-8 border rounded-sm">
        <livewire:comment-table />
    </div>
</main>
@endsection