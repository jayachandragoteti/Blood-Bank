<?PHP 
session_start();
include './../includes/databaseConnection.php';
if (!isset($_SESSION['HospitalLogin'])) {
	header("Location: ./../includes/logout.php");
}
$HospitalLogin = $_SESSION['HospitalLogin'];
$msg = "";
$error = '';
$SelectHospital = mysqli_query($connect,"SELECT * FROM `hospitals` WHERE `sno` = '$HospitalLogin'");
$SelectHospitalRow = mysqli_fetch_array($SelectHospital);
if (isset($_POST['Update'])) {
	if (isset($_POST['HospitalName']) && $_POST['HospitalName'] != '' && isset($_POST['HospitalContactNo']) && $_POST['HospitalContactNo'] != '' && isset($_POST['HospitalEmail']) && $_POST['HospitalEmail'] != '' && isset($_POST['HospitalCity']) && $_POST['HospitalCity'] != '') {
		$HospitalName = $connect -> real_escape_string($_POST['HospitalName']);
		$HospitalContactNo = $connect -> real_escape_string($_POST['HospitalContactNo']);
		$HospitalEmail = $connect -> real_escape_string($_POST['HospitalEmail']);
		// Allow +, - and . in phone number
		$filtered_phone_number = filter_var($HospitalContactNo, FILTER_SANITIZE_NUMBER_INT);
		// Remove "-" from number
		$phone_to_check = str_replace("-", "", $filtered_phone_number);
		if (!filter_var($HospitalEmail, FILTER_VALIDATE_EMAIL)) {
			$error = "Invalid email format!";
		}elseif(strlen($phone_to_check) < 10 || strlen($phone_to_check) > 14) {
			// This can be customized if you want phone number from a specific country
			$error = "Invalid phone number!";
		}else{
			$HospitalCity = $connect -> real_escape_string(strtoupper($_POST['HospitalCity']));
			$UpdateHospital = mysqli_query($connect,"UPDATE `hospitals` SET `hospitalName`='$HospitalName',`contactNo`='$HospitalContactNo',`email`='$HospitalEmail',`city`='$HospitalCity' WHERE `sno` = '$HospitalLogin'");
			if ($UpdateHospital) {
				$msg = 'Profile Updated successfully.';
			} else {
				$error = "Update failed try again!";
			}
		}
	} else {
		$error = "All fields must be filled!";
	}
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
										<!-- Response Messages -->
										<?php if($error!=""){?><div class="text-danger"><strong><i class="far fa-times-circle text-danger">&nbsp</i> <?php echo htmlentities($error); ?> </strong></div><?php }else if($msg !=""){?><div class="text-success"><strong><i class="far fa-check-circle text-success">&nbsp</i><?php echo htmlentities($msg); ?> </strong></div><?php }?>
										<!-- End Response Messages -->
									</div>
								</div>
								<div class="col-sm-10 ml-5 mt-3">
									<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="md-5">
										<div class="mb-3 text-danger">
											<label for="HospitalName" class="form-label">Hospital Name</label>
											<input type="text" name="HospitalName" id="HospitalName" value="<?PHP echo $SelectHospitalRow['hospitalName'];?>" class="form-control border-danger border shadow-none"  required/> 
										</div>
										<div class="mb-3 text-danger ">
											<label for="contactNo" class="form-label">Contact No</label>
											<input type="phone" name="HospitalContactNo" id="contactNo" value="<?PHP echo $SelectHospitalRow['contactNo'];?>" class="form-control border-danger border shadow-none"  required/> 
										</div>
										<div class="mb-3 text-danger">
											<label for="email" class="form-label">Email</label>
											<input type="email" name="HospitalEmail" id="email"  value="<?PHP echo $SelectHospitalRow['email'];?>" class="form-control border-danger border shadow-none"  required/> 
										</div>
										<div class="mb-3 text-danger ">
											<label for="city" class="form-label">City</label>
											<input type="text" name="HospitalCity"  id="city" value="<?PHP echo $SelectHospitalRow['city'];?>" class="form-control border-danger  border shadow-none"  required/>
										</div>
										<div class=" mb-3 text-danger text-center mt-2">
											<input type="submit" class="btn btn-sm btn-danger fw-bold rounded-pill " name="Update" style="font-size:20px;" value="Update" /> 
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