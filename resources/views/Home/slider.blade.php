 <!-- Start slider  -->
 <section id="aa-slider">
    <div class="aa-slider-area"> 
      <!-- Top slider -->
      <div class="aa-top-slider">
        <!-- Top slider single slide -->
        @foreach($sliderdata as $rs)
        <div class="aa-top-slider-single">
          <img src="{{ asset('storage/img/'.$rs->image)}}" alt="{{asset('assets')}}/img" style="width: 1920px; height: 1280 ">
          <!-- Top slider content -->
          <div class="aa-top-slider-content">
            <span class="aa-top-slider-catg">{{$rs->propertytype}}</span>
            <h2 class="aa-top-slider-title">{{$rs->metre}} Square Feet</h2>
            <p class="aa-top-slider-location"><i class="fa fa-map-marker"></i>{{$rs->location}}</p>
            <p class="aa-top-slider-price">{{$rs->price}} ₺</p>
            <a href="{{route('house',['id'=>$rs->id])}}" class="aa-top-slider-btn">Read More <span class="fa fa-angle-double-right"></span></a>
          </div>
          <!-- / Top slider content -->
        </div>
        @endforeach
        <!-- / Top slider single slide -->

      </div>
    </div>
  </section>
  <!-- End slider  -->



  
