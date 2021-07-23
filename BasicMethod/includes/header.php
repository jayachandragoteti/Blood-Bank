<?PHP
?>
<!-- Header -->
<header class="navbar navbar-dark bg-danger">
	<div class="container-fluid ">
		<div class="container d-flex align-items-center justify-content-between">
			<div class="d-flex align-items-center"> <i class="far fa-calendar-alt  text-white">&nbsp</i><span id="dateYear" class="text-white"></span> </div>
			<div class="d-flex align-items-center"> <i class="far fa-clock text-white">&nbsp</i> <span id="datetime" class="text-white"></span> </div>
		</div>
	</div>
</header>
<!-- End Header -->
<!-- Navbar -->
<nav>
	<div class="logo mx-auto"> <img src="./assets/images/logo.png" height="100px" width="100px"> </div>
	<input type="checkbox" id="click">
	<label for="click" class="menu-btn"> <i class="fas fa-bars"></i> </label>
	<ul class="mx-auto">
		<li><a href="index.php" class="text-decoration-none ">Home</a></li>
		
		<?PHP if(isset($_SESSION['ReceiverLogin'])){?>
		<li><a href="myRequests.php" class="text-decoration-none ">My Requests</a></li>
		<li><a href="changePassword.php" class="text-decoration-none ">Change Password</a></li>
		<li><a href="./includes/logout.php" class="text-decoration-none ">Logout</a></li>
		<?PHP }else{?>
		<li><a href="register.php" class="text-decoration-none ">Register</a></li>
		<li><a href="login.php" class="text-decoration-none ">Login</a></li>
		<?PHP }?>
	</ul>
</nav>
<!-- End Navbar -->