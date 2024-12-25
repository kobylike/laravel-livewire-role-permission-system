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
       <h3> Permissions</h3>
    </div>
    <div class="card-body">
        <a href="{{ route('permissions.create') }}"  wire:navigate class="btn btn-primary ">Create Permission</a>
    <table class="table">
        <thead>
            @if ($successMessage)
                <h4 class="alert alert-danger">{{$successMessage}}</h4>
            @endif
            <tr>
                <th>#</th>
                <th>Permission Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($permissions as $permission )
            <tr>
                <td>{{$permission->id}}</td>
                <td>{{$permission->name}}</td>
                <td>
                    <a class="btn btn-secondary btn-sm" href="#" wire:navigate>View</a>
                    <a class="btn btn-primary btn-sm" href="{{ route('permissions.edit', $permission->id) }}" wire:navigate> Edit</a>

                    <a wire:click='delete({{$permission->id}})' class="btn btn-danger btn-sm">Delete</a>
                    @empty
                    <h4> No Permission add yet</h4>
                </td>

            </tr>

            @endforelse
        </tbody>
    </table>

</div>

            </div>
        </div>
    </div>
</div>
</div>





