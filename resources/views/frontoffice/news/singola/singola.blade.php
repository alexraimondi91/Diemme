@extends('/frontoffice/news/news')
@section('newssingle')
<div class="col-lg-8 posts-list">
    <div class="single-post">
       <div class="feature-img">
       <img class="img-fluid" src="{{$collection->path}}" alt="">
       </div>
       @if($collection ?? '')
       <div class="blog_details">
          <h2>{{$collection->name}}
          </h2>
          <ul class="blog-info-link mt-3 mb-4">
            @if($user ?? '')
          <li><i class="fa fa-user">{{$user->name_user}}</i></li>  
           @endif
          </ul>
          <p class="excert">
             {{$collection->description}}
          </p>
       </div>
       @endif
    </div>
</div>
@endsection