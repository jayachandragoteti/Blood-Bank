<?PHP
include './../databaseConnection.php';
session_start();
if (isset($_SESSION['HospitalLogin']))
{
    $HospitalLogin = $_SESSION['HospitalLogin'];
}

// Available Blood Details
if (isset($_POST['AvailableBloodDetails']))
{
    $selectBloodQuery = "
            SELECT * FROM `availableblood` WHERE `quantity` != '0'
        ";

    if (isset($_POST['bloodGroup']) && $_POST['bloodGroup'] != "")
    {
        $bloodGroup = $connect->real_escape_string($_POST['bloodGroup']);
        $selectBloodQuery .= " AND `bloodGroup` = '$bloodGroup'";
    }
    $selectBloodSql = mysqli_query($connect, $selectBloodQuery);
    if (mysqli_num_rows($selectBloodSql) != 0)
    {
        while ($selectBloodRow = mysqli_fetch_array($selectBloodSql))
        {
    ?>
            <tr class="p-2">
                <td><?PHP echo $selectBloodRow['bloodGroup']; ?></td>
                <form method="post">
                    <td>
                        <input type="number" name="updateQuantity" id="updateQuantity" value="<?PHP echo $selectBloodRow['quantity']; ?>" class='form-control bg-light text-danger border border-danger'/>
                    </td>
                    <td><button type="submit" name="updateQuantityButton" onclick="UpdateQuantity('<?PHP echo $selectBloodRow['sno']; ?>')" class="btn btn-success">Update</button></td>
                    <td><button type="submit" name="deleteInfo" onclick="DeleteQuantity('<?PHP echo $selectBloodRow['sno']; ?>')" class="btn btn-danger">Delete</button></td>
                </form>
            </tr>
        <?PHP
        }
    }
    else
    { ?>
            <tr class="p-2 text-center">
                <th colspan='6'><span class="btn btn-danger btn-sm ">No Data found</span></th>
            </tr>
        <?PHP
    }
}

// Update Available Blood Details
if (isset($_POST['UpdateQuantity']) && $_POST['UpdateQuantitySno'] != "" && isset($_POST['UpdateQuantitySno']) && $_POST['Quantity'] != "" && isset($_POST['Quantity']))
{
    $Quantity = $connect->real_escape_string($_POST['Quantity']);
    $updateQuantitySno = $connect->real_escape_string($_POST['UpdateQuantitySno']);
    $updateQuantity = mysqli_query($connect, "UPDATE `availableblood` SET `quantity`='$Quantity' WHERE `sno` = '$updateQuantitySno'");
    if ($updateQuantity)
    {
        echo "Updated";
    }
    else
    {
        echo 'Not Updated';
    }
}

// Delete Available Blood Details
if (isset($_POST['DeleteQuantity']) && $_POST['DeleteQuantitySno'] != "" && isset($_POST['DeleteQuantitySno']) && isset($_SESSION['HospitalLogin']))
{
    $DeleteInfoSno = $connect->real_escape_string($_POST['DeleteQuantitySno']);
    $DeleteInfo = mysqli_query($connect, "DELETE FROM `availableblood` WHERE `sno` = '$DeleteInfoSno'");
    if ($DeleteInfo)
    {
        echo "Deleted";
    }
    else
    {
        echo 'Not Deleted';
    }
}

