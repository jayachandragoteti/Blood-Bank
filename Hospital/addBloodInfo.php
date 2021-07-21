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
				<div class="container overflow-hidden mt-5 p-5 bg-white rounded text-white shadow rounded bg-body">
					<div class="container border-bottom border-danger mb-5">
						<div class="head  mt-0 pl-0">
							<h2 class="text-danger fw-bold large">Add Blood Info</h2> </div>
					</div>
					<form>
						<div class="mb-3 ">
							<label class="form-label text-danger">Blood Type</label>
							<select class="form-select form-control bg-light text-danger border border-danger " aria-label="Default select example">
								<option selected>Open this select menu</option>
								<option value="A +Ve">A +Ve</option>
								<option value="A -ve">A -ve</option>
								<option value="B +ve">B +ve</option>
								<option value="B +ve">B -ve</option>
								<option value="AB +Ve">AB +Ve</option>
								<option value="AB -ve">AB -ve</option>
								<option value="O +ve">O +ve</option>
								<option value="O -ve">O -ve</option>
							</select>
						</div>
						<div class="mb-3">
							<label class="form-label text-danger">Qunatity</label>
							<select class="form-select form-control bg-light text-danger border border-danger" aria-label="Default select example">
								<option selected>Open this select menu</option>
								<option value="1">1 Ltr</option>
								<option value="2">2 Ltr</option>
								<option value="3">3 Ltr</option>
							</select>
						</div>
						<button type="submit" class="btn btn-primary bg-danger w-25 float-right mt-3 rounded-pill border-none text-white">Submit</button>
					</form>
				</div>
			</div>



			<div class="container ">
				<div class="container overflow-hidden mt-5 p-5 bg-white rounded text-white shadow rounded bg-body">
					<div class="container border-bottom border-danger mb-5">
						<div class="head  mt-0 pl-0">
							<h2 class="text-danger fw-bold large">Available Blood Details</h2> </div>
					</div>
					<div class="row justify-content-md-center mb-5">
							<div class="col col-lg-12">
								<div class="container">
									<form>
										<div class="row float-right ">
											<div class="col-sm-7">
												<select name="bloodGroup" class=" custom-select" aria-label="Default select example">
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
					<div class="col col-lg-12">
							<!-- table -->
							<table class="table">
								<thead>
									<tr class="p-2">
										<th scope="col">#</th>
										<th scope="col">Blood Group</th>
										<th scope="col">Qunatity</th>
										<th scope="col">Update</th>
										<th scope="col">Delete</th>
									</tr>
								</thead>
								<tbody>
									<tr class="p-2">
										<th scope="row">1</th>
										<td>Mark</td>
										<td><input type="text" class="form-control" value="28" aria-describedby="addon-wrapping"></td>
										<td><button type="button" class="btn btn-success">Update</button></td>
										<td><button type="button" class="btn btn-danger">Delete</button></td>
									</tr>
									<tr class="p-2">
										<th scope="row">2</th>
										<td>Jacob</td>
										<td><input type="text" class="form-control" value="28" aria-describedby="addon-wrapping"></td>
										<td><button type="button" class="btn btn-success">Update</button></td>
										<td><button type="button" class="btn btn-danger">Delete</button></td>
									</tr>
									<tr class="p-2">
										<th scope="row">2</th>
										<td>Jacob</td>
										<td><input type="text" class="form-control" value="28" aria-describedby="addon-wrapping"></td>
										<td><button type="button" class="btn btn-success">Update</button></td>
										<td><button type="button" class="btn btn-danger">Delete</button></td>
									</tr>
									<tr class="p-2">
										<th scope="row">2</th>
										<td>Jacob</td>
										<td><input type="text" class="form-control" value="28" aria-describedby="addon-wrapping"></td>
										<td><button type="button" class="btn btn-success">Update</button></td>
										<td><button type="button" class="btn btn-danger">Delete</button></td>
									</tr>
								</tbody>
							</table>
							<!-- end table -->
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