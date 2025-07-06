<div class="m-2">
    <img src="{{ $post->image }}" alt="post" class="w-100">
    <div class="mt-1">
        <label class="form-label">Status : </label>
        <span
            class="{{ $post->status == 'draft' ? 'badge badge-info' : ($post->status == 'published' ? 'badge badge-success' : 'badge badge-danger') }}">{{ ucwords($post->status) }}</span>
    </div>
    <div>
        <label class="form-label">Categories : </label>
        @foreach ($post->categories as $category)
            <span>{{ $category->title }}</span>
        @endforeach
    </div>
    <div>
        <p>Created By : {{ $post->user?->name }}</p>
    </div>
    <div>
        <label class="form-label">Excerpt : </label>
        <p>{{ $post->excerpt }}</p>
    </div>
    <div>
        <label class="form-label">Description : </label>
        <p>{!! $post->description !!}</p>
    </div>
</div>
