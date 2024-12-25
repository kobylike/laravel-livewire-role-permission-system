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
       <h3> Users</h3>
    </div>
    <div class="card-body">

    <table class="table">
        <thead>
            @if ($successMessage)
                <h4 class="alert alert-danger">{{$successMessage}}</h4>
            @endif
            <tr>
                <th>#</th>
                <th> Names</th>
                <th>Email</th>
                <th> Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>

                {{-- this is to ensure that in case role is not assigned properly even tho users are set to default user --}}

                @if ($user->roles->isNotEmpty())
                <td>

                    {{$user->roles->pluck('name')->join(', ')}}
                    @else
                    No roles assigned
                @endif

                </td>

                <td>
                    <a class="btn btn-secondary btn-sm" href="#" wire:navigate>View</a>
                    <a class="btn btn-dark btn-sm" href="{{route('user.roles',$user->id)}}" wire:navigate>
                         Assign Role to User</a>
                    </a>

                    {{-- @hasanyrole('Admin|Super Admin')
                        @can('Delete User') --}}
                    <a wire:click='delete({{$user->id}})' class="btn btn-danger btn-sm">Delete</a>

                    {{-- @endcan
                    @endhasanyrole --}}
                    @empty
                    <h4 > No Users add yet</h4>
                </td>

            </tr>

            @endforelse
        </tbody>
    </table>
    <a href="{{ route('user.create') }}" wire:navigate class="btn btn-primary">Create User</a>
</div>
<div class="mt-3">
    {{-- {{ $users->links() }} --}}
</div>
            </div>
        </div>
    </div>
</div>
</div>





































