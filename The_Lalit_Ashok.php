<?php
    $servername = "localhost";
    $username = "username";
    $password = "";
    $dbname = "Hotels";


    session_start();

    if(isset($_SESSION["login"]))
    {
    
    
    $firstname = $_SESSION["firstname"];
    
    if($_SESSION["login"] == 1)
    {
        $Login = "<a href = \"#\">$firstname</a>";
        $Signup = "";
    }
    }
    else
    {
        $Login = "<a href = \"login.php\">Login</a>";
        $Signup = "<a href = \"signup.php\">Sign Up</a>";
    
    }

$conn = mysqli_connect($servername,$username,$password,$dbname);

$sql = "SELECT id, rooms FROM Hotels.no";
$result = mysqli_query($conn,$sql);

$v = ["","","","","","","","","","",""];

while($row = mysqli_fetch_assoc($result))
{
    if($row["rooms"] == 0)
    {
        $v[$row["id"]] = "style = \"cursor:not-allowed\"";
        //echo $v[$row["id"]];
    }
}

mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Flamenco" rel="stylesheet">
<style>
* {
  box-sizing: border-box
}
body {
  font-family: Verdana, sans-serif;
  margin:0
}
.mySlides {
  display: none
}
img {
  vertical-align: middle;
}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
.image{
    height:250px;
    position:relative;
  }
  .image1{
    background-image: url("images/hotel_images/Lalit_Ashok/room1.jpg");
    background-size:cover;
  }
  .image2{
    background-image: url("images/hotel_images/Lalit_Ashok/room2.jpg");
    background-size:cover;

  }
  .image3{
    background-image: url("images/hotel_images/Lalit_Ashok/room3.jpg");
    background-size:cover;
  }
  .card1{
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 30%;
    position: relative;
    float: left;
    height: 300px;
  }
  .card1:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
  }
  .card2{
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 30%;
    position: relative;
    float: left;
    height: 300px;
  }
  .card2:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
  }
  .card3{
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 30%;
    position: relative;
    float: left;
    height:300px;
  }
  .card3:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
  }

  .content{
    padding: 2px 16px;
  }
  .About_layout{
    margin-left:3%;
    border-radius:5px;
    border-style:none;
    width:65%;
    height:300px;
    background-color:beige
  }
  .About_Us{
    padding-left:2%;
    width:100%;
    height:20%;
    font-family:'Flamenco';
  }
  .About_content{
    padding-left:2%;
    width:100%;
    height:70%;
    font-family:'Flamenco';
  }
  .Hotel_name{
    font-size: 70px;
    font-family:'Flamenco',cursive;
    color:black
  }

  .Book {
    background-color: red; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    margin: 4px 2px;
    cursor: pointer;
}
</style>
</head>
<body>
<h1 class="Hotel_name">The Lalit Ashok</h1>
<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 4</div>
  <img src="images/hotel_images/Lalit_Ashok/gallery1.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 4</div>
  <img src="images/hotel_images/Lalit_Ashok/gallery2.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 4</div>
  <img src="images/hotel_images/Lalit_Ashok/gallery3.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext">4 / 4</div>
  <img src="images/hotel_images/Lalit_Ashok/gallery3.jpg" style="width:100%">
</div>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span>
  <span class="dot" onclick="currentSlide(4)"></span> 
</div>
<div class="blank" style="width:100%; height: 25px;"></div>

<style>
  
</style>
<div class="About_layout">
  <div class="About_Us">
    <p style="font-size: 45px;">About Us</p>
  </div>
  <div class="About_content">
    <p style="font-size: 23px;">
      n an oasis of 10 acres of sprawling landscape and manicured lawns, the 5-star The Lalit Ashok has elegant non-smoking/smoking accommodations that overlook the swimming pool or golf course. This property features 4 dining options and a variety of fitness facilities.</p>
    <p style="font-size: 23px;">This property features 4 dining options and a variety of fitness facilities.</p>
  </div>
</div>
<div class="blank" style="width:100%; height: 25px;"></div>
<div class="About_layout">
    <div class="About_Us">
      <p style="font-size: 45px;">Facilities</p>
    </div>
    <div class="About_content">
      <p style="font-size: 23px;">Fitted with large windows, the stylish rooms have modern interiors and classic hardwood floors. Each well-furnished room has a flat-screen TV, cozy sitting area and an attached bathroom</p>
      <p style="font-size: 23px;">Indulge in Ayurvedic body treatments at Rejuve Spa, play a game of tennis, or simply relax in the sauna. Airport shuttle and ticket arrangements can be made at the tour desk.</p>
    </div>
</div>
<div class="blank" style="width:100%; height: 25px;"></div>
<div class="About_layout">
    <div class="About_Us">
      <p style="font-size: 45px;">Location</p>
    </div>
    <div class="About_content">
      <p style="font-size: 23px;">Ashok Lalit is a 10-minute drive from Bangalore City Train Station and a 40-minute drive from Bangalore International Airport.  </p>
      <p style="font-size: 23px;"> Sheshadripuram is a great choice for travelers interested in cold weather, nature and business.</p>
    </div>
</div>
<div class="blank" style="width:100%; height: 25px;"></div>
<div style="width:35px; height:300px; float:left; position:relative"></div>
<div class="group">
  <div class="card1">
    <div class="image image1"></div>
      <div class="content">
        <h3>Regular Room</h3>
      </div>
  </div>
  <div style="width:35px; height:300px; float:left; position:relative"></div>
  <div class="card2">
    <div class="image image2"></div>
      <div class="content">
        <h3>Deluxe Room</h3>
      </div>
  </div>
  <div style="width:35px; height:300px; float:left; position:relative"></div>
  <div class="card3">
    <div class="image image3"></div>
      <div class="content">
        <h3>Ultra-Deluxe Room</h3>
      </div>
  </div>
</div>
<div style="width:100%;height:200px;margin-top:27%;">
  <div style="float:right;">
    <a href ="form_room_7.php"><button <?php echo $v[6]; ?> class="Book"> BOOK NOW</button></a>
  </div>
</div>
<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>

</body>
</html> 
