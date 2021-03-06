@extends('/frontoffice/layout/layout')
@section('content')
<!-- breadcam_area_start -->
<div style="background-image: url('{{asset('storage/img/product_showcase/1.jpg')}}')" class="breadcam_area overlay2">
	<div class="bradcam_text">
		<h3>Prodotti</h3>
	</div>
</div>
<!-- breadcam_area_end -->
@if ($collection ?? '')
<!-- dream_service_start -->
<div class="lastest_project">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<div class="section_title mb-60">
					<h3>Le nostre Linee</h3>
					<div class="seperator"></div>
				</div>
			</div>
		</div>
		@foreach ($collection as $item)
		<div class="row align-items-center mb-80">
			<div class="col-xl-6 col-md-6">
				<div class="section_title">
					<h4>{{$item->name}}</h4>
					<p>{{$item->description}} </p>
				</div>
			</div>
			<div class="col-xl-5 offset-xl-1 col-md-6">
				<div class="single_project_thumb">
					<img src="{{asset($item->path)}}" alt="">
				</div>
			</div>
		</div>
		@endforeach
		@endif
	</div>
</div>
<!-- footer_start -->
@endsection