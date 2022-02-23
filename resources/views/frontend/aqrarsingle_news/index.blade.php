@extends('layouts.frontend')
@section('title', 'Aqrar xəbərlər')
@section('content')


    <div class="colleges single-news container-fluid">
        <h2 class="coll-title">{{$aqrarsingle_news->title}}</h2>
        <img src="{{ asset('uploads/aqrarnews/' . $aqrarsingle_news->image) }}" style="width: 400px; height:200px;" alt="">
        <p class="coll-text text-justify">{!!$aqrarsingle_news->content !!}</p>
{{--        <p class="coll-text text-justify text-center"><a class="text-decoration-none" href="{{asset('uploads/pdf/'.$aqrarsingle_news->file)}}">{{$aqrarsingle_news->title}}</a></p>--}}

    </div>

@endsection