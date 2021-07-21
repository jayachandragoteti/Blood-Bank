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
				<div class="container col-md-8 ">
				<div class="container mt-5 z-index">
								<div class="container overflow-hidden mt-5 p-5 bg-white rounded text-white shadow rounded bg-body ">
									<div class="container border-bottom border-danger mb-5">
										<div class="head  mt-0 pl-0">
											<h2 class="text-danger fw-bold large">Hospital Details</h2> 
										</div>
									</div>
									<div class="col-sm-10 ml-5 mt-3">
										<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="md-5">

											<div class="mb-3 text-danger">
												<label for="HospitalName" class="form-label">Hospital Name</label>
												<input type="text" class="form-control border-danger border shadow-none" name="HospitalName" id="HospitalName" required/> 
											</div>
											<div class="mb-3 text-danger ">
												<label for="contactNo" class="form-label">Contact No</label>
												<input type="phone" name="HospitalContactNo" class="form-control border-danger border shadow-none" id="contactNo" required/> 
											</div>
											<div class="mb-3 text-danger">
												<label for="email" class="form-label">Email</label>
												<input type="email" name="HospitalEmail" class="form-control border-danger border shadow-none" id="email" required/> 
											</div>
											<div class="mb-3 text-danger ">
												<label for="city" class="form-label">City</label>
												<input type="text" name="HospitalCity" class="form-control border-danger  border shadow-none" id="city" list="citylist" required/>
											</div>
											<div class=" mb-3 text-danger text-center mt-5">
												<input type="submit" class="btn btn-sm btn-danger fw-bold " name="Update" style="font-size:20px;" value="Update" /> 
											</div>
										</form>
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