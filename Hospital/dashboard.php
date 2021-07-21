<?PHP 
session_start();
if (!isset($_SESSION['HospitalLogin'])) {
	header("Location: ./../includes/logout.php");
}
?>
	<!doctype html>
	<html lang="en">

	<head>
		<!-- Required meta tags -->
		<meta charset='utf-8'>
		<meta http-equiv='X-UA-Compatible' content='IE=edge'>
		<meta name='viewport' content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0,shrink-to-fit=no">
		<!--Favicon-->
		<link rel="icon" href="./../assets/images/logo.png">
		<!-- Page title -->
		<title>Hospital Profile | Blood Bank</title>
		<!-- Font awesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
		<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		<link rel="stylesheet" href="./../assets/css/style.css"> </head>

	<body>
		<div class="wrapper d-flex align-items-stretch">
			<!-- Header -->
			<?PHP include './includes/header.php';?>
				<!-- End Header -->
				<!-- Deatils-->
				<div id="content" class="p-4 p-md-12 pt-5">
				<div class="container col-md-10 ">
					<div class="container overflow-hidden mt-5 p-5 bg-white rounded text-white shadow rounded bg-body">
						<div class="container border-bottom border-danger mb-5">
							<div class="head  mt-0 pl-0">
								<h2 class="text-danger fw-bold large">Hospital Details </h2> </div>
						</div>
						<div class="col-md-12">
							<div class="card mb-3">
								<div class="card-body">
									<div class="row">
										<div class="col-sm-3 ">
											<h6 class="mb-0 text-danger">Hospital Name</h6> 
										</div>
										<div class="col-sm-9 text-secondary"> Kenneth Valdez </div>
									</div>
									<hr>
									<div class="row">
										<div class="col-sm-3">
											<h6 class="mb-0 text-danger">Email</h6> </div>
										<div class="col-sm-9 text-secondary"> fip@jukmuh.al </div>
									</div>
									<hr>
									<div class="row">
										<div class="col-sm-3">
											<h6 class="mb-0 text-danger">Phone</h6> </div>
										<div class="col-sm-9 text-secondary"> (239) 816-9029 </div>
									</div>
									<hr>
									<div class="row">
										<div class="col-sm-3">
											<h6 class="mb-0 text-danger">Address</h6> </div>
										<div class="col-sm-9 text-secondary"> (320) 380-4539 </div>
									</div>
								</div>
								<!--Section: Block Content-->
							</div>
						</div>
					</div>
				</div>
				</div>
						<!-- end change password -->
						<script src="./../assets/js/jquery.min.js"></script>
						<script src="./../assets/js/popper.js"></script>
						<script src="./../assets/js/bootstrap.min.js"></script>
						<script src="./../assets/js/main.js"></script>
	</body>

	</html>