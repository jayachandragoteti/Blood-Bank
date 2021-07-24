<section>
	<div class="jumbotron jumbotron-fluid bg-danger " style="height: 350px;">
		<div class="container">
			<div class="row">
				<div class="col-sm mt-5">
					<h1 class="display-4 text-center text-white fw-bold">
						The Online Blood Bank
						<i class="blink fa fa-heartbeat" ></i>
					</h1>
					<p class="lead text-center text-white font-weight-bold mt-5">Excuses never save a life, Blood donation does</p>
					<p class="lead text-white font-weight-bold text-center mt-5 "> <a class="btn btn-outline-light btn-light text-danger rounded-pill p-2" href="#SearchBlood" role="button">Search Blood</a> </p>
				</div>
			</div>
		</div>
	</div>
	<!-- img with blood -->
	<div class="container mt-5 border-1">
		<div class="row">
			<div class="col-lg-6 mt-5">
				<div class="lead text-center mt-5">
					<p>Do you feel you dont have much to offer ?
						<br> you have the most presious resource of all ,
						<br>the ability to save a life by donating blood !
						<br> help share this valuable gift with someone in need. </p>
				</div>
				<div class="text-center text-danger">
					<h2 class="h1">In Need Of Blood?</h2> </div>
			</div>
			<div class="col-lg-6"> <img src="./assets/images/Home.png" class="img-fluid" width="100%"> </div>
		</div>
	</div>
	<!-- end of img blood -->
	<div class="container " id="SearchBlood">
		<div class="row justify-content-md-center">
			<div class="col col-lg-8 text-center text-danger mb-5">
				<h2 class="h1">Available Blood</h2> </div>
		</div>
		<div class="row justify-content-md-center">
			<div class="col col-lg-12">
				<div class="container">
					<form method="get" >
						<div class="row">
							<div class="col-sm-3">
								<select name="city" id="availableBloodCityFilter"  class="form-select bg-light mb-2" aria-label="Default select example" onchange="availableBlood()">
									<option selected value="">City</option>
									<option value="">All</option>
									<?PHP 
										include './../databaseConnection.php';
										$selectCity  = mysqli_query($connect,"SELECT `sno`,`city` FROM `hospitals`");
										while ($selectCityRow = mysqli_fetch_array($selectCity)) { ?>
											<option value="<?PHP echo $selectCityRow['sno'];?>"><?PHP echo $selectCityRow['city']; ?></option>
										<?PHP } ?>
								</select>
							</div>
							<div class="col-sm-3">
								<select name="bloodGroup" id="availableBloodGroupFilter" class="form-select bg-light mb-2" aria-label="Default select example" onchange="availableBlood()">
									<option selected value="">Blood Group</option>
									<option value="">All</option>
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
							<div class="col-sm-3">
								<select name="hospital" id="availableBloodHospitalFilter" class="form-select bg-light mb-2" aria-label="Default select example" onchange="availableBlood()">
									<option selected value="">Hospital</option>
									<option value="">All</option>
									<?PHP 
										$selectHospital  = mysqli_query($connect,"SELECT `sno`,`hospitalName` FROM `hospitals`");
										while ($selectHospitalRow = mysqli_fetch_array($selectHospital)) { ?>
											<option value="<?PHP echo $selectHospitalRow['sno'];?>"><?PHP echo $selectHospitalRow['hospitalName']; ?></option>
										<?PHP } ?>
								</select>
							</div>
							<div class="col-sm-3">
								<select id="ShowRows" class="form-select bg-light mb-2" aria-label="Default select example" onchange="availableBlood()">
									<option selected value="">Show Rows</option>
									<option value="10">10</option>
									<option value="20">20</option>
									<option value="30">30</option>
									<option value="40">40</option>
									<option value="50">50</option>
									<option value="60">60</option>
									<option value="70">70</option>
									<option value="80">80</option>
									<option value="90">90</option>
									<option value="100">100</option>
									<option value="More">More</option>
								</select>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="row justify-content-md-center mt-5 jumbotron jumbotron-fluid ">
			<div class="col col-sm-10">
				<!-- table -->
				<div class="table-responsive">
					<table  id="dtBasicExample" cellspacing="0" width="100%"class="table table-striped table-hover table-bordered border-danger ">
						<thead>
							<tr class="p-2">
								<th scope="col">Sno</th>
								<th scope="col">Hospital</th>
								<th scope="col">Blood&nbspGroup</th>
								<th scope="col">Quantity (Units)</th>
								<th scope="col">City</th>
								<th scope="col">Request</th>
							</tr>
						</thead>
						<p class="fw-bold text-danger d-none alert-bell"><i class="fas fa-bell"></i> <span class="Sample-Request-Alerts"></span></p>
						<tbody class="AvailableBloodResponse">

						</tbody>
					</table>
					<!-- end table -->
				</div>
			</div>
		</div>
	</div>
	
</section>
