<?PHP
include './includes/databaseConnection.php';
$msg = "";
$error = "";
if(isset($_POST['loginSubmit'])){
	if (!isset($_POST['loginEmail']) || $_POST['loginEmail'] == "" || !isset($_POST['loginPassword']) || $_POST['loginPassword'] == "" || !isset($_POST['LoginType']) || $_POST['LoginType'] == "") {
		$error = "All fields must be filled!";
	} else {
		session_start();
		$loginEmail = $connect -> real_escape_string($_POST['loginEmail']);
		$loginPassword = $connect -> real_escape_string($_POST['loginPassword']);
		$LoginType = $connect -> real_escape_string($_POST['LoginType']);
		// Login Type Check
		if ($LoginType == "Hospital") {
			$searchHospital = mysqli_query($connect,"SELECT * FROM `hospitals` WHERE `email` = '$loginEmail'");
			if (mysqli_num_rows($searchHospital) == 1) {
				$searchHospitalRow = mysqli_fetch_array($searchHospital);
				// If the password inputs matched the hashed password in the database
				if (password_verify($loginPassword, $searchHospitalRow['password'])) {
					$_SESSION['HospitalLogin'] = $searchHospitalRow['sno'];
					$msg = "Hospital logged successfully";
					header("Location: ./Hospital/dashboard.php");
				}else{
					$error = "Invalid Password!";
				}
			} else {
				$error = "Invalid Email!";
			}
		}elseif($LoginType == "Receiver"){
			$searchReceiver = mysqli_query($connect,"SELECT * FROM `receivers` WHERE `email` = '$loginEmail'");
			if (mysqli_num_rows($searchReceiver) == 1) {
				$searchReceiverRow = mysqli_fetch_array($searchReceiver);
				// If the password inputs matched the hashed password in the database
				if (password_verify($loginPassword, $searchReceiverRow['password'])) {
					$_SESSION['ReceiverLogin'] = $searchReceiverRow['sno'];
					$msg = "Receiver logged successfully";
					header("Location: index.php");
				}else{
					$error = "Invalid Password!";
				}
			} else {
				$error = "Invalid Email!";
			}
		}else {
			$error = "Invalid login!";
		}
	}
}
?>
	<!DOCTYPE html>
	<html>

	<head>
		<!-- Required meta tags -->
		<meta charset='utf-8'>
		<meta http-equiv='X-UA-Compatible' content='IE=edge'>
		<meta name='viewport' content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0,shrink-to-fit=no">
		<!--Favicon-->
		<link rel="icon"  href="./assets/images/logo.png">
		<!-- Page title -->
		<title>Login | Blood Bank</title>
		<!-- Font awesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<!-- Main CSS -->
		<link href="./assets/css/main.css" rel="stylesheet" /> </head>

	<body>
<!-- Header -->
<?php include './includes/header.php';?>
	<!-- End Header -->
		<!-- Main -->
		<main>
			<div class="container">
				<div class="row justify-content-md-center">
					<div class="col-md-6">
						<div class="container">
							<div class="card mt-5">
								<div class="card-body">
									<div class="container ">
										<div class="col-lg-12">
											<h1 class="text-center mb-5 text-danger">Login</h1> </div>
										<div class="row">
											<!-- Response Messages -->
											<?php if($error!=""){?><div class="text-danger"><strong><i class="far fa-times-circle text-danger">&nbsp</i> <?php echo htmlentities($error); ?> </strong></div><?php }else if($msg !=""){?><div class="text-success"><strong><i class="far fa-check-circle text-success">&nbsp</i><?php echo htmlentities($msg); ?> </strong></div><?php }?>
											<!-- End Response Messages -->
											<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
												<div class="col-md-12">
													<div class="mb-3">
														<label for="loginEmail" class="form-label">Email</label>
														<input type="email" class="form-control border-danger shadow-none" name="loginEmail" id="loginEmail" required/> 
													</div>
												</div>
												<div class="col-md-12">
													<div class="mb-3">
														<label for="loginPassword" class="form-label">Password</label>
														<input type="password" class="form-control border-danger shadow-none" name="loginPassword" id="loginPassword" required/> 
													</div>
												</div>
												<div class="col-md-12">
													<div class="mb-3">
														<label for="loginPassword" class="form-label">Select Your Login</label>
														<select class="form-select border-danger shadow-none" name="LoginType" aria-label="Select Your login" required>
															<option selected value="">---- Select ----</option>
															<option value="Hospital">Hospital</option>
															<option value="Receiver">Receiver</option>
														</select>
													</div>
												</div>
												<div class=" mb-3 text-center">
													<input type="submit" name="loginSubmit" class="btn btn-sm btn-danger fw-bold rounded-pill" style="font-size:20px;" value="Login"/>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
		<!-- End Main -->
		<!-- Footer -->
			<?php include './includes/footer.php';?>
		<!-- End Footer -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="./assets/js/script.js"></script>
	</body>

	</html>