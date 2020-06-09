<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About Us</title>
    <link rel="stylesheet" type="text/css" href="{{asset('/css/about.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/navbar.css')}}">
    <link href="{{asset('css/all.css')}}" rel="stylesheet"> <!--load all styles -->
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('/bootstrap/semantic.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/bootstrap/bootstrap.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/css/demo-page-styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/breaking-news-ticker.css')}}">
</head>
<body>
     <nav class="navbar navbar-expand-md bg-teal navbar-teal">
          <a class="navbar-brand" href="{{URL('/')}}"><img class="navbar-logo" src="{{asset('/images/logo.png')}}"></a>
          </div>  
        </nav>
         <nav class="navbar navbar-expand-md bg-gold navbar-gold fixedElement">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <i class="fas fa-landmark navbar-toggler-icon"></i>
          </button>
          <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="{{URL('/')}}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link link-active" href="#">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{URL('/Programs')}}">Programs</a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="{{URL('/RegisterProgram')}}">Registration</a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="{{URL('/Publications')}}">Publications</a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="{{URL('/Gallery')}}">Gallery</a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="#">Contact Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{URL('/Login')}}">Login</a>
              </li>  
            </ul>
          </div>  
        </nav>
        <div class="about-container">
          <ul class="about">
            <li>
              <h4>About Us</h4>
              <p>
                A short paragraph on the organization and intension of the site.
              </p>
            </li>
            <li>
              <h4>Vision</h4>
              <p>
                Vision of the organization
              </p>
            </li>
            <li>
              <h4>Mission</h4>
              <p>
                Mission of the organization
              </p>
            </li>
          </ul>
        </div>
        <div class="footer">copyright &copy 2019-2020 EFFECTIVETEACHER</div>
        </div>     
        </div>
    <script type="text/javascript" src="{{asset('/bootstrap/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/bootstrap/semantic.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/bootstrap/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/bootstrap/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/library.js')}}"></script>
</body>
</html>