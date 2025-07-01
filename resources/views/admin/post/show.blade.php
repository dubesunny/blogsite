<div class="m-2">
    <label class="form-label">Image</label>
    <img src="{{ $post->image }}" alt="No Image" class="w-100">
    <div class="row mt-2">
        <div class="col">
            <label class="form-label">Title</label>
            <p>{{ $post->title }}</p>
        </div>
        <div class="col">
            <label class="form-label">Status</label>
            <br>
            <p class="badge badge-success">{{ ucwords($post->status) }}</p>
        </div>
    </div>
</div>
