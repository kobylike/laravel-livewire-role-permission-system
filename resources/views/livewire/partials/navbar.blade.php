<div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('dashboard') }}">Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto"> <!-- 'me-auto' ensures the links are aligned to the left -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('permissions.index') }}" wire:navigate>Permissions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('roles.index') }}" wire:navigate>Roles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.index') }}" wire:navigate>Users</a>
                    </li>
                </ul>



                <!-- Profile Dropdown (Add this to the right side) -->
                {{-- <ul class="navbar-nav ms-auto"> --}}
                    <li class="navbar-nav dropdown ms-auto">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          {{-- @foreach ($users->roles as $role )
                          {{$role->name}} : {{$users->name}}
                          @endforeach --}}

                          {{Auth::user()->name}}

                          {{-- <div>
                            {{Auth::user()->email}}
                            </div> --}}

                        </a>


                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li class="nav-item">
                                <a class="dropdown-item" href="">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="dropdown-item" href="#" wire:click="logout">Logout</a>

                            </li>
                        </ul>
                    </li>

            </div>
        </div>
    </nav>
</div>
