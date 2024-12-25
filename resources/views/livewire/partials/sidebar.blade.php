<div>
    <!-- Sidebar -->
    <div class="d-flex flex-column p-3 bg-light" style="width: 250px; position: fixed; height: 100vh;">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{route('roles.create')}}" wire:navigate>Create Role</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" wire:navigate href="{{route('permissions.create')}}">Create Permission</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" wire:navigate href="{{route('user.create')}}">Create User</a>
            </li>
        </ul>
    </div>
</div>
