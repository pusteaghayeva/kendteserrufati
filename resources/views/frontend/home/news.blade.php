<div class="news">
    <h1 class="news_title">Xəbərlər</h1>
    <div class="container">
        <div class="row">
            @if(!empty($news[0]))
                @foreach ($news as $news_item)
                    <div class="col-12 col-lg-4 col-sm-6 col-md-4 card-news col-xl-4">
                        <div class="card">
                            <div class="card-argo-img">
                                <img src="{{ asset('uploads/news/' . $news_item->image) }}" class="card-img-top agro-img "
                                    alt="...">
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">{{ mb_substr($news_item->title, 0, 45) }}...</h3>
                                <p class="news-border">{{ explode(' ', $news_item->created_at)[0] }}</p>
                                <p class="card-text">{{mb_substr(html_entity_decode (strip_tags($news_item->content)), 0, 120) }}</p>
                                <a href="{{ route('frontend.single_news', ['id' => $news_item->id]) }}"
                                    class="btn btn-light read-more">Ətraflı oxu</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif


            <div class="all-news">
                <h3><a href="{{ route('frontend.news', ['category'=>19])}}" class="text-dark"> Bütün xəbərlər</a></h3>
            </div>
        </div>

    </div>
</div>
