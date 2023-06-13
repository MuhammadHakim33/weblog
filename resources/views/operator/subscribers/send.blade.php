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
            <h2>Email</h2>
        </div>
    </header>

    <!-- Card Form -->
    <form action="/subscribers" method="post" enctype="multipart/form-data" class="bg-white mx-4 my-8 p-4 max-w-[400px] border rounded-sm space-y-4">
        @csrf
        <div>
            <label for="subject">subject</label>
            <input type="text" name="subject" id="subject" class="form-input w-full" value="{{ old('subject') }}">
            @error('subject')
            <small class="block mt-2 text-danger">{{$subject}}</small>
            @enderror
        </div>
        <div>
            <label for="message">Message</label>
            <textarea type="text" name="message" id="message" class="form-input w-full" value="{{ old('message') }}" rows="10"></textarea>
            @error('message')
            <small class="block mt-2 text-danger">{{$message}}</small>
            @enderror
        </div>
        <div>
            <label for="email">Send to</label>
            <select class="form-select w-full" name="receiver">
                <option selected value="all">All</option>
            </select>
            @error('email')
            <small class="block mt-2 text-danger">{{$message}}</small>
            @enderror
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Send</button>
        </div>
    </form>
</main>

@endsection