@section('title', $title)
<div>
  <div class="row mt-5">
    <div class="col-12 col-xl-8">
      @if ($showSavedAlert)
        <div class="alert alert-success" role="alert">
          Saved!
        </div>
      @endif
      <div class="card card-body mb-4 border-0 shadow">
        <form wire:submit.prevent="save">

          <div class="row">
            <div class="col-md-6 mb-3">
              <div>
                <label for="first_name">First Name</label>
                <input wire:model="user.first_name" class="form-control" id="first_name" type="text" placeholder="Enter your first name" required>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <div>
                <label for="last_name">Last Name</label>
                <input wire:model="user.last_name" class="form-control" id="last_name" type="text" placeholder="Also your last name">
              </div>
            </div>
          </div>

          <div class="row align-items-center">
            <div class="col-md-6 mb-3">
              <div class="form-group">
                <label for="email">Email</label>
                <input wire:model="user.email" class="form-control" id="email" type="email" placeholder="name@company.com">
              </div>
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6 mb-3">
              <label for="gender">Gender</label>
              <select wire:model="user.gender" class="form-select mb-0" id="gender">
                @php
                  $arr = ['Male', 'Female'];
                @endphp
                <option value>Select Gender</option>
                @foreach ($arr as $key => $value)
                  <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
              </select>
              @error('user.gender')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="row">
            <div class="col-sm-9 mb-3">
              <div class="form-group">
                <label for="address">Address</label>
                <input wire:model="user.address" class="form-control" id="address" type="text" placeholder="Enter your home address">
              </div>
              @error('user.address')
                <div class="invalid-feedback">{{ $message }}
                </div>
              @enderror
            </div>

            <div class="col-sm-3 mb-3">
              <div class="form-group">
                <label for="number">Number</label>
                <input wire:model="user.number" class="form-control" id="number" type="tel" placeholder="phone number">
              </div>
              @error('user.number')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="mt-3">
            <button type="submit" class="btn btn-gray-800 animate-up-2 mt-2">Save
              All</button>
          </div>
        </form>
      </div>
    </div>

    <div class="col-12 col-xl-4">
      <div class="row">
        <div class="col-12 mb-4">
          <div class="card border-0 p-0 text-center shadow">
            <div wire:ignore.self class="profile-cover rounded-top" data-background="../assets/img/profile-cover.jpg"></div>
            <div class="card-body pb-5">
              <img class="avatar-xl rounded-circle mt-n7 mx-auto mb-4"
                src="https://ui-avatars.com/api/?background=random&name={{ $user->first_name
                    ? $user->full_name
                    : "
                                                                                                User Name" }}"
                alt="{{ $user->first_name
                    ? $user->full_name
                    : "
                                                                                                User Name" }}">
              <h4 class="h3">
                {{ $user->first_name ? $user->full_name : 'User Name' }}
              </h4>
              @if ($user->is_admin)
                <h5 class="fw-normal">System Admin</h5>
              @else
                <h5 class="fw-normal">{{ $user->job->title }}</h5>
                <p class="text-gray mb-4">{{ $user->address }}</p>
              @endif
          
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
