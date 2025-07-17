<x-frontend.master>
    <x-frontend.navbar />
    <x-frontend.banner />
    <div class="container">
        <div class="my-3">
            <h3 class="text-center">Categories</h3>
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ $category->image }}" alt="No Image" class="card-img image-resize">
                            <div class="card-img-overlay align-content-xl-end text-center">
                                <a href="" class="btn btn-success">{{ ucwords($category->title) }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="my-5">
            <h3 class="mb-3">Latest Post</h3>
            <div class="card rounded">
                <div class="row g-0">
                    <div class="col">
                        <img src="{{ $posts[0]->image }}" class="w-100 img-fluid" alt="">
                    </div>
                    <div class="col">
                        <div class="card-body">
                            <h4 class="card-title"><a href="">{{ $posts[0]->title }}</a></h4>
                            <p class="card-text">{!! $posts[0]->excerpt !!}</p>
                            @foreach ($posts[0]->categories as $category)
                                <span class="badge rounded-pill bg-success">{{ ucwords($category->title) }}</span>
                            @endforeach
                            <p class="card-text">
                                <small class="text-secondary float-end"><i>Posted By <a href=""
                                            style="text-decoration: none">{{ $posts[0]->user->name }}</a>
                                        {{ $posts[0]->created_at->diffForHumans() }}</i></small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-3">
            <h3 class="text-center mb-3">All Posts</h3>
            <div class="row">
                @foreach ($posts->skip(1) as $post)
                    <x-frontend.posts.card title="{{ $post->title }}" excerpt="{{ $post->excerpt }}" image="{{ $post->image }}" author="{{ $post->user->name }}" timestamp="{{ $post->created_at->diffForHumans() }}" />
                @endforeach
            </div>
        </div>
    </div>
</x-frontend.master>
