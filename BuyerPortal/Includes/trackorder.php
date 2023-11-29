<!DOCTYPE html>
<html>
<head>
    <title>Order Tracking</title>
</head>
<body>
    <?php
    // Simulated order status
    $orderStatus = 'pending';

    // Update the order status based on user actions or backend processes
    // Example: If the order is approved for dispatch, set $orderStatus = 'dispatched'
    // Example: If the order is on the way, set $orderStatus = 'on_the_way'

    // Display information based on the order status
    if ($orderStatus == 'pending') {
        echo "<h1>Your order is pending approval</h1>";
    } elseif ($orderStatus == 'dispatched') {
        echo "<h1>Your order has been dispatched</h1>";
        echo "<p>Order is on the way to your location.</p>";
    } elseif ($orderStatus == 'on_the_way') {
        echo "<h1>Your order is on the way</h1>";
        echo "<p>Order is currently in transit.</p>";
    } else {
        echo "<h1>Invalid order status</h1>";
    }
    ?>
</body>
</html>
