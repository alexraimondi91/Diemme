@extends('/frontoffice/layout/layout')
@section('content')
<!--================Blog Area =================-->
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            @yield('news')
            @yield('newssingle')
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <form method="POST" action="{{route('news.filter')}}">
                            <div class="form-group">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="filter"
                                        placeholder='Titolo da cercare' onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Titolo da cercare'">
                                    <div class="input-group-append">
                                        <button class="btn" type="submit"><i class="ti-search"></i></button>
                                    </div>
                                </div>
                            </div>
                            <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                type="submit">Cerca</button>
                        </form>
                    </aside>

                    <aside class="single_sidebar_widget instagram_feeds">
                        <h4 class="widget_title">Instagram Feeds</h4>
                        <ul class="instagram_row flex-wrap">
                            <!-- InstaWidgets.com Code Start 22-03-2020 -->
                            <script language="javascript" src="http://i1.inwidgets.com/1-diemme_abbigliamento.js">
                            </script>
                            <!-- InstaWidgets.com Code End -->

                        </ul>
                    </aside>
                </div>
            </div>
</section>
<!--================Blog Area =================-->
@endsection