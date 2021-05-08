<!DOCTYPE html>
<html>

<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
  <link type="text/css" rel="stylesheet" href="css/index.css" media="screen,projection" />
  <link type="text/css" rel="stylesheet" href="css/materialize.css" media="screen,projection" />
  <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css" media="screen,projection" />
  <link type="text/css" rel="stylesheet" href="css/font-awesome.css" media="screen,projection" />
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="css/index.css"/>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CMS DASHBOARD</title>
 

</head>

<body>
<div class="menu-sidebar">
<nav class="red" style="padding:0px 10px; position: fixed;">
	<div class="nav-wrapper">
		<a href="#" class="brand-logo">Symplified Learning</a>

		<a href="#" class="sidenav-trigger" data-target="mobile-nav">
			<i class="material-icons">menu</i>
		</a>

		<ul class="right hide-on-med-and-down "  >
			<li><a href="#">Home</a></li>
			<li><a href="#">Video</a></li>
			<li><a href="#">Service</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Contact</a></li>
			<li> <nav>
    <div class="nav-wrapper">
      <form>
        <div class="input-field">
          <input id="search" type="search" placeholder="SEARCH"required>
          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
  </nav></li>
		</ul>
	</div>
</nav>
</div>


<ul class="sidenav" id="mobile-nav">
	    <li><a href="#">Home</a></li>
			<li><a href="#">Video</a></li>
			<li><a href="#">Service</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Contact</a></li>
</ul>


<div class="row container">
    <div class="col s3 ">
      <div class="card">
        <div class="card-image">
          <img src="img/3D elev.jpg">
          <span class="card-title">Card Title</span>
        </div>
        <div class="card-content">
          <p>I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively.</p>
        </div>
        <div class="card-action">
          <a href="#">This is a link</a>
        </div>
      </div>
    </div>
	<div class="col s3 ">
      <div class="card">
        <div class="card-image">
          <img src="img/background.jpg">
          <span class="card-title">Card Title</span>
        </div>
        <div class="card-content">
          <p>I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively.</p>
        </div>
        <div class="card-action">
          <a href="#">This is a link</a>
        </div>
      </div>
    </div>
  </div>




<!--JavaScript at end of body for optimized loading-->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
   <script>
	$(document).ready(function(){
 		$('.sidenav').sidenav();
 	});

   </script>
</body>
</html>