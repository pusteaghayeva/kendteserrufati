<div class="first position-relative">
    <div class="header-logo">
        <a href="{{route('frontend.home')}}"><img src="{{asset('frontend/img/ktn-headers.jpg')}}" title="Naxçıvan Muxtar Respublikası Kənd Təsəsrrüfatı Nazirliyi" class="logo-img img-fluid" alt=""></a>
    </div>

</div>
<nav class="navbar navbar-expand navbar-light">
    <div class="container container-navbar">
        <div class class=" collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('frontend.home')}}"> <span class=""><i class="fas fa-home"></i></span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Nazirlik
          </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{route('frontend.regulation', ['category'=>16])}}">Əsasnamə</a>
                        <a class="dropdown-item" href="{{route('frontend.colleges')}}">Kollegiya</a>
                        <a class="dropdown-item" href="{{route('frontend.structure')}}">Struktur</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Qanunvericilik</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{route('frontend.laws', ['category'=>7])}}">Konstitusiyalar</a>
                        {{-- <a class="dropdown-item" href="{{route('frontend.laws', ['category'=>8])}}">Qanunlar</a>
                        <a class="dropdown-item" href="{{route('frontend.laws' , ['category'=>9])}}">Fərmanlar</a>
                        <a class="dropdown-item" href="{{route('frontend.laws' , ['category'=>10])}}">Sərəncamlar</a>
                        <a class="dropdown-item" href="{{route('frontend.laws' , ['category'=>11])}}">Qərarlar</a>
                        <a class="dropdown-item" href="{{route('frontend.laws' , ['category'=>12])}}">Dövlət proqramları</a> --}}
                    </div>
                </li>


