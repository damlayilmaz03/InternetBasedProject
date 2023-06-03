@extends('layouts.adminbase')

@section('title','Edit Category')

 

  @section('content')

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
            <div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Form</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="/admin">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Edit Category : {{$data->title}}</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
									April 2022
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#">Export List</a>
									<a class="dropdown-item" href="#">Policies</a>
									<a class="dropdown-item" href="#">View Assets</a>
								</div>
							</div>
						</div>
					</div>
				</div>
            <div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h2">Edit Category :  {{$data->title}}</h2>
							
						</div>
						
					</div>
					<form role ="form" action="{{route('admin.category.update',['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                        @csrf

						<div class="form-group">
							<label>Parent Category</label>

							<select class="from-control select2" name="parent_id" style="width: 100%;">
							<option value="0" selected="selected">Main Category</option>
							@foreach($datalist as $rs)
                            	<option value="{{$rs->id}}" @if ($rs->id == $data->parent_id) selected="selected" @endif>
                                {{ \App\Http\Controllers\AdminPanel\CategoryController::getParentsTree($rs,$rs->title)}}</option>
                             @endforeach
						</select>
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Title</label>
							<input type="text" class="form-control" name="title" value="{{$data->title}}" >
						</div>
						<div class="form-group">
                        <div class="form-group">
							<label for="exampleInputEmail1">Keywords</label>
							<input type="text" class="form-control" name="keywords" value="{{$data->keywords}}" >
						</div>
						
						
				
						<div class="form-group">
                        
							<label for="exampleInputEmail1">Description</label>
							<input type="text" class="form-control" name="description" value="{{$data->description}}">
							
						</div>
						<div class="form-group">
							<label for="exampleInputFile">Image</label>
							<div class="input-group">
								<div class="custom-file">
								<input type="file" class="custom-file-input" name="image">
								<label class="custom-file-label" for="exampleInputFile">Choose image file</label>

								</div>
							</div>
						</div>

                        <div class="form-group">
                        <label>Status</label>
                        <select class="custom-select col-12" name="status">
                                    <option selected=>True</option>
                                    <option value="1">True</option>
                                    <option value="2">False</option> 

                                </select>
                                </div>

                                <div class="card-footer">

                                <button type="submit" class="btn btn-primary">Update Data</button>
                        </div>
					</form>
					
  @endsection