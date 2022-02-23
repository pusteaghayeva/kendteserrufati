@extends('layouts.frontend')
@section('title', 'Qanunlar')
@section('content')

    <div class="laws colleges">
        <h2 class="coll-title">{{$category[0]->title}}</h2>
        @foreach ($aqrars as $aqrar)
            <a href="{{ asset('/uploads/pdf/'.$aqrar->file) }}" target="_blank" class="article first d-flex align-items-center justify-content-left">
                <img src="{{ asset('uploads/laws/' . $aqrar->image) }}" alt="" class="coll-img">
                <span class="coll-text">{{$aqrar->title}}</span>
            </a>
        @endforeach


    </div>

@endsection

