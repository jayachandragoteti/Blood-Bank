<?PHP 
include './includes/databaseConnection.php';
// Receiver Registration
$msg="";
$error="";
if (isset($_POST['ReceiverRegistration'])) {
	if (isset($_POST['receiverName']) && $_POST['receiverName'] != "" && isset($_POST['receiverEmail']) && $_POST['receiverEmail'] != "" && isset($_POST['receiverContactNo']) && $_POST['receiverContactNo'] != "" && isset($_POST['receiverAddress']) && $_POST['receiverAddress'] != "" && isset($_POST['bloodGroup']) && $_POST['bloodGroup'] != "" && isset($_POST['receiverPassword']) && $_POST['receiverPassword'] != "" && isset($_POST['receiverConfirmCPassword']) && $_POST['receiverConfirmCPassword'] != "") {
		$receiverEmail = $connect -> real_escape_string($_POST['receiverEmail']);
		$receiverContactNo = $connect -> real_escape_string($_POST['receiverContactNo']);
		$SelectReceiver = mysqli_query($connect,"SELECT * FROM `receivers` WHERE  `email` ='$receiverEmail' OR `contactNo` = '$receiverContactNo'");
		if (mysqli_num_rows($SelectReceiver) > 0) {
			$error = "Email or Contact number is already exists!";
		}else {
			$receiverName =  $connect -> real_escape_string($_POST['receiverName']);
			// Allow +, - and . in phone number
			$filtered_phone_number = filter_var($receiverContactNo, FILTER_SANITIZE_NUMBER_INT);
			// Remove "-" from number
			$phone_to_check = str_replace("-", "", $filtered_phone_number);
			// Check the lenght of number
			$receiverAddress = $connect -> real_escape_string($_POST['receiverAddress']);
			$bloodGroup = $connect -> real_escape_string($_POST['bloodGroup']);
			$receiverPassword = $connect -> real_escape_string($_POST['receiverPassword']);
			$hashed_password = password_hash($receiverPassword, PASSWORD_DEFAULT);
			$receiverConfirmCPassword = $connect -> real_escape_string($_POST['receiverConfirmCPassword']);
			// Validate E-mail
			if (!filter_var($receiverEmail, FILTER_VALIDATE_EMAIL)) {
				$error = "Invalid email format!";
			}elseif(strlen($phone_to_check) < 10 || strlen($phone_to_check) > 14) {
				// This can be customized if you want phone number from a specific country
				$error = "Invalid phone number!";
			}elseif(strlen($receiverPassword) <= 8) {
				$error = "Password should contain at least eight characters. *";
			}elseif($receiverPassword != $receiverConfirmCPassword) {
				$error = "Password and confirm password should be same!";
			}else {
				$RegisterReceiver = mysqli_query($connect,"INSERT INTO `receivers`(`name`, `email`, `contactNo`, `address`, `bloodType`, `password`) VALUES ('$receiverName','$receiverEmail','$receiverContactNo','$receiverAddress','$bloodGroup','$hashed_password')");
				if ($RegisterReceiver) {
					$msg="Registered successfully.";
				} else {
					$error = "Registration failed,try again!";
				}
			}
		}
	} else {
		$error = "All fields must be filled!";
	}	
}
// End Receiver Registration

