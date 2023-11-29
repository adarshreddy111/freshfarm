<!DOCTYPE html>
<html>
<head>
    <title>Order Tracking</title>
    <style>
        /* Add your custom CSS styles for animated design here */
        .order-status {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
        }
        
        .order-status span {
            display: inline-block;
            width: 100px;
            text-align: center;
            font-weight: bold;
        }
        
        .order-status .status {
            color: #333;
        }
        
        .order-status .status.pending {
            color: orange;
        }
        
        .order-status .status.in-transit {
            color: blue;
        }
        
        .order-status .status.delivered {
            color: green;
        }
        
        .order-status .status.failed {
            color: red;
        }
        
        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            
            50% {
                transform: scale(1.1);
            }
            
            100% {
                transform: scale(1);
            }
        }
        
        .order-status .status.animated {
            animation: pulse 1s infinite;
        }
    </style>
</head>
<body>
    <?php
    // Establish a database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "agrocraft";

    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Get the order status from the database
    $orderStatus = '';
    
    $sql = "SELECT status FROM orders WHERE order_id = 12345"; // Replace 12345 with the actual order ID
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $orderStatus = $row["status"];
    }
    
    // Function to get the appropriate status text
    function getStatusText($status)
    {
        switch ($status) {
            case "pending":
                return "Pending";
            case "in-transit":
                return "In Transit";
            case "delivered":
                return "Delivered";
            case "failed":
                return "Failed";
            default:
                return "Unknown";
        }
    }
    ?>
    
    <div class="order-status">
        <span>Order Status:</span>
        <span class="status <?php echo $orderStatus; ?> animated">
            <?php echo getStatusText($orderStatus); ?>
        </span>
    </div>
    
    <?php
    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
