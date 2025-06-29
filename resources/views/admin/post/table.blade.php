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
                    <td><span
                            class="{{ $post->status == 'draft' ? 'badge badge-info' : ($post->status == 'published' ? 'badge badge-success' : 'badge badge-danger') }}">{{ ucwords($post->status) }}</span>
                    </td>
                    <td>{{ ucwords($post->user->name) }}</td>
                    <td><a href="{{ route('post.edit', $post->id) }}" class="mx-2"><i
                                class="fa fa-edit fa-lg"></i></a>
                        <i role="button" class="fa fa-trash fa-lg  text-danger deleteHandler"
                            data-url="{{ route('post.destroy', $post->id) }}"></i>
                    </td>
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
