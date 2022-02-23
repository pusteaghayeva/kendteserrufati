@extends('layouts.frontend')
@section('title', 'Foto qalereya')
@section('content')

<section id="gallery">
    <div class="container">
        <div id="image-gallery">
            <div class="row">
                @foreach ($photos as $photo)
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
                    <div class="img-wrapper">
                        <a href="{{asset('uploads/photos/' . $photo->images)}}"><img src= "{{asset('uploads/photos/' . $photo->images)}}" class="img-responsive"></a>
                        <div class="img-overlay">
                            <i class="fas fa-expand-alt" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                @endforeach

            
            </div>
            <!-- End row -->
        </div>
        <!-- End image gallery -->
    </div>
    <!-- End container -->
</section>

@endsection