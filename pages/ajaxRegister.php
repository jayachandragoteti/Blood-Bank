<section>
	<div class="container mt-5">
		<div class="row">
			<div class="card">
				<div class="card-body">
					<div class="row justify-content-md-center shift-register">
						<div class="col-lg-4">
							<button class="btn btn-sm btn-danger rounded-pill fw-bold HospitalRegistrationButton" disabled>Hospital</button>
						</div>
						<div class="col-lg-4">
							<button class="btn btn-sm btn-danger rounded-pill fw-bold ReceiverRegistrationButton">Receiver</button>
						</div>
					</div>
					<!--======================Receiver registration================================-->
					<div class="container mt-5 ReceiverRegistrationForm " style="display: none;">
						<div class="row mt-5 ">
							<div class="col-lg-12">
								<h1 class="text-center mb-5 text-danger">Receiver Registration</h1> </div>
							<div class="col-sm-6"> <img src="./assets/images/Hopital1.png" class="img-fluid mt-5 h-75 w-100" alt="..."> </div>
							<div class="col-sm-6">
								<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="md-5">
									<div class="mb-3">
										<label for="receivername" class="form-label">Name</label>
										<input type="text" class="form-control border-danger shadow-none" name="receiverName" id="Hospitalname" required/> </div>
									<div class="mb-3">
										<label for="receiveremail" class="form-label">Email</label>
										<input type="email" class="form-control border-danger shadow-none" name="receiverEmail" id="Hospitalname" required/> </div>
									<div class="mb-3 ">
										<label for="contactNo" class="form-label">Contact no</label>
										<input type="tel" name="receiverContactNo" class="form-control border-danger shadow-none" id="contactNo" required/> </div>
									<div class="mb-3">
										<label for="address" class="form-label">Address</label>
										<input type="text" name="receiverAddress" class="form-control border-danger shadow-none" id="email" required/> </div>
									<div class="mb-3 ">
										<label for="city" class="form-label">Blood type</label>
										<select class="form-select shadow-none border-danger" aria-label="Default select example" name="bloodGroup" id="bloodtype">
											<option selected value="">Select Blood group</option>
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
									<div class="mb-3 ">
										<label for="password" class="form-label">Password</label>
										<input type="password" name="receiverPassword" class="form-control border-danger shadow-none" id="exampleCheck1" required/> </div>
									<div class="mb-3">
										<label for="cpassword" class="form-label">Confirm password</label>
										<input type="password" name="receiverConfirmCPassword" class="form-control border-danger shadow-none" id="exampleCheck1" required/> </div>
									<div class=" mb-3 text-center">
										<input type="submit" class="btn btn-sm btn-danger fw-bold " name="ReceiverRegistration" style="font-size:20px;" value="Register" /> </div>
								</form>
							</div>
						</div>
					</div>
					<!--======================End Receiver registration================================-->
					<div class="container mt-5 z-index">
						<div class="row mt-5 HospitalRegistrationForm">
                            <!-- Response Messages -->
                            <?php if($error!=""){?>
                                <div class="text-danger">
                                    <strong>
                                        <i class="far fa-times-circle text-danger">&nbsp</i> <?php echo htmlentities($error); ?> 
                                    </strong>
                                </div>
                            <?php }else if($msg !=""){?>
                                <div class="text-success">
                                    <strong>
                                        <i class="far fa-check-circle text-success">&nbsp</i><?php echo htmlentities($msg); ?> 
                                    </strong>
                                </div>
                            <?php }?>
                            <!-- End Response Messages -->
							<div class="col-lg-12">
								<h1 class="text-center mb-5 text-danger">Hospital Registration</h1>
                            </div>
							<div class="col-sm-6"> <img src="./assets/images/Hospital.png" class="img-fluid mt-5 h-75 w-100" alt="..."> </div>
							<div class="col-sm-6">
								<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="md-5">
									<div class="mb-3">
										<label for="HospitalName" class="form-label">Hospital Name</label>
										<input type="text" class="form-control border-danger shadow-none" name="HospitalName" id="HospitalName" required/> </div>
									<div class="mb-3 ">
										<label for="contactNo" class="form-label">Contact No</label>
										<input type="phone" name="HospitalContactNo" class="form-control border-danger shadow-none" id="contactNo" required/> </div>
									<div class="mb-3">
										<label for="email" class="form-label">Email</label>
										<input type="email" name="HospitalEmail" class="form-control border-danger shadow-none" id="email" required/> </div>
									<div class="mb-3 ">
										<label for="city" class="form-label">City</label>
										<input type="text" name="HospitalCity" class="form-control border-danger shadow-none" id="city" list="citylist" required/>
										<datalist id="citylist">
											<?php 
                                                            $SelectCity = mysqli_query($connect,"SELECT `city` FROM `hospitals`") or die();
                                                            $SelectCityNoRow = mysqli_num_rows($SelectCity);
                                                            if ($SelectCityNoRow > 0) { $SelectCityRow = mysqli_fetch_array($SelectCity);?>
												<option value="<?php echo $SelectCityRow['city']; ?>">
													<?php } ?>
										</datalist>
									</div>
									<div class="mb-3 ">
										<label for="password" class="form-label">Password</label>
										<input type="password" name="HospitalPassword" class="form-control border-danger shadow-none" id="exampleCheck1" required/> </div>
									<div class=" ">
										<label for="cpassword" class="form-label">Confirm password</label>
										<input type="password" name="HospitalConfirmPassword" class="form-control border-danger shadow-none" id="exampleCheck1" required/> </div>
									<div class=" mb-3 text-center mt-5">
										<input type="submit" class="btn btn-sm btn-danger fw-bold " name="HospitalRegistration" style="font-size:20px;" value="Register" /> </div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>