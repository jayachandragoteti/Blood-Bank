<?PHP
session_start();
if (!isset($_SESSION['ReceiverLogin']) || isset($_SESSION['HospitalLogin'])) {
	header("Location: ./includes/logout.php");
}
include './includes/databaseConnection.php';
$msg = "";
$error = '';
if (isset($_POST['UpdatePasswordSubmit']) && isset($_SESSION['ReceiverLogin'])) {
	if (isset($_POST['oldPassword']) && $_POST['oldPassword'] != "" && isset($_POST['newPassword']) && $_POST['newPassword'] != "" && isset($_POST['confirmPassword']) && $_POST['confirmPassword'] != "") {
		$Receiver = $_SESSION['ReceiverLogin'];
		$newPassword = $connect -> real_escape_string($_POST['newPassword']);
		$confirmPassword = $connect -> real_escape_string($_POST['confirmPassword']);
		if ($newPassword != $confirmPassword) {
			$error = "Password and confirm password should be same!";
		}elseif ($newPassword < 8) {
			$error = "Password should contain at least eight characters. *";
		} else {
			$selectReceiver = mysqli_query($connect,"SELECT * FROM `receivers` WHERE `sno` = '$Receiver'");
			if ($selectReceiver && mysqli_num_rows($selectReceiver) == 1 ) {
				$selectReceiverRow = mysqli_fetch_array($selectReceiver);
				$oldPassword = $connect -> real_escape_string($_POST['oldPassword']);
				if (password_verify($oldPassword, $selectReceiverRow['password'])) {
					$hashed_password = password_hash($newPassword, PASSWORD_DEFAULT);
					$updatePassword = mysqli_query($connect,"UPDATE `receivers` SET `password`='$hashed_password' WHERE `sno` = '$Receiver'");
					if ($updatePassword) {
						$msg = 'Password Updated successfully.';
					} else {
						$error = "Failed try again!";
					}
				}else{
					$error = "Invalid Old password!";
				}
			} else {
				$error = "Invalid login!";
				header("Location: ./includes/logout.php");
			}
		}
	} else {
		$error = "All fields must be filled!";
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
		<title>Change Password | Blood Bank</title>
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
											<h2 class="text-center mb-5 text-danger">Change Password</h2> 
										</div>
										<div class="row">
											<!-- Response Messages -->
											<?php if($error!=""){?><div class="text-danger"><strong><i class="far fa-times-circle text-danger">&nbsp</i> <?php echo htmlentities($error); ?> </strong></div><?php }else if($msg !=""){?><div class="text-success"><strong><i class="far fa-check-circle text-success">&nbsp</i><?php echo htmlentities($msg); ?> </strong></div><?php }?>
											<!-- End Response Messages -->
											<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
												<div class="col-md-12">
													<div class="mb-3">
														<label for="oldPassword" class="form-label">Old password</label>
														<input type="password" name="oldPassword" class="form-control border-danger shadow-none" id="oldPassword" required/> 
													</div>
												</div>
												<div class="col-md-12">
													<div class="mb-3">
														<label for="newPassword" class="form-label">New Password</label>
														<input type="password" class="form-control border-danger shadow-none" name="newPassword" id="newPassword" required/> 
													</div>
												</div>
												<div class="col-md-12">
													<div class="mb-3">
														<label for="confirmPassword" class="form-label">Confirm Password</label>
														<input type="password" class="form-control border-danger shadow-none" name="confirmPassword" id="confirmPassword" required/> </div>
												</div>
												<div class=" mb-3 text-center">
													<input type="submit" name="UpdatePasswordSubmit" class="btn btn-sm btn-danger fw-bold rounded-pill" style="font-size:20px;" value="Update"/>
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