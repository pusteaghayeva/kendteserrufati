<!doctype html>
<html lang="en">

    <head>
        
       @include('frontend.includes.head')
        @include('frontend.includes.styles')
        @yield('styles')
    </head>

    <body>
        
        <div class="container-fluid">
            @include('frontend.includes.header')
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                @yield('content')
                @include('frontend.includes.footer')
            </div>
    
        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
      
        @include('frontend.includes.scripts')
        @yield('scripts')
    </body>

</html>