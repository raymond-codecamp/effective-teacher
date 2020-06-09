<!DOCTYPE html>
<html>
<head>
	<title>Control Panel</title>
	<link rel="stylesheet" type="text/css" href="{{asset('/css/dashboard.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/popup.css')}}">
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
			        <h4 class="ui header">{{strtoupper($user)}}</h4>
			        <div class="ui link list">
			          <a class="item" href="Logout"><div class="popup-content"><i class="fas fa-user-lock panel-icon"></i>&nbsp;&nbsp;&nbsp;Signout</div></a>
			        </div>
			        <div class="ui link list">
			           <a class="item" href="{{URL('/Settings/'.$key)}}"><div class="popup-content"><i class="fas fa-user-cog panel-icon"></i>&nbsp;&nbsp;&nbsp;Settings</div></a>
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
            <li class="bar-list"><a href="#"><i class="fas fa-cogs panel-icon"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span>Home</span></a></li>
            <li class="bar-list"><a href="{{URL('/ManageSchools/'.$key)}}"><i class="fas fa-school panel-icon"></i>&nbsp;&nbsp;<span>Schools</span></a></li>
            <li class="bar-list"><a href="#"><i class="fas fa-newspaper panel-icon"></i>&nbsp;&nbsp;<span>News</span></a></li>
            <li class="bar-list"><a href="{{URL('/ManagePrograms/'.$key)}}"><i class="fas fa-calendar-alt panel-icon"></i>&nbsp;&nbsp;<span>Programs</span></a></li>
            <li class="bar-list"><a href="{{URL('/ManageGallery/'.$key)}}"><i class="fas fa-palette panel-icon"></i>&nbsp;&nbsp; <span>Gallery</span></a></li>
            <li class="nav-item form-inline"><a class="form-inline nav-link" href="Logout"><i class="fas fa-user-lock"></i>&nbsp;&nbsp;&nbsp;Logout</a></li>
          </ul>
        </div>
        </div>  
    </nav>
    <div class="row">
    	<div class="col-md-1">
    		<div class="card bar">
		    	<ul>
		    		<li class="bar-list active"><a href="#"><i class="fas fa-cogs panel-icon"></i>&nbsp;&nbsp;&nbsp;&nbsp<span>Home</span></a></li>
		    		<li class="bar-list"><a href="{{URL('/ManageSchools/'.$key)}}"><i class="fas fa-school panel-icon"></i>&nbsp;&nbsp;<span>Schools</span></a></li>
		    		<li class="bar-list"><a href="#"><i class="fas fa-newspaper panel-icon"></i>&nbsp;&nbsp; <br><span>News</span></a></li>
		    		<li class="bar-list"><a href="{{URL('/ManagePrograms/'.$key)}}"><i class="fas fa-calendar-alt panel-icon"></i>&nbsp;&nbsp; <br><span>Programs</span></a></li>
		    		<li class="bar-list"><a href="{{URL('/ManageGallery/'.$key)}}"><i class="fas fa-palette panel-icon"></i>&nbsp;&nbsp; <br><span>Gallery</span></a></li>
		    	</ul>    	
		    </div>
    	</div>
    	<div class="col-md-10">
    		<div class="ui breadcrumb">
			  <div class="active section">Control Panel</div>
			</div>
    		<hr>
    		<div class="footer">
	          copyright &copy 2019-2020 effectiveteacher
	        </div>
       	</div>
   </div>
	<script type="text/javascript" src="{{asset('/bootstrap/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/bootstrap/semantic.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/bootstrap/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/bootstrap/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/library.js')}}"></script>
</body>
</html>