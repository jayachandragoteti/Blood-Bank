<?PHP 
include './databaseConnection.php';
session_start();
if (isset($_SESSION['ReceiverLogin'])) {
    $ReceiverLogin = $_SESSION['ReceiverLogin'];
}
// Receiver Registration
if (isset($_POST['receiverRegistration'])) {
    if (isset($_POST['receiverName']) && $_POST['receiverName'] != "" && isset($_POST['receiverEmail']) && $_POST['receiverEmail'] != "" && isset($_POST['receiverContactNo']) && $_POST['receiverContactNo'] != "" && isset($_POST['receiverAddress']) && $_POST['receiverAddress'] != "" && isset($_POST['bloodGroup']) && $_POST['bloodGroup'] != "" && isset($_POST['receiverPassword']) && $_POST['receiverPassword'] != "" && isset($_POST['receiverConfirmPassword']) && $_POST['receiverConfirmPassword'] != "") {
		$receiverEmail = $connect -> real_escape_string($_POST['receiverEmail']);
		$receiverContactNo = $connect -> real_escape_string($_POST['receiverContactNo']);
		$SelectReceiver = mysqli_query($connect,"SELECT * FROM `receivers` WHERE  `email` ='$receiverEmail' OR `contactNo` = '$receiverContactNo'");
		if (mysqli_num_rows($SelectReceiver) > 0) {
			echo "Email or Contact number is already exists!";
		}else {
			$receiverName =  $connect -> real_escape_string($_POST['receiverName']);
			// Allow +, - and . in phone number
			$filtered_phone_number = filter_var($receiverContactNo, FILTER_SANITIZE_NUMBER_INT);
			// Remove "-" from number
			$phone_to_check = str_replace("-", "", $filtered_phone_number);
			// Check the length of number
			$receiverAddress = $connect -> real_escape_string($_POST['receiverAddress']);
			$bloodGroup = $connect -> real_escape_string($_POST['bloodGroup']);
			$receiverPassword = $connect -> real_escape_string($_POST['receiverPassword']);
			$hashed_password = password_hash($receiverPassword, PASSWORD_DEFAULT);
			$receiverConfirmPassword = $connect -> real_escape_string($_POST['receiverConfirmPassword']);
			// Validate E-mail
			if (!filter_var($receiverEmail, FILTER_VALIDATE_EMAIL)) {
				echo "Invalid email format!";
			}elseif(strlen($phone_to_check) < 10 || strlen($phone_to_check) > 14) {
				// This can be customized if you want phone number from a specific country
				echo "Invalid phone number!";
			}elseif(strlen($receiverPassword) < 8) {
				echo "Password should contain at least eight characters. *";
			}elseif($receiverPassword != $receiverConfirmPassword) {
				echo "Password and confirm password should be same!";
			}else {
				$RegisterReceiver = mysqli_query($connect,"INSERT INTO `receivers`(`name`, `email`, `contactNo`, `address`, `bloodType`, `password`) VALUES ('$receiverName','$receiverEmail','$receiverContactNo','$receiverAddress','$bloodGroup','$hashed_password')");
				if ($RegisterReceiver) {
					echo "Registered successfully.";
				} else {
					echo "Registration failed,try again!";
				}
			}
		}
	} else {
		echo "All fields must be filled!";
	}
}
// Hospital Registration
if (isset($_POST['HospitalRegistration'])) {
	if (isset($_POST['HospitalName']) && $_POST['HospitalName'] != "" && isset($_POST['HospitalContactNo']) && $_POST['HospitalContactNo'] != "" && isset($_POST['HospitalEmail']) && $_POST['HospitalEmail'] != "" && isset($_POST['HospitalCity']) && $_POST['HospitalCity'] != "" && isset($_POST['HospitalPassword']) && $_POST['HospitalPassword'] != "" && isset($_POST['HospitalConfirmPassword']) && $_POST['HospitalConfirmPassword'] != "") {
		$HospitalContactNo = $connect -> real_escape_string($_POST['HospitalContactNo']);
		$HospitalEmail = $connect -> real_escape_string($_POST['HospitalEmail']);
		$SelectHospital = mysqli_query($connect,"SELECT * FROM `hospitals` WHERE  `email` ='$HospitalEmail' OR `contactNo` = '$HospitalContactNo'");
		if (mysqli_num_rows($SelectHospital) > 0) {
			echo "Email or Contact number is already exists!";
		}else {
			$HospitalName =  $connect -> real_escape_string($_POST['HospitalName']);
			// Allow +, - and . in phone number
			$filtered_phone_number = filter_var($HospitalContactNo, FILTER_SANITIZE_NUMBER_INT);
			// Remove "-" from number
			$phone_to_check = str_replace("-", "", $filtered_phone_number);
			// Check the length of number
			$HospitalCity = $connect -> real_escape_string(strtoupper($_POST['HospitalCity']));
			$HospitalPassword = $connect -> real_escape_string($_POST['HospitalPassword']);
			$hashed_password = password_hash($HospitalPassword, PASSWORD_DEFAULT);
			$HospitalConfirmPassword = $connect -> real_escape_string($_POST['HospitalConfirmPassword']);
			// Validate E-mail
			if (!filter_var($HospitalEmail, FILTER_VALIDATE_EMAIL)) {
				echo "Invalid email format!";
			}elseif(strlen($phone_to_check) < 10 || strlen($phone_to_check) > 14) {
				// This can be customized if you want phone number from a specific country
				echo "Invalid email format!";
			}elseif(strlen($HospitalPassword) < 8) {
				echo "Password should contain at least eight characters. *";
			}elseif($HospitalPassword != $HospitalConfirmPassword) {
				echo "Password and confirm password should be same!";
			}else {
				$RegisterHospital = mysqli_query($connect,"INSERT INTO `hospitals`(`hospitalName`, `contactNo`, `email`, `city`, `password`) VALUES ('$HospitalName','$HospitalContactNo','$HospitalEmail','$HospitalCity','$hashed_password')");
				if ($RegisterHospital) {
					echo"Hospital registered successfully.";
				} else {
					echo "Registration failed,try again!";
				}
			}
		}
	} else {
		echo "All fields must be filled!";
	}	
}

// User Login
if(isset($_POST['UserLogin'])){
	if (!isset($_POST['loginEmail']) || $_POST['loginEmail'] == "" || !isset($_POST['loginPassword']) || $_POST['loginPassword'] == "" || !isset($_POST['LoginType']) || $_POST['LoginType'] == "") {
		echo "All fields must be filled!";
	} else {
		$loginEmail = $connect -> real_escape_string($_POST['loginEmail']);
		$loginPassword = $connect -> real_escape_string($_POST['loginPassword']);
		$LoginType = $connect -> real_escape_string($_POST['LoginType']);
		// Login Type Check
		if ($LoginType == "Hospital") {
			$searchHospital = mysqli_query($connect,"SELECT * FROM `hospitals` WHERE `email` = '$loginEmail'");
			if (mysqli_num_rows($searchHospital) == 1) {
				$searchHospitalRow = mysqli_fetch_array($searchHospital);
				// If the password inputs matched the hashed password in the database
				if (password_verify($loginPassword, $searchHospitalRow['password'])) {
					$_SESSION['HospitalLogin'] = $searchHospitalRow['sno'];
					echo "loggedSuccessfully";
					// header("Location: ./Hospital/index.php");
				}else{
					echo "Invalid Password!";
				}
			} else {
				echo "Invalid Email!";
			}
		}elseif($LoginType == "Receiver"){
			$searchReceiver = mysqli_query($connect,"SELECT * FROM `receivers` WHERE `email` = '$loginEmail'");
			if (mysqli_num_rows($searchReceiver) == 1) {
				$searchReceiverRow = mysqli_fetch_array($searchReceiver);
				// If the password inputs matched the hashed password in the database
				if (password_verify($loginPassword, $searchReceiverRow['password'])) {
					$_SESSION['ReceiverLogin'] = $searchReceiverRow['sno'];
					echo "loggedSuccessfully";
					// header("Location: index.php");
				}else{
					echo "Invalid Password!";
				}
			} else {
				echo "Invalid Email!";
			}
		}else {
			echo "Invalid login!";
		}
	}
}
// Update Password
if (isset($_POST['UpdatePassword']) && isset($_SESSION['ReceiverLogin'])) {
	if (isset($_POST['oldPassword']) && $_POST['oldPassword'] != "" && isset($_POST['newPassword']) && $_POST['newPassword'] != "" && isset($_POST['confirmPassword']) && $_POST['confirmPassword'] != "") {
		$Receiver = $_SESSION['ReceiverLogin'];
		$newPassword = $connect -> real_escape_string($_POST['newPassword']);
		$confirmPassword = $connect -> real_escape_string($_POST['confirmPassword']);
		if ($newPassword != $confirmPassword) {
			echo "Password and confirm password should be same!";
		}elseif (strlen($newPassword) < 8) {
			echo "Password should contain at least eight characters";
		} else {
			$selectReceiver = mysqli_query($connect,"SELECT * FROM `receivers` WHERE `sno` = '$Receiver'");
			if ($selectReceiver && mysqli_num_rows($selectReceiver) == 1 ) {
				$selectReceiverRow = mysqli_fetch_array($selectReceiver);
				$oldPassword = $connect -> real_escape_string($_POST['oldPassword']);
				if (password_verify($oldPassword, $selectReceiverRow['password'])) {
					$hashed_password = password_hash($newPassword, PASSWORD_DEFAULT);
					$updatePassword = mysqli_query($connect,"UPDATE `receivers` SET `password`='$hashed_password' WHERE `sno` = '$Receiver'");
					if ($updatePassword) {
						echo 'Password Updated successfully.';
					} else {
						echo "Failed try again!";
					}
				}else{
					echo "Invalid Old password!";
				}
			} else {
				echo "Invalid login!";
			}
		}
	} else {
		echo "All fields must be filled!";
	}
}
// My Requests
if (isset($_POST['MyRequests'])) {
    $myRequests  = mysqli_query($connect,"SELECT * FROM `request` WHERE `receiver`= '$ReceiverLogin' ORDER BY `sno` DESC");
    if (mysqli_num_rows($myRequests) != 0) {
        while ($myRequestsRow = mysqli_fetch_array($myRequests)) { 
            $hospitalSno = $myRequestsRow['hospital'];
            $selectHospital  = mysqli_query($connect,"SELECT `hospitalName` FROM `hospitals` WHERE `sno` = '$hospitalSno' ");
            $selectHospitalRow = mysqli_fetch_array($selectHospital);
            ?>
            <tr class="p-2">
                <th scope="row"><?PHP echo $myRequestsRow['sno'];?></th>
                <td><?PHP echo $selectHospitalRow['hospitalName'];?></td>
                <td><?PHP echo $myRequestsRow['bloodGroup'];?></td>
                <td><?PHP echo $myRequestsRow['datm'];?></td>
            </tr>
        <?PHP } }else { ?>
            <tr class="p-2 text-center">
                <th colspan='4'><span class="btn btn-danger btn-sm ">No request found</span></th>
            </tr>
    <?PHP } 
}
// Available Blood
if (isset($_POST['AvailableBlood'])) {
        $selectBloodQuery = "
            SELECT * FROM `availableblood` WHERE `quantity` != '0'
        ";
        if (isset($_POST['City']) && $_POST['City'] != "") {
            $City = $connect -> real_escape_string(strtoupper($_POST['City']));
            $selectBloodQuery .="AND `hospital` = '$City'";
        }
        if (isset($_POST['BloodGroup']) && $_POST['BloodGroup'] != "") {
            $BloodGroup = $connect -> real_escape_string($_POST['BloodGroup']);
            $selectBloodQuery .="AND `bloodGroup` = '$BloodGroup'";
        }
        if (isset($_POST['Hospital']) && $_POST['Hospital'] != "") {
            $Hospital = $connect -> real_escape_string($_POST['Hospital']);
            $selectBloodQuery .="AND `hospital` = '$Hospital'";
        }
        $selectBloodSql = mysqli_query($connect,$selectBloodQuery);
        if (mysqli_num_rows($selectBloodSql) != 0) {
            $i=1;
        while ($selectBloodRow = mysqli_fetch_array($selectBloodSql)) {
            $HospitalSno = $selectBloodRow['hospital'];
            $searchHospital = mysqli_query($connect,"SELECT * FROM `hospitals` WHERE `sno` = '$HospitalSno'");
            $searchHospitalRow = mysqli_fetch_array($searchHospital);
        ?>
        <tr class="p-2">
            <td><?PHP echo $i;?></td>
            <td><?PHP echo $searchHospitalRow['hospitalName'];?></td>
            <td><?PHP echo $selectBloodRow['bloodGroup'];?></td>
            <td><?PHP echo $selectBloodRow['quantity'];?></td>
            <td><?PHP echo $searchHospitalRow['city'];?></td>
            <td>
                <?PHP 
                if (isset($_SESSION['ReceiverLogin'])) {
                    echo '<a href="#SearchBlood" onclick="sampleRequest('.$selectBloodRow['sno'].')" class="btn btn-danger btn-sm"><small>Request&nbspSample</small></a>
                    ';
                }else {
                    echo '<a href="#" onclick="ajaxLoginPageCall()" class="btn btn-danger btn-sm"><small>Request&nbspSample</small></a>';
                }
                ?>
            </td>
        </tr>
        <?PHP  $i++; } }else { ?>
        <tr class="p-2 text-center">
            <th colspan='6'><span class="btn btn-danger btn-sm ">No Data found</span></th>
        </tr>
        <?PHP } 
}
// Sample Request
if (isset($_POST['SampleRequest']) && isset($_POST['availableBloodSno']) && $_POST['availableBloodSno'] !="") {
        $myRequestId = $connect -> real_escape_string($_POST['availableBloodSno']);
        $selectRequestDetails = mysqli_query($connect,"SELECT * FROM `availableblood` WHERE `sno` = '$myRequestId'");
        if ($selectRequestDetails) {
            $selectRequestDetailsRow = mysqli_fetch_array($selectRequestDetails);
            $hospital = $selectRequestDetailsRow['hospital'];
            $bloodGroup = $selectRequestDetailsRow['bloodGroup'];
            $addRequest = mysqli_query($connect,"INSERT INTO `request`(`hospital`, `receiver`, `bloodGroup`) VALUES ('$hospital','$ReceiverLogin','$bloodGroup')");
            if ($addRequest) {
                echo 'Request submitted successfully.';
            } else {
                echo"Request filled,try again!";
            }
        }else {
            echo"Request filled,try again!";
        }
}
// Update Receiver Profile
if (isset($_POST['UpdateReceiverProfile']) && isset($_SESSION['ReceiverLogin'])) {
    if (isset($_POST['ReceiverName']) && $_POST['ReceiverName'] != "" && isset($_POST['ReceiverEmail']) && $_POST['ReceiverEmail'] != "" && isset($_POST['ReceiverContactNo']) && $_POST['ReceiverContactNo'] != "" && isset($_POST['ReceiverAddress']) && $_POST['ReceiverAddress'] != "") {
        $ReceiverName = $connect -> real_escape_string($_POST['ReceiverName']);
        $ReceiverEmail = $connect -> real_escape_string($_POST['ReceiverEmail']);
        $ReceiverContactNo = $connect -> real_escape_string($_POST['ReceiverContactNo']);
        $ReceiverAddress = $connect -> real_escape_string($_POST['ReceiverAddress']);
        $UpdateReceiver = mysqli_query($connect,"UPDATE `receivers` SET `name`='$ReceiverName',`email`='$ReceiverEmail',`contactNo`='$ReceiverContactNo',`address`='$ReceiverAddress' WHERE `sno` = '$ReceiverLogin'");
        if ($UpdateReceiver) {
            echo "Profile Updated";
        } else {
            echo "Failed,try again";
        }
        
    }else {
        echo "All fields must be filled!";
    }
}
