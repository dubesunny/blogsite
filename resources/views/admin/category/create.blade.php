<form id="addCategoryForm" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title" class="form-label">Title <span class="text-danger">
            </span></label>
        <input type="text" name="title" id="title" class="form-control">
        <p class="error-message text-danger"></p>
    </div>
    <div class="form-group">
        <label for="image" class="form-label">Image <span class="text-danger">
            </span></label>
        <input type="file" name="image" id="image" class="form-control">
        <p class="error-message text-danger"></p>
    </div>
    <div class="form-group">
        <label for="status" class="form-label">Status <span class="text-danger">
            </span></label>
        <select name="status" id="status" class="form-control">
            <option value="">Select Status</option>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>
         <p class="error-message text-danger"></p>
    </div>
    <div class="mt-1">
        <input type="button" class="btn btn-primary" value="ADD" id="addCategory">
    </div>
</form>
