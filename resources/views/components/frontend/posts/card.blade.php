<div class="col-sm-4 mb-3">
    <div class="card rounded h-100">
       <a href="{{ $href }}"><img src="{{ $image }}" class="card-img-top image-resize" alt="No-image"></a>
        <div class="card-body">
            <h6 class="card-title"><a href="{{ $href }}">{{ $title }}</a></h6>
            <p class="card-text fs-6">{!! $excerpt !!}</p>
            <p class="card-text"> <small class="text-secondary"><i>Posted By <a href=""
                            style="text-decoration: none"> {{ $author }}</a> {{ $timestamp }}</i></small></p>
        </div>
    </div>
</div>
