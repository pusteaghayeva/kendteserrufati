<div class="footer">
    <div class=" footer-con">
        <div class="row">
            <div class="col-4 col-sm-12 col-md-4 col-xl-4 main-link">
                <h4 class="ktn">Naxçıvan Muxtar Respublikası <br> Kənd Təsərrüfatı Nazirliyi</h4>
                <img src="{{ asset('frontend/img/domain.png') }}" class="ktn-img" alt=""><a href="{{route('frontend.home')}}"
                    class="ktn-link">ktn.nakhchivan.az</a>
            </div>
            <div class="col-4 col-sm-12 col-md-4 col-xl-4 main-link second-part">
                <div class="row container-fluid">
                    <div class="col-6 other-links">
                        <li class="list-link"><a href="{{ route('frontend.home') }}" class="pages-link">Əsas
                                səhifə</a></li>
                        <li class="list-link"><a href="{{ route('frontend.regulation', ['category' => 16]) }}"
                                class="pages-link">Əsasnamə</a></li>
                        <li class="list-link"><a href="{{ route('frontend.structure') }}"
                                class="pages-link">Struktur</a></li>
                    </div>
                    <div class="col-6 other-links">
                        <li class="list-link"><a href="{{ route('frontend.laws', ['category' => 7]) }}"
                                class="pages-link">Konstitusiyalar</a></li>
                        <li class="list-link"><a href="{{ route('frontend.setting') }}" class="pages-link">Əlaqə</a></li>
                        <li class="list-link"> <a href="{{ route('frontend.letter', ['category' => 15]) }}"
                                class="pages-link">E-məktub yazmaq</a></li>
                    </div>
                </div>
            </div>
            <?php
            $set = \Illuminate\Support\Facades\DB::table('settings')
                ->where('id', '=', 1)
                ->get();
            ?>
            <div class="col-4 col-sm-12 col-md-4 col-xl-4 main-link thirty-part">
                <p class="adress">Ünvan: <i class="fas fa-map-marker-alt" style="color: grey"></i> {{$set[0]->address}}</p>
                <div class="conn">
                    <a href="tel:+99436{{$set[0]->phone}}" class=" icon-link ">Telefon <img
                            src="{{ asset('frontend/img/phone.png') }}" class="social-icon phone " alt=" "> : {{$set[0]->phone}}</a>
                </div>
                <div class="conn "><a href="mailto:{{$set[0]->mail}} " class="icon-link ">Elektron-poçt
                        <img src="{{ asset('frontend/img/email.png') }}" class="social-icon email " alt=" ">:
                        {{$set[0]->mail}}</a></div>
            </div>
            <div class="location ">© {{ date('Y') }} Tərtibat və proqramlaşdırma: Naxçıvan Muxtar Respublikası <a
                    href="http://rabite.nmr.az/" class="web-site">Rabitə və Yeni Texnologiyalar Nazirliyi</a></div>

        </div>
    </div>
</div>
