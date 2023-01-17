@extends('operator.layout')

@section('content')
<div id="post" class="container-fluid mt-4 px-4">
    <!-- Header -->
    <header class="d-flex justify-content-between align-items-center mb-5">
        <h2 class="mb-0">Create Categories</h2>
    </header>

    <!-- Card Form -->
    <div class="card">
        <div class="card-body">
            <form action="/categories" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Category Name">
                    @error('name')
                        <div class="form-text text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description (optional)</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-dark">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection