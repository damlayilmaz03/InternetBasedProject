@extends('layouts.frontbase')

@section('title','User Login | ')

  @section('content')
  


 <!-- Start Proerty header  -->

 <section id="aa-property-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-property-header-inner">
            <ol class="breadcrumb">
            <li><a href="{{route('admin')}}">HOME</a></li>            
            <li class="active">User Login</li>
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
       
            @include('auth.login')

     </div>
   </div>
 </section>



  @endsection