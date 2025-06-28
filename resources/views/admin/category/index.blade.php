<x-admin.master title="blogsite">
    <x-admin.header heading="Category" />

    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <button class="m-0 btn btn-sm btn-primary openModal" data-title="Add Category"
                data-url="{{ route('category.create') }}" data-toggle="modal">ADD CATEGORY</button>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <table class="table" id="dataTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!$categories->isEmpty())
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->title }}</td>
                                <td><img src="{{ asset('storage/' . $category->image) }}" alt="no-image" class="w-40"
                                        height="40px"></td>
                                <td><span
                                        class="{{ $category->status == 'active' ? 'text-success' : 'text-danger' }}">{{ ucwords($category->status) }}</span>
                                </td>
                                <td><button class="btn btn-primary openModal" data-title="Edit Category"
                                        data-url="{{ route('category.edit', $category->id) }}"><i
                                            class="fa fa-edit"></i></button> <button
                                        class="btn btn-danger deleteHandler"
                                        data-url="{{ route('category.destroy', $category->id) }}"><i
                                            class="fa fa-trash"></i></button></td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center"><span class="text-secondary">No records found</span>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    @push('script')
        <script>
            $(document).on('click', '#addCategory', function(e) {
                let data = new FormData($('#addCategoryForm')[0]);
                data.append('title', $('#title').val());
                data.append('image', $('#image')[0].files[0]);
                data.append('status', $('#status').val());
                $("[name]").removeClass("is-invalid");
                $(".error-message").text("");

                $.ajax({
                    type: 'post',
                    url: "{{ route('category.store') }}",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        toastr.success(response.success);
                        $("#addCategoryForm")[0].reset();
                        $("#exampleModal").modal("hide");
                        $("#dataTable").load(location.href + " #dataTable");
                    },
                    error: function(xhr) {
                        if (xhr.status == 422) {
                            let errors = xhr.responseJSON.errors;
                            $.each(errors, function(field, message) {
                                let input = $('[name="' + field + '"]');
                                input.addClass("is-invalid");
                                input
                                    .next(".error-message")
                                    .text(message[0]);
                            });
                        }
                    },
                });
            })

            $(document).on('click', '#editCategory', function(e) {
                let url = $(this).attr('data-url');
                let data = new FormData($('#editCategoryForm')[0]);
                if ($('#image').val() != '') {
                    data.append('image', $('#image')[0].files[0]);
                }
                data.append('_method', 'PUT')
                data.append('title', $('#title').val());
                data.append('status', $('#status').val());
                $("[name]").removeClass("is-invalid");
                $(".error-message").text("");

                $.ajax({
                    type: 'post',
                    url: url,
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        toastr.success(response.success);
                        $("#editCategoryForm")[0].reset();
                        $("#exampleModal").modal("hide");
                        $("#dataTable").load(location.href + " #dataTable");
                    },
                    error: function(xhr) {
                        if (xhr.status == 422) {
                            let errors = xhr.responseJSON.errors;
                            $.each(errors, function(field, message) {
                                let input = $('[name="' + field + '"]');
                                input.addClass("is-invalid");
                                input
                                    .next(".error-message")
                                    .text(message[0]);
                            });
                        }
                    },
                });
            })
        </script>
    @endpush
</x-admin.master>
