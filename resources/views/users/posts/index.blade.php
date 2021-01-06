
@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center mt-3">
        <div class="col-md-8 ">
            <div class="p-3">
                <h1 class="text-light"><strong>{{ $user->name }}</strong></h1>
                <h4 class="text-light">Posted {{ $posts->count() }} {{ \Illuminate\Support\Str::plural('post',$posts->count()) }} and recieved {{ $user->recievedLikes->count() }} likes</h4>
            </div>
            <div class="bg-white p-3 rounded">
                @if ($posts->count())
                    @foreach ($posts as $post)
                        <x-post :post="$post"/>
                    @endforeach
                    {{ $posts->links('pagination') }}
                @else
                    <div class="alert alert-info">{{ $user-name }} does not have any posts.</div>
                @endif
            </div>
        </div>
    </div>
@endsection
