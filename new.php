<?php

$Login = $Signup = "";

session_start();
if(isset($_SESSION["login"]))
{


$firstname = $_SESSION["firstname"];

if($_SESSION["login"] == 1)
{
    $Login = "<a href = \"myprofile.php\">$firstname</a>";
    $Signup = "";
}
}
else
{
    $Login = "<a href = \"login.php\">Login</a>";
    $Signup = "<a href = \"signup.php\">Sign Up</a>";

}



?>

<!DOCTYPE html>
<html>
<head>
    <title>
        Hotel Booking Website.
    </title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Flamenco" rel="stylesheet">
    <link rel="stylesheet" href="cards.css">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css'>
    <link rel='stylesheet prefetch' href='http://codepen.io/ChynoDeluxe/pen/eJPeEL'>
    
</head>
<body>
    <header>
        <nav>
            <div class="row clearfix">
                <img src="images/new1logo.png" class="logo">

                <ul class="main-nav">
                <li><a href="new.php">Home</a></li>
                <li><a href="hotel_list.php">Book Room</a></li>
                <li><?php echo "$Login"; ?></li>
                 <li><?php echo "$Signup"; ?></li>
                </ul>
            </div>
        </nav>
        <div class="main-content">
            <h1>WELCOME TO <span>BOOKAR</span>.<br>
             BOOK WORLD-CLASS HOTELS IN <span>AFFORDABLE PRICES</span></h1>
        </div>
    </header>
    <div class="blank" style="width:100%; height: 10px;"></div>
    <h1 style="font-family:Roboto;color:black;">Popular Hotels</h1>
    <div class="blank" style="width:100%; height: 10px;"></div>
    <div class="blog-card">
        <div class="photo photo1"></div>
        <ul class="details">
            <li>Address:-</li>
            <li style="padding-top:5px;">23</li>
            <li>Old Airport Road, Indiranagar<li>
            <li>Bengaluru,India</li>
        </ul>
        <div class="description">
            <h1 style="color: black">The Leela Palace</h1>
            <h2>Get the celebrity treatment with world-class service</h2>
            <p class="summary" style="color: black">Nestled in the midst of lush gardens that spread across 9 acres, The Leela Palace Bangalore features décor reflecting the grandeur of the bygone era and features of facilities such as an outdoor swimming pool, a spa ....</p>
            <a href="The_Leela_Palace.php">Read More</a>
        </div>
    </div>
    <div class="blog-card alt" style="padding-right: 20px">
        <div class="photo photo2"></div>
        <ul class="details">
            <li>Address:-</li>
            <li style="padding-top:5px;">Kumara Krupa High Grounds,</li>
            <li>Sheshadripuram,<li>
            <li>Bengaluru,India</li>
        </ul>
        <div class="description">
            <h1 style="color: black">The Lalit Ashok</h1>
            <h2>Enjoy the stay in paradise.</h2>
            <p class="summary" style="color: black">In an oasis of 10 acres of sprawling landscape and manicured lawns, the 5-star The Lalit Ashok has elegant non-smoking/smoking accommodations that overlook the swimming pool or golf course. This property features 4 dining options and a variety of fitness facilities...</p>
            <a href="The_Lalit_Ashok.php">Read More</a>
        </div>
    </div>
    <div class="blank" style="width:100%; height: 10px;"></div>
    <div class="blog-card">
        <div class="photo photo3"></div>
        <ul class="details">
            <li>Address:-</li>
            <li style="padding-top:5px;">99,</li>
            <li>Residency Road,<li>
            <li>Bengaluru,India</li>
        </ul>
        <div class="description">
            <h1 style="color: black">The Ritz-Carlton</h1>
            <h2>Stay in the Heart of Bangalore</h2>
            <p class="summary" style="color: black">In Bangalore, just under 1.6 km from the famous Cubbon Park, The Ritz-Carlton, Bangalore is a picturesque property with a 24-hour front desk, free Wi-Fi throughout the property, a swimming pool and a spa and wellness floor...</p>
            <a href="The_Ritz_Carlton.php">Read More</a>
        </div>
    </div>
    <div class="blog-card alt" style="padding-right: 20px">
        <div class="photo photo4"></div>
        <ul class="details">
            <li>Address:-</li>
            <li style="padding-top:5px;">37-39</li>
            <li>Mahatma Gandhi Road<li>
            <li>Bengaluru,India</li> 
        </ul>
        <div class="description">
            <h1 style="color: black">The Oberoi Hotel</h1>
            <h2>Come experience living.</h2>
            <p class="summary" style="color: black">Award-winning gardens with century-old raintrees are featured throughout The Oberoi Bangalore, a 5-star property on the prestigious Mahatma Gandhi Road. Pampering spa treatments, an outdoor pool and a gym are provided. Personal butlers and room service are available 24 hours.</p>
            <a href="The_Oberoi_Hotel.php">Read More</a>
        </div>
    </div>
</body>
</html>