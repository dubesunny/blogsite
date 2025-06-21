<form id="form">
    <div class="row mb-1">
        <div class="col">
            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
            <input type="text" name="name" id="name" placeholder="Name" class="form-control">
            <p class="error-message text-danger"></p>
        </div>
        <div class="col">
            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
            <input type="email" name="email" id="email" placeholder="Email" class="form-control">
            <p class="error-message text-danger"></p>
        </div>
    </div>
    <div class="row mb-1">
        <div class="col">
            <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
            <input type="number" name="phone" id="phone" placeholder="Phone Number" class="form-control">
            <p class="error-message text-danger"></p>
        </div>
        <div class="col">
            <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
            <select name="status" id="status" class="form-control">
                <option value="">Select Status</option>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
            <p class="error-message text-danger"></p>
        </div>
    </div>
    <div class="row mb-1">
        <div class="col">
            <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
            <input type="password" name="password" id="password" placeholder="Password" class="form-control">
            <p class="error-message text-danger"></p>
        </div>
        <div class="col">
            <label for="password_confirmation" class="form-label">Confirm Password <span
                    class="text-danger">*</span></label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                placeholder="Confirm Password" class="form-control">
            <p class="error-message text-danger"></p>
        </div>
    </div>
    <div class="mt-1">
        <input type="button" class="btn btn-primary formHandler" value="ADD" data-type="post"
            data-url="{{ route('user.store') }}">
    </div>

</form>
