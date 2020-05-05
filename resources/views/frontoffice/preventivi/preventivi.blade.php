@extends('/frontoffice/layout/layout')
@section('content')
<!-- breadcam_area_start -->
<div style="background-image:url('{{asset('img/consegnati/2.jpg')}}')" class="breadcam_area overlay2">
    <div class="bradcam_text">
        <h3>Preventivi</h3>
    </div>
</div>
<!-- breadcam_area_end -->
<div class="whole-wrap">
    <div class="container box_1170">
        <div class="section-top-border">
            <h3 class="mb-30">RICHIEDI IL PREVENTIVO PER L'ABBIGLIAMENTO PERSONALIZZATO DELLA TUA SQUADRA</h3>
            <div class="row">
                @if ($collection ?? '')
                @foreach ($collection as $item)
                <div class="col-md-4">
                    <div class="single-defination">
                        <h4 class="mb-20">{{$item->name}}</h4>
                        <p>{{$item->description}}</p>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection