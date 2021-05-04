@extends('dashboard')
@section('dashboard')
<div class="card mb-5">
    <div class="card-header">
      Add Role
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('dashboard.role.store') }}">
            @csrf
            <div class="row">
              <div class="col-5">
                <input type="text" class="form-control @error('name') border-danger @enderror"" placeholder="Name" name="name">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-5">
                <input type="text" class="form-control @error('persian_name') border-danger @enderror"" placeholder="Persian name" name="persian_name">
                @error('persian_name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-2">
                <button type="submit" class="btn btn-primary btn-block">Add</button>
              </div>
            </div>
          </form>
    </div>
</div>

<div class="card">
    <div class="card-header">
      Roles List
    </div>
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Persian Name</th>
                <th scope="col">Operatin</th>
              </tr>
            </thead>
            <tbody>
                @forelse ( $roles as $role )
                <tr>
                    <th class="col-5">{{ $role->name }}</th>
                    <td class="col-5">{{ $role->persian_name }}</td>
                    <td class="col-2"><a href="{{ route('dashboard.role.edit', $role) }}">Edit</a></td>
                  </tr>
                @empty
                    <div class="alert alert-danger">there is no user</div>
                @endforelse
            </tbody>
          </table>
    </div>
</div>
@endsection
