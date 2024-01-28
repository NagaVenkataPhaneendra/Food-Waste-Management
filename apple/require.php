<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Donation Data</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 20px;
            background-color: #f0f0f0;
            color: #333;
        }

        h2 {
            text-align: center;
            color: #007BFF;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .record {
            border: 2px solid #007BFF;
            margin-bottom: 20px;
            padding: 15px;
            border-radius: 10px;
            background-color: #E6F2FF;
        }

        .record p {
            margin: 0;
            color: #333;
        }

        .record hr {
            margin: 10px 0;
            border: 0;
            border-top: 1px solid #007BFF;
        }

        .button-link {
            display: inline-block;
            padding: 8px 16px;
            text-decoration: none;
            background-color: #007BFF;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .button-link:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Food Donation Data</h2>
        <?php
        session_start();
        $email = $_SESSION["email"];
        echo $email;
        require "db.php";

        // Select data from the food_donations table
        $sql = "SELECT * FROM food_donations";
        $result = $conn->query($sql);

        // Check if any rows were returned
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo '<div class="record">';
                echo '<p>Datetime: ' . $row["datetime"] . '</p>';
                echo '<p>Food Type: ' . $row["food_type"] . '</p>';
                echo '<p>Quantity: ' . $row["quantity"] . '</p>';
                echo '<p>Location: ' . $row["location"] . '</p>';
                echo '<p>Mobile Number: ' . $row["mobile_number"] . '</p>';
                
                echo '<center><a class="button-link" href="https://food.sarathk4.repl.co/main?email_1=' . $row["email"] . '&email_2=' . $_SESSION["email"] . '">Request</a></center>';
                echo '</div>';
            }
        } else {
            echo "<p>No records found</p>";
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>
</body>
</html>
