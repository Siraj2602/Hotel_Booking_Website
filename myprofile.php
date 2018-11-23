<?php

session_start();

    if(isset($_SESSION["login"]))
    {
      if($_SESSION["login"]==1)
      {
        $firstname = $_SESSION["firstname"];
        $lastname = $_SESSION["lastname"];
        $email1 = $_SESSION["email"];
        //echo $email1;
        $Login = "<a href = \"#\">$firstname</a>";
        $Signup = "";
      }
    }

       else
      {
        $Login = "<a href = \"login.php\">Login</a>";
        $Signup = "<a href = \"signup.php\">Sign Up</a>";
    
      }

      $servername = "localhost";
      $username = "username";
      $password = "";

      $conn = mysqli_connect($servername, $username, $password);
      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      }

      $sql = "SELECT * FROM Users.Table WHERE email=\"$email1\"";
        $result = mysqli_query($conn,$sql);

$bookings = "";
$result = mysqli_query($conn,$sql);   
            while($row = mysqli_fetch_assoc($result))
            {
                $bookings = $row["booking"];
                
            }

$book = "<button formaction = \"cancel.php\"  class=\"button\">Cancel Booking</button>";            
$arr = array();

$arr = explode(";",$bookings);

if(sizeof($arr) == 2)
{
    $arr[0] = "NO BOOKINGS";
    $arr[1] = "";
    $arr[2] = "";
    $arr[3] = "";
    $arr[4] = "";
    $book = "";
}

//print_r($arr);

?>

<html>
    <head>
        <title>My Profile</title>
        <link rel="stylesheet" type="text/css" href="header_try.css">
        <style>
            .Button_grid{
                width:100%;
                height:50px;
            }
            .Cancel_grid{
                width:40%;
                padding-left: 100px;
                float:left;
            }
            .SignOut_grid{
                width:40%;
                padding-left:40px;
                padding-right:100px;
                float:left;
            }
            .button {
                background-color:red;
                border: none;
                color: white;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;
            }
            .Cancel_Booking{
                width:100%;
                float:left;

            }
            .SignOut{
                width:100%;
                float:left;
            }
            .heading{
                margin-top:100px;
            }

          table, th, td {
    border: 1px solid black;
}
    table {  
        color: #333; /* Lighten up font color */
        font-family: Helvetica, Arial, sans-serif; /* Nicer font */
        width: 640px; 
        border-collapse: 
        collapse; border-spacing: 0; 
    }

    td, th { border: 1px solid #CCC; height: 30px; } /* Make cells a bit taller */

    th {  
        background: #F3F3F3; /* Light grey background */
        font-weight: bold; /* Make sure they're bold */
    }

    td {  
        background: #FAFAFA; /* Lighter grey background */
        text-align: center; /* Center our text */
    }

        </style>
    </head>
    <body>
        <div class="header">
            <div class ="i">
                <img  id = "l" src="images/new1logo3.png">
                <img  id = "bookar" src="images/new1logo2.png">
            </div>
            <div class="ele">
                <ul>
                <li><a href="new.php">Home</a></li>
                <li><a href="hotel_list.php">Book Room</a></li>
                <li><?php echo "$Login"; ?></li>
                <li><?php echo "$Signup"; ?></li>>
                </ul>
            </div>
        </div>
        <div style="width:100%;height:20px"></div>
        <div class="heading">
            <h1 style="font-size:40px;font-family:'Flamenco';">Your Bookings</h1>
        </div>    
        <div>
        <table class = "t">
            <tr>
            <th>Hotel Name</th>
            <th>Check In Date</th>
            <th>Check Out Date</th>
            <th>Number of Adults</th>
            <th>Number of Children</th>
        </tr>
        <tr>
            <td><?php echo $arr[0] ?></td>
            <td><?php echo $arr[1] ?></td>
            <td><?php echo $arr[2] ?></td>
            <td><?php echo $arr[3] ?></td>
            <td><?php echo $arr[4] ?></td>
        </tr>
        </table>
        </div>
        <div class="Button_grid">
            <div class="Cancel_grid">
            <div class="Cancel_Booking">
                <form>
                    
            <?php echo $book; ?>
                </form>
            </div>
            </div>
            <div class="SignOut_grid">
            <div class="SignOut">
                <form>
                    <button formaction = "signout.php" class="button">SignOut</button></a>
                </form>
            </div>
            </div>
        </div>
    </body>
</html>