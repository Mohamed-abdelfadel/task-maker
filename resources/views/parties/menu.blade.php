<div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary h-100" style="width:100%;">
    <div class="d-flex align-items-center">
        <a href="{{ route('dashboard') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            <img src="{{asset('../storage/uploads/logo/logo.png')}}" width="180px">
        </a>
        <i class="fa-solid fa-bars fs-5 " style="cursor:pointer"></i>

    </div>

    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item ">
            <a href="{{ route('dashboard') }}" class="nav-link text-dark @if(request()->route()->getName() == 'dashboard') text-white text-bg-dark @endif" aria-current="page">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                Dashboard
            </a>
        </li>
        <li>
            <div class="nav-link link-body-emphasis">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed " data-bs-toggle="collapse" data-bs-target="#users-collapse" aria-expanded="true">
                    Users
                </button>
                <div class="collapse show" id="users-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li>
                            <a href="{{ route('users.index') }}" class="link-body-emphasis d-inline-flex rounded text-decoration-none
            @if(request()->route()->getName() == 'users.index') text-white text-bg-dark @endif">
                                View
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('users.create') }}" class="link-body-emphasis d-inline-flex rounded text-decoration-none
            @if(request()->route()->getName() == 'users.create') text-white text-bg-dark  @endif">
                                Create
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </li>
        <li>
            <div class="nav-link link-body-emphasis">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed " data-bs-toggle="collapse" data-bs-target="#tasks-collapse" aria-expanded="true">
                    Tasks
                </button>
                <div class="collapse show" id="tasks-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li>
                            <a href="{{ route('tasks.index') }}" class="link-body-emphasis d-inline-flex rounded text-decoration-none
            @if(request()->route()->getName() == 'tasks.index') text-white text-bg-dark @endif">
                                View
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('tasks.create') }}" class="link-body-emphasis d-inline-flex rounded text-decoration-none
            @if(request()->route()->getName() == 'tasks.create') text-white text-bg-dark  @endif">
                                Create
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </li>
    </ul>

    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{asset('../storage/uploads/avatar/avatar.png')}}" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong>Super Admin</strong>
        </a>
        <ul class="dropdown-menu text-small shadow">
            <li><a class="dropdown-item" href="{{route('soon')}}">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
        </ul>
    </div>
</div>

<div class="d-flex flex-column flex-shrink-0 bg-body-tertiary h-100 d-none" style="width: 4.5rem;">
    <a href="/" class="d-block p-3 link-body-emphasis text-decoration-none" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Icon-only">
        <svg class="bi pe-none" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="visually-hidden">Icon-only</span>
    </a>
    <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
        <li class="nav-item">
            <a href="#" class="nav-link active py-3 border-bottom rounded-0" aria-current="page" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Home" data-bs-original-title="Home">
                <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Home"><use xlink:href="#home"></use></svg>
            </a>
        </li>
        <li>
            <a href="#" class="nav-link py-3 border-bottom rounded-0" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Dashboard" data-bs-original-title="Dashboard">
                <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Dashboard"><use xlink:href="#speedometer2"></use></svg>
            </a>
        </li>
        <li>
            <a href="#" class="nav-link py-3 border-bottom rounded-0" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Orders" data-bs-original-title="Orders">
                <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Orders"><use xlink:href="#table"></use></svg>
            </a>
        </li>
        <li>
            <a href="#" class="nav-link py-3 border-bottom rounded-0" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Products" data-bs-original-title="Products">
                <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Products"><use xlink:href="#grid"></use></svg>
            </a>
        </li>
        <li>
            <a href="#" class="nav-link py-3 border-bottom rounded-0" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Customers" data-bs-original-title="Customers">
                <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Customers"><use xlink:href="#people-circle"></use></svg>
            </a>
        </li>
    </ul>
    <div class="dropdown border-top">
        <a href="#" class="d-flex align-items-center justify-content-center p-3 link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="mdo" width="24" height="24" class="rounded-circle">
        </a>


        <ul class="dropdown-menu text-small shadow">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
        </ul>
    </div>
</div>
