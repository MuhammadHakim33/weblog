@extends('operator.layout')

@section('content')
<div class="container-fluid mt-4 px-4">
    <!-- Header -->
    <header class="d-flex justify-content-between align-items-center mb-5">
        <h2 class="mb-0">Posts</h2>
        <div class="d-flex">
            <button type="button" class="btn btn-outline-dark me-2">Draf</button>
            <a type="button" href="/posts/create" class="btn btn-dark d-flex">
                <i class="ri-add-line ri-lg align-self-center me-1"></i>Create Post
            </a>
        </div>
    </header>

    <!-- Card Table -->
    <div class="card">
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
                <table class="table table-hover">
                    <thead>
                        <tr class="table-dark">
                            <th scope="col" style="width: 2%;"><input class="form-check-input" type="checkbox" value="" id="id"></th>
                            <th scope="col">Title</th>
                            <th scope="col">Date</th>
                            <th scope="col" style="width: 15%;">Status</th>
                            <th scope="col" style="width: 15%;"></th> <!-- Action Heading -->
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input class="form-check-input" type="checkbox" value="" id="id">
                            </td>
                            <td>
                                <h6 class="mb-0 fw-semibold">Bus Listrik Inka Siap Jadi Kendaraan Operasional KTT G20.</h6>
                            </td>
                            <td>
                                <p class="mb-0 fw-semibold">2 November 2022</p>
                                <p><small>Added</small></p>
                            </td>
                            <td>
                                <span class="badge text-bg-success">Published</span>
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group" aria-label="Button">
                                    <a type="button" class="btn btn-outline-dark" href="">Edit</a>
                                    <button type="button" class="btn btn-outline-dark">Delete</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection