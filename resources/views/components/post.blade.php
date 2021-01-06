@props(['post' => $post])
<div class="mb-3">
    <a href="{{ route('users.post',$post->user) }}" class="h5 text-dark mr-1"><strong>{{ $post->user->name }}</strong></a> <span class="text-muted">{{ $post->created_at->diffForHumans() }}</span>
    <p class="mb-2 pl-3">{{ $post->body }}</p>

    @can('delete',$post)
        <form action="{{ route('posts.destroy',$post) }}" method="post" class="ml-2">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn p-0 text-primary">Delete</button>
        </form>
    @endcan

    <div class="d-flex">
        @auth
            @if (!$post->likedBy(auth()->user()))
                <form action="{{ route('posts.likes',$post) }}" method="post" class="ml-2">
                    @csrf
                    <button type="submit" class="btn p-0 text-primary">Like</button>
                </form>
            @else
                <form action="{{ route('posts.likes',$post) }}" method="post" class=" ml-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn p-0 text-primary">UnLike</button>
                </form>
            @endif
        @endauth
        <span class="ml-2">{{ $post->likes->count() }} {{ \Illuminate\Support\Str::plural('like', $post->likes->count()) }}</span>
    </div>
</div>
