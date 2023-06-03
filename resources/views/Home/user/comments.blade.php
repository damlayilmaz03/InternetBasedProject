@extends('layouts.frontbase')

@section('title', 'User Comments & Reviews')

  @section('content')
  

<!-- Start Proerty header  -->

<section id="aa-property-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-property-header-inner">
            <h2>User Panel</h2>
            <ol class="breadcrumb">
            <li><a href="{{route('admin')}}">HOME</a></li>            
            <li class="active">User Comment</li>
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
        <h3><font color="blue">User Comments & Reviews</font></h3>
          <div class="aa-properties-content">           
            <div class="aa-properties-details">
               
            <table class="table table-bordered">
						<thead>
							<tr>
								<th style="width: 10px">Id</th>
								<th>House</th>
								<th>Subject</th>
								<th>Review</th>
								<th>Rate</th>
								<th>Status</th>
								<th style="width:40px">Delete</th>
							</tr>
						</thead>
						<tbody>

						@foreach($comments as $rs)
							<tr>
								<td>{{$rs->id}}</td>
								<td><a href="{{route('house',['id'=>$rs->house_id])}}">{{$rs->house->title}}</a></td>
								<td>{{$rs->subject}}</td>
								<td>{{$rs->review}}</td>
								<td>{{$rs->rate}}</td>
								<td>{{$rs->status}}</td>
								
                                <td><a href="{{route('userpanel.reviewdelete',['id'=>$rs->id])}}" onclick="return confirm('Delete ! Are you sure?')" class="btn btn-danger">Delete</a></td>
							<tr>
							
						@endforeach
						</tbody>
					</table>

            </div>           
          </div>
        </div>
        <!-- Start properties sidebar -->
        
      </div>

     
    </div>

    
  </section>
  <!-- / Properties  -->
  @endsection