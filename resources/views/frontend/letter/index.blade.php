
@extends('layouts.frontend')
@section('title', 'E-məktub yazmaq')
@section('content')
<div class="letters">
    <div class="letter-write container">
        @if(!empty($letter[0]))
         @foreach($letter as $letter_item)

        <div class="letter">
            <p class="letter-title">
                {{$letter_item->title}}
            </p>
            <div class="letter-first text-justify">
                <p class="rules">
                    {!!$letter_item->content!!}
                </p>
            </div>
            <button class="apply" onclick="window.location.href='{{route('frontend.mail')}}'">MÜRACİƏT ETMƏK</button>
        </div>
        @endforeach
    @endif
    </div>
</div>

@endsection

 