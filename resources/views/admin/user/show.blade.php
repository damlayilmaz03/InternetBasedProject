@extends('layouts.adminwindow')

@section('title','User Detail:' .$data->title)

 

  @section('content')

  <div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
            	
            <div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h4 class="text-blue h4">Detail User Data</h4>
							
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
								<td>{{$data->name}}</td>
								
							</tr>
							<tr>
								<th style="width: 50px">Email</th>
								<td>{{$data->email}}</td>
								
							</tr>
							<tr>
								<th style="width: 50px">Roles</th>
								<td>
								@foreach($data->roles as $role)
										{{$role->name}}
										<a href="{{route('admin.user.destroyrole',['uid'=>$data->id,'rid'=>$role->id])}}" onclick="return confirm('Delete ! Are you sure?')" >[x]</a>
									@endforeach
								</td>
								
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
								<th style="width: 50px">Add Role to User</th>
								<td>
								<form role ="form" action="{{route('admin.user.addrole',['id'=>$data->id])}}" method="post">
									@csrf
									<select name="role_id">
									@foreach($roles as $role)
									<option value="{{$role->id}}">{{$role->name}}</option>
									@endforeach
										
									</select>
									<div class="card-footer">
										 <button type="submit" class="btn btn-primary">Add Role</button>
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