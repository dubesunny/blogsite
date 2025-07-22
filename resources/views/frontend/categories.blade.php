<x-frontend.master>
    <x-frontend.navbar class="bg-success" id="" height="30px" />
    <div class="container my-5">
        <h3>{{ ucwords($category->title) }}</h3>
        @if (!$posts->isEmpty())
            <div class="row">
                @foreach ($posts as $post)
                    <x-frontend.posts.card title="{{ ucwords($post->title) }}" excerpt="{{ $post->short_excerpt }}"
                        image="{{ $post->image }}" author="{{ $post->user->name }}"
                        timestamp="{{ $post->created_at->diffForHumans() }}" href="{{ route('post.details',$post->slug) }}" :categories="$post->categories" />
                @endforeach
            </div>
        @else
            <div class="card rounded mt-3">
                <p class="text-secondary text-center">No Posts yet</p>
            </div>
        @endif
    </div>
</x-frontend.master>
