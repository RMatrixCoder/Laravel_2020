@extends('layouts.app')
@section('content')
<div class="row p-5">

    <div class="col-4">
        <ul class="nav flex-column nav-pills nav-fill">
            <li class="nav-item bg-light m-1 rounded">
              <a class="nav-link" href="{{ route('dashboard') }}">SendEmail</a>
            </li>
            <li class="nav-item bg-light m-1 rounded">
              <a class="nav-link" href="{{ route('dashboard.users') }}">Users</a>
            </li>
            <li class="nav-item bg-light m-1 rounded" >
              <a class="nav-link" href="{{ route('dashboard.roles') }}">Roles</a>
            </li>
          </ul>
    </div>
    <div class="col-8">@yield('dashboard')</div>
</div>
@endsection
