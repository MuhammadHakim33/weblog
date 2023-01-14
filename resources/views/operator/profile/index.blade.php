@extends('operator.layout')

@section('content')
<div class="container-fluid mt-4 px-4">
    <!-- Header -->
    <header class="container-fluid d-flex justify-content-between align-items-center">
        <h1 class="h2 mb-0">Personal Info</h1>
    </header>

    <!-- Main -->
    <div class="row mt-4">
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    <nav class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-my-details-tab" data-bs-toggle="tab" data-bs-target="#nav-my-details" type="button" role="tab" aria-controls="nav-my-details" aria-selected="true">My Details</button>
                        <button class="nav-link" id="nav-password-tab" data-bs-toggle="tab" data-bs-target="#nav-password" type="button" role="tab" aria-controls="nav-password" aria-selected="false">Password</button>
                    </nav>
                </div>
                <div class="card-body tab-content" id="nav-tabContent">
                    <!-- My Details Form -->
                    <div class="tab-pane fade show active" id="nav-my-details" role="tabpanel" aria-labelledby="nav-my-details-tab" tabindex="0">
                        <form action="" method="post">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <label for="input-name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="input-name" value="">
                            </div>
                            <div class="mb-3">
                                <label for="input-email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="input-email" value="">
                            </div>
                            <div class="mb-3">
                                <label for="input-telp" class="form-label">Telp</label>
                                <input type="text" class="form-control" name="telp" id="input-telp" value="">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Photo</label>
                                <div class="wrapper d-flex justify-content-between g-2">
                                    <img src="" alt="" srcset="" class="w-25 ratio ratio-1x1 img-thumbnail ">
                                    <label for="thumbnail" class="label-thumbnail d-flex flex-column justify-content-center align-items-center btn bg-white border border-dark border-opacity-25 w-100 ms-3">
                                        <h6 class="d-flex align-items-center"><i class="ri-upload-2-line me-2"></i>Upload Image</h6>
                                        <small class="mb-0">png jpg jpeg max 2MB</small>
                                    </label>
                                    <input class="form-control" name="thumbnail" type="file" id="thumbnail" accept=".jpg, .jpeg, .png">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="input-contact" class="form-label">Contact</label>
                                <input type="text" class="form-control mb-2" name="contact-facebook" id="input-contact" placeholder="Facebook" value="">
                                <input type="text" class="form-control mb-2" name="contact-twitter" id="input-contact" placeholder="Twitter" value="">
                                <input type="text" class="form-control" name="contact-linkedin" id="input-contact" placeholder="Linkedin" value="">
                            </div>
                            <div class="d-grid d-md-flex justify-content-md-end">
                                <button class="btn btn-dark">Save Changes</button>
                            </div>
                        </form>
                    </div>
                    <!-- Password Form -->
                    <div class="tab-pane fade" id="nav-password" role="tabpanel" aria-labelledby="nav-password-tab" tabindex="0">
                        <form action="" method="post">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <label for="input-old-password" class="form-label">Old Password</label>
                                <input type="password" class="form-control" name="old-password" id="input-name" value="">
                            </div>
                            <div class="mb-3">
                                <label for="input-new-password" class="form-label">New Password</label>
                                <input type="password" class="form-control" name="new-password" id="input-name" value="">
                            </div>
                            <div class="d-grid d-md-flex justify-content-md-end">
                                <button class="btn btn-dark">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection