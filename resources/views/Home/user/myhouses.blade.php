@extends('layouts.frontbase')

@section('title', 'My Houses')

  @section('content')
  

<!-- Start Proerty header  -->

<section id="aa-property-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-property-header-inner">
            <h2>My Houses</h2>
            <ol class="breadcrumb">
            <li><a href="{{route('admin')}}">HOME</a></li>            
            <li class="active">My Houses</li>
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
        <h3><font color="blue">Pending Home Adverts</font></h3>
          <div class="aa-properties-content">           
            <div class="aa-properties-details">
               
            <table class="table table-bordered">
						<thead>
							<tr>
								<th>Category</th>
								<th>Title</th>
								<th>Price</th>
								<th>Property Type</th>
								<th>m²</th>
								<th>Image</th>
								<th>Status</th>
								<th style="width:40px">Edit</th>
								<th style="width:40px">Delete</th>
								<th style="width:40px">Show</th>
							</tr>
						</thead>
						<tbody>

						@foreach($house1 as $rs)
							<tr>
								<td>
								{{ \App\Http\Controllers\AdminPanel\CategoryController::getParentsTree($rs->category,$rs->category->title)}}
								</td>
								<td>{{$rs->title}}</td>
								<td>{{$rs->price}}</td>
								<td>{{$rs->propertytype}}</td>
								<td>{{$rs->metre}}</td>
								<td>
									@if ($rs->image)
									<img src="{{ asset('storage/img/'.$rs->image)}}" style="height: 40px">
									@endif
								</td>
								<td>{{$rs->status}}</td>
                <td><a href="{{route('userpanel.edithouse1',['id'=>$rs->id])}}"class="btn btn-primary">Edit </a> </td>
                                <td><a href="{{route('userpanel.deletehouse1',['id'=>$rs->id])}}" onclick="return confirm('Delete ! Are you sure?')" class="btn btn-danger">Delete</a></td>
                                <td><a href="{{route('userpanel.showhouse1',['id'=>$rs->id])}}"class="btn btn-warning">Show </a></td>
								
							<tr>
							
						@endforeach

            
            <table class="table table-bordered">
						<thead>
							<tr>	
								<th>Category</th>
								<th>Title</th>
								<th>Price</th>
								<th>Property Type</th>
								<th>m²</th>
								<th>Image</th>
								<th>Image Gallery</th>
								<th>Status</th>
								<th style="width:40px">Edit</th>
								<th style="width:40px">Delete</th>
								<th style="width:40px">Show</th>
							</tr>
						</thead>
						<tbody>

						@foreach($house as $rs)
							<tr>
								<td>
								{{ \App\Http\Controllers\AdminPanel\CategoryController::getParentsTree($rs->category,$rs->category->title)}}
								</td>
								<td>{{$rs->title}}</td>
								<td>{{$rs->price}}</td>
								<td>{{$rs->propertytype}}</td>
								<td>{{$rs->metre}}</td>
								<td>
									@if ($rs->image)
									<img src="{{ asset('storage/img/'.$rs->image)}}" style="height: 40px">
									@endif
								</td>
								<td> <a href="{{route('userpanel.image.index',['pid'=>$rs->id])}}"
								onclick="return !window.open(this.href,'','top=50 left=100 width=1100,height=700')">
								<img src="{{asset('assets')}}/admin/img/gallery.png" style="height: 40px">
								</a>
								</td>
								<td>{{$rs->status}}</td>
								<td><a href="{{route('userpanel.edithouse',['id'=>$rs->id])}}"class="btn btn-primary">Edit </a> </td>
                                <td><a href="{{route('userpanel.deletehouse',['id'=>$rs->id])}}" onclick="return confirm('Delete ! Are you sure?')" class="btn btn-danger">Delete</a></td>
                                <td><a href="{{route('userpanel.showhouse',['id'=>$rs->id])}}"class="btn btn-warning">Show </a></td>
							<tr>

						@endforeach
            <h3><font color="blue">Accepted Home Adverts</font></h3>
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