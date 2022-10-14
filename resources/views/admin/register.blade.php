@include('template.head')

<div id="section-register" class="container py-5">
    <div class="card">
        <div class="card-body">
            <form>
                <div class="mb-3">
                    <label for="input-name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="admin_name" id="input-name" aria-describedby="name">
                </div>
                <div class="mb-3">
                    <label for="input-email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="admin_email" id="input-email">
                </div>
                <div class="mb-3">
                    <label for="input-username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="admin_username" id="input-username">
                </div>
                <div class="mb-3">
                    <label for="input-password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="admin_password" id="input-password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@include('template.footer')