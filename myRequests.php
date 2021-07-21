<?PHP 
session_start();
if (!isset($_SESSION['ReceiverLogin'])) {
	header("Location: ./includes/logout.php");
}
$ReceiverLogin = $_SESSION['ReceiverLogin'];
include './includes/databaseConnection.php';
$msg="";
$error = "";
if (isset($_GET['myRequestId']) && $_GET['myRequestId'] !="") {
	$myRequestId = $connect -> real_escape_string($_GET['myRequestId']);
	$selectRequestDetails = mysqli_query($connect,"SELECT * FROM `availableblood` WHERE `sno` = '$myRequestId'");
	if ($selectRequestDetails) {
		$selectRequestDetailsRow = mysqli_fetch_array($selectRequestDetails);
		$hospital = $selectRequestDetailsRow['hospital'];
		$bloodGroup = $selectRequestDetailsRow['bloodGroup'];
		$addRequest = mysqli_query($connect,"INSERT INTO `request`(`hospital`, `receiver`, `bloodGroup`) VALUES ('$hospital','$ReceiverLogin','$bloodGroup')");
		if ($addRequest) {
			$msg = 'Request submitted successfully.';
		} else {
			$error = "Request filled,try again!";
		}
	}else {
		$error = "Request filled,try again!";
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
	<link rel="icon" href="./assets/images/logo.png" type="image/gif" sizes="16x16">
	<!-- Page title -->
	<title>Requests | Blood Bank</title>
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
				<div class="row ">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<h3 class="text-center mb-3 text-danger">My Requests</h3> </div>
							<!--table-->
							<table class="table table-hover table-bordered border-danger ">
								<thead>
									<tr class="p-2">
										<th scope="col">Request Id</th>
										<th scope="col">HospitalName</th>
										<th scope="col">Date & Time</th>
										<th scope="col">Blood Group</th>
									</tr>
								</thead>
								<tbody>
									<tr class="p-2">
										<th scope="row">1</th>
										<td>Mark</td>
										<td>Otto</td>
										<td>Otto</td>
									</tr>
									<?PHP 
										$myRequests  = mysqli_query($connect,"SELECT * FROM `request` WHERE `receiver`= '$ReceiverLogin' ORDER BY `sno` DESC");
										if (mysqli_num_rows($myRequests) != 0) {
											while ($myRequestsRow = mysqli_fetch_array($myRequests)) { ?>
												<tr class="p-2">
													<th scope="row"><?PHP echo $myRequestsRow['sno'];?></th>
													<td><?PHP echo $myRequestsRow['hospital'];?></td>
													<td><?PHP echo $myRequestsRow['sno'];?></td>
													<td><?PHP echo $myRequestsRow['datm'];?></td>
												</tr>
											<?PHP } }else { ?>
												<tr class="p-2 text-center">
													<th colspan='4'><span class="btn btn-danger btn-sm ">No request found</span></th>
												</tr>
										<?PHP } ?>
										
								</tbody>
							</table>
							<!--end table-->
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