@include('components.head')

<div id="section-register" class="container py-5">
    <div class="card">
        <div class="card-header">
            <strong>Register</strong>
        </div>
        <div class="card-body">
            <form action="/admin/register" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="input-name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="input-name" aria-describedby="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="input-email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="input-email" value="{{ old('email') }}">
                    @error('email')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="input-password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="input-password">
                    @error('password')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
</div>

@include('components.footer')