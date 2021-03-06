<?PHP 
session_start();
include './../includes/databaseConnection.php';
if (!isset($_SESSION['HospitalLogin'])) {
	header("Location: ./../includes/logout.php");
}
$HospitalLogin = $_SESSION['HospitalLogin'];
$msg = "";
$error = "";
if (isset($_POST['AddBloodInfoSubmit'])) {
	if (isset($_POST['bloodGroup']) && $_POST['bloodGroup'] != "" && isset($_POST['Quantity']) && $_POST['Quantity'] != "") {
		$bloodGroup = $connect -> real_escape_string($_POST['bloodGroup']);
		$Quantity = $connect -> real_escape_string($_POST['Quantity']);
		$AddBloodInfo = mysqli_query($connect,"INSERT INTO `availableblood`(`hospital`, `bloodGroup`, `quantity`) VALUES ('$HospitalLogin','$bloodGroup','$Quantity')");
		if ($AddBloodInfo) {
			$msg = "successfully added.";
		} else {
			$error = "Failed,try again!";
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
	<title>Add Blood Info | Blood Bank</title>
	<!-- Font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="./../assets/css/style.css"> </head>

<body>
	<div class="wrapper d-flex align-items-stretch ">
		<!-- Header -->
		<?PHP include './includes/header.php';?>
		<!-- End Header -->
		<div id="content" class="p-4 p-md-5 pt-5">
			<div class="container ">
				<div class="row justify-content-md-center">
					<div class="col-md-8">
						<div class="container overflow-hidden mt-5 p-5 bg-white rounded text-white shadow rounded bg-body">
							<div class="container border-bottom border-danger mb-5">
								<div class="head  mt-0 pl-0">
									<h3 class="text-danger fw-bold large">Add Blood</h3>
									<!-- Response Messages -->
									<?php if($error!=""){?>
										<div class="text-danger"><strong><i class="far fa-times-circle text-danger">&nbsp</i> <?php echo htmlentities($error); ?> </strong></div>
									<?php }else if($msg !=""){?>
										<div class="text-success"><strong><i class="far fa-check-circle text-success">&nbsp</i><?php echo htmlentities($msg); ?> </strong></div>
										<?php }?>
									<!-- End Response Messages -->
								</div>
							</div>
							<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
								<div class="mb-3 ">
									<label class="form-label text-danger">Blood Group</label>
									<select name="bloodGroup" class="form-select form-control bg-light text-danger border border-danger " aria-label="Default select example" required>
										<option selected>Open this select menu</option>
										<option value="A+">A+</option>
										<option value="A-">A-</option>
										<option value="B+">B+</option>
										<option value="B+">B-</option>
										<option value="AB+">AB+</option>
										<option value="AB-">AB-</option>
										<option value="O+">O+</option>
										<option value="O-">O-</option>
									</select>
								</div>
								<div class="mb-3">
									<label for="Quantity" class="form-label text-danger">Quantity</label>
									<input type="number" min='1' name="Quantity" class="form-select form-control bg-light text-danger border border-danger" Placeholder='Enter Quantity in units' id="receiverQuantity" required/> 
								</div>
								<input type="submit" name="AddBloodInfoSubmit" value="Submit" class="btn bg-danger text-white" /> 
							</form>
						</div>					
					</div>
				</div>
			</div>
		</div>
	</div>


			<script src="./../assets/js/jquery.min.js"></script>
			<script src="./../assets/js/popper.js"></script>
			<script src="./../assets/js/bootstrap.min.js"></script>
			<script src="./../assets/js/main.js"></script>
</body>

</html>