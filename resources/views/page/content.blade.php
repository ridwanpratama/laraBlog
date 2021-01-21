@extends('page.app')
@section('content')
@foreach($post as $item)
    <div class="blog-entry ftco-animate d-md-flex">
        <a href="/post/{{$item->slug}}" class="img img-2">
            <img class="img img-2" src="{{asset('image/'. $item->image)}}">
        </a>
        <div class="text text-2 pl-md-4">
            <h3 class="mb-2"><a href="/post/{{ $item->slug }}">{{ $item->title }}</a></h3>
            <div class="meta-wrap">
                <p class="meta">
                    <span>{{ $item->created_at->todatestring() }}</span>
                    <span><a href="single.html">{{ $item->tags->tags }}</a></span>
                    <span>5 Comment</span>
                </p>
            </div>
            <p class="mb-4">{!! Str::limit($item->content, 100, '...') !!}</p>
            <p><a href="/post/{{$item->slug}}" class="btn-custom">Read More <span
                        class="ion-ios-arrow-forward"></span></a></p>
        </div>
    </div>

@endforeach
{{ $post->links() }}

@endsection