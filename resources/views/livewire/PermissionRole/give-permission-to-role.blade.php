<div>
    @livewire('partials.navbar')

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
                @livewire('partials.sidebar')
            </div>

            <!-- Main Content Area -->
            <div class="col-md-9">
                <div class="container">
                    <div class="card-header">
                        <h3>Assign Permissions to Role: {{ $role->name }}</h3>
                    </div>

                    <div class="card-body">
                        <!-- Display flash messages for success or error -->
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @elseif(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <!-- Form to select permissions for the role -->
                        <form wire:submit.prevent="addPermissionToRole">
                            <div class="mb-3">
                                <h5>Select Permissions</h5>

                                <!-- Loop through available permissions and create checkboxes -->
                                @forelse($permissions as $permission)
                                    <div class="form-check">
                                        <input type="checkbox" wire:model="selectedPermissions" value="{{ $permission->id }}" class="form-check-input">
                                        <label class="form-check-label" for="permission{{ $permission->id }}">
                                            {{ $permission->name }}
                                        </label>
                                    </div>
                                @empty
                                    <p>No permissions available to assign.</p>
                                @endforelse
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary">Update Permissions</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
