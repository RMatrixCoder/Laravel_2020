@extends('dashboard')
@section('dashboard')
<div class="card">
    <div class="card-header">
      Send Email
    </div>
    <div class="card-body">
        <form action="{{ route('dashboard.send.email') }}" method="POST">
            @csrf
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('fail'))
                <div class="alert alert-danger">{{ session('fail') }}</div>
            @endif
            <div class="form-group">
              <label for="user">Users</label>
              <select name="user" class="form-control @error('user') border-danger @enderror" >
                  @foreach ($users as $user)
                      <option value="{{ $user->id }}">{{ $user->name }}</option>
                  @endforeach
              </select>
              @error('user')
              <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="email_type">Email Type</label>
              <select name="email_type" class="form-control @error('email_type') border-danger @enderror">
                @foreach ($emailTypes as $key=> $type)
                <option value="{{ $key }}">{{ $type }}</option>
            @endforeach
              </select>
              @error('email_type')
              <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary float-right pr-3 pl-3">Send</button>
          </form>
    </div>
</div>
@endsection
