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
            <h2>Subscribers</h2>
        </div>
        <a href="/subscribers/email" class="btn btn-outline-primary flex items-center">
            <i class="ri-mail-add-line ri-xl md:mr-2"></i>
            <p class="hidden md:block">Send Email</p>
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
            <h4>Subscribers <span class="opacity-60">({{$count}})</span></h4>
            <div class="flex gap-3 items-center">
                <input type="text" name="" class="form-input w-full sm:w-52 mt-0" placeholder="Search">
            </div>
        </div>
        <div class="overflow-auto md:overflow-visible">
            <table class="w-full table-auto text-left ">
                <thead class="uppercase border-y bg-black/5 text-black/60">
                    <tr>
                        <th scope="col" class="py-3 px-4 border-y">Name</th>
                        <th scope="col" class="py-3 px-4 border-y">Joined</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($subscribers as $author)
                    <tr>
                        <td class="border-y p-4 align-top flex gap-3">
                            <div>
                                <img src="{{$author->avatar}}" alt="" class="inline h-14 rounded-sm">
                            </div>
                            <div class="flex flex-col justify-center">
                                <p>{{$author->name}}</p>
                                <small class="text-black/60">{{$author->email}}</small>
                            </div>
                        </td>
                        <td class="border-y p-4 align-top">
                            <p>{{$author->created_at}}</p>
                            <small class="text-black/60">Added</small>
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