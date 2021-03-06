<?PHP 
session_start();
include './../includes/databaseConnection.php';
if (!isset($_SESSION['HospitalLogin'])) {
	header("Location: ./../includes/logout.php");
}
$HospitalLogin = $_SESSION['HospitalLogin'];
$msg = "";
$error = "";
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
	<title>Blood Requests | Blood Bank</title>
	<!-- Font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="./../assets/css/style.css">

</head>
	<body>
		<div class="wrapper d-flex align-items-stretch">
			<!-- Header -->
            <?PHP include './includes/header.php';?>
            <!-- End Header -->
			<div id="content" class="p-4 p-md-5 pt-5">
				<div class="container " >
					<!-- end Filter section -->
					<!-- Requestof blood -->
					<!-- Filter section -->
					<div class="container overflow-hidden mt-5 p-5 bg-white rounded text-white shadow rounded bg-body">
						<div class="row justify-content-md-center">
							<div class="col col-lg-  text-danger mb-3 ">
								<div class="head  mt-0 pl-0 ">
									<h3 class="h1 text-danger fw-bold border-bottom border-danger">Blood Requests</h3>  
									<!-- Response Messages -->
									<?php if($error!=""){?><div class="text-danger"><strong><i class="far fa-times-circle text-danger">&nbsp</i> <?php echo htmlentities($error); ?> </strong></div><?php }else if($msg !=""){?><div class="text-success"><strong><i class="far fa-check-circle text-success">&nbsp</i><?php echo htmlentities($msg); ?> </strong></div><?php }?>
									<!-- End Response Messages -->
								</div>
								
							</div>
						</div>
						<div class="row justify-content-md-center mb-5">
							<div class="col col-lg-12">
								<div class="container">
									<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
										<div class="row float-right ">
											<div class="col-sm-7">
												<select name="bloodGroup" class="custom-select" aria-label="Default select example">
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
											<div class="col-sm-2">
												<input name="SearchBlood" type="submit" class="btn btn-danger rounded-pill" value="    Search       " /> </div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<!-- end Filter section -->
						<div class="col col-lg-12">
							<div class="table-responsive">
								<!-- table -->
								<table class="table">
									<thead>
										<tr class="p-2">
											<th scope="col">Request Id</th>
											<th scope="col">Receiver</th>
											<th scope="col">Blood Group</th>
											<th scope="col">Email</th>
											<th scope="col">Contact No</th>
										</tr>
									</thead>
									<tbody>
									<?PHP 
										$myRequestsQuery = "SELECT * FROM `request` WHERE `hospital`= '$HospitalLogin' ";
										if (isset($_POST['bloodGroup']) && $_POST['bloodGroup'] !="") {
											$bloodGroup  = $_POST['bloodGroup'];
											$myRequestsQuery .= "AND `bloodGroup` ='$bloodGroup' ";
										}
										$myRequestsQuery .= " ORDER BY `sno` DESC";
										$myRequests  = mysqli_query($connect,$myRequestsQuery);
										if ($myRequestsRow = mysqli_num_rows($myRequests) != 0) {
											while ($myRequestsRow = mysqli_fetch_array($myRequests)) { 
												$Receiver = $myRequestsRow['receiver'];
												$SelectReceiver = mysqli_query($connect,"SELECT * FROM `receivers` WHERE  `sno` = '$Receiver'");
												$SelectReceiverRow = mysqli_fetch_array($SelectReceiver)
												?>
												<tr class="p-2">
													<th scope="row"><?PHP echo $myRequestsRow['sno'];?></th>
													<td><?PHP echo $SelectReceiverRow['name'];?></td>
													<td><?PHP echo $myRequestsRow['bloodGroup'];?></td>
													<td><a href='mailto:<?PHP echo $SelectReceiverRow['email'];?>'><?PHP echo $SelectReceiverRow['email'];?></a> </td>
													<td><a href='tel:<?PHP echo $SelectReceiverRow['contactNo'];?>'><?PHP echo $SelectReceiverRow['contactNo'];?></a></td>
												</tr>
										<?PHP } } ?>
									</tbody>
								</table>
								<!-- end table -->
							</div>
						</div>
					</div>
					<!-- end of request of blood -->
				</div>
			</div>
		</div>
		<script src="./../assets/js/jquery.min.js"></script>
		<script src="./../assets/js/popper.js"></script>
		<script src="./../assets/js/bootstrap.min.js"></script>
		<script src="./../assets/js/main.js"></script>
	</body>

</html>