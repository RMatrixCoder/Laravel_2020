@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-center mt-3">
    <div class="col-md-6 bg-light p-3 rounded pl-4">
        <form action="{{ route('dashboard.user.update', $user) }}" method="post">
            @csrf


            <h5>Add role to user</h5>
            <div class="dropdown-divider"></div>
            @forelse ($roles as $role)
            <div class="form-group form-check form-check-inline mb-5">
                <input type="checkbox" class="form-check-input" {{ $user->roles->contains($role)? 'checked' : '' }} name="roles[]" value="{{ $role->name }}" id="{{ 'role' . $role->id }}">
                <label class="form-check-label">{{  $role->name }}</label>
            </div>
            @empty
            <div class="alert alert-danger">there is no role for this user</div>
            @endforelse




            <h5>Add permission to user</h5>
            <div class="dropdown-divider"></div>
            @forelse ($permissions as $permission)
            <div class="form-group form-check form-check-inline mb-5">
                <input type="checkbox" class="form-check-input" {{ $user->permissions->contains($permission)? 'checked' : '' }} name="permissions[]" value="{{ $permission->name }}" id="{{ 'permission' . $permission->id }}">
                <label class="form-check-label">{{ $permission->name }}</label>
            </div>
            @empty

            @endforelse
              <button type="submit" class="btn btn-primary d-block ">Submit</button>
        </form>
    </div>
</div>
@endsection
