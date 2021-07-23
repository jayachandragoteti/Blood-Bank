<?PHP 
session_start();
include './../../databaseConnection.php';
if (!isset($_SESSION['HospitalLogin'])) {
	header("Location: ./../../logout.php");
}
$HospitalLogin = $_SESSION['HospitalLogin'];
$msg = "";
$error = '';
$SelectHospital = mysqli_query($connect,"SELECT * FROM `hospitals` WHERE `sno` = '$HospitalLogin'");
$SelectHospitalRow = mysqli_fetch_array($SelectHospital);
?>
<div class="container mt-5">
	<div class="row justify-content-md-center">
		<div class="col-md-8 ">
			<div class="card text-center">
				<div class="card-header">
                    <h2 class="text-danger fw-bold large">Hospital Details</h2>
                </div>
				<div class="card-body justify-content-md-center">
                    <div class="container">
                        <div class="row justify-content-md-center">
                            <div class="col-md-8 mt-lg-5">
                                <form method="post">
                                    <div class="mb-3 text-danger">
                                        <label for="HospitalName" class="form-label">Hospital Name</label>
                                        <input type="text" name="HospitalName" id="HospitalName" value="<?PHP echo $SelectHospitalRow['hospitalName'];?>" class="form-control border-danger border shadow-none" required/> 
                                    </div>
                                    <div class="mb-3 text-danger ">
                                        <label for="contactNo" class="form-label">Contact No</label>
                                        <input type="phone" name="HospitalContactNo" id="contactNo" value="<?PHP echo $SelectHospitalRow['contactNo'];?>" class="form-control border-danger border shadow-none" required/> </div>
                                    <div class="mb-3 text-danger">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="HospitalEmail" id="email" value="<?PHP echo $SelectHospitalRow['email'];?>" class="form-control border-danger border shadow-none" required/> </div>
                                    <div class="mb-3 text-danger ">
                                        <label for="city" class="form-label">City</label>
                                        <input type="text" name="HospitalCity" id="city" value="<?PHP echo $SelectHospitalRow['city'];?>" class="form-control border-danger  border shadow-none" required/> </div>
                                    <div class=" mb-3 text-danger text-center mt-2">
                                        <input type="submit" class="btn btn-sm btn-danger fw-bold rounded-pill " name="Update" style="font-size:20px;" value="    Update   " /> 
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