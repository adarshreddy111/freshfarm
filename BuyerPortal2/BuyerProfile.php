<?php
include("../Includes/db.php");
session_start();
$sessphonenumber = $_SESSION['phonenumber'];

if (isset($_POST['submit'])) {
    // Get the form data
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $mail = $_POST['mail'];
    $user = $_POST['user'];

    // Update the buyer profile in the database
    $sql = "UPDATE buyerregistration SET buyer_name = '$name', buyer_phone = '$phone', buyer_addr = '$address', buyer_mail = '$mail', buyer_username = '$user' WHERE buyer_phone = '$sessphonenumber'";
    $update_query = mysqli_query($con, $sql);

    if ($update_query) {
        echo "Profile updated successfully!";
        // Update the session variable with the new phone number if it was changed
        $_SESSION['phonenumber'] = $phone;
    } else {
        echo "Error updating profile: " . mysqli_error($con);
    }
}

$sql = "SELECT * FROM buyerregistration WHERE buyer_phone = '$sessphonenumber'";
$run_query = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($run_query);

$name = $row['buyer_name'];
$phone = $row['buyer_phone'];
$address = $row['buyer_addr'];
$mail = $row['buyer_mail'];
$user = $row['buyer_username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buyer Profile</title>

    <style>
        /* Your existing CSS styles */

        /* Add additional styles for the edit button */
        .edit-button {
            background-color: rgb(0, 191, 255);
            color: rgb(246, 248, 246);
            border-radius: 16px;
            border-color: rgb(0, 172, 230);
            width: 44%;
            padding: 7px;
            margin: 10px;
            font-size: 12px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .edit-button:hover {
            background-color: rgb(0, 153, 255);
            outline: none;
            color:  rgb(255,255,255);
            border-radius: 20%;
            border-style: outset;
            border-color: rgb(0, 57, 230);
            font-weight: bolder;
            width: 54%;
            font-size: 18px;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <!-- Your existing HTML code -->

    <div class="box">
        <form method="POST" action="">
            <table align="center">
                <tr colspan="2">
                    <h1>BUYER'S PROFILE</h1>
                </tr>
                <tr align="center">
                    <td><label><b>Name:</b></label></td>
                    <td><input type="text" name="name" value="<?php echo $name ?>"></td>
                </tr>
                <tr align="center">
                    <td><label><b>User Name:</b></label></td>
                    <td><input type="text" name="user" value="<?php echo $user ?>"></td>
                </tr>
                <tr align="center">
                    <td><label><b>Phone Number:</b></label></td>
                    <td><input type="text" name="phone" value="<?php echo $phone ?>"></td>
                </tr>
                <tr align="center">
                    <td><label><b>Address:</b></label></td>
                    <td><textarea rows="3" column="56" name="address"><?php echo $address ?></textarea></td>
                </tr>
                <tr align="center">
                    <td><label><b>Mail ID:</b></label></td>
                    <td><input type="text" name="mail" value="<?php echo $mail ?>"></td>
                </tr>
                <tr colspan="2" align="center">
                    <td colspan="2"><input type="submit" name="submit" class="edit-button" value="Save Changes"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
