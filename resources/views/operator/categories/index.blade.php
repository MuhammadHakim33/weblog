@extends('operator.layout')

@section('content')
<div id="post" class="container-fluid mt-4 px-4">
    <!-- Header -->
    <header class="d-flex justify-content-between align-items-center mb-5">
        <h2 class="mb-0">Categories</h2>
        <a type="button" href="/categories/create" class="btn btn-dark d-flex">
            <i class="ri-add-line ri-lg align-self-center me-1"></i>Create Category
        </a>
    </header>

    <!-- Alert when new categories created -->
    @if(session('alert'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('alert')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- Card Table -->
    <div class="card" >
        <div class="card-body">
            <!-- Filter & Search -->
            <div class="preference mb-4 d-flex justify-content-between align-items-center">
                <div class="dropdown me-2">
                    <a class="btn btn-sm btn-outline-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Filter</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Newest</a></li>
                    </ul>
                </div>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                </form>
            </div>
            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr class="table-dark">
                            <th scope="col" style="width: 2%;"><input class="form-check-input" type="checkbox" value="" id="id"></th>
                            <th scope="col" style="width: 20%;">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col" style="width: 10%;"></th> <!-- Action Heading -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>
                                <input class="form-check-input" type="checkbox" value="" id="id">
                            </td>
                            <td>
                                <h6 class="mb-0">{{$category->name}}</h6>
                            </td>
                            <td>
                                <p class="mb-0 fw-semibold">{{$category->description}}</p>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-outline-secondary dropdown-toggle btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu">
                                        </li>
                                        <!-- Edit -->
                                        <li>
                                            <a class="dropdown-item" href="/categories/{{$category->id}}/edit">Edit</a>
                                        </li>
                                        <!-- Delete -->
                                        <li>
                                            <form action="/categories/{{$category->id}}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button class="dropdown-item" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>    
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection