@extends('layouts.adminwindow')

@section('title','House Image Gallery')

 

  @section('content')

<h3>{{$house->title}}</h3>
	<hr>
  <form role ="form" action="{{route('userpanel.image.store',['pid'=>$house->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
						
						<div class="input-group">

							<label>Title</label>
							<input class="form-control" type="text" name="title" placeholder="Title">	
								<div class="custom-file">
									<input type="file" class="custom-file-input" id="exampleInputFile" name="image">
									<label class="custom-file-label" for="exampleInputFile">Choose file</label>
								</div>
							<div class="input-group-append">
								<input class="input-group-text" type="submit" value="Upload">
							</div>					
						</div>

						
					</form>


	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
			
				<div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">

							
							<h4 class="text-blue h4">House Image List</h4>
						</div>
						<div class="pull-right">
							
						</div>
					</div>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th style="width: 10px">Id</th>
								<th>Title</th>
								<th>Image</th>
								<th style="width:40px">Delete</th>
							</tr>
						</thead>
						<tbody>

						@foreach($images as $rs)
							<tr>
								<td>{{$rs->id}}</td>
								<td>{{$rs->title}}</td>
								
								
								<td>
									@if ($rs->image)
									<img src="{{ asset('storage/img/'.$rs->image)}}" style="height: 40px">
									@endif
									
							
								</td>
							
                                <td><a href="{{route('userpanel.image.delete',['pid'=>$house->id,'id'=>$rs->id])}}" onclick="return confirm('Delete ! Are you sure?')" class="btn btn-danger">Delete</a></td>
								
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
