@props(['comments'])
<div class="mb-2" id="comment-card">
    <div class="card border-0 rounded">
        @if (count((array) $comments))
            @foreach ($comments as $comment)
                <x-frontend.posts.comment-card id="{{ $comment->id }}" userId="{{ $comment->user_id }}"
                    username="{{ $comment->user->name }}" timestamp="{{ $comment->created_at->diffForHumans() }}"
                    comment="{{ $comment->comment }}" postId="{{ $comment->post_id }}" parentId="{{ $comment->id }}"
                    repliedTo=""
                    createdAt="{{ $comment->created_at }}" />
                <x-frontend.posts.child-comment :comments="$comment->replies" :repliedTo="$comment->user->name" />
            @endforeach
        @endif
    </div>
</div>
