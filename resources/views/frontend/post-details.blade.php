<x-frontend.master>
    <x-frontend.navbar class="bg-success" id="" height="30px" />
    <div class="container py-5">
        <div class="row">
            <div class="col-md-8" style="padding-right:20px; border-right: 1px solid black;">
                <h3>{{ ucwords($post->title) }}</h3>
                <img src="{{ $post->image }}" alt="post-image" class="w-100">
                <div class="flex">
                    <i role="button" class="fa fa-thumbs-up fa-sm reactBtn {{ $reaction === 1 ? 'text-success' : '' }}"
                        id="green" data-id="{{ $post->id }}"></i> <span id="likeCount"
                        class="fs-6">{{ $likeCount }}</span>
                    <i role="button"
                        class="fa fa-thumbs-down fa-sm reactBtn {{ $reaction === 0 ? 'text-danger' : '' }}"
                        id="red" data-id="{{ $post->id }}"></i> <span id="dislikeCount"
                        class="fs-6">{{ $dislikeCount }}</span>
                    <small class="text-secondary float-end mt-2"><i>Posted By {{ $post->user->name }}
                            {{ $post->created_at->diffForHumans() }}</i></small>
                </div>
                <div class="py-2">
                    @foreach ($post->categories as $category)
                        <a href="{{ route('categories', $category->slug) }}"><span
                                class="badge rounded-pill bg-success">{{ ucwords($category->title) }}</span></a>
                    @endforeach
                </div>
                <p class="fw-bold mt-0" style="text-align: justify;">{!! $post->excerpt !!}</p>
                <p style="text-align: justify; text-justify:inter-word;">{!! $post->description !!}</p>
                <hr>
                <div class="my-4">
                    @auth
                        <form action="{{ route('comment.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <textarea name="comment" id="comment" cols="30" rows="5" placeholder="Leave Comment ..."
                                    class="form-control rounded"></textarea>
                            </div>
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary float-end">Comment</button>
                            </div>
                        </form>
                    @else
                        <p>Login to leave a comment</p>
                    @endauth
                </div>
                <div class="py-5">
                    <h4 class="mb-2">Comments</h4>
                    @if (!$comments->isEmpty())
                        <x-frontend.posts.comment :comments="$comments" />
                    @else
                        <p class="text-secondary fs-6">No comments yet</p>
                    @endif
                </div>
            </div>
            <div class="col-md-4" style="padding-left:10px;">
                <h3 class="mb-2">Top liked Posts</h3>
                @foreach ($posts as $post)
                    <div class="card border-0">
                        <a href="{{ route('post.details',$post->slug) }}">
                            <img src="{{ $post->image }}" alt="No Image" class="card-img image-resize">
                            <p class="fw-bold mt-0" style="text-align: justify;">{!! $post->short_excerpt!!}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
    @push('script')
        <script>
            $(document).on('click', '.replyBtn', function(e) {
                e.preventDefault();
                let id = $(this).attr('data-id');
                $(`form[data-id="${id}"]`).removeClass('d-none');
                $(`.replyForm`).each(function(){
                    if($(this).data('id') != id){
                        $(this).addClass('d-none');
                    }
                })
                $('.editCommentBox').addClass('d-none');
                $('.oldComment').removeClass('d-none');
            })

            $(document).on('click', '#addReply', function(e) {
                e.preventDefault();
                let id = $(this).attr('data-id');
                if ($(`.reply[data-id="${id}"]`).val() == '') {
                    $(`.reply-error[data-id="${id}"]`).text('Please enter reply')
                } else {
                    let comment = $(`.reply[data-id="${id}"]`).val();
                    let post_id = $(`.postId[data-id="${id}"]`).val();
                    let parent_id = $(`.parentId[data-id="${id}"]`).val();
                    $.ajax({
                        type: "POST",
                        url: "{{ route('comment.store') }}",
                        data: {
                            'comment': comment,
                            'post_id': post_id,
                            'parent_id': parent_id,
                        },
                        success: function(response) {
                            toastr.success(response.success);
                            $(`.reply[data-id="${id}"]`).val('');
                            $(`form[data-id="${id}"]`).addClass('d-none');
                            $('#comment-card').load(location.href + " #comment-card");
                        }
                    })
                }
            })

            $(document).on('click', '.editBtn', function(e) {
                e.preventDefault();
                let id = $(this).attr('data-id');
                $(`.editCommentBox[data-id="${id}"]`).removeClass('d-none')
                $(`.oldComment[data-id="${id}"]`).addClass('d-none');
                 $(`.editCommentBox`).each(function(){
                    if($(this).data('id') != id){
                        $(this).addClass('d-none');
                    }
                })
                $(`.oldComment`).each(function(){
                      if($(this).data('id') != id){
                        $(this).removeClass('d-none');
                    }
                })
                $(`.replyForm`).addClass('d-none');
            })

            $(document).on('keypress', '.editCommentBox', function(e) {
                let url = $(this).attr('data-url');
                let comment = $(this).val();
                if (comment == '') {
                    toastr.error('Please enter comment');
                } else {
                    if (e.which == '13') {
                        $.ajax({
                            type: 'PUT',
                            url: url,
                            data: {
                                'comment': comment,
                            },
                            success: function(response) {
                                toastr.success(response.success);
                                $(this).addClass('d-none')
                                $('#comment-card').load(location.href + " #comment-card");
                            }
                        })
                    }
                }
            })

            $(document).on('click', '.deleteBtn', function() {
                let url = $(this).attr('data-url');
                $.ajax({
                    type: 'DELETE',
                    url: url,
                    success: function(response) {
                        toastr.success(response.success);
                        $('#comment-card').load(location.href + " #comment-card");
                    }
                })
            })

            $(document).on('click', '.reactBtn', function() {
                let post_id = $(this).attr('data-id');
                let reaction = null;
                if ($(this).attr('id') == 'green') {
                    if (!$(this).hasClass('text-success')) {
                        reaction = 1;
                        $(this).addClass('text-success');
                        $('.reactBtn[id="red"]').removeClass('text-danger');
                    } else {
                        $(this).removeClass('text-success');
                    }
                } else {
                    if (!$(this).hasClass('text-danger')) {
                        reaction = 0;
                        $(this).addClass('text-danger');
                        $('.reactBtn[id="green"]').removeClass('text-success');
                    } else {
                        $(this).removeClass('text-danger');
                    }
                }

                $.ajax({
                    type: "POST",
                    url: "{{ route('like') }}",
                    data: {
                        'post_id': post_id,
                        'reaction': reaction,
                    },
                    success: function(response) {
                        $('#likeCount').text(response.like);
                        $('#dislikeCount').text(response.dislike);
                    }
                })
            })
        </script>
    @endpush
</x-frontend.master>
