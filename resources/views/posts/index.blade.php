@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center mt-3">
        <div class="col-md-8 bg-white p-4 rounded">
            <form action="{{ route('posts') }}" method="post" class="mb-3">
                @csrf
                <div class="form-group">
                    <textarea type="text" name="body" class="form-control bg-light @error('body') border-danger @enderror" rows="5"  placeholder="post something!"></textarea>
                    @error('body')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-3">Post</button>
            </form>

            @if ($posts->count())
                @foreach ($posts as $post)
                    <x-post :post="$post"/>
                @endforeach
                {{ $posts->links('pagination') }}
            @else
                <div class="alert alert-info">There is no more post.</div>
            @endif
        </div>
    </div>
@endsection
