<x-admin.master title="blogsite">
    <x-admin.header heading="Post" />

    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <a href="{{ route('post.create') }}" class="m-0 btn btn-sm btn-primary">ADD POST</a>
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
                        <th scope="col">Created By</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!$posts->isEmpty())
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td><img src="{{ $post->image }}" alt="no-image" class="w-40" height="40px"></td>
                                <td>{{ ucwords($post->status) }}</td>
                                <td>{{ ucwords($post->user->name) }}</td>
                                <td><a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary"><i
                                            class="fa fa-edit"></i></a> <button class="btn btn-danger deleteHandler"
                                        data-url="{{ route('post.destroy', $post->id) }}"><i
                                            class="fa fa-trash"></i></button></td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="text-center"><span class="text-secondary">No records found</span>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-admin.master>
