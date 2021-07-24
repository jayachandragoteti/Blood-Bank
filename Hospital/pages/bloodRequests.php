<section class=" mt-5">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-12">
                <div class="card text-center">
                    <div class="card-header">
                        <h2 class="text-danger fw-bold large">Blood Requests</h2>
                    </div>
                    <div class="card-body justify-content-md-center">
                        <div class="container">
                            <div class="row justify-content-md-center"> 
                                    <div class="col-md-4 mb-3 mt-3">
                                        <div class="input-group col-md-">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect01">Blood Group</label>
                                            </div>
                                            <select name="bloodGroup" id="bloodGroup" class="form-select form-control custom-select" onchange="BloodRequestsDetails()">
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
                                    </div>
                                    <div class="col-md-4 mb-3 mt-3">
                                        <div class="input-group col-md-">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect01">Show Rows</label>
                                            </div>
                                            <select id="ShowRows" class="form-select form-control custom-select" onchange="BloodRequestsDetails()">
                                                <option selected  value="10">10</option>
                                                <option value="20">20</option>
                                                <option value="30">30</option>
                                                <option value="40">40</option>
                                                <option value="50">50</option>
                                                <option value="60">60</option>
                                                <option value="70">70</option>
                                                <option value="80">80</option>
                                                <option value="90">90</option>
                                                <option value="100">100</option>
                                                <option value="">More</option>
                                            </select>
                                        </div>
                                    </div>
                                <div class="col-md-12 mt-5">
                                <p class="fw-bold text-danger d-none alert-bell"><i class="fas fa-bell"></i> <span class="Available-Blood-Detail-Alerts"></span></p>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered border-danger">
                                            <thead>
                                                <tr class="p-2 text-danger">
                                                    <th scope="col">Request Id</th>
                                                    <th scope="col">Receiver</th>
                                                    <th scope="col">Blood Group</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Contact No</th>
                                                    <th scope="col">Alloted</th>
                                                </tr>
                                            </thead>
                                            <tbody class="BloodRequestsResponse">
                                                
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
        