@extends('admin.layout')

@section('title', 'Posts')

@section('action')
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Create New Post</button>
        </div>
    </div>
@endsection

@section('content')
    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead>
                <tr class="table-dark">
                    <th scope="col">Title</th>
                    <th scope="col">Published</th>
                    <th scope="col" style="width: 20%;">-</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><h6 class="mb-0">Lorem ipsum dolor sit amet.</h6></td>
                    <td><p class="mb-0">12/12/12</p></td>
                    <td>
                        <form class="btn-group btn-group-sm" role="group" aria-label="Button">
                            <button type="button" class="btn btn-primary">Edit</button>
                            <button type="button" class="btn btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection