<div>
    <div class="card offset-3 col-6">
        <div class="card-header">
         Login
        </div>
        <div class="card-body">
            <form wire:submit.prevent ='login'>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email address</label>
                  <input type="email" wire:model.live ='email' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('email')
                        <p class="alert alert-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" wire:model='password' class="form-control" id="exampleInputPassword1">
                  @error('password')
                  <p class="alert alert-danger">{{$message}}</p>
              @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
              </form>

              <div>
                @if ($errorMessage)
                    <p class="alert alert-danger">{{$errorMessage}}</p>
                @endif
              </div>
        </div>
      </div>
</div>


{{-- $user = User::create([
    'name' => 'John Doe',  // Replace with the desired name
    'email' => 'kobylike2@gmail.com',  // Replace with the desired email
    'password' => Hash::make('1111111111'),  // Replace with the desired password
]); --}}
