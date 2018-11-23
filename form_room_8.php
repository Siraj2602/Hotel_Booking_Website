<?php

    $hotels = ["The Oberoi Hotel","Adarsh Hamilton","The Fern Citadel","ITC Gardenia","JW Marriot","The Leela Palace","The Lalit Ashok","The Ritz Carlton","St Mark's Hotel","Taj Yeshwanthpur"];

    session_start();

    if(isset($_SESSION["login"]))
    {
      if($_SESSION["login"]==1)
      {
        $firstname = $_SESSION["firstname"];
        $lastname = $_SESSION["lastname"];
        $email1 = $_SESSION["email"];
        $Login = "<a href = \"myprofile.php\">$firstname</a>";
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
        $checkin = test_input($_POST["checkin"]);
        $checkout = test_input($_POST["checkout"]);
        $adults = test_input($_POST["adults"]);
        $children = test_input($_POST["children"]);
        $S = "$hotels[7]\;$checkin\;$checkout\;$adults\;$children\;";

        $servername = "localhost";
        $username = "username";
        $password = "";

        $conn = mysqli_connect($servername, $username, $password);
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
        
        $email = $_POST["email"];
        $sql = "UPDATE Users.Table
                SET booking= \"$S\"
                WHERE email=\"$email\"";

        if(mysqli_query($conn,$sql))
        {
            echo "Successful";
            echo "<br>";
        }
        else
        {
            echo "Error : ".mysqli_error($conn);
            echo "<br>";
        }

        $sql = "SELECT rooms FROM Hotels.no WHERE id=7";
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
        header("Location:new.php");
    exit;
    } 
    else {
        echo "Error updating record: " . mysqli_error($conn);
        echo "<br>";
    }

    mysqli_close($conn);

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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link href = "header_try.css" rel="stylesheet">
    </head>
<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
  background: url("images/background2.jpg");
}

#regForm {
  background-color: #ffffff;
  margin: 150px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #000000;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
</style>
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

<form id="regForm" method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <h1>Book Your Ideal Hotel</h1>
  <h1><?php echo $hotels[7]; ?></h1>

<div class="tab">Dates:
    <p><input placeholder="Check In Date..." oninput="this.className = ''" name="checkin"></p>
    <p><input placeholder="Check Out Date..." oninput="this.className = ''" name="checkout"></p>
  </div>
  <div class="tab">Number of People:
    <p><input placeholder="Adults..." oninput="this.className = ''" name="adults"></p>
    <p><input placeholder="Children..." oninput="this.className = ''" name="children"></p>
  </div>

  <div class="tab">Name:
    <p><input placeholder="First name..." oninput="this.className = ''" name="fname" <?php echo "value=\"$firstname\";" ?>></p>
    <p><input placeholder="Last name..." oninput="this.className = ''" name="lname" <?php echo "value=\"$lastname\";" ?>></p>
  </div>
  <div class="tab">Contact Info:
    <p><input placeholder="E-mail..." oninput="this.className = ''" name="email" <?php echo "value=\"$email1\";" ?>></p>
    <p><input placeholder="Phone..." oninput="this.className = ''" name="phone"></p>
  </div>

  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
</form>

</body>

<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the crurrent tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}

</script>

</html>
