@extends('layouts.frontend')
@section('title', 'Kolleqa')
@section('content')


<div class="colleges single-news container-fluid">
    <h2 class="coll-title">{{$college[0]->name}}{{$college[0]->surname}}</h2>
{{--    <img src="{{ asset('uploads/colleges/' . $college[0]->image) }}"  alt="">--}}
    <p class="coll-text text-justify">{!!$college[0]->content !!}</p>
</div>

@endsection