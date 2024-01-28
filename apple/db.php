<?php
$conn = new mysqli("sql301.infinityfree.com","if0_35576750","X9fxEvLIDc2ZgwY", "if0_35576750_food");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>