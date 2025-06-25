<form id="editCategoryForm" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title" class="form-label">Title <span class="text-danger">
            </span></label>
        <input type="text" name="title" id="title" class="form-control" value="{{ $category->title }}">
        <p class="error-message text-danger"></p>
    </div>
    <div class="form-group">
        <label for="image" class="form-label">Image <span class="text-danger">
            </span></label>
        <input type="file" name="image" id="image" class="form-control" value="{{ $category->image }}">
        <p class="error-message text-danger"></p>
    </div>
    <div class="form-group">
        <label for="status" class="form-label">Status <span class="text-danger">
            </span></label>
        <select name="status" id="status" class="form-control">
            <option value="">Select Status</option>
            <option value="active" {{ $category->status == 'active' ?'selected':'' }}>Active</option>
            <option value="inactive" {{ $category->status == 'inactive' ? 'selected':'' }}>Inactive</option>
        </select>
         <p class="error-message text-danger"></p>
    </div>
    <div class="mt-1">
        <input type="button" class="btn btn-primary" value="Update" id="editCategory" data-url="{{ route('category.update',$category->id) }}">
    </div>
</form>
