<!-- resources/views/livewire/permissions/permission-table.blade.php -->

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
                        <h3>Users</h3>
                    </div>
                    <div class="card-body">

                        <table class="table">
                            <thead>
                                @if ($successMessage)
                                    <h4 class="alert alert-danger">{{ $successMessage }}</h4>
                                @endif
                                <tr>
                                    <th>#</th>
                                    <th>Names</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>

                                    {{-- Display roles, ensuring fallback when no roles are assigned --}}
                                    <td>
                                        @if ($user->roles->isNotEmpty())
                                            {{ $user->roles->pluck('name')->join(', ') }}
                                        @else
                                            No roles assigned
                                        @endif
                                    </td>

                                    <td>
                                        <a class="btn btn-secondary btn-sm" href="#" wire:navigate>View</a>
                                        <a class="btn btn-dark btn-sm" href="{{ route('user.roles', $user->id) }}" wire:navigate>
                                            Assign Role to User
                                        </a>

                                        {{-- Check if the current user can delete --}}
                                        @can('delete', $user)
                                            <a wire:click.prevent='delete({{ $user->id }})' class="btn btn-danger btn-sm">Delete</a>
                                        @endcan
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No users added yet.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <a href="{{ route('user.create') }}" wire:navigate class="btn btn-primary">Create User</a>
                    </div>

                    <div class="mt-3">
                        {{-- Pagination --}}
                        {{-- {{ $users->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
