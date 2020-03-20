@extends('/frontoffice/layout/layout')
@section('content')
  <!-- slider_area_start -->
    <div class="slider_area">
    @if($collection ?? '')
            
        
        
        <div class="slider_active owl-carousel">
            @foreach($collection as $item)
            <div style="background-image: url('{{$item->path}}')" class="single_slider overlay2 d-flex align-items-center justify-content-center slider_bg_1">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text text-center">
                            <h3>{{$item->name}}</h3>
								
                            <p>{{$item->description}}</p>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
       
    @else
        <div class="slider_active owl-carousel">
            <div style="background-image: url('img/news/custom.jpg')" class="single_slider overlay2 d-flex align-items-center justify-content-center slider_bg_1">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text text-center">
                            <h3>Vuoto</h3>
								
                            <p>Vuoto</p>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    </div>
    <!-- slider_area_end -->

    <!-- about_area_start -->
    <div class="about_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-md-6">
                    <div class="about_thumb">
                        <img src="img/consegnati/5.jpg" alt="">
                    </div>
                </div>
                <div class="col-xl-5 offset-xl-1 col-md-6">
                    <div class="about_info">
                        <div class="section_title">
                            <span class="sub_heading">Chi siamo</span>
                            <h3>Abbigliamo sportivo 
                                disegnato per tutti</h3>
                            <div class="seperator"></div>
                        </div>
                        <p>DIEMMEsport si occupa di vestire lo sportivo con tecnologie e prodotti di alta qualità senza lasciare nulla al caso.
                            Ogni prodotto inoltre è totalmente personalizzabile grazie a Designer pronti ad occuparsi di ogni dettaglio stilistico
                            assecondando ogni desiderio del cliente.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    <!-- about_area_end -->