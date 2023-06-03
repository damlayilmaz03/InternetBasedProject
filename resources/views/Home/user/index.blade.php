@extends('layouts.frontbase')

@section('title', 'User Panel')

  @section('content')
  

<!-- Start Proerty header  -->

<section id="aa-property-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-property-header-inner">
            <h2>User Panel Page</h2>
            <ol class="breadcrumb">
            <li><a href="{{route('admin')}}">HOME</a></li>            
            <li class="active">User Panel</li>
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
      <div class="col-md-2">
         <h3><font color="blue">USER MENU</font></h3>
    @include('home.user.usermenu')
         </div>
        <div class="col-md-10">
        <h3><font color="blue">USER PROFILE</font></h3>
          <div class="aa-properties-content">           
            <div class="aa-properties-details">
                @include('profile.show')
            </div>           
          </div>
        </div>
        <!-- Start properties sidebar -->
        
      </div>

     
    </div>

    
  </section>
  <!-- / Properties  -->
  @endsection