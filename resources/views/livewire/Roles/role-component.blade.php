<!-- resources/views/livewire/permissions/permission-table.blade.php -->
<!-- resources/views/livewire/permissions/permission-table.blade.php -->


<div>

    @livewire('partials.navbar')


    <div class="container-fluid ">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
                @livewire('partials.sidebar')
            </div>

            <!-- Main Content Area -->
            <div class="col-md-9  ">

<div class="container">
    <div class="card-header">
       <h3> Roles</h3>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                @if ($successMessage)
                    <h4 class="alert alert-danger">{{$successMessage}}</h4>
                @endif
                <tr>
                    <th>#</th>
                    <th>Role Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($roles as $role)
                <tr>
                    <td>{{$role->id}}</td>
                    <td>{{$role->name}}</td>
                    <td>
                        <a class="btn btn-secondary btn-sm" href="#" wire:navigate>View</a>
                        <a class="btn btn-dark btn-sm" href="{{ route('roles.edit', $role->id) }}" wire:navigate>
                            Edit
                        </a>
                        <a class="btn btn-primary btn-sm" href="{{ route('roles.permission', $role->id) }}" wire:navigate>
                            Add/Edit Role Permission</a>

                        <a wire:click='delete({{$role->id}})' class="btn btn-danger btn-sm">Delete</a>
                        @empty
                        <h4 > No Roles add yet</h4>
                    </td>

                </tr>

                @endforelse
            </tbody>
        </table>
        <a href="{{ route('roles.create') }}" wire:navigate class="btn btn-primary">Create Role</a>
</div>

            </div>
        </div>
    </div>
</div>
</div>













