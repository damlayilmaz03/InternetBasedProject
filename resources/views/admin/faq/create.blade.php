@extends('layouts.adminbase')

@section('title','Add FAQ')

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
									<li class="breadcrumb-item"><a href="/admin">FAQ</a></li>
									<li class="breadcrumb-item active" aria-current="page">Add FAQ</li>
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
							<h4 class="text-blue h4">ADD FAQ</h4>
							
						</div>
						
					</div>
					<form role ="form" action="{{route('admin.faq.store')}}" method="post" enctype="multipart/form-data">
                        @csrf

						<div class="form-group">
							<label>Question</label>
							<input class="form-control" type="text" name="question" placeholder="Question">
						</div>

						<div class="form-group">
							<label>Answer</label>
							<textarea class="form-control" id="answer" name="answer" >

							</textarea>
							<script>
                        ClassicEditor
                                .create( document.querySelector( '#answer' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                </script>
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










  