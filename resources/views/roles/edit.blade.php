@extends('dashboard')
@section('dashboard')
<div class="card mb-5">
    <div class="card-header">
      Add Role
    </div>
    <div class="card-body">
            <div class="row">
              <div class="col-5">
                <input readonly type="text" value="{{ $role->name }}" class="form-control">
              </div>
              <div class="col-5">
                <input readonly type="text" value="{{ $role->persian_name }}" class="form-control">
              </div>
            </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
      Roles List
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('dashboard.role.update' , $role) }}">
            @csrf
            <h5>Add permission to user</h5>

            <div class="dropdown-divider"></div>

            @forelse ($permissions as $permission)
            <div class="form-group form-check form-check-inline mb-5">
                <input type="checkbox" class="form-check-input" {{ $role->permissions->contains($permission)? 'checked' : '' }} name="permissions[]" value="{{ $permission->name }}" id="{{ 'permission' . $permission->id }}">
                <label class="form-check-label">{{ $permission->name }}</label>
            </div>
            @empty

            @endforelse
              <button type="submit" class="btn btn-primary d-block ">Submit</button>
        </form>
    </div>
</div>
@endsection
