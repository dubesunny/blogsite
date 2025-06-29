<x-admin.master title="blogsite">
    <x-admin.header heading="User" />

    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <button class="m-0 btn btn-primary openModal" data-title="Add User" data-url="{{ route('user.create') }}"
                data-toggle="modal">ADD USER</button>
            <div class="fload-end">
                <select class="form-control select2 filter" data-url="{{route('userfilter')}}">
                    <option value="">Select Status</option>
                    <option value="active">Active</option>
                    <option value="inactive">InActive</option>
                </select>
                <button class="btn btn-danger btnClear d-none">Clear</button>
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
           @include('admin.user.table')
        </div>
    </div>
</x-admin.master>
