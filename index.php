<?PHP 
session_start();
include './includes/databaseConnection.php';
?>
<!DOCTYPE html>
<html>

<head>
	<!-- Required meta tags -->
	<meta charset='utf-8'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<meta name='viewport' content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0,shrink-to-fit=no">
	<!--Favicon-->
	<link rel="icon" href="./assets/images/logo.png" type="image/gif" sizes="16x16">
	<!-- Page title -->
	<title>Home | Blood Bank</title>
	<!-- Font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!-- Main CSS -->
	<link href="./assets/css/main.css" rel="stylesheet" />
	<link href="./assets/css/landing.css" rel="stylesheet" /> </head>

<body>
	<!-- Header -->
	<?php include './includes/header.php';?>
	<!-- End Header -->
	<!-- Main -->
	<main>
		<div class="jumbotron jumbotron-fluid bg-danger " style="height: 350px;">
			<div class="container">
				<div class="row">
					<div class="col-sm mt-5">
						<h1 class="display-4 text-center text-white fw-bold">
						The Online Blood Bank
						<i class="blink fa fa-heartbeat" ></i>
					</h1>
						<p class="lead text-center text-white font-weight-bold mt-5">Excuses never save a life, Blood donation does</p>
						<p class="lead text-white font-weight-bold text-center mt-5 "> <a class="btn btn-outline-light btn-light text-danger rounded-pill p-2" href="#SearchBlood" role="button">Search Blood</a> </p>
					</div>
				</div>
			</div>
		</div>
		<!-- img with blood -->
		<div class="container mt-5 border-1">
			<div class="row">
				<div class="col-lg-6 mt-5">
					<div class="lead text-center mt-5">
						<p>Do you feel you dont have much to offer ?
							<br> you have the most presious resource of all ,
							<br>the ability to save a life by donating blood !
							<br> help share this valuable gift with someone in need. </p>
					</div>
					<div class="text-center text-danger">
						<h2 class="h1">In Need Of Blood?</h2> 
					</div>
				</div>
				<div class="col-lg-6"> <img src="./assets/images/Home.png" class="img-fluid" width="100%"> </div>
			</div>
		</div>
		<!-- end of img blood -->
		<div class="container " id="SearchBlood">
			<div class="row justify-content-md-center">
				<div class="col col-lg-8 text-center text-danger mb-5">
					<h2 class="h1">Search Blood</h2> 
				</div>
			</div>
			<div class="row justify-content-md-center">
				<div class="col col-lg-8">
					<div class="container">
						<form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
							<div class="row">
								<div class="col-sm-2">
									<select name="city" class="form-select " aria-label="Default select example">
										<option selected value="">City</option>
										<?PHP 
										$selectCity  = mysqli_query($connect,"SELECT `sno`,`city` FROM `hospitals`");
										while ($selectCityRow = mysqli_fetch_array($selectCity)) { ?>
											<option value="<?PHP echo $selectCityRow['sno'];?>"><?PHP echo $selectCityRow['city']; ?></option>
										<?PHP } ?>
									</select>
								</div>
								<div class="col-sm-3">
									<select name="bloodGroup" class="form-select" aria-label="Default select example">
										<option selected value="">Blood Group</option>
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
								<div class="col-sm-3">
									<select name="hospital" class="form-select" aria-label="Default select example">
										<option selected value="">Hospital</option>
										<?PHP 
										$selectHospital  = mysqli_query($connect,"SELECT `sno`,`name` FROM `hospitals`");
										while ($selectHospitalRow = mysqli_fetch_array($selectHospital)) { ?>
											<option value="<?PHP echo $selectHospitalRow['sno'];?>"><?PHP echo $selectHospitalRow['name']; ?></option>
										<?PHP } ?>
									</select>
								</div>
								<div class="col-sm-4">
									<input name="SearchBlood" type="submit" class="btn btn-danger" value="Search" /> </div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="row justify-content-md-center mt-5 jumbotron jumbotron-fluid ">
				<div class="col col-sm-6">
					<!-- table -->
					<table class="table">
						<thead>
							<tr class="p-2">
								<th scope="col">Hospital</th>
								<th scope="col">Blood Group</th>
								<th scope="col">Quantity</th>
								<th scope="col">City</th>
								<th scope="col">Request</th>
							</tr>
						</thead>
						<tbody>
							<tr class="p-2">
								<td>Mark</td>
								<td>Otto</td>
								<td>@mdo</td>
								<td>@mdo</td>
								<td>
									<input name="SearchBlood" type="submit" class="btn btn-danger  btn-sm" value="Request Blood" /> </td>
							</tr>
							<?PHP 
								$selectBloodQuery = "
									SELECT * FROM `availableblood` WHERE `quantity` != '0'
								";
								if (isset($_GET['city']) && $_GET['city'] != "") {
									$city = $connect -> real_escape_string(strtoupper($_GET['city']));
									$selectBloodQuery .="AND `hospital` = '$city'";
								}
								if (isset($_GET['bloodGroup']) && $_GET['bloodGroup'] != "") {
									$bloodGroup = $connect -> real_escape_string($_GET['bloodGroup']);
									$selectBloodQuery .="AND `bloodGroup` = '$bloodGroup'";
								}
								if (isset($_GET['hospital']) && $_GET['hospital'] != "") {
									$hospital = $connect -> real_escape_string($_GET['hospital']);
									$selectBloodQuery .="AND `hospital` = '$hospital'";
								}
								$selectBloodSql = mysqli_query($connect,$selectBloodQuery);
								if (mysqli_num_rows($selectBloodSql) != 0) {
								while ($selectBloodRow = mysqli_fetch_array($selectBloodSql)) {
									$HospitalSno = $selectBloodRow[''];
									$searchHospital = mysqli_query($connect,"SELECT * FROM `hospitals` WHERE `sno` = '$HospitalSno'");
									$searchHospitalRow = mysqli_fetch_array($searchHospital);
								?>
								<tr class="p-2">
									<td><?PHP echo $searchHospitalRow['hospital'];?></td>
									<td><?PHP echo $selectBloodRow['bloodGroup'];?></td>
									<td><?PHP echo $selectBloodRow['quantity'];?></td>
									<td><?PHP echo $searchHospitalRow['city'];?></td>
									<td>
										<?PHP 
										if (isset($_SESSION['ReceiverLogin'])) {
											echo '<a href="myRequests.php?myRequestId ='.$selectBloodRow['sno'].'"  class="btn btn-danger  btn-sm"><small>Request Sample</small></a>';
										}else {
											echo '<a href="./login.php"  class="btn btn-danger  btn-sm"><small>Request Sample</small></a>';
										}
										?>
									</td>
								</tr>
							<?PHP } }else { ?>
								<tr class="p-2 text-center">
									<th colspan='6'><span class="btn btn-danger btn-sm ">No Data found</span></th>
								</tr>
							<?PHP } ?>
						</tbody>
					</table>
					<!-- end table -->
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