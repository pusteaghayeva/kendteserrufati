@extends('layouts.frontend')
@section('title', 'Aqrar xəbərlər')
@section('content')
    <div class="aqrar container">
        <h2 class="aqrar-first-title">Məhsullarımız</h2>
        <h4 class="aqrar-first-title">Aqrar sığorta bitkiçilik, heyvandarlıq və akvakultura sahələrini əhatə edir</h4>
        <div class="row aqrar-row">
            @foreach ($aqrarnews as $key => $aqrarnews_item)
                <div class=" aqrar-blog col-12 col-lg-4 col-sm-6 col-md-4 ">
                    <a href="#" class="aqrar-link">
                        <div class="aqrar-img {{$key==1 ? 'd-none' : ''}}">
                            <img src="{{ asset('uploads/aqrarnews/' . $aqrarnews_item->image) }}" alt="">
                        </div>
                        <div class="aqrar-text {{$key==1 ? 'order-1' : ''}}">
                            <h3>{{ mb_substr($aqrarnews_item->title, 0, 45) }}...</h3>
                            <button onclick="window.location.href='{{ route('frontend.aqrarsingle_news', ['id' => $aqrarnews_item->id]) }}'">
                                Ətraflı məlumat<i class="fas fa-arrow-right"></i></button>
                        </div>
                        <div class="aqrar-img order-2 {{$key==1 ? 'd-block' : ''}}">
                            <img src="{{ asset('uploads/aqrarnews/' . $aqrarnews_item->image) }}" alt="">
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection