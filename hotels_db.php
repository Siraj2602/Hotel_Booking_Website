<?php

$servername = "localhost";
$username = "username";
$password = "";

$conn = mysqli_connect($servername,$username,$password);

if(!$conn)
{
    die("Connection Failed");

}

$sql = "CREATE DATABASE Hotels";

if(mysqli_query($conn,$sql))
{
    echo "DB successful";
}
else
{
    echo "Db Un";
}
echo "<br>";
$sql = "CREATE TABLE Hotels.no(
        id INT(4) UNSIGNED,
        rooms INT(6) UNSIGNED)";

if (mysqli_query($conn,$sql)){
    echo "Table Created";
}
else{
    echo "Table UN";
}

$sql = "INSERT INTO Hotels.no(id,rooms) 
        VALUES(0,30);";
$sql .="INSERT INTO Hotels.no(id,rooms) 
VALUES(1,25);";
$sql .="INSERT INTO Hotels.no(id,rooms) 
VALUES(2,32);";
$sql .="INSERT INTO Hotels.no(id,rooms) 
VALUES(3,51);";
$sql .="INSERT INTO Hotels.no(id,rooms) 
VALUES(4,47);";
$sql .="INSERT INTO Hotels.no(id,rooms) 
VALUES(5,66);";
$sql .="INSERT INTO Hotels.no(id,rooms) 
VALUES(6,38);";
$sql .="INSERT INTO Hotels.no(id,rooms) 
VALUES(7,56);";
$sql .="INSERT INTO Hotels.no(id,rooms) 
VALUES(8,49);";
$sql .="INSERT INTO Hotels.no(id,rooms) 
VALUES(9,0);";

echo "<br>";

if(mysqli_multi_query($conn,$sql))
{
    echo "New records created successfully";
}
else
{
    echo "Error";
}

mysqli_close($conn);
?>