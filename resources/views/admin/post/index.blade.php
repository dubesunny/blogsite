<x-admin.master title="blogsite">
    <x-admin.header heading="Post" />

    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <a href="{{ route('post.create') }}" class="m-0 btn btn-primary">ADD POST</a>
            <div class="fload-end">
                <select class="form-control select2 filter" data-url="{{ route('postfilter') }}">
                    <option value="">Select Status</option>
                    <option value="draft">Draft</option>
                    <option value="published">Published</option>
                    <option value="unpublished">UnPublished</option>
                </select>
                <button class="btn btn-danger btnClear d-none">Clear</button>
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            @include('admin.post.table')
        </div>
    </div>
</x-admin.master>
