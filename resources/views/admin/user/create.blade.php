@extends('layouts.adminbase')

@section('title','Add House')

 @section('head')
 <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
 @endsection

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
									<li class="breadcrumb-item"><a href="/admin">House</a></li>
									<li class="breadcrumb-item active" aria-current="page">Add House</li>
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
							<h4 class="text-blue h4">ADD HOUSE</h4>
							
						</div>
						
					</div>
					<form role ="form" action="{{route('admin.house.store')}}" method="post" enctype="multipart/form-data">
                        @csrf


						<div class="form-group">
							<label>Parent House</label>

							<select class="from-control select2" name="category_id" style="width: 100%;">
							
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
							<label>Price</label>
							<input class="form-control" type="number" name="price" value="0">
						</div>
						
						<div class="form-group">
                        <label>Property Type</label>
                        <select class="custom-select col-12" name="propertytype">
									<option selected="">Choose...</option>
									<option >Apartment</option>
									<option >Residence</option> 
									<option >Detached house</option> 
									<option >Villa</option> 
									<option >Farm House</option> 
									<option >Mansion</option> 
									<option >Summery</option> 
									<option >Prefabricated house</option> 
									<option >Cooperative</option> 
										
								</select>
                                </div>
						<div class="form-group">
							<label>Location</label>
							<input class="form-control" type="text" name="location" placeholder="Location">
						</div>

						<div class="form-group">
							<label>m²</label>
							<input class="form-control" type="number" name="metre" value="0">
						</div>

						<div class="form-group">
							<label>Number Of Rooms</label>
							<input class="form-control" type="number" name="numberofrooms" value="0">
						</div>

						<div class="form-group">
							<label>Building Age</label>
							<input class="form-control" type="number" name="buildingage" value="0">
						</div>

						<div class="form-group">
							<label>Floor Location</label>
							<input class="form-control" type="number" name="floorlocation" value="0">
						</div>

						<div class="form-group">
							<label>Number Of Floors</label>
							<input class="form-control" type="number" name="numberoffloors" value="0">
						</div>

						<div class="form-group">
                        <label>Warm-up Type</label>
                        <select class="custom-select col-12" name="warmuptype">
									<option selected="">Choose...</option>
									<option >Natural Gas Central Heating System</option>
									<option >Liquid Fuel Central Heating Systems</option> 
									<option >LPG Central Heating Systems</option> 
									<option >Wood and Coal Heating Systems</option> 
									<option >Solar Heating Systems</option> 
									<option >Water Heating Systems with Thermosiphon</option> 	
								</select>
                                </div>

						<div class="form-group">
							<label>Number Of Bathrooms</label>
							<input class="form-control" type="number" name="numberofbathrooms" value="0">
						</div>

						<div class="form-group">
                        <label>Balcony</label>
                        <select class="custom-select col-12" name="balcony">
									<option selected="">Choose...</option>
									<option>Yes</option>
									<option>No</option> 
									
								</select>
                                </div>

								<div class="form-group">
                        <label>Furnished</label>
                        <select class="custom-select col-12" name="furnished">
									<option selected="">Choose...</option>
									<option >Yes</option>
									<option >No</option> 
									
								</select>
                                </div>
						
								<div class="form-group">
							<label>Using Status</label>
							<input class="form-control" type="text" name="usingstatus" placeholder="Using Status">
						</div>		

						<div class="form-group">
							<label>Dues</label>
							<input class="form-control" type="number" name="dues" value="0">
						</div>

						<div class="form-group">
                        <label>Swap</label>
                        <select class="custom-select col-12" name="swap">
									<option selected="">Choose...</option>
									<option >Yes</option>
									<option >No</option> 
									
								</select>
                                </div>
						
								
						
						<div class="form-group">
							<label>Detail</label>
							<textarea class="form-control" id="detail" name="detail" >

							</textarea>
							<script>
                        ClassicEditor
                                .create( document.querySelector( '#detail' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                </script>
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










  