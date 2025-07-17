<div class="col-sm-4">
    <div class="card rounded mb-3 h-100">
        <img src="{{ $image }}" class="card-img-top image-resize" alt="No-image">
        <div class="card-body">
            <h6 class="card-title"><a href="">{{ $title }}</a></h6>
            <p class="card-text fs-6">{!! $excerpt !!}</p>
            <p class="card-text"> <small class="text-secondary"><i>Posted By <a href=""
                            style="text-decoration: none"> {{ $author }}</a> {{ $timestamp }}</i></small></p>
        </div>
    </div>
</div>
