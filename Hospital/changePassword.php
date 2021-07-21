<?PHP 
session_start();
include './../includes/databaseConnection.php';
if (!isset($_SESSION['HospitalLogin'])) {
	header("Location: ./../includes/logout.php");
}
$HospitalLogin = $_SESSION['HospitalLogin'];
$msg = "";
$error = '';
if (isset($_POST['UpdatePasswordSubmit']) && isset($_SESSION['HospitalLogin'])) {
	if (isset($_POST['oldPassword']) && $_POST['oldPassword'] != "" && isset($_POST['newPassword']) && $_POST['newPassword'] != "" && isset($_POST['confirmPassword']) && $_POST['confirmPassword'] != "") {
		$Hospital = $_SESSION['HospitalLogin'];
		$newPassword = $connect -> real_escape_string($_POST['newPassword']);
		$confirmPassword = $connect -> real_escape_string($_POST['confirmPassword']);
		if ($newPassword != $confirmPassword) {
			$error = "Password and confirm password should be same!";
		}elseif ($newPassword <= 8) {
			$error = "Password should contain at least eight characters. *";
		} else {
			$selectHospital = mysqli_query($connect,"SELECT * FROM `hospitals` WHERE `sno` = '$Hospital'");
			if ($selectHospital && mysqli_num_rows($selectHospital) == 1 ) {
				$selectHospitalRow = mysqli_fetch_array($selectHospital);
				$oldPassword = $connect -> real_escape_string($_POST['oldPassword']);
				if (password_verify($oldPassword, $selectHospitalRow['password'])) {
					$hashed_password = password_hash($newPassword, PASSWORD_DEFAULT);
					$updatePassword = mysqli_query($connect,"UPDATE `hospitals` SET `password`='$hashed_password' WHERE `sno` = '$Hospital'");
					if ($updatePassword) {
						$msg = 'Password Updated successfully.';
					} else {
						$error = "Update failed try again!";
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
	<title>Change Password | Blood Bank</title>
	<!-- Font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="./../assets/css/style.css"> </head>

<body>
	<div class="wrapper d-flex align-items-stretch">
		<!-- Header -->
		<?PHP include './includes/header.php';?>
		<!-- End Header -->
		<div id="content" class="p-4 p-md-5 pt-5">
			<!-- change password -->
			<div class="container col-md-6 ">
				<div class="container overflow-hidden mt-5 p-5 bg-white rounded text-white shadow rounded bg-body">
					<div class="container border-bottom border-danger mb-5">
						<div class="head  mt-0 pl-0">
							<h2 class="text-danger fw-bold large">Change Password</h2> 
							<!-- Response Messages -->
							<?php if($error!=""){?><div class="text-danger"><strong><i class="far fa-times-circle text-danger">&nbsp</i> <?php echo htmlentities($error); ?> </strong></div><?php }else if($msg !=""){?><div class="text-success"><strong><i class="far fa-check-circle text-success">&nbsp</i><?php echo htmlentities($msg); ?> </strong></div><?php }?>
							<!-- End Response Messages -->
						</div>
					</div>
					<!--Section: Block Content-->
					<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
						<div class="mb-3 ">
							<label class="form-label text-danger">Old Password</label>
							<input type="password" name="oldPassword" class="form-select form-control bg-light text-danger border border-danger" id="" required/> 
						</div>
						<div class="mb-3 ">
							<label class="form-label text-danger">New Password</label>
							<input type="text" name="newPassword" class="form-select form-control bg-light text-danger border border-danger" id="" required/> 
						</div>
						<div class="mb-3 ">
							<label class="form-label text-danger">Confirm Password</label>
							<input type="password" name="confirmPassword" class="form-select form-control bg-light text-danger border border-danger" id="" required/> 
						</div>
						<div class=" mb-3 text-center">
							<input type="submit" name="UpdatePasswordSubmit" class="btn btn-sm btn-danger fw-bold rounded-pill" style="font-size:20px;" value="Update"/>
						</div>
					</form>
					<!--Section: Block Content-->
				</div>
			</div>
			<!-- end change password -->
		</div>
	</div>
	<script src="./../assets/js/jquery.min.js"></script>
	<script src="./../assets/js/popper.js"></script>
	<script src="./../assets/js/bootstrap.min.js"></script>
	<script src="./../assets/js/main.js"></script>
</body>

</html>