<?php
include("../Includes/db.php");
session_start();
$sessphonenumber = $_SESSION['phonenumber'];

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get the form data
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $pan = $_POST['pan'];
    $bank = $_POST['bank'];

    // Update the farmer profile in the database
    $sql = "UPDATE farmerregistration SET farmer_name = '$name', farmer_phone = '$phone',farmer_address = '$address', farmer_pan = '$pan', farmer_bank = '$bank' WHERE farmer_phone = '$sessphonenumber'";
    $update_query = mysqli_query($con, $sql);

    if ($update_query) {
        echo "Profile updated successfully!";
    } else {
        echo "Error updating profile: " . mysqli_error($con);
    }
}

// Fetch the farmer profile data
$sql = "SELECT * FROM farmerregistration WHERE farmer_phone = '$sessphonenumber'";
$run_query = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($run_query);

// Set the profile data to variables
$name = $row['farmer_name'];
$phone = $row['farmer_phone'];
$address = $row['farmer_address'];
$pan = $row['farmer_pan'];
$bank = $row['farmer_bank'];
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        /* CSS styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }
        
        .profile-card {
            background-color: #ffffff;
            border: 1px solid #cccccc;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            animation: fadein 1s ease-in-out;
        }
        
        @keyframes fadein {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        
        .profile-card h2 {
            margin-top: 0;
        }
        
        .profile-card p {
            margin-bottom: 10px;
        }
        
        .profile-card input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            transition: border-color 0.3s ease-in-out;
        }
        
        .profile-card input[type="text"]:focus {
            border-color: #888;
        }
        
        .profile-card input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }
        
        .profile-card input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="profile-card">
        <h2>Farmer Profile</h2>
        <form method="POST" action="">
            <p><strong>Name:</strong> <input type="text" name="name" value="<?php echo $name; ?>"></p>
            <p><strong>Phone:</strong> <input type="text" name="phone" value="<?php echo $phone; ?>" ></p>
            <p><strong>Address:</strong> <input type="text" name="address" value="<?php echo $address; ?>" ></p>
            <p><strong>PAN:</strong> <input type="text" name="pan" value="<?php echo $pan; ?>"></p>
            <p><strong>Bank:</strong> <input type="text" name="bank" value="<?php echo $bank; ?>"></p>
            <input type="submit" name="submit" value="Update Profile">
        </form>
    </div>
</body>
</html>
