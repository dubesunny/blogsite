<x-admin.master title="blogsite">
    <x-admin.header heading="Post" />

    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">ADD POST</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mb-2">
                    <div class="col">
                        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title"  placeholder="Title" class="form-control">
                        @error('title')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="user_id" class="form-label">User <span class="text-danger">*</span></label>
                        <select name="user_id" id="user_id" class="form-control">
                            <option value="">Select User</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ ucwords($user->name) }}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <label for="category_id" class="form-label">Category <span class="text-danger">*</span></label>
                        <select name="category_id[]" id="category_id" class="form-control select2" multiple>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ ucwords($category->title) }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <select name="status" id="status" class="form-control select2">
                            <option value="">Select Status</option>
                            <option value="draft" selected>Draft</option>
                            <option value="published">Published</option>
                            <option value="unpublished">UnPublished</option>
                        </select>
                        @error('status')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mb-2">
                    <label for="excerpt" class="form-label">Excerpt <span class="text-danger">*</span></label>
                    <input type="text" name="excerpt" id="excerpt"  placeholder="Excerpt" class="form-control">
                    @error('excerpt')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                    <textarea name="description" id="description" placeholder="Description" class="form-control summernote"></textarea>
                    @error('description')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="image" class="form-label">Image <span class="test-dnager">*</span></label>
                    <input type="file" name="image" id="image" class="form-control dropify">
                    @error('image')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <input type="submit" value="ADD" class="btn btn-primary">
            </form>
        </div>
    </div>
</x-admin.master>
