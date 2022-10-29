@include('components.head')

<div id="section-register" class="container py-5">
    <div class="card">
        <div class="card-header">
            <strong>Login</strong>
        </div>
        <div class="card-body">
            <form action="/admin/login" method="POST">
                @csrf
                <!-- Alert for successful registration -->
                @if(session('registration-sucess'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('registration-sucess') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <!-- Alert for failed login -->
                @if(session('login-failed'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('login-failed') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
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
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>

@include('components.footer')