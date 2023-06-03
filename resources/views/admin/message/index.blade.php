@extends('layouts.adminbase')

@section('title','Contact Form Messages List')

 

  @section('content')

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				
				<div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">

							
							<h4 class="text-blue h4">Message List</h4>
						</div>
						<div class="pull-right">
							
						</div>
					</div>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th style="width: 10px">Id</th>
								<th>Name</th>
								<th>Phone</th>
								<th>Email</th>
								<th>Subject</th>
								<th>Status</th>
								<th style="width:40px">Delete</th>
								<th style="width:40px">Show</th>
							</tr>
						</thead>
						<tbody>

						@foreach($data as $rs)
							<tr>
								<td>{{$rs->id}}</td>
								<td>{{$rs->name}}</td>
								<td>{{$rs->phone}}</td>
								<td>{{$rs->email}}</td>
								<td>{{$rs->subject}}</td>
								<td>{{$rs->status}}</td>
								
                                <td><a href="{{route('admin.message.delete',['id'=>$rs->id])}}" onclick="return confirm('Delete ! Are you sure?')" class="btn btn-danger">Delete</a></td>
                                <td> <a href="{{route('admin.message.show',['id'=>$rs->id])}}" class="btn btn-warning"
								onclick="return !window.open(this.href,'','top=50 left=100 width=1100,height=700')">
								 Show
								</a>
								</td>
							<tr>
							
						@endforeach
						</tbody>
					</table>
					<div class="collapse collapse-box" id="border-table">
						<div class="code-box">
							<div class="clearfix">
								<a href="javascript:;" class="btn btn-primary btn-sm code-copy pull-left" data-clipboard-target="#border-table-code"><i class="fa fa-clipboard"></i> Copy Code</a>
								<a href="#border-table" class="btn btn-primary btn-sm pull-right" rel="content-y" data-toggle="collapse" role="button"><i class="fa fa-eye-slash"></i> Hide Code</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			
	</div>



  @endsection