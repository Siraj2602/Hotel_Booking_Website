<?php

    $hotels = ["The Oberoi Hotel","Adarsh Hamilton","The Fern Citadel","ITC Gardenia","JW Marriot","The Leela Palace","The Lalit Ashok","The Ritz Carlton","St Mark's Hotel","Taj Yeshwanthpur"];

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $checkin = test_input($_POST["checkin"]);
        $checkout = test_input($_POST["checkout"]);
        $adults = test_input($_POST["adults"]);
        $children = test_input($_POST["children"]);
        $S = "$hotels[0]\;$checkin\;$checkout\;$adults\;$children\;";

        $servername = "localhost";
        $username = "username";
        $password = "";

        $conn = mysqli_connect($servername, $username, $password);
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
        
        $email = $_POST["email"];
        $sql = "INSERT INTO Users.Table(booking)
                VALUES ($S)
                WHERE email=$email";

        if(mysqli_query($conn,$sql))
        {
            echo "Successful";
            echo "<br>";
        }
        else
        {
            echo "Error : ".mysqli_error($sql);
            echo "<br>";
        }

        $sql = "SELECT rooms FROM Hotels.no WHERE id=0";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $rooms = $row["rooms"];

        
    }
}
$rooms = $rooms -1;

    $sql = "UPDATE Hotels.no SET rooms = $rooms WHERE id=0";

    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
        echo "<br>";
    } 
    else {
        echo "Error updating record: " . mysqli_error($conn);
        echo "<br>";
    }

    mysqli_close($conn);

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

    }
?>
