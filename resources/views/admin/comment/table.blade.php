@php
    use Carbon\Carbon;
@endphp
<table class="table" id="dataTable">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">User</th>
            <th scope="col">Comment</th>
            <th scope="col">Status</th>
            <th scope="col">Created At</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @if (!$comments->isEmpty())
            @foreach ($comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{ucwords($comment->user->name)}}</td>
                    <td>{{$comment->comment}}</td>
                    <td>
                        <select name="status" id="status" class="form-control changeStatus" data-id="{{ $comment->id }}">
                            <option value="approved" {{ $comment->status == 'approved' ? 'selected':'' }}>Approved</option>
                            <option value="declined" {{ $comment->status == 'declined' ? 'selected':'' }}>Declined</option>
                        </select>
                    </td>
                    <td>{{ Carbon::parse($comment->created_at)->toDateTimeString()}}</td>
                    <td><i role="button" class="fa fa-trash fa-lg  text-danger deleteHandler"
                            data-url="{{ route('comment.destroy',$comment->id) }}"></i></td>
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
