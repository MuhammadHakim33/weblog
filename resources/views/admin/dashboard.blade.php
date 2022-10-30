@include('components.head')

    @include('components.navbar')

    <div class="container-fluid">
        <div class="row">
            
            @include('components.sidebar')

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Add Article</button>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        @include('components.card_article')
                    </div>
                </div>
            </main>
        </div>
    </div>

@include('components.footer')