<!doctype html>
<html lang="en">

    <head>
        
       @include('backend.includes.head')
        @include('backend.includes.styles')
        @yield('styles')
    </head>

    <body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
           @include('backend.includes.header')

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                   @include('backend.includes.sidebar')
                </div>
            </div>
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
           @yield('content')
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
      
        @include('backend.includes.scripts')
        @yield('scripts')
    </body>

</html>