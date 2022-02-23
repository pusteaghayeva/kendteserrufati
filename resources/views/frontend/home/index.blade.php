@extends('layouts.frontend')
@section('title', 'Əsas səhifə')
@section('content')
    @include('frontend.home.slider')
    @include('frontend.home.news')
    @include('frontend.home.advice')
    @include('frontend.home.institution')
    @include('frontend.home.useful-links')
    @include('frontend.home.gallery')
@endsection

    