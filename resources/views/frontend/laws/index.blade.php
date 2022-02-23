@extends('layouts.frontend')
@section('title', 'Qanunlar')
@section('content')
  
<div class="laws colleges">
    <h2 class="coll-title">{{$category[0]->title}}</h2>
    @foreach ($laws as $law)
    <a href="{{ asset('/uploads/pdf/'.$law->file) }}" target="_blank" class="article first d-flex align-items-center justify-content-left">
        <img src="{{ asset('uploads/laws/' . $law->image) }}" alt="" class="coll-img">
        <span class="coll-text">{{$law->title}}</span>
    </a>
    @endforeach
 

</div>

@endsection

    