// Blood Requests Response
if (isset($_POST['BloodRequestsResponse']))
{
    $myRequestsQuery = "SELECT * FROM `request` WHERE `hospital`= '$HospitalLogin' ";

    if (isset($_POST['bloodGroup']) && $_POST['bloodGroup'] != "")
    {
        $bloodGroup = $_POST['bloodGroup'];
        $myRequestsQuery .= "AND `bloodGroup` ='$bloodGroup' ";
    }
    $myRequestsQuery .= " ORDER BY `sno` DESC";
    $myRequests = mysqli_query($connect, $myRequestsQuery);
    if ($myRequestsRow = mysqli_num_rows($myRequests) != 0)
    {
        while ($myRequestsRow = mysqli_fetch_array($myRequests))
        {
            $Receiver = $myRequestsRow['receiver'];
            $SelectReceiver = mysqli_query($connect, "SELECT * FROM `receivers` WHERE  `sno` = '$Receiver'");
            $SelectReceiverRow = mysqli_fetch_array($SelectReceiver)
        ?>
            <tr class="p-2">
                <th scope="row"><?PHP echo $myRequestsRow['sno']; ?></th>
                <td><?PHP echo $SelectReceiverRow['name']; ?></td>
                <td><?PHP echo $myRequestsRow['bloodGroup']; ?></td>
                <td><a href='mailto:<?PHP echo $SelectReceiverRow['email']; ?>'><?PHP echo $SelectReceiverRow['email']; ?></a> </td>
                <td><a href='tel:<?PHP echo $SelectReceiverRow['contactNo']; ?>'><?PHP echo $SelectReceiverRow['contactNo']; ?></a></td>
            </tr>
    <?PHP
        }
    }
}

// Add Blood Info
if (isset($_POST['AddBloodGroup']))
{
    if (isset($_POST['bloodGroup']) && $_POST['bloodGroup'] != "" && isset($_POST['Quantity']) && $_POST['Quantity'] != "" && isset($_SESSION['HospitalLogin']))
    {   
        $bloodGroup = $connect->real_escape_string($_POST['bloodGroup']);
        $Quantity = $connect->real_escape_string($_POST['Quantity']);
        $selectHospital = mysqli_query($connect,"SELECT * FROM `availableblood` WHERE `hospital` = '$HospitalLogin' AND bloodGroup` = '$bloodGroup'");
        if (mysqli_num_rows($selectHospital) == 0) {
            $AddBloodInfo = mysqli_query($connect, "INSERT INTO `availableblood`(`hospital`, `bloodGroup`, `quantity`) VALUES ('$HospitalLogin','$bloodGroup','$Quantity')");
            if ($AddBloodInfo)
            {
                echo "successfully added.";
            }
            else
            {
                echo "Failed,try again!";
            }
        } else {
            echo "Blood Group already exists,update quantity";
        }
        
    }
    else
    {
        echo "All fields must be filled!";
    }

}

if (isset($_POST['ChangePassword']) && isset($_SESSION['HospitalLogin'])) {
	if (isset($_POST['oldPassword']) && $_POST['oldPassword'] != "" && isset($_POST['newPassword']) && $_POST['newPassword'] != "" && isset($_POST['confirmPassword']) && $_POST['confirmPassword'] != "") {
		$Hospital = $_SESSION['HospitalLogin'];
		$newPassword = $connect -> real_escape_string($_POST['newPassword']);
		$confirmPassword = $connect -> real_escape_string($_POST['confirmPassword']);
		if ($newPassword != $confirmPassword) {
			echo "Password and confirm password should be same!";
		}elseif ($newPassword < 8) {
			echo "Password should contain at least eight characters. *";
		} else {
			$selectHospital = mysqli_query($connect,"SELECT * FROM `hospitals` WHERE `sno` = '$Hospital'");
			if ($selectHospital && mysqli_num_rows($selectHospital) == 1 ) {
				$selectHospitalRow = mysqli_fetch_array($selectHospital);
				$oldPassword = $connect -> real_escape_string($_POST['oldPassword']);
				if (password_verify($oldPassword, $selectHospitalRow['password'])) {
					$hashed_password = password_hash($newPassword, PASSWORD_DEFAULT);
					$updatePassword = mysqli_query($connect,"UPDATE `hospitals` SET `password`='$hashed_password' WHERE `sno` = '$Hospital'");
					if ($updatePassword) {
						echo 'Password Updated successfully.';
					} else {
						echo "Update failed try again!";
					}
				}else{
					echo "Invalid Old password!";
				}
			} else {
				echo "Invalid login!";
				header("Location: ./includes/logout.php");
			}
		}
	} else {
		echo "All fields must be filled!";
	}
}