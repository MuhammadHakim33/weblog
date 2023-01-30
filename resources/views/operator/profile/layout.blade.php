@extends('operator.layout')

@section('sidebar')
    @include('operator.partials.sidebar')
@endsection

@section('content')
<main class="md:ml-60 pb-20">
    <!-- Header -->
    <header class="px-4 pt-4 bg-white border-b space-y-2">
        <div class="flex items-center gap-1">
            <button x-on:click="sidebar = true" class="md:hidden btn flex items-center"><i class="ri-menu-line ri-xl"></i></button>
            <h2>Profile</h2>
        </div>
        <nav class="flex gap-5">
            <a href="/profile" class="nav-link">General</a>
            <a href="/profile/change-password" class="nav-link">Password</a>
        </nav>
    </header>
    <!-- Alert -->
    @if(session('status-success'))
    <div class="max-w-[500px] m-4 p-4 rounded alert-success">{{session('status-success')}}</div>
    @elseif(session('status-danger'))
    <div class="max-w-[500px] m-4 p-4 rounded alert-danger">{{session('status-danger')}}</div>
    @endif
    <!-- Main -->
    <div class="bg-white max-w-[500px] mx-4 my-8 border rounded-sm">
        @yield('form')
    </div>
</main>
@endsection