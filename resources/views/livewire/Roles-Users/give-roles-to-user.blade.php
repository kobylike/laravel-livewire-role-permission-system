
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

                    <div class="card-header">
                        <h3>Assign Role to User: {{$user->name}}</h3>
                    </div>
                    <div class="card-body">

@if (Session::has('success'))

<p class="alert alert-success">{{Session::get('success')}}</p>
@elseif (Session::has('error'))

<p class="alert alert-danger">{{Session::get('error')}}</p>
@endif

<form wire:submit.prevent = 'giveRoleToUser'>
<h5>Selected Roles</h5>

    @foreach ( $roles as $role )


    <div>
        <label>

            <input type="checkbox" wire:model='selectedRoles' value="{{$role->id}}">
            {{$role->name}}
        </label>

    </div>
    @endforeach

    <button type="submit" class="btn btn-primary">Update Role</button>
</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
