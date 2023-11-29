<?php
include("../Includes/db.php");
session_start();
$sessphonenumber = $_SESSION['phonenumber'];

if (isset($_POST['submit'])) {
    // Get the form data
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $user = $_POST['user'];



    // Update the buyer profile in the database
    $sql = "UPDATE buyerregistration SET buyer_name = '$name', buyer_phone = '$phone', buyer_addr = '$address', buyer_username = '$user' WHERE buyer_phone = '$sessphonenumber'";
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
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f2f2f2;
        }

        .box {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            padding: 40px;
            animation: fade-in 0.5s ease-in-out;
        }

        @keyframes fade-in {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .box h1 {
            font-size: 24px;
            margin: 0 0 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .form-group textarea {
            resize: vertical;
        }

        .form-group .edit-button {
            background-color: #0080ff;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .form-group .edit-button:hover {
            background-color: #0066cc;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <div class="box">
            <h1>BUYER'S PROFILE</h1>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="<?php echo $name ?>" required>
                </div>
                <div class="form-group">
                    <label for="user">User Name:</label>
                    <input type="text" id="user" name="user" value="<?php echo $user ?>" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number:</label>
                    <input type="text" id="phone" name="phone" value="<?php echo $phone ?>" required>
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <textarea id="address" name="address" rows="3" required><?php echo $address ?></textarea>
                </div>
            
                <div class="form-group">
                    <input type="submit" name="submit" class="edit-button" value="Save Changes">
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var box = document.querySelector(".box");
            box.classList.add("fade-in");
        });
    </script>
</body>
</html>
