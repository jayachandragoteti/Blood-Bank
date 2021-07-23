<section class=" mt-5">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-8 ">
                <div class="card text-center">
                    <div class="card-header">
                        <h2 class="text-danger fw-bold large">Change Password</h2>
                    </div>
                    <div class="card-body justify-content-md-center">
                        <div class="container">
                            <div class="row justify-content-md-center">
                                <div class="col-md-8 mt-lg-5">
                                    <!--Section: Block Content-->
                                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                        <div class="mb-3 ">
                                            <label class="form-label text-danger">Old Password</label>
                                            <input type="password" name="oldPassword" class="form-control bg-light  border border-danger" id="oldPassword" required/> 
                                        </div>
                                        <div class="mb-3 ">
                                            <label class="form-label text-danger">New Password</label>
                                            <input type="text" name="newPassword" class="form-control bg-light border border-danger" id="newPassword" required/> 
                                        </div>
                                        <div class="mb-3 ">
                                            <label class="form-label text-danger">Confirm Password</label>
                                            <input type="password" name="confirmPassword" class="form-control bg-light border border-danger" id="confirmPassword" required/> 
                                        </div>
                                        <p class="fw-bold text-danger d-none alert-bell"><i class="fas fa-bell"></i> <span class="Change-Password-Alerts"></span></p>
                                        <div class=" mb-3 text-center">
                                            <input type="button" name="UpdatePasswordSubmit" onclick="ChangePassword()" class="btn btn-lg btn-danger fw-bold rounded-pill" style="font-size:15px;" value="Update"/>
                                        </div>
                                    </form>
                                    <!--Section: Block Content-->
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
        