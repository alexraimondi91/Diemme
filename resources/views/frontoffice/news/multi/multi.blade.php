@extends('/frontoffice/news/news')
@section('news')
<div class="col-lg-8 mb-5 mb-lg-0">
    <div class="blog_left_sidebar">
        @if ($collection ?? '')
        @foreach ($collection as $item)
        <article class="blog_item">
            <div class="blog_item_img">
                <img class="card-img rounded-0" src="{{asset($item->path)}}" alt="">
            <a href="{{route('news.id', $item->id)}}" class="blog_item_date">
                    <h3>{{$item->created_at->diffForHumans()}}</h3>
                </a>
            </div>

            <div class="blog_details">
                <a class="d-inline-block" href="news/{{$item->id}}">
                    <h2>{{$item->name}}</h2>
                </a>
            </div>
        </article>
        @endforeach
        @else
        <article class="blog_item">
            <div class="blog_item_img">
                <img class="card-img rounded-0" src="img/blog/single_blog_1.png" alt="">
                <a href="#" class="blog_item_date">
                    <h3>15</h3>
                    <p>Jan</p>
                </a>
            </div>

            <div class="blog_details">
                <a class="d-inline-block" href="single-blog.html">
                    <h2>Google inks pact for new 35-storey office</h2>
                </a>
                <p>That dominion stars lights dominion divide years for fourth have don't stars is that
                    he earth it first without heaven in place seed it second morning saying.</p>
                <ul class="blog-info-link">
                    <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
                    <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                </ul>
            </div>
        </article>
        @endif
        <nav class="blog-pagination justify-content-center d-flex">
            {{$collection->links()}}
        </nav> 
    </div>
</div>
@endsection