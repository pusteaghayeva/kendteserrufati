@extends('layouts.frontend')
@section('title', 'Xəbərlər')
@section('content')


<div class="colleges single-news container-fluid">
    <h2 class="coll-title">{{$single_news->title}}</h2>
    <img src="{{ asset('uploads/news/' . $single_news->image) }}" alt="" style="">
    <p class="coll-text text-justify">{!!$single_news->content !!}</p>
    @if (!empty ($photo[0]))
    <section id="gallery">
        <div class="container">
            <div id="image-gallery">
                <div class="row">
    @foreach ($photo as $photo_item)
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
        <div class="img-wrapper">
            <a href="{{asset('uploads/news_images/'.$photo_item->image)}}"><img src= "{{asset('uploads/news_images/'.$photo_item->image)}}" class="img-responsive"></a>
            <div class="img-overlay">
                <i class="fas fa-expand-alt" aria-hidden="true"></i>
            </div>
        </div>
    </div>
    @endforeach
</div>
<!-- End row -->
</div>
<!-- End image gallery -->
</div>
<!-- End container -->
</section>
    @endif
    
</div>

@endsection