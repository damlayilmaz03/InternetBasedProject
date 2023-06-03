@extends('layouts.frontbase')

@section('title','Frequently Asked Questions | '.$setting->title)
@section('description', $setting->description)
@section('keywords', $setting->keywords)

@section('head')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css%22%3E">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  @endsection

  @section('content')
  


 <!-- Start Proerty header  -->

 <section id="aa-property-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-property-header-inner">
            <h2>Frequently Asked Questions</h2>
            <ol class="breadcrumb">
            <li><a href="{{route('admin')}}">HOME</a></li>            
            <li class="active">Frequently Asked Questions</li>
          </ol>
          </div>
        </div>
      </div>
    </div>
  </section> 
  <!-- End Proerty header  -->

 <section id="aa-contact">
   <div class="container">
     <div class="row">
            
           

          <div id="accordion">
            @foreach($datalist as $rs)

            <div class="card">
                <div class="card-header">
                   <a class="card-link" data-toggle="collapse" href="#collapse{{$loop->iteration}}">
                    <h3> {{$rs->question}} </h3>
                  </a>
                </div>

                <div id="collapse{{$loop->iteration}}" class="collapse @once show @endonce" data-parent="#accordion">
                    <div class="card-body">
                       {!! $rs->answer !!}
                    </div>
                </div>
            @endforeach    
            </div>
           
     </div>
   </div>
 </section>



  @endsection