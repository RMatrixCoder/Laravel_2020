@extends('dashboard')
@section('dashboard')
<div class="card">
    <div class="card-header">
      Users
    </div>
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Roles</th>
                <th scope="col">Operatin</th>
              </tr>
            </thead>
            <tbody>
                @forelse ( $users as $user )
                <tr>
                    <th class="col-3">{{ $user->name }}</th>
                    <td class="col-5">{{ $user->email }}</td>
                    <td class="col-2">
                        @forelse ($user->roles as $role)
                            <span class="badge badge-primary">{{ $role->name }}</span>
                        @empty
                            <span class="bagde badge-danger">No role</span>
                        @endforelse
                    </td>
                    <td class="col-2"><a href="{{ route('dashboard.user.edit', $user) }}">Edit</a></td>
                  </tr>
                @empty
                    <div class="alert alert-danger">there is no user</div>
                @endforelse
            </tbody>
          </table>
    </div>
</div>
@endsection
