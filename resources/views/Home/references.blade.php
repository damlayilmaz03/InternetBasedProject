@extends('layouts.frontbase')

@section('title','References | '.$setting->title)
@section('description', $setting->description)
@section('keywords', $setting->keywords)



  @section('content')
  


 <!-- Start Proerty header  -->

 <section id="aa-property-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-property-header-inner">
            <h2>References</h2>
            <ol class="breadcrumb">
            <li><a href="{{route('admin')}}">HOME</a></li>            
            <li class="active">References</li>
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
       
            {!! $setting->references !!}

     </div>
   </div>
 </section>



  @endsection