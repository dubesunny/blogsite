@php
    use Carbon\Carbon;
@endphp
<div class="card-body">
    <p class="fw-bold card-title m-0"><img src="{{ asset('frontend/assets/img/user.png') }}"
            height="35px">{{ ucwords($username) }}{{ $repliedTo == '' ? '' : ' To ' . ucwords($repliedTo) }}<small
            class="text-secondary float-end fs-6"><i class="fa fa-clock fa-sm"></i> {{ $timestamp }}
        </small>
    </p>
    <p class="card-text m-1" id="oldcomment" data-id="{{ $id }}">{{ $comment }}</p>
    <input type="text" name="comment" class="form-control editCommentBox rounded d-none mt-2"
        value="{{ $comment }}" data-url="{{ route('comment.update', $id) }}" data-id="{{ $id }}">
    <div class="m-1 d-flex gap-2">
        <a role="button" class="fs-6 text-primary replyBtn" data-id="{{ $id }}">Reply</a>
        @if ($userId == auth()->user()->id)
            @if(Carbon::parse($createdAt)->diffInMinutes(now()) <= 30)
                <a role="button" class="fs-6 text-primary editBtn" data-id="{{ $id }}">Edit</a>
            @endif
            <a role="button" class="fs-6 text-primary deleteBtn"
                data-url="{{ route('comment.destroy', $id) }}">Delete</a>
        @endif
    </div>
    @auth
        <form class="d-none" data-id="{{ $id }}" id="replyForm">
            <div class="row">
                <div class="col">
                    <input type="text" name="comment" data-id="{{ $id }}" placeholder="Reply"
                        class="form-control reply rounded">
                    <p class="text-danger reply-error m-1 fs-6" data-id="{{ $id }}"></p>
                    <input type="hidden" name="post_id" value="{{ $postId }}" data-id="{{ $id }}"
                        class="postId">
                    <input type="hidden" name="parent_id" value="{{ $parentId }}" data-id="{{ $id }}"
                        class="parentId">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary btn-sm" data-id="{{ $id }}"
                        id="addReply">Reply</button>
                </div>
            </div>
        </form>
    @endauth

</div>
