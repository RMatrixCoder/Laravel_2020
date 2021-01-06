@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center mt-3 mb-3">
        <div class="col-md-6 bg-white p-3 rounded justify-content-center d-flex">
            <form action="{{ route('register') }}" method="post" class="col-md-8 ">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control @error('name') border-danger @enderror " placeholder="Your name...." value="{{ old('name') }}">
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="UserName">Username</label>
                    <input type="text" name="username" class="form-control @error('username') border-danger @enderror" placeholder="Username" value="{{ old('username') }}">
                    @error('username')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control @error('email') border-danger @enderror" placeholder="Your Email" value="{{ old('email') }}">
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control @error('password') border-danger @enderror" placeholder="Your password">
                    @error('password')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Password Agian</label>
                    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') border-danger @enderror" placeholder="Your password again">
                    @error('password_confirmation')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
        </div>
    </div>
@endsection
