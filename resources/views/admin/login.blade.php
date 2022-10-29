@include('components.head')

<div id="section-register" class="container py-5">
    <div class="card">
        <div class="card-header">
            <strong>Login</strong>
        </div>
        <div class="card-body">
            <form action="/admin/login" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="input-email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="input-email" required>
                </div>
                <div class="mb-3">
                    <label for="input-password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="input-password" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>

@include('components.footer')