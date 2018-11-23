<?php

    $firstname = $lastname = $email = $password1 = $password2 = "";
    $firstname_err = $lastname_err = $email_err = $password_err = "";
    $flag = 1;
    $acc_err = "";

session_start();
    if(isset($_SESSION["login"]))
{


$firstname = $_SESSION["firstname"];

if($_SESSION["login"] == 1)
{
    $Login = "<a href = \"#\">\"$firstname\"</a>";
    $Signup = "";
}
}
else
{
    $Login = "<a href = \"login.php\">Login</a>";
    $Signup = "<a href = \"signup.php\">Sign Up</a>";
}

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST["firstname"]))
        {
            $firstname_err = "First Name is required";
            $flag = 0;
        }
        else
        {
            $firstname = test_input($_POST["firstname"]);
            if(!preg_match("/^[a-zA-Z]*$/",$firstname))
            {
                $firstname_err = "Only letters are allowed";
                $flag = 0;
            }
        }

        if(empty($_POST["lastname"]))
        {
            $lastname_err = "Last Name is required";
            $flag = 0;
        }
        else
        {
            $lastname = test_input($_POST["lastname"]);
            if(!preg_match("/^[a-zA-Z]*$/",$lastname))
            {
                $lastname_err = "Only letters are allowed";
                $flag = 0;
            }
        }

        if(empty($_POST["email"]))
        {
            $email_err = "Email is required";
            $flag = 0;
        }
        else
        {
            $email = test_input($_POST["email"]);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $email_err = "Invalid email format";
                $flag = 0;
            }
        }

        if(empty($_POST["password1"]) or empty($_POST["password2"]))
        {
            $password_err = "Enter both passwords";
            $flag = 0;
        }
        else
        {
            $password1 = test_input($_POST["password1"]);
            $password2 = test_input($_POST["password2"]);
            
            if($password1 != $password2)
            {
                $password_err = "Both passwords don't match";
                $flag = 0;
            }

        }

        

        if($flag == 1)
        {
            $dbflag = 1;
            /*echo $firstname;
            echo "<br>";
            echo $lastname;
            echo "<br>";
            echo $email;
            echo "<br>";
            echo $password1;
            echo "<br>";
            */
            $servername = "localhost";
            $username = "username";
            $password = "";

            $conn = mysqli_connect($servername, $username, $password);
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $sql = "SELECT id, firstname, lastname, email FROM Users.Table";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result) and $dbflag == 1)
                {
                    if($row["firstname"] == $firstname)
                    {
                        $dbflag = 0;
                        $acc_err = "Account exists";
                        break;
                    }
                }
            }

            if($dbflag == 1)
            {

                $sql = "INSERT INTO Users.Table(firstname,lastname,email,passwords)
                VALUES (\"$firstname\" , \"$lastname\" , \"$email\" , \"$password1\")";

                if (mysqli_query($conn, $sql)) {
                    //echo "New record created successfully";
                    header("Location:login.php");
                    exit;
                } else {
                    //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }    
            mysqli_close($conn);

        }



    }
    

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>


<html>
    <head>
        <title>SignUp | New User</title>
        <link rel="stylesheet" href="signup.css">
        <link rel="stylesheet" href="header_try.css">
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
                <li><?php echo "$Signup"; ?></li>
            </ul>
        </div>
    </div>

        <div class="signupbox">
            <img src="images/user.jpg" class="avatar">
            <h1> SignUp Here</h1>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
                <p>FirstName<span class="error">* <?php echo $firstname_err; ?></span></p>
                <input type="text" name="firstname" placeholder="Enter FirstName">
                <p>LastName<span class="error">* <?php echo $lastname_err; ?></span></p>
                <input type="text" name="lastname" placeholder="Enter LastName">
                <p>Email<span class="error">* <?php echo $email_err; ?></span></p>
                <input type="email" name="email" placeholder="Enter EmailID">
                <p>Password<span class="error">* <?php echo $password_err; ?></span></p>
                <input type="password" name="password1" placeholder="Enter Password">
                <p>Confirm Password</p>
                <input type="password" name="password2" placeholder="Renter Password">
                <input type="submit" name="" value="SignUp">
                <br>
                <span class = "error"><?php echo $acc_err?></span>

            </form>
        </div>
    </body>
</html>

