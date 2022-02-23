@extends('layouts.frontend')
@section('title', 'Əlaqə')
@section('content')


   <div class="contact colleges">
    <h2 class="coll-title">{{$setting[0]->title}}</h2>
    <div class="contact-text">
        <p class="mt-5"><span class="first">Telefon:</span>
            <a href="tel:+(036) 545-02-47" class="contact-href">{{$setting[0]->phone}}</a></p>
        <p class=""><span class="first">E-mail: </span><a href="mailto: ktn@nakhchivan.az" class="contact-href">{{$setting[0]->mail}}</a></p>
        <p class=""><span class="first">Ünvan: </span>{{$setting[0]->address}}</span>
        </p>

    </div>
</div>

@endsection