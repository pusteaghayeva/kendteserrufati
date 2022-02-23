@extends('layouts.frontend')
@section('title', 'Əsasnamə')
@section('content')
<div class="regulations">
    <div class="regulation">
        <div class="container">
            @if(!empty($regulation[0]))
            @foreach($regulation as $regulation_item)
            <div class="header">
                <h4 class="main mainreg">{{$regulation_item->title}}</h4>
                <div class="regulation-first">
                    {!!$regulation_item->content!!}
                </div>
            </div>
            <hr>
            @endforeach
            @endif
        </div>
    </div>
</div>

@endsection

    