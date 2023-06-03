@extends('layouts.adminbase')

@section('title','Show House:' .$data->title)

 

  @section('content')

  <div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
            
					
            <div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h4 class="text-blue h4">Detail Data</h4>
							
						</div>
						<div class="pull-right">
							
						</div>
					</div>
					<table class="table table-striped">
						
							<tr>
								<th style="width: 250px">Id</th>
								<td>{{$data->id}}</td>
								
							</tr>
							<tr>
								<th style="width: 250px">Name & Surname</th>
								<td>{{$data->user->name}}</td>
								
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
							<tr>
								<th style="width: 50px">Admin:</th>
								<td>
								<form role ="form" action="{{route('userpanel.userhouse.update',['id'=>$data->id])}}" method="post">
									@csrf
									
									<select name="status">
										<option selected>{{$data->status}}</option>
										<option>True</option>
										<option>False</option>

									</select>

									<div class="card-footer">
										 <button  type="submit" class="btn btn-primary">Update Status</button>
										 
                        			</div>
								</form>
								</td>
								
							</tr>

					</table>
					<div class="collapse collapse-box" id="striped-table">
						<div class="code-box">
							<div class="clearfix">
								<a href="javascript:;" class="btn btn-primary btn-sm code-copy pull-left" data-clipboard-target="#striped-table-code"><i class="fa fa-clipboard"></i> Copy Code</a>
								<a href="#striped-table" class="btn btn-primary btn-sm pull-right" rel="content-y" data-toggle="collapse" role="button"><i class="fa fa-eye-slash"></i> Hide Code</a>
							</div>
							
						</div>
					</div>
				</div>
					



  @endsection