@props(['comment'])
<div class="mb-2">
    <div class="card border-0 rounded">
        <div class="card-body">
            <p class="fw-bold card-title m-0"><img src="{{ asset('frontend/assets/img/user.png') }}"
                    height="35px">{{ ucwords($comment->user->name) }} <small class="text-secondary float-end fs-6"><i
                        class="fa fa-clock fa-sm"></i> {{ $comment->created_at->diffForHumans() }}</small></p>
            <p class="card-text m-1">{{ $comment->comment }}</p>
            @auth
                <form action="{{ route('comment') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <input type="text" name="comment" placeholder="Reply" class="form-control rounded">
                            @error('comment')
                                <p class="text-danger mt-0"><small>{{ $message }}</small></p>
                            @enderror
                            <input type="hidden" name="post_id" value="{{ $comment->post_id }}">
                            <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary btn-sm">Reply</button>
                        </div>
                    </div>
                </form>
            @endauth
        </div>
        @if (!$comment->replies->isEmpty())
            @foreach ($comment->replies as $reply)
                <div class="card-body">
                    <p class="fw-bold card-title m-0"><img src="{{ asset('frontend/assets/img/user.png') }}"
                            height="35px">{{ ucwords($reply->user->name) . ' Replied to ' . ucwords($comment->user->name) }}
                        <small class="text-secondary float-end fs-6"><i class="fa fa-clock fa-sm"></i>
                            {{ $reply->created_at->diffForHumans() }}</small></p>
                    <p class="card-text m-1">{{ $reply->comment }}</p>
                    @auth
                        <form action="{{ route('comment') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <input type="text" name="comment" placeholder="Reply" class="form-control rounded">
                                    @error('comment')
                                        <p class="text-danger mt-0"><small>{{ $message }}</small></p>
                                    @enderror
                                    <input type="hidden" name="post_id" value="{{ $reply->post_id }}">
                                    <input type="hidden" name="parent_id" value="{{ $reply->id }}">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary btn-sm">Reply</button>
                                </div>
                            </div>
                        </form>
                    @endauth
                </div>
            @endforeach
        @endif
    </div>
</div>
