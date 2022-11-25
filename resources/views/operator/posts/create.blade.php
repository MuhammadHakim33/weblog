@include('operator.partials.head')

    <form class="container py-5" id="create-post" action="/create-post" method="POST"  enctype="multipart/form-data">
        @csrf
        <!-- Header -->
        <header class="d-flex justify-content-between align-items-center">
            <div id="left-side" class="d-flex">
                <a type="button" href="/posts" class="btn btn-outline-dark d-flex">
                    <i class="ri-arrow-left-line ri-lg align-self-center me-1"></i>Back
                </a>
            </div>
            <div id="right-side" class="d-flex">
                <button type="button" class="btn btn-outline-dark me-2">Draf</button>
                <button type="submit" class="btn btn-dark d-flex">Submit for review</button>
            </div>
        </header>

        <hr class="my-5">

        <!-- Form editor -->
        <main>
            <!-- Thumbnail -->
            <div class="mb-4">
                <label for="thumbnail" class="label-thumbnail d-flex flex-column justify-content-center align-items-center btn bg-white border border-dark border-opacity-25">
                    <h6 class="d-flex align-items-center"><i class="ri-upload-2-line me-2"></i>Thumbnail</h6>
                    <small class="mb-0">png jpg jpeg max 2MB</small>
                </label>
                <input class="form-control" name="thumbnail" type="file" id="thumbnail" accept=".jpg, .jpeg, .png">
                @error('thumbnail')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <!-- Title -->
            <div class="mb-4">
                <textarea id="title" class="form-control" name="title" placeholder="Title">{{ old('title') }}</textarea>
                @error('title')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <!-- Category -->
            <div class="mb-4">
                <select id="categotry" class="form-select" name="categotry" value="{{ old('categotry') }}">
                    <option selected value="">Categotry</option>
                    <option value="Sport">Sport</option>
                    <option value="Technology">Technology</option>
                </select>
                @error('categotry')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <!-- Body -->
            <div class="mb-4 bg-white">
                <textarea id="summernote" name="body">{{ old('body') }}</textarea>
                @error('body')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
        </main>
    </form>

@include('operator.partials.footer')