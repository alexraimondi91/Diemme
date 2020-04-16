@extends('/frontoffice/news/news')
@section('newssingle')
<div class="col-lg-8 posts-list">
   <div class="single-post">
      @if($collection ?? '')
      <div class="feature-img">
         <img class="img-fluid" src="{{$collection->path}}" alt="">
      </div>
      <div class="blog_details">
         <h2>{{$collection->name}}
         </h2>
         <ul class="blog-info-link mt-3 mb-4">
            <li><i class="fa fa-user">{{$collection->user->name_user}}  {{$collection->user->surname_user}}</i></li>
         </ul>
        
            {!!$collection->description!!}
         
      </div>
      @endif
   </div>
</div>
@endsection