{{--Kommenttttttt--}}
{{--                <div class="dropdown nav-item divmenu">--}}
{{--                    <a href="#" class="nav-link nav-akt dropdown-toggle" data-toggle="dropdown" id="navbarDropdownMenuLink" aria-haspopup="true" aria-expanded="false">Aqrar Sığorta Fondu</a>--}}
{{--                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">--}}
{{--                        <li class="dropdown-submenu nav-item dropdown">--}}
{{--                            <a class="test dropdown-item" tabindex="-1" href="{{route('frontend.aqrarnews', ['category'=>2])}}">Məhsullarımız <span class="caret"></span></a>--}}
{{--                            <ul class="dropdown-menu">--}}
{{--                                <li><a class="dropdown-item" tabindex="-1" href="{{ route('frontend.aqrarsingle_news', ['id'=>2])}}">Bitkiçilik</a></li>--}}
{{--                                <li><a class="dropdown-item" tabindex="-1" href="{{route('frontend.aqrarsingle_news', ['id'=>4])}}">Heyvandarlıq</a></li>--}}
{{--                                <li><a class="dropdown-item" tabindex="-1" href="{{route('frontend.aqrarsingle_news', ['id'=>1])}}">Akvakultura</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li><a class="dropdown-item" tabindex="-1" href="{{route('frontend.regulation', ['category'=>28])}}">Aqrar sığorta haqqında</a></li>--}}
{{--                        <li><a class="dropdown-item" tabindex="-1" href="{{route('frontend.news', ['category'=>29] )}}">Aqrar sığorta ilə bağlı maarifləndirici məlumatlar</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}


                   <div class="dropdown nav-item divmenu">
                       <a href="#" class="nav-link nav-akt dropdown-toggle" data-toggle="dropdown" id="navbarDropdownMenuLink" aria-haspopup="true" aria-expanded="false">Aqrar Sığorta Fondu</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li class="dropdown-submenu nav-item dropdown">
                                <a class="test" tabindex="-1" href="{{route('frontend.aqrarnews', ['category'=>2])}}">Məhsullarımız <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" tabindex="-1" href="{{ route('frontend.aqrarsingle_news', ['id'=>2])}}">Bitkiçilik</a></li>
                                    <li><a class="dropdown-item" tabindex="-1" href="{{ route('frontend.aqrarsingle_news', ['id'=>4])}}">Heyvandarlıq</a></li>
                                    <li><a class="dropdown-item" tabindex="-1" href="{{ route('frontend.aqrarsingle_news', ['id'=>1])}}">Akvakultura</a></li>
                                </ul>
                            </li>
                            <li><a class="dropdown-item" tabindex="-1" href="{{route('frontend.regulation', ['category'=>28])}}">Aqrar sığorta haqqında</a></li>
                            <li><a class="dropdown-item" tabindex="-1" href="{{route('frontend.news', ['category'=>29] )}}">Aqrar sığorta ilə bağlı maarifləndirici məlumatlar</a></li>
                        </ul>
                    </div>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mətbuat</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{route('frontend.news', ['category'=>19])}}">Xəbərlər</a>
                        <a class="dropdown-item" href="{{route('frontend.laws', ['category'=>27])}}">Fermerlərə məsləhət</a>
                        <a class="dropdown-item" href="{{route('frontend.report', ['category' => 18])}}">Hesabatlar</a>
                        <a class="dropdown-item" href="{{route('frontend.photos')}}">Foto qalereya</a>
                        <a class="dropdown-item" href="{{route('frontend.video_gallery')}}">Video qalereya</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Müraciətlər</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{route('frontend.setting', ['setting' =>1])}}">Əlaqə</a>
                        <a class="dropdown-item" href="{{route('frontend.letter', ['category'=>15])}}">E-məktub yazmaq</a>
                    </div>
                </li>

                <form class="app-search d-lg-block form-inline mr-auto form-outline d-flex" action="{{route('frontend.news')}}" method="GET">
                    <div class="position-relative d-flex w-50">
                        <input type="text" name="search" class="form-control mr-sm-2 text-center" placeholder="Axtar..." style="">
                        <span class="bx bx-search-alt"></span>
                        <button type="submit" class="btn btn-unique btn-rounded btn-sm my-0">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </ul>
        </div>
    </div>
</nav>
<nav class="navbar navbar-light light-blue lighten-4 hamburger-menu">
    <button class="navbar-toggler toggler-example" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"><span class="dark-blue-text"><i
  class="fas fa-bars fa-1x"></i></span></button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent1">

        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('frontend.home')}}"> <span class="">Əsas səhifə</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Nazirlik
      </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{route('frontend.regulation', ['category'=>16])}}">Əsasnamə</a>
                    <a class="dropdown-item" href="{{route('frontend.colleges')}}">Kollegiya</a>
                    <a class="dropdown-item" href="{{route('frontend.structure')}}">Struktur</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Qanunvericilik</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{route('frontend.laws', ['category'=>7])}}">Konstitusiyalar</a>
{{--                    <a class="dropdown-item" href="{{route('frontend.laws')}}">Qanunlar</a>--}}
{{--                    <a class="dropdown-item" href="{{route('frontend.laws')}}">Fərmanlar</a>--}}
{{--                    <a class="dropdown-item" href="{{route('frontend.laws')}}">Sərəncamlar</a>--}}
{{--                    <a class="dropdown-item" href="{{route('frontend.laws')}}">Qərarlar</a>--}}
{{--                    <a class="dropdown-item" href="{{route('frontend.laws')}}">Dövlət proqramları</a>--}}
                </div>
            </li>

            <div class="dropdown nav-item divmenu">
                <a href="#" class="nav-link nav-akt dropdown-toggle" data-toggle="dropdown" id="navbarDropdownMenuLink" aria-haspopup="true" aria-expanded="false">Aqrar Sığorta Fondu</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li class="dropdown-submenu nav-item dropdown">
                        <a class="test" tabindex="-1" href="{{route('frontend.aqrarnews', ['category'=>2])}}">Məhsullarımız <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" tabindex="-1" href="{{ route('frontend.aqrarsingle_news', ['id'=>2])}}">Bitkiçilik</a></li>
                            <li><a class="dropdown-item" tabindex="-1" href="{{ route('frontend.aqrarsingle_news', ['id'=>4])}}">Heyvandarlıq</a></li>
                            <li><a class="dropdown-item" tabindex="-1" href="{{ route('frontend.aqrarsingle_news', ['id'=>1])}}">Akvakultura</a></li>
                        </ul>
                    </li>
                    <li><a class="dropdown-item" tabindex="-1" href="{{route('frontend.regulation', ['category'=>28])}}">Aqrar sığorta haqqında</a></li>
                    <li><a class="dropdown-item" tabindex="-1" href="{{route('frontend.news', ['category'=>29] )}}">Aqrar sığorta ilə bağlı maarifləndirici məlumatlar</a></li>
                </ul>
            </div>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mətbuat</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{route('frontend.news', ['category'=>19])}}">Xəbərlər</a>
                    <a class="dropdown-item" href="{{route('frontend.laws', ['category'=>27])}}">Fermerlərə məsləhət</a>
                    <a class="dropdown-item" href="{{route('frontend.report', ['category' => 18])}}">Hesabatlar</a>
                    <a class="dropdown-item" href="{{route('frontend.photos')}}">Foto qalereya</a>
                    <a class="dropdown-item" href="{{route('frontend.video_gallery')}}">Video qalereya</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Müraciətlər</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{route('frontend.setting')}}">Əlaqə</a>
                    <a class="dropdown-item" href="{{route('frontend.letter', ['category'=>15])}}">E-məktub yazmaq</a>
                </div>
            </li>
            <form class="form-inline mr-auto form-outline d-flex" action="{{route('frontend.news')}}" method="GET">
                <input class="form-control mr-sm-2 mt-2 mb-2" type="text" placeholder="Axtar... " aria-label="Search" style="width: 70px; ">
                <button class="btn btn-unique btn-rounded btn-sm my-0" type="submit"><i class="fas fa-search"></i></button>
            </form>

        </ul>
    </div>
</nav>