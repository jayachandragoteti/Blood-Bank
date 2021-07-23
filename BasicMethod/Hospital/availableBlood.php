<?PHP 
session_start();
include './../includes/databaseConnection.php';
if (!isset($_SESSION['HospitalLogin'])) {
	header("Location: ./../includes/logout.php");
}
$msg = "";
$error = '';
$HospitalLogin = $_SESSION['HospitalLogin'];
if (isset($_POST['updateQuantity']) && $_POST['updateQuantitySno'] != "" && isset($_POST['updateQuantitySno']) && $_POST['quantity'] != "" && isset($_POST['quantity'])) {
    $quantity = $connect -> real_escape_string($_POST['quantity']);
    $updateQuantitySno = $connect -> real_escape_string($_POST['updateQuantitySno']);
    $updateQuantity = mysqli_query($connect,"UPDATE `availableblood` SET `quantity`='$quantity' WHERE `sno` = '$updateQuantitySno'");
    if ($updateQuantity) {
        $msg = "Updated";
    }else{
        $error = 'Not Updated';
    }
}
if (isset($_POST['deleteInfo']) && $_POST['updateQuantitySno'] != "" && isset($_POST['updateQuantitySno'])) {
    $DeleteInfoSno = $connect -> real_escape_string($_POST['updateQuantitySno']);
    $DeleteInfo = mysqli_query($connect,"DELETE FROM `availableblood` WHERE `sno` = '$DeleteInfoSno'");
    if ($DeleteInfo) {
        $msg = "Deleted";
    }else{
        $error = 'Not Deleted';
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
	<title>Available Blood | Blood Bank</title>
	<!-- Font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="./../assets/css/style.css">
 </head>
 <body>
 <div class="wrapper d-flex align-items-stretch ">
		<!-- Header -->
		<?PHP include './includes/header.php';?>
		<!-- End Header -->
        <div id="content">
            <div class="container mt-5 justify-content-md-center ">
                <div class="row justify-content-md-center mt-5 mx-auto ">
                    <div class="card mt-5 p-2  mb-5 shadow shadow-regular">
                        <div class="card-body justify-content-md-center ">
                            <div class="row mx-auto ">
                               <h1 class="text-danger mb-5  border-bottom border-danger ">Available Blood Details</h1>
                            </div>
                            <div class="row mt-4 ">
                              <div class="col-lg-12">
                              <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
											<div class="row float-right ">
												<div class="col-sm-7 col-md-8">
													<select name="bloodGroup" class=" custom-select mb-3" aria-label="Default select example">
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
												<div class="col-sm-5 col-md-4">
													<input name="SearchBlood" type="submit" class="btn btn-danger mb-5" value="Search" /> 
                                                </div>
											</div>
								</form>
                              </div>
                            </div>

                            <div class="container">
                                <div class="row">
                                    <!-- table -->
                                <!-- Response Messages -->
                                <?php if($error!=""){?><div class="text-danger"><strong><i class="far fa-times-circle text-danger">&nbsp</i> <?php echo htmlentities($error); ?> </strong></div><?php }else if($msg !=""){?><div class="text-success"><strong><i class="far fa-check-circle text-success">&nbsp</i><?php echo htmlentities($msg); ?> </strong></div><?php }?>
                                <!-- End Response Messages -->
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr class="p-2">
                                                <th scope="col">Blood&nbspGroup</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Update</th>
                                                <th scope="col">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?PHP 
                                            $selectBloodQuery = "
                                                SELECT * FROM `availableblood` WHERE `quantity` != '0'
                                            ";
                                            
                                            if (isset($_POST['bloodGroup']) && $_POST['bloodGroup'] != "") {
                                                $bloodGroup = $connect -> real_escape_string($_POST['bloodGroup']);
                                                $selectBloodQuery .="AND `bloodGroup` = '$bloodGroup'";
                                            }
                                            $selectBloodSql = mysqli_query($connect,$selectBloodQuery);
                                            if (mysqli_num_rows($selectBloodSql) != 0) {
                                                while ($selectBloodRow = mysqli_fetch_array($selectBloodSql)) {
                                                ?>
                                                <tr class="p-2">
                                                    <td><?PHP echo $selectBloodRow['bloodGroup'];?></td>
                                                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                                        <td>
                                                            <input type="hidden" name="updateQuantitySno" value="<?PHP echo $selectBloodRow['sno'];?>"/>
                                                            <input type="number" name="quantity" value="<?PHP echo $selectBloodRow['quantity'];?>" class='form-select form-control bg-light text-danger border border-danger'/>
                                                        </td>
                                                        <td><button type="submit" name="updateQuantity" class="btn btn-success">Update</button></td>
                                                        <td><button type="submit" name="deleteInfo"class="btn btn-danger">Delete</button></td>
                                                    </form>
                                                </tr>
                                            <?PHP } }else { ?>
                                                <tr class="p-2 text-center">
                                                    <th colspan='6'><span class="btn btn-danger btn-sm ">No Data found</span></th>
                                                </tr>
                                            <?PHP } ?>
                                        </tbody>
                                    </table>
                                </div>
								<!-- end table -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        




</div>
</body>
