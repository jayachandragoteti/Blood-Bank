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
				<div class="container " id="SearchBlood">
					<!-- end Filter section -->
					<!-- Requestof blood -->
					<!-- Filter section -->
					<div class="row justify-content-md-center mt-5  jumbotron jumbotron-fluid bg-white shadow shadow-regular ">
						<div class="row justify-content-md-center">
							<div class="col col-lg-8 text-center text-danger mb-3 ">
								<h2 class="h1 text-danger fw-bold">Blood Requests</h2> 
							</div>
						</div>
						<div class="row justify-content-md-center mb-5">
							<div class="col col-lg-12">
								<div class="container">
									<form>
										<div class="row float-right ">
											<div class="col-sm-7">
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
											<div class="col-sm-2">
												<input name="SearchBlood" type="submit" class="btn btn-danger" value="Search           " /> </div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<!-- end Filter section -->
						<div class="col col-lg-8">
							<!-- table -->
							<table class="table">
								<thead>
									<tr class="p-2">
										<th scope="col">#</th>
										<th scope="col">Receiver</th>
										<th scope="col">Blood Group</th>
										<th scope="col">Email</th>
										<th scope="col">Contact No</th>
									</tr>
								</thead>
								<tbody>
									<tr class="p-2">
										<th scope="row">1</th>
										<td>Mark</td>
										<td>Otto</td>
										<td>@mdo</td>
										<td>9876543210</td>
									</tr>
									<tr class="p-2">
										<th scope="row">2</th>
										<td>Jacob</td>
										<td>Thornton</td>
										<td>@fat</td>
										<td>9876543210</td>
									</tr>
									<tr class="p-2">
										<th scope="row">2</th>
										<td>Jacob</td>
										<td>Thornton</td>
										<td>@fat</td>
										<td>9876543210</td>
									</tr>
									<tr class="p-2">
										<th scope="row">2</th>
										<td>Jacob</td>
										<td>Thornton</td>
										<td>@fat</td>
										<td>9876543210</td>
									</tr>
								</tbody>
							</table>
							<!-- end table -->
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