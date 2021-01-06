
@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center mt-3 mb-3">
        <div class="col-md-6 bg-white p-3 rounded flex-column d-flex">
            @if (session('status'))
                <div class="alert alert-danger pl-5 pr-5 text-center">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('login') }}" method="post" class="pl-5 pr-5">
                @csrf
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
                <div class="form-check">
                    <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-3">Login</button>
            </form>
        </div>
    </div>
@endsection
