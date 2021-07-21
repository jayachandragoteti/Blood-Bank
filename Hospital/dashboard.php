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
	<title>Hospital Profile | Blood Bank</title>
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
			<div class="container">
				<div class="head">
					<h2>Blood Request</h2> </div>
			</div>
		</div>
	</div>
	<script src="./../assets/js/jquery.min.js"></script>
	<script src="./../assets/js/popper.js"></script>
	<script src="./../assets/js/bootstrap.min.js"></script>
	<script src="./../assets/js/main.js"></script>
</body>

</html>