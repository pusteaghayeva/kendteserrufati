@extends('layouts.frontend')
@section('title', 'Kollegiya')
@section('content')
    @if(!empty($colleges[0]))

        <div class="news colleges">
            <h1 class="news_title mb-5">Kollegiya</h1>
            <div class="container">
                <div class="row ">
                    @foreach ($colleges as $college)
                        <div class="mb-3">
                            <h3 class="card-title text-center mt-1 ">{{$college->name}}  {{$college->surname}}</h3>
                        </div>
                    @endforeach
                    @endif

                </div>

            </div>
        </div>

@endsection