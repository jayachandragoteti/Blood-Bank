<?PHP
?>
<!-- Footer -->
<div class="container-fluid pb-0 mb-0 justify-content-center text-white bg-danger ">
	<footer>
		<div class="row my-5 justify-content-center py-5">
			<div class="col-11">
				<div class="row ">
					<!-- Grid column -->
					<div class="col-md-8 mt-md-0 mt-3">
						<!-- Content -->
						<h3 class="text-uppercase text-left">The Online Blood Bank.</h3>
						<p>Excuses never save a life, Blood donation does</p>
					</div>
					<div class="col-xl-2 col-md-4 col-sm-4 col-12">
						<h6 class="mb-3 mb-lg-4 bold-text "><b>MENU</b></h6>
						<ul class="list-unstyled">
							
							<li><a href="index.php" class="text-white text-decoration-none ">Home</a></li>
							<?PHP if(isset($_SESSION['ReceiverLogin'])){?>
							<li><a href="myRequests.php" class="text-white text-decoration-none ">My Requests</a></li>
							<li><a href="changePassword.php" class="text-white text-decoration-none ">Change Password</a></li>
							<li><a href="./includes/logout.php" class="text-white text-decoration-none ">Logout</a></li>
							<?PHP }else{?>
							<li><a href="register.php" class="text-white text-decoration-none ">Register</a></li>
							<li><a href="login.php" class="text-white text-decoration-none ">Login</a></li>
							<?PHP }?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<hr>
		<!-- Copyright -->
		<div class="footer-copyright text-center py-3">©
			<script>
			document.write(new Date().getFullYear())
			</script> Copyright: <a href="https://jayachandragoteti.github.io/" class="text-white">Jayachandra Goteti</a> </div>
		<!-- Copyright -->
	</footer>
</div>
<!-- Footer -->