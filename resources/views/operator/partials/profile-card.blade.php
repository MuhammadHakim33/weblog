<div class="card bg-transparent border-start-0 border-end-0 ">
    <div class="card-body d-flex px-0">
        <!-- Picture -->
        <div class="profile-picture me-2">
            <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="Profile Picture" height="40">
        </div>
        <!-- info -->
        <div class="profile-info">
            <h6 class="card-title mb-0 text-capitalize">{{auth()->user()->name}}</h6>
            <p class="card-text text-black-50 text-capitalize"><small>{{auth()->user()->role}}</small></p>
        </div>
    </div>
</div>