@extends('layouts.adminbase')

@section('title','Add Category')

 

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
									<li class="breadcrumb-item active" aria-current="page">Add Category</li>
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
							<h4 class="text-blue h4">ADD CATEGORY</h4>
							
						</div>
						
					</div>
					<form role ="form" action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data">
                        @csrf


						<div class="form-group">
							<label>Parent Category</label>

							<select class="from-control select2" name="parent_id" style="width: 100%;">
							<option value="0" selected="selected">Main Category</option>
							@foreach($data as $rs)
								<option value="{{$rs->id}}">{{\App\Http\Controllers\AdminPanel\CategoryController::getParentsTree($rs, $rs->title) }}</option>
								@endforeach
						</select>
						</div>

						<div class="form-group">
							<label>Title</label>
							<input class="form-control" type="text" name="title" placeholder="Title">
						</div>
						
						
						
						<div class="form-group">
							<label>Keywords</label>
							<input class="form-control" type="text" name="keywords" placeholder="Keywords">
						</div>

                        <div class="form-group">
							<label>Description</label>
							<input class="form-control" type="text" name="description" placeholder="Description">
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
									<option selected="">Choose...</option>
									<option >True</option>
									<option >False</option> 
									
								</select>
                                </div>
                                
                                <div class="card-footer">
							
                                <button type="submit" class="btn btn-primary">Save</button>
						</div>
						
					</form>
					


  @endsection










  