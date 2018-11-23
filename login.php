<?php

    $email = $pass = "";
    $email_err = $password_err = "";
    $login_err = "";
    $flag = 1;

    function f_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {

        if(empty($_POST["email"]))
        {
            $email_err = "Email is required";
            $flag = 0;
        }
        else
        {
            $email = f_input($_POST["email"]);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $email_err = "Invalid email format";
                $flag = 0;
            }
        }

        if(empty($_POST["password"]))
        {
            $password_err = "Password is required";
            $flag = 0;
        }
        else
        {
            $pass = f_input($_POST["password"]);

        }

        if($flag == 1)
        {
            $servername = "localhost";
            $username = "username";
            $password = "";

            $conn = mysqli_connect($servername, $username, $password);
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT id, email FROM Users.Table";
            $result = mysqli_query($conn,$sql);
            $id = 0;    
            while($row = mysqli_fetch_assoc($result))
            {
                if($email == $row["email"])
                {
                    $id = $row["id"];
                    break;
                }
            }

            $sql = "SELECT firstname,lastname,email,passwords FROM Users.Table WHERE id=$id";

            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);

            print_r($row);


            if(mysqli_num_rows($result)>0)
            {
                if($row["passwords"] == $pass)
                {
                    //Log in
                    session_start();
                    $_SESSION["login"] = 1;
                    $_SESSION["firstname"] = $row["firstname"];
                    $_SESSION["lastname"] = $row["lastname"];
                    $_SESSION["email"] = $row["email"];
                    header("Location:new.php");
                    exit; 
                }
                else
                {
                    $password_err = "Wrong Password";
                }
            }
            else
            {
                $email_err = "Email don't exsist";
            }
            mysqli_close($conn);
        }


    }

?>
<html>
    <head>
        <title>Login | New User</title>
        <link rel="stylesheet" href="logincss.css">
        <link rel="stylesheet" type="text/css" href="header_try.css">
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
                        <li><a href="login.php">Login</a></li>
                        <li><a href="signup.php">Signup</a></li>
                    </ul>
                </div>
            </div>
        <div class="loginbox">
            <img src="images/user.jpg" class="avatar">
            <h1> Login Here</h1>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
                <p>Email-Id <span class="error">* <?php echo $email_err; ?></span></p>
                <input type="text" name="email" placeholder="Enter Email-Id">
                <p>Password <span class="error">* <?php echo $password_err; ?></span></p>
                <input type="password" name="password" placeholder="Enter Password">
                <input type="submit" name="" value="Login">
                <a href="signup.php">Don't have an account?</a>
                <span class="error"><?php echo $login_err; ?></span>
            </form>
        </div>
    </body>
</html>
