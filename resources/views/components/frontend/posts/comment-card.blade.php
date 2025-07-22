@php
    use Carbon\Carbon;
@endphp
<div class="card-body p-1">
    <p class="card-title m-0" style="font-size: 16px;font-weight:bold;"><img src="{{ asset('frontend/assets/img/user.png') }}"
            height="35px">{{ ucwords($username) }}{{ $repliedTo == '' ? '' : ' To ' . ucwords($repliedTo) }}<small
            class="text-secondary float-end"><i class="fa fa-clock fa-sm"></i> {{ $timestamp }}
        </small>
    </p>
    <p class="card-text m-1 oldComment" data-id="{{ $id }}" style="font-size: 14px;">{{ $comment }}</p>
    @if (Carbon::parse($createdAt)->diffInMinutes(now()) <= 30)
        <input type="text" name="comment" class="form-control editCommentBox rounded d-none mt-2"
            value="{{ $comment }}" data-url="{{ route('comment.update', $id) }}" data-id="{{ $id }}">
    @endif
    @auth
        <div class="m-1 d-flex gap-2">
            <a role="button" class="text-primary replyBtn" data-id="{{ $id }}" style="font-size: 14px;">Reply</a>
            @if ($userId == auth()->user()?->id)
                @if (Carbon::parse($createdAt)->diffInMinutes(now()) <= 30)
                    <a role="button" class="text-primary editBtn" data-id="{{ $id }}" style="font-size: 14px;">Edit</a>
                @endif
                <a role="button" class="text-primary deleteBtn"
                    data-url="{{ route('comment.destroy', $id) }}" style="font-size: 14px;">Delete</a>
            @endif
        </div>
        <form class="d-none replyForm" data-id="{{ $id }}">
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
    </div>
@endauth
