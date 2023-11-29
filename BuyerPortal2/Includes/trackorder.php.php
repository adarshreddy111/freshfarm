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
    // Define the order status
    $orderStatus = "in-transit";
    
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
</body>
</html>
