@props(['comments'])

@if (count((array) $comments))
    <div class="card border-0 rounded">
        @foreach ($comments as $comment)
            <x-frontend.posts.comment-card id="{{ $comment->id }}" userId="{{ $comment->user_id }}"
                username="{{ $comment->user->name }}" timestamp="{{ $comment->created_at->diffForHumans() }}"
                comment="{{ $comment->comment }}" postId="{{ $comment->post_id }}" parentId="{{ $comment->id }}"
                repliedTo="" createdAt="{{ $comment->created_at }}" />
            <ul>
                <x-frontend.posts.child-comment :comments="$comment->replies" :repliedTo="$comment->user->name" />
            </ul>
        @endforeach
    </div>
@endif
