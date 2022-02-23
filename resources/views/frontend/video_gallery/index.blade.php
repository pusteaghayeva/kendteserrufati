@extends('layouts.frontend')
@section('title', 'Video qalereya')
@section('content')
    <div class="container">
        <div class="row">
        @if(!empty($videos[0]))
            @foreach ($videos as $video)
            <div class="col-lg-4 col-md-12 mb-4 mt-5">

                <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">

                        <div class="modal-content">

                            <div class="modal-body mb-0 p-0">

                                <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/A3PDXmYoF5U" allowfullscreen></iframe>
                                </div>

                            </div>
                            <div class="modal-footer justify-content-center">
                                <span class="mr-4">Spread the word!</span>
                                <a type="button" class="btn-floating btn-sm btn-fb"><i class="fab fa-facebook-f"></i></a>
                                <!--Twitter-->
                                <a type="button" class="btn-floating btn-sm btn-tw"><i class="fab fa-twitter"></i></a>
                                <!--Google +-->
                                <a type="button" class="btn-floating btn-sm btn-gplus"><i class="fab fa-google-plus-g"></i></a>
                                <!--Linkedin-->
                                <a type="button" class="btn-floating btn-sm btn-ins"><i class="fab fa-linkedin-in"></i></a>

                                <button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4" data-dismiss="modal">Close</button>

                            </div>

                        </div>
                    </div>
                </div>
                <a href="{{$video->url}}"><img class="img-fluid z-depth-1 w-100 h-100"  src=" {!! asset('uploads/videos/' . $video->images) !!}" target="_blank" alt="video" data-toggle="modal" data-target="#modal1"></a>
                {{-- <iframe width="350" height="300" src="https://www.youtube.com/embed/TGb7PwqdKUI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
            
            </div>
            @endforeach
            
        @endif    

       

        </div>
    </div>

    @endsection