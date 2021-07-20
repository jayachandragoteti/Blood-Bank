<!DOCTYPE html>
<html>

<head>
	<!-- Required meta tags -->
	<meta charset='utf-8'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<!--Favicon-->
	<link rel="icon" href="./assets/images/logo.png" type="image/gif" sizes="16x16">
	<!-- Page title -->
	<title>Blood Bank</title>
	<!-- Font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!-- Main CSS -->
	<link href="./assets/css/main.css" rel="stylesheet"/>
	<link href="./assets/css/landing.css" rel="stylesheet"/>
</head>

<body>
	<!-- Header -->
    <header class="navbar navbar-dark bg-danger">
        <div class="container-fluid ">
          <div class="container d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
				
            </div>
            <div class="d-flex align-items-center">
            <i class="far fa-clock text-white" >&nbsp</i> <span id="datetime" class="text-white"></span>
            </div>
          </div>
        </div>
    </header>
    <!-- End Header -->
    
      
	<!-- Navbar -->
	<nav>
		<div class="logo mx-auto"> 
            <img src="./assets/images/logo.png" height="100px" width="100px"> 
        </div>
		<input type="checkbox" id="click">
		<label for="click" class="menu-btn"> <i class="fas fa-bars"></i> </label>
		<ul class="mx-auto">
			<li><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Contact</a></li>
			<li><a href="#">Login</a></li>
		</ul>
	</nav>
	<!-- End Navbar -->
	<!-- Main -->
	<main>
		<div class="jumbotron jumbotron-fluid bg-danger " style="height: 350px;">
			<div class="container">
				<div class="row" >
				  <div class="col-sm mt-5" >
					<h1 class="display-4 text-center text-white fw-bold">
						The Online Blood Bank
						<i class="blink fa fa-heartbeat" ></i>
					</h1>
					<p class="lead text-center text-white font-weight-bold mt-5">Excuses never save a life, Blood donation does</p>
					<p class="lead text-white font-weight-bold text-center mt-5 ">
						<a class="btn btn-outline-light btn-dark rounded-pill p-2" href="#" role="button">Learn more</a>
					  </p>
				  </div>
				</div>
			  </div>
		</div>
		<div class="container">
			<div class="row"> </div>
		</div>
		<div class="container home " id="home">
			<div class="row">
			  <div class="col-lg">
				<div>
					<p>Do you feel you dont have much to offer ? <br> you have the most presious resource of all ,<br>the ability to save a life by donating blood !<br> help share this valuable gift with someone in need.</p>
				 </div>
				 <div class="Heads">
				   <h2>Ready To Donate Blood ?</h2>
				   <h3>OR</h3>
				   <h2>In Need Of Blood?</h2>
					</div>
					<div><center><button class="btn" id="signup">SIGN UP</button></center></div>
			  </div>
					<div class="col-lg img"><img src="D:\os\Blood donate\Blood donate\Jcproject\assets\images\Home.png" width="100%"></div>
			</div>
		  
		  </div>
	</main>
	<!-- End Main -->
	<script src="./assets/js/script.js"></script>
</body>


</html>