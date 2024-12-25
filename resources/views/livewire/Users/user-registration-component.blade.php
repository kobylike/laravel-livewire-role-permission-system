<div class="container-fluid">
    <div class="row">

<div class="card text-left  offset-3 col-6">
    <div class="card-body">
    <form wire:submit.prevent='save'>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" wire:model.live='name' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('name')
            <p class="alert alert-danger">{{$message}}</p>
        @enderror
          </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" wire:model.live='email' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password Confirmation</label>
            <input type="password" wire:model='password_confirmation' class="form-control" id="exampleInputPassword1">
            @error('password_confirmation')
            <p class="alert alert-danger">{{$message}}</p>
        @enderror
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Phone </label>
            <input type="tel" wire:model.live='phone' class="form-control" id="exampleInputPassword1">
            @error('phone')
                <p class="alert alert-danger">{{$message}}</p>
            @enderror
          </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <p class="mb-5 pb-lg-2" style="color: #393f81;">Already have an account? <a wire:navigate href="{{route('login')}}"
            style="color: #393f81;">Login here</a></p>
      </form>
      <div>
        @if ($successMessage)
            <p class="alert alert-success">{{$successMessage}}</p>
        @endif

        @if ($errorMessage)
            <p class="alert alert-success">{{$errorMessage}}</p>
        @endif
      </div>
    </div>
</div>
    </div></div>
