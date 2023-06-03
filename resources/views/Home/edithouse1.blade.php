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
     <div class="col-md-6">
	 <h3><font color="blue">Edit House</font></h3>
     <form role ="form" action="{{route('userpanel.updatehouse1',['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                        @csrf

						<div class="form-group">
							<label>Parent House</label>

							<select class="from-control select2" name="category_id" style="width: 100%;">
							@foreach($category as $rs)
                            	<option value="{{$rs->id}}" @if ($rs->id == $data->category_id) selected="selected" @endif>
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
							<label>Price</label>
							<input class="form-control" type="number" name="price" value="{{$data->price}}">
						</div>

						<div class="form-group">
                        <label>Property Type</label><br>
                        <select class="custom-select col-12" name="propertytype" value="{{$data->propertytype}}">
									<option selected="">{{$data->propertytype}}</option>
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
							<input class="form-control" type="text" name="location" value="{{$data->location}}">
						</div>

						<div class="form-group">
							<label>m²</label>
							<input class="form-control" type="number" name="metre" value="{{$data->metre}}">
						</div>

						<div class="form-group">
							<label>Number Of Rooms</label>
							<input class="form-control" type="number" name="numberofrooms" value="{{$data->numberofrooms}}">
						</div>

						<div class="form-group">
							<label>Building Age</label>
							<input class="form-control" type="number" name="buildingage" value="{{$data->buildingage}}">
						</div>

						<div class="form-group">
							<label>Floor Location</label>
							<input class="form-control" type="number" name="floorlocation" value="{{$data->floorlocation}}">
						</div>

						<div class="form-group">
							<label>Number Of Floors</label>
							<input class="form-control" type="number" name="numberoffloors" value="{{$data->numberoffloors}}">
						</div>

						<div class="form-group">
                        <label>Warm-up Type</label><br>
                        <select class="custom-select col-12" name="warmuptype">
									<option selected="">{{$data->warmuptype}}</option>
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
							<input class="form-control" type="number" name="numberofbathrooms" value="{{$data->numberofbathrooms}}">
						</div>

						<div class="form-group">
                        <label>Balcony</label><br>
                        <select class="custom-select col-12" name="balcony" value="{{$data->balcony}}">
									<option selected="">{{$data->balcony}}</option>
									<option >Yes</option>
									<option >No</option> 
									
								</select>
                                </div>

								<div class="form-group">
                        <label>Furnished</label><br>
                        <select class="custom-select col-12" name="furnished" value="{{$data->furnished}}">
									<option selected="">{{$data->furnished}}</option>
									<option >Yes</option>
									<option >No</option> 
									
								</select>
                                </div>
						
								<div class="form-group">
							<label>Using Status</label>
							<input class="form-control" type="text" name="usingstatus" value="{{$data->usingstatus}}">
						</div>		

						<div class="form-group">
							<label>Dues</label>
							<input class="form-control" type="number" name="dues" value="{{$data->dues}}">
						</div>

						<div class="form-group">
                        <label>Swap</label><br>
                        <select class="custom-select col-12" name="swap" >
									<option selected="">{{$data->swap}}</option>
									<option >Yes</option>
									<option >No</option> 
									
								</select>
                                </div>	
						
					
						
						<div class="form-group">
							<label>Detail</label>
							<textarea class="form-control" id="detail" name="detail" value="{{$data->detail}}">
							<td>{!! $data->detail !!}</td>
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
							

								</div>
							</div>
						</div>

                       

                                <div class="card-footer">

                                <button type="submit" class="btn btn-primary">Update Data</button>
                        </div>
					</form>

     </div>

     </div>
   </div>
 </section>



  @endsection