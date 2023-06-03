@extends('layouts.adminwindow')

@section('title','Show Comment:' .$data->title)

 

  @section('content')

  <div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
            	
            <div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h4 class="text-blue h4">Detail Comment Data</h4>
							
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
								<th style="width: 50px">Name & Surname</th>
								<td>{{$data->user->name}}</td>
								
							</tr>
							<tr>
								<th style="width: 50px">House</th>
								<td>{{$data->house->title}}</td>
								
							</tr>
                            <tr>
								<th style="width: 50px">Subject</th>
								<td>{{$data->subject}}</td>
								
							</tr>
							<tr>
								<th style="width: 50px">Review</th>
								<td>{{$data->review}}</td>
								
							</tr>
							<tr>
								<th style="width: 50px">Rate</th>
								<td>{{$data->rate}}</td>
								
							</tr>
						
							<tr>
								<th style="width: 50px">Ip Number</th>
								<td>{{$data->IP}}</td>
								
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
								<th style="width: 50px">Admin Note:</th>
								<td>
								<form role ="form" action="{{route('admin.comment.update',['id'=>$data->id])}}" method="post">
									@csrf
									
									<select name="status">
										<option selected>{{$data->status}}</option>
										<option>True</option>
										<option>False</option>

									</select>

									<div class="card-footer">
										 <button type="submit" class="btn btn-primary">Update Comment</button>
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