
<section>
    
    <div class="container mt-5">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-md-center shift-register">
                        <div class="col-lg-4">
                            <button class="btn btn-sm btn-danger rounded-pill fw-bold HospitalRegistrationButton" >Hospital</button>
                        </div>
                        <div class="col-lg-4">
                            <button class="btn btn-sm btn-danger rounded-pill fw-bold ReceiverRegistrationButton bg-light border-danger text-danger">Receiver</button>
                        </div>
                    </div>
                    <!--======================Receiver registration================================-->
                    <div class="container mt-5 ReceiverRegistrationForm" style="display: none;">
                        <div class="row mt-5 ">
                            <div class="col-lg-12">
                                <h2 class="text-center mb-5 text-danger">Receiver Registration</h2> </div>
                            <div class="col-sm-6">
                                <img src="./assets/images/Hopital1.png" class="img-fluid mt-5 h-75 w-100" alt="...">
                            </div>
                            <div class="col-sm-6">
                                <form id="ReceiverRegistrationForm">
                                    <div class="mb-3">
                                        <label for="receiverName" class="form-label">Name</label>
                                        <input type="text" name="receiverName" id="receiverName"class="form-control border-danger shadow-none"  required/> 
                                    </div>
                                    <div class="mb-3">
                                        <label for="receiverEmail" class="form-label">Email</label>
                                        <input type="email" name="receiverEmail" id="receiverEmail" class="form-control border-danger shadow-none"  required/> 
                                    </div>
                                    <div class="mb-3 ">
                                        <label for="receiverContactNo" class="form-label">Contact no</label>
                                        <input type="tel" name="receiverContactNo" id="receiverContactNo" class="form-control border-danger shadow-none"  required/> 
                                    </div>
                                    <div class="mb-3">
                                        <label for="receiverAddress" class="form-label">Address</label>
                                        <input type="text" name="receiverAddress" id="receiverAddress" class="form-control border-danger shadow-none" required/> 
                                    </div>
                                    <div class="mb-3 ">
                                        <label for="bloodGroup" class="form-label">Blood type</label>
                                        <select class="form-select shadow-none border-danger" aria-label="Default select example" name="bloodGroup" id="bloodGroup"  required>
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
                                        <label for="receiverPassword" class="form-label">Password</label>
                                        <input type="password" name="receiverPassword" class="form-control border-danger shadow-none" id="receiverPassword" required/> 
                                    </div>
                                    <div class="mb-3">
                                        <label for="receiverConfirmPassword" class="form-label">Confirm password</label>
                                        <input type="password" name="receiverConfirmPassword" class="form-control border-danger shadow-none" id="receiverConfirmPassword" required/> 
                                    </div>
                                    <p class="fw-bold text-danger d-none alert-bell"><i class="fas fa-bell"></i> <span class="Receiver-Registration-Alerts"></span></p>
                                    <div class=" mb-3 text-center">
                                        <input type="button" class="btn btn-sm btn-danger text-white rounded-pill" name="ReceiverRegistration" id="ReceiverRegistration" onclick="receiverRegistration()" style="font-size:20px;" value="Register" /> 
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--======================End Receiver registration================================-->
                    <div class="container mt-5 z-index">
                        <div class="row mt-5 HospitalRegistrationForm">
                            <div class="col-lg-12">
                                <h2 class="text-center mb-5 text-danger">Hospital Registration</h2>
                            </div>
                            <div class="col-sm-6"> <img src="./assets/images/Hospital.png" class="img-fluid mt-5 h-75 w-100" alt="..."> </div>
                            <div class="col-sm-6">
                                <form id="HospitalRegistrationForm" class="md-5">
                                    <div class="mb-3">
                                        <label for="HospitalName" class="form-label">Hospital Name</label>
                                        <input type="text" class="form-control border-danger shadow-none" name="HospitalName" id="HospitalName" required/> 
                                    </div>
                                    <div class="mb-3 ">
                                        <label for="HospitalContactNo" class="form-label">Contact No</label>
                                        <input type="phone" name="HospitalContactNo" class="form-control border-danger shadow-none" id="HospitalContactNo" required/> 
                                    </div>
                                    <div class="mb-3">
                                        <label for="HospitalEmail" class="form-label">Email</label>
                                        <input type="email" name="HospitalEmail" class="form-control border-danger shadow-none" id="HospitalEmail" required/> 
                                    </div>
                                    <div class="mb-3 ">
                                        <label for="HospitalCity" class="form-label">City</label>
                                        <input type="text" name="HospitalCity" class="form-control border-danger shadow-none" id="HospitalCity" list="citylist" required/>
                                        <datalist id="citylist">
                                            <?php 
                                                include './../databaseConnection.php';
                                                $SelectCity = mysqli_query($connect,"SELECT `city` FROM `hospitals`") or die();
                                                $SelectCityNoRow = mysqli_num_rows($SelectCity);
                                                if ($SelectCityNoRow > 0) { $SelectCityRow = mysqli_fetch_array($SelectCity);?>
                                                    <option value="<?php echo $SelectCityRow['city']; ?>">
                                            <?php } ?>
                                        </datalist>
                                    </div>
                                    <div class="mb-3 ">
                                        <label for="HospitalPassword" class="form-label">Password</label>
                                        <input type="password" name="HospitalPassword" class="form-control border-danger shadow-none" id="HospitalPassword" required/> 
                                    </div>
                                    <div class="mb-3">
                                        <label for="HospitalConfirmPassword" class="form-label">Confirm password</label>
                                        <input type="password" name="HospitalConfirmPassword" class="form-control border-danger shadow-none" id="HospitalConfirmPassword" required/> 
                                    </div>
                                    <p class="fw-bold text-danger d-none alert-bell"><i class="fas fa-bell"></i> <span class="Hospital-Registration-Alerts"></span></p>
                                    <div class=" mb-3 text-center">
                                        <input type="button" class="btn btn-sm btn-danger text-white  rounded-pill" name="HospitalRegistration" id="HospitalRegistration" onclick="hospitalRegistration()" style="font-size:20px;" value="Register" /> 
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</section>
<script>
    $('.HospitalRegistrationButton').click(function () {
        $('.HospitalRegistrationButton').removeClass('bg-light border-danger text-danger');
        $('.ReceiverRegistrationButton').addClass('bg-light border-danger text-danger');
        $('.HospitalRegistrationForm').show();
        $('.ReceiverRegistrationForm').hide();
        //   $('.HospitalRegistrationButton').prop('disabled', true);
        //   $('.ReceiverRegistrationButton').prop('disabled', false);
    });

    $('.ReceiverRegistrationButton').click(function () {
        $('.ReceiverRegistrationForm').show();
        $('.HospitalRegistrationForm').hide();
        $('.HospitalRegistrationButton').addClass('bg-light border-danger text-danger');
        $('.ReceiverRegistrationButton').removeClass('bg-light border-danger text-danger');
        //   $('.HospitalRegistrationButton').prop('disabled', false);
        //   $('.ReceiverRegistrationButton').prop('disabled', true);
    });
</script>