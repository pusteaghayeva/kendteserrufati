@extends('layouts.frontend')
@section('title', 'Slider')
@section('content')

<div class="carousel-inner">
@if(!empty($sliders[0]))
    @foreach ($sliders as $slider)
    <div class="carousel-item active">
        <img class="d-block w-100 img-responsive first-img" src="{{ asset('uploads/sliders/' . $sliders->image) }}" alt="First slide">
    </div>
    @endforeach
@endif
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

@endsection
