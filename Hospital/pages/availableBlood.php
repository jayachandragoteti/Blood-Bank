<section class=" mt-5">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header">
                        <h2 class="text-danger fw-bold large">Available Blood Details</h2>
                    </div>
                    <div class="card-body justify-content-md-center">
                        <div class="container">
                            <div class="row justify-content-md-center">
                                <div class="col-md-8 mt-5">
                                    <form>
                                        <div class="input-group col-sm-4 mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect01">Blood Group</label>
                                            </div>
                                            <select name="bloodGroup" id="bloodGroup" class="form-select form-control custom-select" onchange="AvailableBloodDetails()">
                                                <option selected value="">All</option>
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
                                    </form>
                                </div>
                                <div class="col-md-12 mt-lg-5">
                                <p class="fw-bold text-danger d-none alert-bell"><i class="fas fa-bell"></i> <span class="Available-Blood-Detail-Alerts"></span></p>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered border-danger">
                                            <thead>
                                                <tr class="p-2 text-danger">
                                                    <th scope="col">Blood&nbspGroup</th>
                                                    <th scope="col">Quantity</th>
                                                    <th scope="col">Update</th>
                                                    <th scope="col">Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody class="AvailableBloodResponse">
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
        