// Hospital Registration
if (isset($_POST['HospitalRegistration'])) {
	if (isset($_POST['HospitalName']) && $_POST['HospitalName'] != "" && isset($_POST['HospitalContactNo']) && $_POST['HospitalContactNo'] != "" && isset($_POST['HospitalEmail']) && $_POST['HospitalEmail'] != "" && isset($_POST['HospitalCity']) && $_POST['HospitalCity'] != "" && isset($_POST['HospitalPassword']) && $_POST['HospitalPassword'] != "" && isset($_POST['HospitalConfirmPassword']) && $_POST['HospitalConfirmPassword'] != "") {
		$HospitalContactNo = $connect -> real_escape_string($_POST['HospitalContactNo']);
		$HospitalEmail = $connect -> real_escape_string($_POST['HospitalEmail']);
		$SelectHospital = mysqli_query($connect,"SELECT * FROM `hospitals` WHERE  `email` ='$HospitalEmail' OR `contactNo` = '$HospitalContactNo'");
		if (mysqli_num_rows($SelectHospital) > 0) {
			$error = "Email or Contact number is already exists!";
		}else {
			$HospitalName =  $connect -> real_escape_string($_POST['HospitalName']);
			// Allow +, - and . in phone number
			$filtered_phone_number = filter_var($HospitalContactNo, FILTER_SANITIZE_NUMBER_INT);
			// Remove "-" from number
			$phone_to_check = str_replace("-", "", $filtered_phone_number);
			// Check the lenght of number
			$HospitalCity = $connect -> real_escape_string(strtoupper($_POST['HospitalCity']));
			$HospitalPassword = $connect -> real_escape_string($_POST['HospitalPassword']);
			$hashed_password = password_hash($HospitalPassword, PASSWORD_DEFAULT);
			$HospitalConfirmPassword = $connect -> real_escape_string($_POST['HospitalConfirmPassword']);
			// Validate E-mail
			if (!filter_var($HospitalEmail, FILTER_VALIDATE_EMAIL)) {
				$error = "Invalid email format!";
			}elseif(strlen($phone_to_check) < 10 || strlen($phone_to_check) > 14) {
				// This can be customized if you want phone number from a specific country
				$error = "Invalid email format!";
			}elseif(strlen($HospitalPassword) <= 8) {
				$error = "Password should contain at least eight characters. *";
			}elseif($HospitalPassword != $HospitalConfirmPassword) {
				$error = "Password and confirm password should be same!";
			}else {
				$RegisterHospital = mysqli_query($connect,"INSERT INTO `hospitals`(`hospitalName`, `contactNo`, `email`, `city`, `password`) VALUES ('$HospitalName','$HospitalContactNo','$HospitalEmail','$HospitalCity','$hashed_password')");
				if ($RegisterHospital) {
					$msg="Hospital registered successfully.";
				} else {
					$error = "Registration failed,try again!";
				}
			}
		}
	} else {
		$error = "All fields must be filled!";
	}	
}
// End Hospital Registration
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
	<title>Register | Blood Bank</title>
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
			<div class="container mt-5">
				<div class="row">
					<div class="card">
						<div class="card-body">
							<div class="row justify-content-md-center shift-register">
								<div class="col-lg-4">
									<button class="btn btn-sm btn-danger rounded-pill fw-bold HospitalRegistrationButton" disabled>Hospital</button>
								</div>
								<div class="col-lg-4">
									<button class="btn btn-sm btn-danger rounded-pill fw-bold ReceiverRegistrationButton">Receiver</button>
								</div>
							</div>
							<!--======================Receiver registration================================-->
							<div class="container mt-5 ReceiverRegistrationForm " style="display: none;">
								<div class="row mt-5 ">
									<div class="col-lg-12">
										<h1 class="text-center mb-5 text-danger">Receiver Registration</h1>
									</div>
									<div class="col-sm-6"> 
										<img src="./assets/images/Hopital1.png" class="img-fluid mt-5 h-75 w-100" alt="...">
									</div>
									<div class="col-sm-6">
										<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="md-5">
											
											<div class="mb-3">
												<label for="receivername" class="form-label">Name</label>
												<input type="text" class="form-control border-danger shadow-none" name="receiverName" id="Hospitalname" required/> 
											</div>
											<div class="mb-3">
												<label for="receiveremail" class="form-label">Email</label>
												<input type="email" class="form-control border-danger shadow-none" name="receiverEmail" id="Hospitalname" required/> 
											</div>
											<div class="mb-3 ">
												<label for="contactNo" class="form-label">Contact no</label>
												<input type="tel" name="receiverContactNo" class="form-control border-danger shadow-none" id="contactNo" required/> 
											</div>
											<div class="mb-3">
												<label for="address" class="form-label">Address</label>
												<input type="text" name="receiverAddress" class="form-control border-danger shadow-none" id="email" required/> 
											</div>
											<div class="mb-3 ">
												<label for="city" class="form-label">Blood type</label>
												<select class="form-select shadow-none border-danger" aria-label="Default select example" name="bloodGroup" id="bloodtype">
													<option selected value="">Select Blood group</option>
													<option value="A+">A+</option>
													<option value="A-">A-</option>
													<option value="B+">B+</option>
													<option value="B-">B-</option>
													<option value="O+">O+</option>
													<option value="O-">O-</option>
													<option value="AB+">AB+</option>
													<option value="AB-">AB-</option>
												</select>
											</div>
											<div class="mb-3 ">
												<label for="password" class="form-label">Password</label>
												<input type="password" name="receiverPassword" class="form-control border-danger shadow-none" id="exampleCheck1" required/> 
											</div>
											<div class="mb-3">
												<label for="cpassword" class="form-label">Confirm password</label>
												<input type="password" name="receiverConfirmCPassword" class="form-control border-danger shadow-none" id="exampleCheck1" required/> 
											</div>
											<div class=" mb-3 text-center">
												<input type="submit" class="btn btn-sm btn-danger fw-bold " name="ReceiverRegistration" style="font-size:20px;" value="Register" /> 
											</div>
										</form>
									</div>
								</div>
							</div>
							<!--======================End Receiver registration================================-->
							<div class="container mt-5 z-index">
								<div class="row mt-5 HospitalRegistrationForm">
									<div class="col-lg-12">
										<h1 class="text-center mb-5 text-danger">Hospital Registration</h1> </div>
									<div class="col-sm-6"> 
										<img src="./assets/images/Hospital.png" class="img-fluid mt-5 h-75 w-100" alt="..."> 
									</div>
									<div class="col-sm-6">
										<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="md-5">
											<!-- Response Messages -->
											<?php if($error!=""){?><div class="text-danger"><strong><i class="far fa-times-circle text-danger">&nbsp</i> <?php echo htmlentities($error); ?> </strong></div><?php }else if($msg !=""){?><div class="text-success"><strong><i class="far fa-check-circle text-success">&nbsp</i><?php echo htmlentities($msg); ?> </strong></div><?php }?>
											<!-- End Response Messages -->
											<div class="mb-3">
												<label for="HospitalName" class="form-label">Hospital Name</label>
												<input type="text" class="form-control border-danger shadow-none" name="HospitalName" id="HospitalName" required/> 
											</div>
											<div class="mb-3 ">
												<label for="contactNo" class="form-label">Contact No</label>
												<input type="phone" name="HospitalContactNo" class="form-control border-danger shadow-none" id="contactNo" required/> 
											</div>
											<div class="mb-3">
												<label for="email" class="form-label">Email</label>
												<input type="email" name="HospitalEmail" class="form-control border-danger shadow-none" id="email" required/> 
											</div>
											<div class="mb-3 ">
												<label for="city" class="form-label">City</label>
												<input type="text" name="HospitalCity" class="form-control border-danger shadow-none" id="city" list="citylist" required/>
												<datalist id="citylist">
												<?php 
														$SelectCity = mysqli_query($connect,"SELECT `city` FROM `hospitals`") or die();
														$SelectCityNoRow = mysqli_num_rows($SelectCity);
														if ($SelectCityNoRow > 0) { $SelectCityRow = mysqli_fetch_array($SelectCity);?>
															<option value="<?php echo $SelectCityRow['city']; ?>">
														<?php } ?>
												</datalist>
											</div>
											<div class="mb-3 ">
												<label for="password" class="form-label">Password</label>
												<input type="password" name="HospitalPassword" class="form-control border-danger shadow-none" id="exampleCheck1" required/> 
											</div>
											<div class=" ">
												<label for="cpassword" class="form-label">Confirm password</label>
												<input type="password" name="HospitalConfirmPassword" class="form-control border-danger shadow-none" id="exampleCheck1" required/> 
											</div>
											<div class=" mb-3 text-center mt-5">
												<input type="submit" class="btn btn-sm btn-danger fw-bold " name="HospitalRegistration" style="font-size:20px;" value="Register" /> 
											</div>
										</form>
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
			<script src="./assets/js/jquery.min.js"></script>
			<script src="./assets/js/popper.js"></script>
			<script src="./assets/js/bootstrap.min.js"></script>
			<script src="./assets/js/main.js"></script>
			<script src="./assets/js/script.js"></script>
</body>

</html>