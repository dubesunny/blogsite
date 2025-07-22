@props(['comments', 'repliedTo'])
@if (count((array) $comments))
    @foreach ($comments as $comment)
        <li style="list-style: none">
            <x-frontend.posts.comment-card id="{{ $comment->id }}" userId="{{ $comment->user->id }}"
                username="{{ $comment->user->name }}" timestamp="{{ $comment->created_at->diffForHumans() }}"
                comment="{{ $comment->comment }}" postId="{{ $comment->post_id }}" parentId="{{ $comment->id }}"
                repliedTo="{{ $repliedTo }}" user_id="{{ $comment->user_id }}"
                createdAt="{{ $comment->created_at }}" />
        </li>
        @if (count((array) $comment->replies))
            <ul>
                <x-frontend.posts.child-comment :comments="$comment->replies" :repliedTo="$comment->user->name" />
            </ul>
        @endif
    @endforeach
@endif
