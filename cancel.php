<?php

session_start();

$email = $_SESSION["email"];

$servername = "localhost";
        $username = "username";
        $password = "";

        $S = ";";
        $conn = mysqli_connect($servername, $username, $password);
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $sql = "UPDATE Users.Table
                SET booking= \"$S\"
                WHERE email=\"$email\"";

if(mysqli_query($conn,$sql))
{
    echo "Successful";
    header("Location:myprofile.php");
    exit;
}
else
{
    echo "Error : ".mysqli_error($conn);
    echo "<br>";
}