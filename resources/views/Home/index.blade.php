@extends('layouts.frontbase')

@section('title', $setting->title)
@section('description', $setting->description)
@section('keywords', $setting->keywords)



 @section('slider')
 @include('home.slider')
@endsection

  @section('content')
  

 
  <!-- Pre Loader -->
  <div id="aa-preloader-area">
    <div class="pulse"></div>
  </div>
  <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-angle-double-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,900&display=swap" rel="stylesheet">

  <!-- Advance Search -->
  
  <!-- / Advance Search -->




  <!-- Latest property -->
  <section id="aa-latest-property">
    <div class="container">
      <div class="aa-latest-property-area">
        <div class="aa-title">
        <section id="aa-advance-search">
    <div class="container">
      <div class="aa-advance-search-area">
        <div class="form">
         <div class="aa-advance-search-top">
            <div class="row">
            <form action="{{route('gethouse')}}" method="post">
              @csrf
              
              <div class="col-md-4">
                <div class="aa-single-advance-search">
                @livewire('search')
                </div>
              </div>
              
              <div class="col-md-2">
                <div class="aa-single-advance-search">
                  <input class="aa-search-btn" type="submit" value="Search">
                </div>
              </div>
            </form> 
            @livewireScripts
          </div>
        </div>
      </div>
    </div>
  </section>
        </div>
        <div class="aa-latest-properties-content">
          <div class="row">
         

          @foreach($houselist as $rs)
            <div class="col-md-4">
              <article class="aa-properties-item">
                <a href="{{route('house',['id'=>$rs->id])}}" class="aa-properties-item-img" >
                  <img src="{{asset('storage/img/'.$rs->image)}}" alt="" style="width: 360px; height: 240px ">
                </a>
                @php
           $count= \App\Http\Controllers\HomeController::count($rs->id);
           $average= \App\Http\Controllers\HomeController::average($rs->id);
          @endphp
                <div class="aa-tag for-sale">
                  For Sale
                </div>
                <div class="aa-properties-item-content">
                  <div class="aa-properties-info">
                    <span>{{$rs->numberofrooms}} Rooms</span>
                    <span>{{$rs->numberofbathrooms}} Baths</span>
                    <span>{{$rs->metre}} SQ FT</span>
                    <span></span>
                    <span class="fa fa-star checked"><font color="black"><b>{{number_format($average,1)}}</b>/5</font></span>
                    <span><i class="fa fa-comment-o"></i> {{$count}} </span>
                  </div>
                  <div class="aa-properties-about">
                    <h3><a href="{{route('house',['id'=>$rs->id])}}">{{$rs->title}}</a></h3>
                    <p></p>                      
                  </div>
                  <div class="aa-properties-detial">
                    <span class="aa-price">
                    {{$rs->price}} ₺
                    </span>
                    <a href="{{route('house',['id'=>$rs->id])}}" class="aa-secondary-btn">View Details</a>
                  </div>
                </div>
              </article>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Latest property -->



  

 <!-- Our Agent Section-->
 <section id="aa-agents">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-agents-area">
            <div class="aa-title">
              <h2>HOUSES</h2>
              <span></span>
              
            </div>
            <!-- agents content -->
            <div class="aa-agents-content">
              <ul class="aa-agents-slider">
                
              @foreach($housegallery as $rs)
              <li>
                  <div class="aa-single-agents">
                    <div class="aa-agents-img">
                    <a href="{{route('house',['id'=>$rs->id])}}">
                      <img src="{{asset('storage/img/'.$rs->image)}}" alt="agent member image" style="width: 270px; height: 220px ">
                    </a>
                    </div>
                    
                  </div>
                </li>
                @endforeach
                
                 
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Our Agent Section-->
  <!-- About us -->
  <section id="aa-about-us">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-about-us-area">
            <div class="row">
              <div class="col-md-5">
                <div class="aa-about-us-left">
                <br><br><br><br>
                  <img src="{{asset('assets')}}/img/aboutus.jpeg" sytle="height:334px ; width:432px" alt="image">
                </div>
              </div>
              <div class="col-md-7">
                <div class="aa-about-us-right">
                  <div class="aa-title">
                    <h2>About Us</h2>
                    <span></span>
                  </div>
                  <p>
                    {!!$setting->aboutus!!}
                  </p>                  
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / About us -->
  @endsection