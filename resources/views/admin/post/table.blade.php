<table class="table" id="dataTable">
    <thead>
        <tr>
            <th scope="col">#
                <span class="sort">
                    <i class="fa fa-sort-up sortHandle" role="button" data-field="id" data-order="asc"
                        data-url="{{ route('postsort') }}"></i>
                    <i class="fa fa-sort-down sortHandle" role="button" data-field="id" data-order="desc"
                        data-url="{{ route('postsort') }}"></i>
                </span>
            </th>
            <th scope="col">Title
                <span class="sort">
                    <i class="fa fa-sort-up sortHandle" role="button" data-field="title" data-order="asc"
                        data-url="{{ route('postsort') }}"></i>
                    <i class="fa fa-sort-down sortHandle" role="button" data-field="title" data-order="desc"
                        data-url="{{ route('postsort') }}"></i>
                </span>
            </th>
            <th scope="col">Image</th>
            <th scope="col">Status</th>
            <th scope="col">Categories</th>
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
                    <td>
                        @foreach ($post->categories as $category)
                            <span class="badge badge-success">{{ $category->title }}</span>
                        @endforeach
                    </td>
                    <td>{{ ucwords($post->user->name) }}</td>
                    <td><a href="{{ route('post.edit', $post->id) }}" class="mx-2"><i
                                class="fa fa-edit fa-lg"></i></a>
                        <i role="button" class="fa fa-trash fa-lg  text-danger deleteHandler"
                            data-url="{{ route('post.destroy', $post->id) }}"></i>
                        <i role="button" class="fa fa-eye fa-lg mx-2 text-dark openModal"
                            data-title="{{ ucwords($post->title) }}"
                            data-url="{{ route('post.show', $post->id) }}"></i>
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
