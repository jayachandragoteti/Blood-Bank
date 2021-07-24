<section class=" mt-5">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header">
                        <h2 class="text-danger fw-bold large">Add Blood Details</h2>
                    </div>
                    <div class="card-body justify-content-md-center">
                        <div class="container">
                            <div class="row justify-content-md-center"> 
                                <div class="col-md-8 mt-lg-5">
                                    <form>
                                        <div class="mb-3">
                                            <label class="form-label text-danger">Blood Group</label>
                                            <select name="bloodGroup" id="bloodGroup" class="form-select form-control bg-light border border-danger " aria-label="Default select example" required>
                                                <option selected value="">Select Blood Group</option>
                                                <option value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>
                                                <option value="O+">O+</option>
                                                <option value="O-">O-</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="Quantity" class="form-label text-danger">Quantity</label>
                                            <input type="number" min='1' name="Quantity" id="Quantity" class="form-select form-control bg-light border border-danger" Placeholder='Enter Quantity in units' id="receiverQuantity" required/> 
                                        </div>
                                        <p class="fw-bold text-danger d-none alert-bell"><i class="fas fa-bell"></i> <span class="Add-Blood-Detail-Alerts"></span></p>
                                        <input type="button" name="AddBloodInfoSubmit"  onclick="AddBloodGroup()" class="btn btn-lg btn-danger fw-bold rounded-pill" style="font-size:15px;" value="Add Blood" /> 
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
        