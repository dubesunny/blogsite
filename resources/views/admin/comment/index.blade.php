<x-admin.master title="blogsite">
    <x-admin.header heading="Comments" />

    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <div class="col"></div>
            <div class="fload-end">
                <select class="form-control select2 filter" data-url="{{ route('commentfilter') }}">
                    <option value="">Select Status</option>
                    <option value="approved">Approved</option>
                    <option value="declined">Declined</option>
                </select>
                <button class="btn btn-danger btnClear d-none">Clear</button>
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            @include('admin.comment.table')
        </div>
    </div>
    @push('script')
        <script>
            $(document).on('change','.changeStatus',function(){
                let status = $(this).val()
                let id = $(this).attr('data-id');
                $.ajax({
                    type:"POST",
                    url:"{{ route('commentupdateStatus') }}",
                    data:{
                        'id':id,
                        'status':status,
                    },
                    success: function(response){
                       toastr.success(response.success)
                    }
                })
            })
        </script>
    @endpush
</x-admin.master>
