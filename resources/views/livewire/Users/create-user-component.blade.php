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
                <div class="card-header">
                    Create User
                </div>
                <div class="card-body">
                    <form wire:submit.prevent='save'>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" wire:model.live='name' class="form-control" id="name">
                            @error('name')
                                <p class="alert alert-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" wire:model.live='email' class="form-control" id="email">
                            @error('email')
                                <p class="alert alert-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" wire:model='password' class="form-control" id="password">
                            @error('password')
                                <p class="alert alert-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Password Confirmation</label>
                            <input type="password" wire:model='password_confirmation' class="form-control" id="password_confirmation">
                            @error('password_confirmation')
                                <p class="alert alert-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3 col-6">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="tel" wire:model.live='phone' class="form-control" id="phone">
                            @error('phone')
                                <p class="alert alert-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-3 col-6">
                            <div>
                                <label>Roles:</label>
                                @foreach($roles as $role)
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="role{{ $role->id }}"
                                               wire:model="selectedRoles" value="{{ $role->id }}"
                                               {{ $role->name == 'Super Admin' ? 'disabled' : '' }}>
                                        <label for="role{{ $role->id }}" class="form-check-label">
                                            {{ $role->name }}
                                        </label>
                                    </div>
                                @endforeach
                                @error('selectedRoles') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>

                        @if (Session::has('success'))
                            <p class="alert alert-success">{{Session::get('success')}}</p>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
