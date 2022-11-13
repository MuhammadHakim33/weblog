@include('operator.partials.head')

<div id="auth" class="container py-5">
    <div class="card">
        <div class="card-header">
            <strong>
                @yield('header')
            </strong>
        </div>
        <div class="card-body">
            @yield('form')
        </div>
    </div>
</div>

@include('operator.partials.footer')