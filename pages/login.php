<section>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <div class="container">
                    <div class="card mt-5">
                        <div class="card-body">
                            <div class="container ">
                                <div class="col-lg-12">
                                    <h3 class="text-center mb-5 text-danger">Login</h3>
                                </div>
                                <div class="row">
                                    <form id="">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="loginEmail" class="form-label">Email</label>
                                                <input type="email" class="form-control border-danger shadow-none" name="loginEmail" id="loginEmail" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="loginPassword" class="form-label">Password</label>
                                                <input type="password" class="form-control border-danger shadow-none" name="loginPassword" id="loginPassword" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="LoginType" class="form-label">Select Your Login</label>
                                                <select class="form-select border-danger shadow-none" name="LoginType"  id="LoginType"aria-label="Select Your login" required>
                                                    <option selected value="">---- Select ----</option>
                                                    <option value="Hospital">Hospital</option>
                                                    <option value="Receiver">Receiver</option>
                                                </select>
                                            </div>
                                        </div>
                                        <p class="fw-bold text-danger d-none alert-bell"><i class="fas fa-bell"></i> <span class="User-Login-Alerts"></span></p>
                                        <div class=" mb-3 text-center">
                                            <input type="button" onclick="userLogin()" name="loginSubmit" class="btn btn-sm btn-danger text-white rounded-pill" style="font-size:20px;" value="Login" />
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