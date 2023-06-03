@extends('layouts.frontbase')

@section('title','Add House | '.$setting->title)
@section('description', $setting->description)
@section('keywords', $setting->keywords)


@section('head')
 <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
 @endsection
  @section('content')
  


 <!-- Start Proerty header  -->

 <section id="aa-property-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-property-header-inner">
            <h2>Add House</h2>
            <ol class="breadcrumb">
            <li><a href="{{route('admin')}}">User Panel</a></li>            
            <li class="active">Add House</li>
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
	 <div class="col-md-2">
         <h3><font color="blue">USER MENU</font></h3>
    @include('home.user.usermenu')
         </div>
     <div class="col-md-7">
	 <h3><font color="blue">Show House</font></h3>
     

     <table class="table table-striped">
						
							<tr>
								<th style="width: 250px">Id</th>
								<td>{{$data->id}}</td>
								
							</tr>
							<tr>
								<th style="width: 50px">Category</th>
								<td>
								
								{{ \App\Http\Controllers\AdminPanel\CategoryController::getParentsTree($data->category,$data->category->title)}}
								</td>
								
							</tr>
                            <tr>
								<th style="width: 50px">Title</th>
								<td>{{$data->title}}</td>
								
							</tr>
                            <tr>
								<th style="width: 50px">Keywords</th>
								<td>{{$data->keywords}}</td>
								
							</tr>
							<tr>
								<th style="width: 50px">Description</th>
								<td>{{$data->description}}</td>
								
							</tr>
							<tr>
								<th style="width: 50px">Price</th>
								<td>{{$data->price}}</td>
								
							</tr>
							<tr>
								<th style="width: 50px">Property Type</th>
								<td>{{$data->propertytype}}</td>
								
							</tr>
							<tr>
								<th style="width: 50px">Location</th>
								<td>{{$data->location}}</td>
								
							</tr>
							<tr>
								<th style="width: 50px">m²</th>
								<td>{{$data->metre}}</td>
								
							</tr>
							<tr>
								<th style="width: 50px">Number Of Rooms</th>
								<td>{{$data->numberofrooms}}</td>
								
							</tr>
							<tr>
								<th style="width: 50px">Building Age</th>
								<td>{{$data->buildingage}}</td>
								
							</tr>
							<tr>
								<th style="width: 50px">Floor Location</th>
								<td>{{$data->floorlocation}}</td>
								
							</tr>
							<tr>
								<th style="width: 50px">Number Of Floors</th>
								<td>{{$data->numberoffloors}}</td>
								
							</tr>
							<tr>
								<th style="width: 50px">Warm-up Type</th>
								<td>{{$data->warmuptype}}</td>
								
							</tr>
							<tr>
								<th style="width: 50px">Number Of Bathrooms</th>
								<td>{{$data->numberofbathrooms}}</td>
								
							</tr>
							<tr>
								<th style="width: 50px">Balcony</th>
								<td>{{$data->balcony}}</td>
								
							</tr>
							<tr>
								<th style="width: 50px">Furnished</th>
								<td>{{$data->furnished}}</td>
								
							</tr>
							<tr>
								<th style="width: 50px">Using Status</th>
								<td>{{$data->usingstatus}}</td>
								
							</tr>
							<tr>
								<th style="width: 50px">Dues</th>
								<td>{{$data->dues}}</td>
								
							</tr>
							<tr>
								<th style="width: 50px">Swap</th>
								<td>{{$data->swap}}</td>
								
							</tr>

							<tr>
								<th style="width: 50px">Detail</th>
								<td>{!! $data->detail !!}</td>
								
							</tr>
                            <tr>
								<th style="width: 50px">Image</th>
								
								<td><img src="{{ asset('storage/img/'.$data->image)}}" style="height: 40px"></td>
									
							</tr>
                            <tr>
								<th style="width: 50px">Status</th>
								<td>{{$data->status}}</td>
								
							</tr>
                            <tr>
								<th style="width: 50px">Created Date</th>
								<td>{{$data->created_at}}</td>
								
							</tr>
                            <tr>
								<th style="width: 50px">Update Date</th>
								<td>{{$data->updated_at}}</td>
								
							</tr>

					</table>

     </div>

     </div>
   </div>
 </section>



  @endsection