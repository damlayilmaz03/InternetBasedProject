@extends('layouts.frontbase')

@section('title', $data->title)

  @section('content')
  
 
  <!-- Start Proerty header  -->

  <section id="aa-property-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-property-header-inner">
            <h2>{{$data->category->title}} Page</h2>
            <ol class="breadcrumb">
            <li><a href="{{route('admin')}}">HOME</a></li>            
            <li class="active">{{$data->propertytype}}</li>
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
            <div class="aa-properties-details">
             <div class="aa-properties-details-img">
               <img src="{{asset('storage/img/'.$data->image)}}" alt="img">
               @foreach($images as $rs)
               <img src="{{asset('storage/img/'.$rs->image)}}" alt="img">
               @endforeach
             </div>
             <div class="aa-properties-info">
               <h2>{{$data->title}}</h2>
               <span class="aa-price">{{$data->price}} ₺</span>

               
                <br>
               <h3 style="color:#f00;"><b>Home Features</b></h3>
               <ul>
                 <b><u>{{$data->location}}</u></b></li>
                 <li><b>Advert Number</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->id}}</li>
                 <li><b>Listing Date</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->created_at}}</li>
                 <li><b>Property Type</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->propertytype}}</li>
                 <li><b>m²(Gross)</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->metre}}</li>
                 <li><b>Number of Rooms</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->numberofrooms}}</li>
                 <li><b>Building Age</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->buildingage}}</li>
                 <li><b>Floor Location</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->floorlocation}}</li>
                 <li><b>Number of Floors</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->numberoffloors}}</li>
                 <li><b>Warm-up Type:</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->warmuptype}}</li>
                 <li><b>Number of Bathrooms</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->numberofbathrooms}}</li>
                 <li><b>Balcony</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->balcony}}</li>
                 <li><b>Furnished</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->furnished}}</li>
                 <li><b>Using Status</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->usingstatus}}</li>
                 <li><b>Dues</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->dues}}</li>
                 <li><b>Swap</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp{{$data->swap}}</li>
               </ul>
        
             </div>
            
            </div>           
          </div>
        </div>
        <!-- Start properties sidebar -->
        <div class="col-md-4">
          @php
           $count= \App\Http\Controllers\HomeController::count($data->id);
           $average= \App\Http\Controllers\HomeController::average($data->id);
          @endphp
          
          <span class="fa fa-star checked"></span>
        <font color="red"><b>  {{number_format($average,1)}}/5 Review(s) / Add Review</b></font>
        @include('home.messages')
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
      <br><br>
      <div class="col-md-20">
          <aside class="aa-properties-sidebar">
            <!-- Start Single properties sidebar -->
            <div class="aa-properties-single-sidebar">
              <h3 style="color:#f00;"><b>Detail</b></h3><br>

              {!! $data->detail !!}
            </div> 
          </aside>
        </div>
    
        
        <div class="col-md-6">
          <h4><font color="orange">REVIEWS ({{$count}})</font></h4>
                      @foreach($reviews as $rs)
                          <div class="media">
                                <div class="media-body">
                                 <h4 ><i class="fa fa-user-o"></i> {{$rs->user->name}}</h4>
                                 <h5>{{$rs->created_at}} &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <font color="red">RATING->&nbsp&nbsp</font><strong><span class="fa fa-star checked"></span></strong>&nbsp<strong><font color="black">{{$rs->rate}}</font></strong>/5</h5>
                                 <h4><font color="red">{{$rs->subject}}</font></h4>
                                 <p>{{$rs->review}}</p>
                               
                                </div>
                          </div>
                          @endforeach
                    </div>

        <div class="col-md-6">
                      <div id="respond">
                        <h3 class="reply-title">Write Your Review</h3>
                        <p class="comment-notes">
                            Your email address will not be published. Required fields are marked <span class="required">*</span>
                          </p>
                        <form id="commentform" action="{{route('storecomment')}}" method="POST">
                          @csrf
                          <p class="comment-form-author">
                            <input type="hidden" required="required" size="30" value="{{$data->id}}" name="house_id">
                          </p>
                          <p class="comment-form-email">
                            <label for="email">Subject <span class="required">*</span></label>
                            <input type="text" required="required" aria-required="true" value="" name="subject" placeholder="Subject">
                          </p>
                          <p class="comment-form-comment">
                            <label for="comment">Review</label>
                            <textarea required="required" aria-required="true" rows="8" cols="45" name="review"></textarea>
                          </p>
                          <div class="form-group">
                         <label>Rating</label>
                          <select class="custom-select col-12" name="rate">
									        <option selected="">Choose...</option>
									      <option >1</option>
								        	<option >2</option> 
                          <option >3</option>
								        	<option >4</option> 
                          <option >5</option>
								        	
									
							          	</select>
                                </div>
                          @auth
                          <p class="form-submit">
                            <input type="submit" value="Post Comment" class="primary-btn" name="submit">
                          </p>    
                          @else
                          <p class="form-submit">
                            <a href="/login" class="primary-btn"> For Submit Your Review, Please Login </a>
                          </p>
                          @endauth

                        </form>
                      </div>
                    </div>

                   
    </div>

    
  </section>
  <!-- / Properties  -->
  

 
  @endsection