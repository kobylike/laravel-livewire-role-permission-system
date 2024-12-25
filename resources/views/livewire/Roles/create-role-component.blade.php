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
       <h3>Create Role</h3>
    </div>
    <div class="card-body">
        <form wire:submit.prevent ='save'>
            <div class="form-group">
                <label for="permissionName">Role Name</label>
                <input type="text" wire:model='name' class="form-control" id="permissionName" placeholder="Enter Role Name">
                @error('name')
                    <p class="alert alert-danger">{{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create Role</button>
        </form>

        @if ($successMessage)
            <p class="alert alert-success">{{$successMessage}}</p>
        @endif
</div>

            </div>
        </div>
    </div>
</div>
</div>






















