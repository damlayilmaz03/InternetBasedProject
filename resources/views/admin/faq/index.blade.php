@extends('layouts.adminbase')

@section('title','FAQ List')

 

  @section('content')

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">

							<a href="{{route('admin.faq.create')}}" class="btn btn-block btn-success btn-sm" style="width: 200px">Add Question</a>

								
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
									April 2022
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#">Export List</a>
									<a class="dropdown-item" href="#">Policies</a>
									<a class="dropdown-item" href="#">View assets</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">

							
							<h4 class="text-blue h4">FAQ List</h4>
						</div>
						<div class="pull-right">
							
						</div>
					</div>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th style="width: 10px">Id</th>
								<th>Question</th>
								<th>Answer</th>
								<th>Status</th>
								<th style="width:40px">Edit</th>
								<th style="width:40px">Delete</th>
								<th style="width:40px">Show</th>
							</tr>
						</thead>
						<tbody>

						@foreach($data as $rs)
							<tr>
								<td>{{$rs->id}}</td>
								<td>{{$rs->question}}</td>
								<td>{!! $rs->answer !!}</td>
								<td>{{$rs->status}}</td>
								<td><a href="{{route('admin.faq.edit',['id'=>$rs->id])}}"class="btn btn-dark">Edit </a> </td>
                                <td><a href="{{route('admin.faq.delete',['id'=>$rs->id])}}" onclick="return confirm('Delete ! Are you sure?')" class="btn btn-danger">Delete</a></td>
                                <td><a href="{{route('admin.faq.show',['id'=>$rs->id])}}"class="btn btn-warning">Show </a></td>
								
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