
@extends('layouts.frontend')
@section('title', 'Hesabat')
@section('content')
       <div class="report container">
        <h2 class="coll-title">{{$single_report->title}}</h2>
        <p class="report-text" style="text-align: justify;">{!!$single_report->content !!}</div>

</div>
@endsection