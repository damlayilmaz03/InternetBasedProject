@extends('layouts.frontbase')

@section('title', $category->title, 'Houses')


  @section('content')
  
  <!-- Start Proerty header  -->

  <section id="aa-property-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-property-header-inner">
            <h2>{{$category->title}} Page</h2>
            <ol class="breadcrumb">
            <li><a href="{{route('admin')}}">HOME</a></li>            
            <li class="active">{{$category->title}}</li>
          </ol>
          </div>
        </div>
      </div>
    </div>
  </section> 
  <!-- End Proerty header  -->


   <!-- Start Properties  -->
   <section id="aa-properties">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="aa-properties-content">
 
            <!-- Start properties content body -->
            <div class="aa-properties-content-body">
              <ul class="aa-properties-nav">


              @foreach($houses as $rs)
                <li>
                  <article class="aa-properties-item">
                    <a class="aa-properties-item-img" href="{{route('house',['id'=>$rs->id])}}" >
                      <img alt="img" src="{{asset('storage/img/'.$rs->image)}}" style="width: 360px; height: 240px ">
                    </a>
                    @php
           $count= \App\Http\Controllers\HomeController::count($rs->id);
           $average= \App\Http\Controllers\HomeController::average($rs->id);
          @endphp
                    <div class="aa-tag for-rent">
                      For Sale
                    </div>
                    <div class="aa-properties-item-content">
                      <div class="aa-properties-info">
                      <span>{{$rs->numberofrooms}} Rooms</span>
                        <span>{{$rs->numberofbathrooms}} Baths</span>
                       <span>{{$rs->metre}} SQ FT</span>
                       <span><span></span></span>
                    <span class="fa fa-star checked"><font color="black"><b>{{number_format($average,1)}}</b>/5</font></span>
                    <span><i class="fa fa-comment-o"></i> {{$count}} </span>
                      </div>
                      <div class="aa-properties-about">
                        <h3><a href="{{route('house',['id'=>$rs->id])}}">{{$rs->title}}</a></h3>
                        <p>{{$rs->description}}</p>                      
                      </div>
                      <div class="aa-properties-detial">
                        <span class="aa-price">
                        {{$rs->price}} ₺
                        </span>
                        <a class="aa-secondary-btn" href="{{route('house',['id'=>$rs->id])}}">View Details</a>
                      </div>
                    </div>
                  </article>
                </li>
              @endforeach
             
              
              </ul>
            </div>
            <!-- Start properties content bottom -->
            <div class="aa-properties-content-bottom">
              <nav>
                <ul class="pagination">
                  <li>
                    <a href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <li class="active"><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li ><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li>
                    <a href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
        <!-- Start properties sidebar -->
        <div class="col-md-4">
        <aside class="aa-properties-sidebar">
            <!-- Start Single properties sidebar -->
            <div class="aa-properties-single-sidebar">
              <h3>Properties Search</h3>
              <form action="{{route('gethouse')}}" method="post">
              @csrf
              
              <div class="col-md-20">
                <div class="aa-single-advance-search">
                @livewire('search')
                </div>
              </div>
              
              <div class="col-md-8">
                <div class="aa-single-advance-search">
                  <input class="aa-search-btn" type="submit" value="Search">
                </div>
              </div>
            </form> 
            @livewireScripts
            </div> 
          </aside>
        </div>
      </div>
    </div>
  </section>
  <!-- / Properties  -->

 
  @endsection