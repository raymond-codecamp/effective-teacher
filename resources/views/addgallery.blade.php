<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Manage Gallery</title>
	<link rel="stylesheet" type="text/css" href="{{asset('/css/popup.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('/css/manageschools.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('/css/colours.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('/css/button.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('/css/pagination.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('/css/manageprograms.css')}}">
    <link href="{{asset('css/all.css')}}" rel="stylesheet"> <!--load all styles -->
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('/bootstrap/semantic.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/bootstrap/bootstrap.min.css')}}"/>

</head>
<body> 
	<nav class="navbar navbar-expand-md bg-teal navbar-gold" >
        <a class="navbar-brand" href="{{URL('/')}}"><img class="navbar-logo" src="{{asset('/images/logo.png')}}"></a>
        <div class="logo-text">
            EFFECTIVE TEACHER
          </div> 
        <div class="side-icon">
        	<i class="fas fa-user-tie browse"></i>
     		<div class="ui fluid popup bottom left transition hidden" style="top: 553px; left: 1px; bottom: auto; right: auto; width: 670px;">
			    <div class="ui four column relaxed divided grid">
			      <div class="column">
			        <h4 class="ui header">CONTROLLER</h4>
			        <div class="ui link list">
			          <a class="item" href="Logout"><div class="popup-content"><i class="fas fa-user-lock panel-icon"></i>&nbsp;&nbsp;&nbsp;Signout</div></a>
			        </div>
			        <div class="ui link list">
			          <a class="item" href="{{URL('/Settings/'.$key_validate)}}"><div class="popup-content"><i class="fas fa-user-cog panel-icon"></i>&nbsp;&nbsp;&nbsp;Settings</div></a>
			        </div>
			      </div>
			    </div>
			  </div>
			</div>
        </div>  
    </nav>
    <nav class="navbar navbar-expand-md bg-teal nav-bottom navbar-gold" >
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <i class="fas fa-landmark navbar-toggler-icon"></i>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav">
            <li class="bar-list"><a href="{{URL('/DashBoard/'.$key_validate)}}"><i class="fas fa-cogs panel-icon"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span>Home</span></a></li>
            <li class="bar-list"><a href="{{URL('/ManageSchools/'.$key_validate)}}"><i class="fas fa-school panel-icon"></i>&nbsp;&nbsp;<span>Schools</span></a></li>
            <li class="bar-list"><a href="#"><i class="fas fa-newspaper panel-icon"></i>&nbsp;&nbsp;<span>News</span></a></li>
            <li class="bar-list"><a href="{{URL('/ManagePrograms/'.$key_validate)}}"><i class="fas fa-calendar-alt panel-icon"></i>&nbsp;&nbsp;<span>Programs</span></a></li>
            <li class="bar-list"><a href="javascript:void(0)"><i class="fas fa-palette panel-icon"></i>&nbsp;&nbsp; <span>Gallery</span></a></li>
            <li class="nav-item form-inline"><a class="form-inline nav-link" href="Logout"><i class="fas fa-user-lock"></i>&nbsp;&nbsp;&nbsp;Logout</a></li>
          </ul>
        </div>
        </div>  
    </nav>
    <div class="row">
    	<div class="col-md-1">
    		<div class="card bar">
		    	<ul>
		    		<li class="bar-list"><a href="{{URL('/DashBoard/'.$key_validate)}}"><i class="fas fa-cogs panel-icon"></i>&nbsp;&nbsp;&nbsp;&nbsp<span>Home</span></a></li>
		    		<li class="bar-list"><a href="{{URL('/ManageSchools/'.$key_validate)}}"><i class="fas fa-school panel-icon"></i>&nbsp;&nbsp;<span>Schools</span></a></li>
		    		<li class="bar-list"><a href="#"><i class="fas fa-newspaper panel-icon"></i>&nbsp;&nbsp; <br><span>News</span></a></li>
		    		<li class="bar-list "><a href="{{URL('/ManagePrograms/'.$key_validate)}}"><i class="fas fa-calendar-alt panel-icon"></i>&nbsp;&nbsp; <br><span>Programs</span></a></li>
		    		<li class="bar-list active"><a href="javascript:void(0)"><i class="fas fa-palette panel-icon"></i>&nbsp;&nbsp; <br><span>Gallery</span></a></li>
		    	</ul>    	
		    </div>
    	</div>
    	<div class="col-md-10">
    		<div class="ui breadcrumb">
			  	<div class="section"><a href="{{URL('/DashBoard/'.$key_validate)}}">Control Panel</a></div>
			     <span class="divider">/</span>
           		 <div class="active section">Manage Gallery</div>
			</div>
			<div class="container">
			 	  <ul class="nav nav-tabs" id="manageTab" role="tablist">
				    <li class="nav-item">
				      <a class="nav-link active" id="program_history_tab" data-toggle="tab" href="#ManageProgramHistory"><i class="fas fa-history"></i>&nbsp;&nbsp;Program History</a>
				    </li>
				    <li class="nav-item">
				      <a class="nav-link" id="manage_department_tab" data-toggle="tab" href="#menu1"><i class="fas fa-edit"></i>&nbsp;&nbsp;Image Gallery</a>
				    </li>
				  </ul>

				  <!-- Tab panes -->
				  <div class="tab-content">
				    <div id="ManageProgramHistory" class="container tab-pane active" style="width:100%!important;"><br>
				      <div class="row">	      
				    		<div class="col-md-4">
				    			<h4>Program History</h4>
				    		</div>
				    		<div class="col-md-4 button-panel">
				    			<button class="btn-no-style text-lightteal" style="font-size: 15px;" data-toggle="modal" data-target="#addHistory"><i class="fa fa-history" aria-hidden="true" ></i>+ Add History</button>
				    		</div>
				    	</div>
				    	<div style="margin-top: 50px!important;">
						    @foreach($programHistory as  $key => $value)
						      	<div class="row text-lightteal">
									<div class="col-md-2 title"><div class="text-lightteal" style="font-size: 20px;"><br>
										<i class="fa fa-database" aria-hidden="true"></i>&nbsp;
											<h5 class="title-contrasted">{{$value->program_history_name}}</h5>
									</div>
									</div>
									<div class="col-md-5 title">
										<br>
										<h5 class="title-enlarged">{{$value->program_history_name}}</h5>
									</div>
									<div class="col-md-2">
										<br>
										<a href="#" class="text-lightteal"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
									</div>
								</div>
								<hr>
							@endforeach
						</div>
					</div>						  			
					<div class="modal" id="addHistory">
						    <div class="modal-dialog">
						      <div class="modal-content">					        
						        <!-- Modal body -->
						        <div class="modal-body">
						        	 <button type="button" class="close" data-dismiss="modal"><i class="far fa-times-circle"></i></button>
						          <div class="row">
						          	<div class="col-md-10">
						          		<h4>Add Program History</h4>
						          		<form method="post" enctype="multipart/form-data" action="/SaveProgramHistory">
						          			<div class="section" id="section_one_add_history">
						          				<div class="row">
								          			<label><span class="error">*&nbsp;</span>Program Type&nbsp;&nbsp;&nbsp;&nbsp;</label><br>
								          			<select id="program_history_type" name="program_history_type" class="form-control">
								          				<option value="">Select Program Type</option>
								          				@foreach($programType as $key => $department)
								          					<option value="{{$department->ProgramTypeId}}">{{$department->ProgramTypeName}}</option>
								          				@endforeach
								          			</select>
								          		</div>
								          		<div class="row">
								          			<label><span class="error">*&nbsp;</span>Program Name</label>
								          			<input type="text" id="program_history_name" name="program_history_name" class="form-control"/>
								          		</div>
								          		<div class="row">
								          			<label><span class="error">*&nbsp;</span>Program Description</label>
								          			<textarea id="program_history_description" name="program_history_description" class="form-control" ></textarea>
								          		</div>
								          		<div class="row">
								          			<button type="button" onclick="saveNextHistory();" class="btn btn-primary next">Next</button>
								          		</div>
						          			</div>
						          			<div class="section" id="section_two_add_history">
								          		<div class="row image-upload">
								          			<label for="file-input">
													    <img src="{{asset('/images/image.png')}}"/>
													</label>
   													<input id="file-input" name="image" type="file" />
  								          		</div>
								          		<div class="row">
								          			<label><span class="error">*&nbsp;</span>Enter Your Password</label>
								          			<input type="password" name="password" class="form-control">	
								          		</div>
								          		<div class="row">
								          			<input type="hidden" name="_token" value="{{csrf_token()}}">
									          		<button type="button" onclick="back();" class="btn btn-dark">Back</button>
									          		<button type="submit" class="btn btn-primary">Save</button>	
								          		</div>
						          			</div>
						          		</form>
						          	</div>					          	
						          </div>
						        </div>						         
						      </div>
						    </div>
				    	</div>
						  <div class="modal" id="deleteProgram">
							<div class="modal-dialog">
						      <div class="modal-content">					        
						        <!-- Modal body -->
						        <div class="modal-body">
						        	 <button type="button" class="close" data-dismiss="modal"><i class="far fa-times-circle"></i></button>
						          <div class="row">
					          		<h4>Do you want to delete <span id="program_title_delete"></span> ?</h4>
					          	  </div>
					          	  <div class="row">
					          		<form method="post" enctype="multipart/form-data" action="/DeletePrograms">
					          			<input type="hidden" name="programid" id="program_delete">
					          			<input type="hidden" name="programname" id="program_name_delete">
							          	<div class="row">
							          		<label>Enter Your Password</label>
							          		<input type="password" name="password" class="form-control">	
							          	</div>
							          	<div class="row">
							          		<input type="hidden" name="_token" value="{{csrf_token()}}">
							          		<button type="button" data-dismiss="modal" class="btn black">Cancel</button>
								       		<button type="submit" class="btn orange">Confirm</button>	
							        	</div>
					          		</form>		
					          	</div>					          	
					          </div>
					        </div>						         
					      </div>
					    </div>
				    <div id="menu1" class="container tab-pane fade"><br>
				      <h3>Manage Gallery</h3>
				      <p>No Data available!</p>
				    </div>
				    </div>
				  </div>
				</div>
				@if ($errors->any())
					<div class="alert alert-danger alert-dismissible">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>&nbsp;&nbsp;Caution!</strong>
						     <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					  </div>
				@endif
				@if (Session::has('alert'))
					<div class="alert alert-success alert-dismissible">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>&nbsp;&nbsp;Information!</strong> {{Session::get('alert')}}
					</div>
				@endif
		</div>
		<script type="text/javascript" src="{{asset('/bootstrap/jquery.min.js')}}"></script>
    	<script type="text/javascript" src="{{asset('/bootstrap/semantic.min.js')}}"></script>
    	<script type="text/javascript" src="{{asset('/bootstrap/popper.min.js')}}"></script>
    	<script type="text/javascript" src="{{asset('/bootstrap/bootstrap.min.js')}}"></script>
    	<script>
			$(document).ready(function(){
			  $('.toast').toast('show');
			  $('#programdescription').blur(function(){
			  		var txt = $('#programdescription').val();
			  		var txttostore = txt.replace(/\n/g, "|\n");
			  		$('#programdescription').val(txttostore);
			  });
			  $('#programdescription_edit').blur(function(){
			  		var txt = $('#programdescription_edit').val();
			  		var txttostore = txt.replace(/\n/g, "|\n");
			  		$('#programdescription_edit').val(txttostore);
			  });
			  $('[data-toggle="tooltip"]').tooltip();
			  $('.browse')
			  .popup({
			    inline     : true,
			    hoverable  : true,
			    position   : 'bottom center',
			    delay: {
			      show: 300,
			      hide: 800
			    }
			  })
			;
			});
		</script>
</body>
</html>