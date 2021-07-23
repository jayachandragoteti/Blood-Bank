<?PHP
include './../databaseConnection.php';
session_start();
$ReceiverLogin = $_SESSION['ReceiverLogin'];
$SelectReceiver = mysqli_query($connect,"SELECT * FROM `receivers` WHERE  `sno` ='$ReceiverLogin'");
$SelectReceiverRow = mysqli_fetch_array($SelectReceiver);

?>
<section>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <div class="container">
                    <div class="card mt-5">
                        <div class="card-body">
                            <div class="container ">
                                <div class="col-lg-12">
                                    <h3 class="text-center mb-5 text-danger">Receiver Profile</h3>
                                </div>
                                <div class="row">
                                    <form id="updateReceiverProfileForm">
										<div class="mb-3 ">
											<label class="form-label text-danger">Name</label>
											<input type="text" name="ReceiverName" id="ReceiverName" value="<?PHP echo $SelectReceiverRow['name'];?>" class=" form-control bg-light text-danger border border-danger shadow-none"  required/> 
                                        </div>
										<div class="mb-3 ">
											<label class="form-label text-danger">Email</label>
											<input type="email" name="ReceiverEmail" id="ReceiverEmail" value="<?PHP echo $SelectReceiverRow['email'];?>" class=" form-control bg-light text-danger border border-danger shadow-none"  required/> 
                                        </div>
										<div class="mb-3 ">
											<label class="form-label text-danger">Contact no</label>
											<input type="phone" name="ReceiverContactNo" id="ReceiverContactNo" value="<?PHP echo $SelectReceiverRow['contactNo'];?>" class=" form-control bg-light text-danger border border-danger shadow-none" required/> 
                                        </div>
										<div class="mb-3 ">
											<label class="form-label text-danger">Address</label>
											<input type="text" name="ReceiverAddress" id="ReceiverAddress" value="<?PHP echo $SelectReceiverRow['address'];?>" class=" form-control bg-light text-danger border border-danger shadow-none" required/> 
                                        </div>
                                        <p class="fw-bold text-danger d-none alert-bell"><i class="fas fa-bell"></i> <span class="Update-Receiver-Profile-Alerts"></span></p>
										<div class=" mb-3 w-50 mx-auto">
											<button type="button" onclick="updateReceiverProfile()"class="btn btn-sm btn-danger text-white  rounded-pill">Update</button>
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
</section>