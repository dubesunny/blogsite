<x-frontend.master>
    <x-frontend.navbar class="bg-success" id="" height="30px" />
    <div class="container py-5">
        <h3>{{ ucwords($post->title) }}</h3>
        <div class="row">
            <div class="col-md-7">
                <img src="{{ $post->image }}" alt="post-image" class="w-100">
                <small class="text-secondary float-end mt-2"><i>Posted By <a href=""
                            style="text-decoration: none">{{ $post->user->name }}</a>
                        {{ $post->created_at->diffForHumans() }}</i></small>
                <div class="py-2">
                    @foreach ($post->categories as $category)
                        <a href="{{ route('categories', $category->slug) }}"><span
                                class="badge rounded-pill bg-success">{{ ucwords($category->title) }}</span></a>
                    @endforeach
                </div>
                <hr>
                <div class="my-4">
                    @auth
                        <form action="{{ route('comment') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <textarea name="comment" id="comment" cols="30" rows="5" placeholder="Leave Comment ..." class="form-control rounded"></textarea>
                                @error('comment')
                                    <p class="text-danger mt-0"><small>{{ $message }}</small></p>
                                @enderror
                            </div>
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary float-end">Submit</button>
                            </div>
                        </form>
                    @else
                        <p>Login to leave a comment</p>
                    @endauth
                </div>
                <div class="py-5">
                    <h4 class="mb-2">Comments</h4>
                    @foreach ($comments as $comment)
                        <x-frontend.posts.comment :comment="$comment" />
                    @endforeach
                </div>
            </div>
            <div class="col-md-5">
                <p class="fw-bold mt-0">{!! $post->excerpt !!}</p>
                <p>{!! $post->description !!}</p>
            </div>
        </div>
    </div>
    </div>
</x-frontend.master>
