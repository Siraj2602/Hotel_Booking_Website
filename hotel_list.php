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
        $Login = "<a href = \"myprofile.php\">$firstname</a>";
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
$r = ["","","","","","","","","","",""];
while($row = mysqli_fetch_assoc($result))
{
    if($row["rooms"] == 0)
    {
        $v[$row["id"]] = "style = \"cursor:not-allowed\"";
        $r[$row["id"]] = "href=\"hotel_list.php\" disabled = 'disabled'";
    }
    else
    {
        $r[$row["id"]] = "href=\"form_room_10.php\"" ; 
    }
}

mysqli_close($conn);

?>


<html>
    <head>
        <title>Hotel Tiles</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="header_try.css">
        <style>
            .external_grid{
                width: 78%;
                height:250px;
                float: left;
                padding: 15px;
                border: 1px solid #e6e6e6;
                margin-top: 5px;
                background: #fff;
                box-sizing: border-box;
                display: block;
                color: #333;
                font: 400 13px/1.231 "Helvetica Neue",Helvetica,Arial,sans-serif;
            }
            .image_grid{
                padding: 0;
                position: relative;
                width: 33.33333333%;
                float: left;
                margin: 0;
                box-sizing: border-box;
                display: block;
            }
            .content_grid1{
                padding-left: 15px;
                width: 66.66666667%;
                float: left;
                position: relative;
                min-height: 1px;
                padding-right: 5px;
                display: block;
                margin: 0;
                box-sizing: border-box;
                height: 90%;
            }
            .content_grid2{
                width: 100%;
                float: left;
                position: relative;
                display: block;
                margin: 0;
                box-sizing: border-box;
                height:100%;
            }
            .content_grid3{
                height:40%;
            }
            .content_grid4{
                width:75%;
                height:100%
            }
            .content_grid5{
                width:25%;
                height:35%;
                text-align: right;
                float: right;
            }
            .hotel_title{
                font-size: 20px;
                color: #2d67b2;
                padding-right: 20px;
                font-weight: 500;
                font-style: normal;
                line-height : 1.2 !important;
                cursor: pointer;
                float: left;
                margin: 0;
            }
            .stars{
                padding-top: 5px;
                padding-left: 15px;
                display: inline-block;
                font-size: 20px;
                margin: 0;
                padding: 0;
                font-weight: 500;
                font-style: normal;
                line-height: 1.2 
            }
            .star_style{
                font-family: 'go_font_v29' !important;
                speak: none;
                font-style: normal;
                font-weight: normal;
                font-variant: normal;
                text-transform: none;
                line-height: 1;
                -webkit-font-smoothing: antialiased;
                font-size: 15px;
                color: #F7C541;
                padding-right: 5px;
                float: left;
                box-sizing: border-box;
            }
            .star_style:before{
                content: "\ea07";
                box-sizing: border-box;
            }
            .address{
                line-height: 1;
                font-size: 14px;
                color: #999;
                padding-top: 2px;
                padding-bottom: 5px;
                width: 100%;
                float: left;
                display: block;
                margin-block-start: 1em;
                margin-block-end: 1em;
                margin-inline-start: 0px;
                margin-inline-end: 0px;
                margin: 0;
                padding: 0;
            }
            .rating{
                text-align: right;
                float: right;
                margin: 0;
                padding: 0;
            }
            .rating_content{
                line-height: 1;
                font-size: 14px;
                border: 1px solid #f26722;
                margin-left: 3px;
                margin-top: 3px;
                padding: 2px 7px;
                float: left;
                -webkit-border-radius: 25px;
                color: #f26722;
                margin: 0;
            }
            .rating_value{
                font-weight: bold;
                font-style: normal;
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            .reviews{
                line-height: 1;
                font-size: 13px;
                color: #2d67b2;
                margin-top: 2px;
                padding-top: 4px;
                padding-left: 15px;
                text-align: right;
                float: right;
                margin: 0;
                padding: 0;
            }
            .couple_friendly{
                border: 1px solid #f26722;
                padding: 3px;
                border-radius: 3px;
                -webkit-border-radius: 3px;
                background: #fff;
                position: relative;
                display: inline-block;
                width:25%;
            }
            .couple_content{
                line-height: 1;
                font-size: 12px;
                color: #f26722;
                /*float: left;*/
                margin: 0;
                padding: 0;
            }
            .features{
                width: 100%;
                float: left;
                margin: 0;
                padding: 0;
                display: block;
            }
            .facilities{
                position: relative;
                min-height: 1px;
                margin-bottom: 5px;
                padding: 0 !important;
                width: 58.33333333%;
                float: left;

            }
            .icons_grid{
                position: relative;
                display: inline-block;
                margin-right: 15px;
                float: left;                
            }
            .icons{
                font-family: 'go_font_v29' !important;
                speak: none;
                font-style: normal;
                font-weight: normal;
                font-variant: normal;
                text-transform: none;
                line-height: 1;
                -webkit-font-smoothing: antialiased;
                font-size: 24px;
                color: #2d67b2;
                float:left;
            }
            .price_grid{
                margin-bottom: 10px;
                padding: 0;
                text-align: right;
                width: 41.66666667%;
                height: 60%;
                float: left;
                position: relative;
                min-height: 1px;
            }
            .discount_grid{
                text-align: right;
                height: 20%;
                width: 100%;
                float: left;
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            .save_price{
                line-height: 1;
                font-size: 14px;
                color: #2bac36;
                font-weight: 500;
                font-style: normal;
                float: right;
                display: block;
                margin-block-start: 1em;
                margin-block-end: 1em;
                margin-inline-start: 0px;
                margin-inline-end: 0px;
                text-align: right;
            }
            .old_price{
                color: #999;
                padding-top: 1px;
                padding-right: 10px;
                text-align: right;
                float: right;
                margin: 0;
                display: block;
                margin-block-start: 1em;
                margin-block-end: 1em;
                margin-inline-start: 0px;
                margin-inline-end: 0px;
            }
            .actual_price{
                text-align: right;
                margin-block-start: 1em;
                margin-block-end: 1em;
                margin-inline-start: 0px;
                margin-inline-end: 0px;
                float: right;
                font-weight: 500;
                font-style: normal;
                margin-top: 17px;
                color: #333;
                font-size: 20px;
                line-height: 1;
            }
            .button_grid{
                margin-top: 10px;
                text-align: right;
                width: 100%;
                float: left;
                margin: 0;
                display: block;
                box-sizing: border-box;
                padding:0;
            }
            .button_style{
                background:red;
                color: #fff;
                cursor: pointer;
                -webkit-border-radius: 3px;
                padding: 7px 15px;
                text-align: center;
                border: 0;
                font-size: 14px;
                -webkit-appearance: none;
                float: right;
                box-sizing: border-box;
                letter-spacing: normal;
                word-spacing: normal;
                text-transform: none;
                text-indent: 0px;
                text-shadow: none;
                display: inline-block;
                font: 400 13.3333px Arial;
                -webkit-writing-mode: horizontal-tb !important;
                -webkit-font-smoothing: antialiased;
            }
            .signup_discount{
                padding: 0 !important;
                float: right;
                width: 50%;
                position: relative;
                min-height: 1px;
                margin: 0;
                box-sizing: border-box;
            }
            .page_grid{
                float:left;
                margin-left:20%;
                margin-right:10%;
            }
            body{
                background-color:#f5f5f5;
            }
            li{
                list-style-type:none;
                color:#2d67b2;
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
                    <li><a href="#">Book Room</a></li>
                    <li><?php echo "$Login"; ?></li>
                    <li><?php echo "$Signup"; ?></li>>
                                </ul>
                            </div>
                        </div>
        <div class="page_grid">
        <section class="external_grid">
            <div class="image_grid">
                <a>
                    <img src="images/hotel_images/Hotel_Oberoi/hotel.jpg" style="height:220px; width:100%">
                </a>
            </div>
            <div class="content_grid1">
                <div class="content_grid2">
                    <div class="content_grid2 content_grid3">
                        <div class="content_grid2 content_grid3 content_grid4">
                            <div class="content_grid2" style="line-height: 1;font-size: 20px;">
                                <a href="The_Oberoi_Hotel.php">
                                    <span class="hotel_title">The Oberoi Hotel</span>
                                    <span class="stars">
                                        <i class="glyphicon glyphicon-star" style="color:goldenrod;"></i>
                                        <i class="glyphicon glyphicon-star" style="color:goldenrod;"></i>
                                        <i class="glyphicon glyphicon-star" style="color:goldenrod;"></i>
                                        <i class="glyphicon glyphicon-star" style="color:goldenrod;"></i>
                                    </span>
                                </a>
                                <p class="address">
                                    <span>37-39/Mahatma Gandhi Road/Bengaluru</span>
                                </p>
                                <div style="height:30%;width:100%;margin-top:30px;">
                                    <div class="couple_friendly">
                                        <span class="couple_content">Couple Friendly</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content_grid2 content_grid3 content_grid5">
                            <div>
                                <span style="float:left;color:#f26722;padding-top:0;padding-left:10px;padding-bottom: 20px;width:65px;height:20%">Ratings</span>
                                <div class="rating">
                                    <span class="rating_content"><span class="rating_value">4.2</span>/5</span>
                                </div>
                            </div>
                            <span class="reviews">158 reviews</span>
                        </div>
                    </div>
                    <div class="features">
                        <div class="facilities">
                            <ul style="margin-left: 0;margin-top:10px;padding-left: 0;font-size: 15px;">
                                <li>A/C Rooms</li>
                                <li>Non A/C Rooms</li>
                                <li>Room Service</li>
                                <li>Restaurant</li>
                                <li>Swimming Pool</li>
                            </ul>
                        </div>
                        <div class="price_grid">
                            <div class="discount_grid">
                                <p class="save_price">
                                    Save ₹ 8500
                                </p>
                                <p class="old_price">
                                    <span style="text-decoration: line-through">₹ 18500</span>
                                </p>
                            </div>
                            <p class="actual_price">
                                <span style="float:left;">₹ 10000</span>
                            </p>
                            <span style="line-height: 1;width:100%;float:right;"></span>
                            <div class="button_grid">
                                <a href ="form_room_1.php"><button <?php echo $v[0]; ?> class="button_style">
                                    Book Now
                                </button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="external_grid">
            <div class="image_grid">
                <a>
                    <img src="images/hotel_images/Adarsh_hamilton/hotel.jpg" style="height:220px; width:100%">
                </a>
            </div>
            <div class="content_grid1">
                <div class="content_grid2">
                    <div class="content_grid2 content_grid3">
                        <div class="content_grid2 content_grid3 content_grid4">
                            <div class="content_grid2" style="line-height: 1;font-size: 20px;">
                                <a href="Adarsh_Hamilton.php">
                                    <span class="hotel_title">Adarsh Hamilton</span>
                                    <span class="stars">
                                        <i class="glyphicon glyphicon-star" style="color:goldenrod;"></i>
                                        <i class="glyphicon glyphicon-star" style="color:goldenrod;"></i>
                                        <i class="glyphicon glyphicon-star" style="color:goldenrod;"></i>
                                        <i class="glyphicon glyphicon-star" style="color:goldenrod;"></i>
                                    </span>
                                </a>
                                <p class="address">
                                    <span>2/4 ,Langford Garden Road, Richmond Town, Bengaluru, Karnataka</span>
                                </p>
                                <div style="height:30%;width:100%;margin-top:30px;">
                                    <div class="couple_friendly">
                                        <span class="couple_content">Couple Friendly</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content_grid2 content_grid3 content_grid5">
                            <div>
                                <span style="float:left;color:#f26722;padding-top:0;padding-left:10px;padding-bottom: 20px;width:65px;height:20%">Ratings</span>
                                <div class="rating">
                                    <span class="rating_content"><span class="rating_value">4.1</span>/5</span>
                                </div>
                            </div>
                            <span class="reviews">382 reviews</span>
                        </div>
                    </div>
                    <div class="features">
                        <div class="facilities">
                            <ul style="margin-left: 0;margin-top:0px;padding-left: 0;font-size: 15px;">
                                <li>A/C Rooms</li>
                                <li>Non A/C Rooms</li>
                                <li>Room Service</li>
                                <li>Restaurant</li>
                                <li>Gym</li>
                                <li>Swimming Pool</li>
                            </ul>
                        </div>
                        <div class="price_grid">
                            <div class="discount_grid">
                                <p class="save_price">
                                    Save ₹ 2000
                                </p>
                                <p class="old_price">
                                    <span style="text-decoration: line-through">₹ 7500</span>
                                </p>
                            </div>
                            <p class="actual_price">
                                <span style="float:left;">₹5500</span>
                            </p>
                            <span style="line-height: 1;width:100%;float:right;"></span>
                            <div class="button_grid">
                            <a href ="form_room_2.php"><button <?php echo $v[1]; ?> class="button_style">
                                    Book Now
                                </button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="external_grid">
            <div class="image_grid">
                <a>
                    <img src="images/hotel_images/Fern_citadel/hotel.jpg" style="height:220px; width:100%">
                </a>
            </div>
            <div class="content_grid1">
                <div class="content_grid2">
                    <div class="content_grid2 content_grid3">
                        <div class="content_grid2 content_grid3 content_grid4">
                            <div class="content_grid2" style="line-height: 1;font-size: 20px;">
                                <a href="The_Fern_Citadel.php">
                                    <span class="hotel_title">The Fern Citadel</span>
                                    <span class="stars">
                                        <i class="glyphicon glyphicon-star" style="color:goldenrod;"></i>
                                        <i class="glyphicon glyphicon-star" style="color:goldenrod;"></i>
                                        <i class="glyphicon glyphicon-star" style="color:goldenrod;"></i>
                                    </span>
                                </a>
                                <p class="address">
                                    <span>Sheshadari ,Road Anand Rao Circle, Bengaluru</span>
                                </p>
                                <div style="height:30%;width:100%;margin-top:30px;">
                                    <div class="couple_friendly">
                                        <span class="couple_content">Couple Friendly</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content_grid2 content_grid3 content_grid5">
                            <div>
                                <span style="float:left;color:#f26722;padding-top:0;padding-left:10px;padding-bottom: 20px;width:65px;height:20%">Ratings</span>
                                <div class="rating">
                                    <span class="rating_content"><span class="rating_value">3.8</span>/5</span>
                                </div>
                            </div>
                            <span class="reviews">92 reviews</span>
                        </div>
                    </div>
                    <div class="features">
                        <div class="facilities">
                            <ul style="margin-left: 0;margin-top:10px;padding-left: 0;font-size: 15px;">
                                <li>A/C Rooms</li>
                                <li>Non A/C Rooms</li>
                                <li>Room Service</li>
                                <li>Swimming Pool</li>
                            </ul>
                        </div>
                        <div class="price_grid">
                            <div class="discount_grid">
                                <p class="save_price">
                                    Save ₹ 535
                                </p>
                                <p class="old_price">
                                    <span style="text-decoration: line-through">₹ 6500</span>
                                </p>
                            </div>
                            <p class="actual_price">
                                <span style="float:left;">₹ 5965</span>
                            </p>
                            <span style="line-height: 1;width:100%;float:right;"></span>
                            <div class="button_grid">
                            <a href ="form_room_3.php"><button <?php echo $v[2]; ?> class="button_style">
                                    Book Now
                                </button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="external_grid">
            <div class="image_grid">
                <a>
                    <img src="images/hotel_images/ITC_Gardenia/hotel.jpg" style="height:220px; width:100%">
                </a>
            </div>
            <div class="content_grid1">
                <div class="content_grid2">
                    <div class="content_grid2 content_grid3">
                        <div class="content_grid2 content_grid3 content_grid4">
                            <div class="content_grid2" style="line-height: 1;font-size: 20px;">
                                <a href="ITC_Gardenia.php">
                                    <span class="hotel_title">ITC Gardenia</span>
                                    <span class="stars">
                                        <i class="glyphicon glyphicon-star" style="color:goldenrod;"></i>
                                        <i class="glyphicon glyphicon-star" style="color:goldenrod;"></i>
                                        <i class="glyphicon glyphicon-star" style="color:goldenrod;"></i>
                                        <i class="glyphicon glyphicon-star" style="color:goldenrod;"></i>
                                    </span>
                                </a>
                                <p class="address">
                                    <span>Residency Road, Bengaluru</span>
                                </p>
                                <div style="height:30%;width:100%;margin-top:30px;">
                                    <div class="couple_friendly">
                                        <span class="couple_content">Couple Friendly</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content_grid2 content_grid3 content_grid5">
                            <div>
                                <span style="float:left;color:#f26722;padding-top:0;padding-left:10px;padding-bottom: 20px;width:65px;height:20%">Ratings</span>
                                <div class="rating">
                                    <span class="rating_content"><span class="rating_value">4.0</span>/5</span>
                                </div>
                            </div>
                            <span class="reviews">78 reviews</span>
                        </div>
                    </div>
                    <div class="features">
                        <div class="facilities">
                            <ul style="margin-left: 0;margin-top:10px;padding-left: 0;font-size: 15px;">
                                <li>A/C Rooms</li>
                                <li>Non A/C Rooms</li>
                                <li>Room Service</li>
                                <li>Restaurant</li>
                            </ul>
                        </div>
                        <div class="price_grid">
                            <div class="discount_grid">
                                <p class="save_price">
                                    Save ₹ 1500
                                </p>
                                <p class="old_price">
                                    <span style="text-decoration: line-through">₹ 15500</span>
                                </p>
                            </div>
                            <p class="actual_price">
                                <span style="float:left;">₹ 14000</span>
                            </p>
                            <span style="line-height: 1;width:100%;float:right;"></span>
                            <div class="button_grid">
                            <a href ="form_room_4.php"><button <?php echo $v[3]; ?> class="button_style">
                                    Book Now
                                </button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="external_grid">
            <div class="image_grid">
                <a>
                    <img src="images/hotel_images/JW_Marriot/hotel.jpg" style="height:220px; width:100%">
                </a>
            </div>
            <div class="content_grid1">
                <div class="content_grid2">
                    <div class="content_grid2 content_grid3">
                        <div class="content_grid2 content_grid3 content_grid4">
                            <div class="content_grid2" style="line-height: 1;font-size: 20px;">
                                <a href="JW_Marriot.php">
                                    <span class="hotel_title">JW Marriot</span>
                                    <span class="stars">
                                        <i class="glyphicon glyphicon-star" style="color:goldenrod;"></i>
                                        <i class="glyphicon glyphicon-star" style="color:goldenrod;"></i>
                                        <i class="glyphicon glyphicon-star" style="color:goldenrod;"></i>
                                        <i class="glyphicon glyphicon-star" style="color:goldenrod;"></i>
                                    </span>
                                </a>
                                <p class="address">
                                    <span>24/1 Vittal Mallya Road, 560001 Bangalore, India</span>
                                </p>
                                <div style="height:30%;width:100%;margin-top:30px;">
                                    <div class="couple_friendly">
                                        <span class="couple_content">Couple Friendly</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content_grid2 content_grid3 content_grid5">
                            <div>
                                <span style="float:left;color:#f26722;padding-top:0;padding-left:10px;padding-bottom: 20px;width:65px;height:20%">Ratings</span>
                                <div class="rating">
                                    <span class="rating_content"><span class="rating_value">4.1</span>/5</span>
                                </div>
                            </div>
                            <span class="reviews">78 reviews</span>
                        </div>
                    </div>
                    <div class="features">
                        <div class="facilities">
                            <ul style="margin-left: 0;margin-top:10px;padding-left: 0;font-size: 15px;">
                                <li>A/C Rooms</li>
                                <li>Non A/C Rooms</li>
                                <li>Room Service</li>
                                <li>Restaurant</li>
                            </ul>
                        </div>
                        <div class="price_grid">
                            <div class="discount_grid">
                                <p class="save_price">
                                    Save ₹ 1500
                                </p>
                                <p class="old_price">
                                    <span style="text-decoration: line-through">₹ 16000</span>
                                </p>
                            </div>
                            <p class="actual_price">
                                <span style="float:left;">₹ 14500</span>
                            </p>
                            <span style="line-height: 1;width:100%;float:right;"></span>
                            <div class="button_grid">
                            <a href ="form_room_5.php"><button <?php echo $v[4]; ?> class="button_style">
                                    Book Now
                                </button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="external_grid">
            <div class="image_grid">
                <a>
                    <img src="images/hotel_images/Leela_palace/hotel.jpg" style="height:220px; width:100%">
                </a>
            </div>
            <div class="content_grid1">
                <div class="content_grid2">
                    <div class="content_grid2 content_grid3">
                        <div class="content_grid2 content_grid3 content_grid4">
                            <div class="content_grid2" style="line-height: 1;font-size: 20px;">
                                <a href="The_Leela_Palace.php">
                                    <span class="hotel_title">The Leela Palace</span>
                                    <span class="stars">
                                        <i class="glyphicon glyphicon-star" style="color:goldenrod;"></i>
                                        <i class="glyphicon glyphicon-star" style="color:goldenrod;"></i>
                                        <i class="glyphicon glyphicon-star" style="color:goldenrod;"></i>
                                        <i class="glyphicon glyphicon-star" style="color:goldenrod;"></i>
                                        <i class="glyphicon glyphicon-star" style="color:goldenrod;"></i>
                                    </span>
                                </a>
                                <p class="address">
                                    <span>23 Old Airport Road, Indiranagar, 560008 Bengaluru</span>
                                </p>
                                <div style="height:30%;width:100%;margin-top:30px;">
                                    <div class="couple_friendly">
                                        <span class="couple_content">Couple Friendly</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content_grid2 content_grid3 content_grid5">
                            <div>
                                <span style="float:left;color:#f26722;padding-top:0;padding-left:10px;padding-bottom: 20px;width:65px;height:20%">Ratings</span>
                                <div class="rating">
                                    <span class="rating_content"><span class="rating_value">4.8</span>/5</span>
                                </div>
                            </div>
                            <span class="reviews">438 reviews</span>
                        </div>
                    </div>
                    <div class="features">
                        <div class="facilities">
                            <ul style="margin-left: 0;margin-top:10px;padding-left: 0;font-size: 15px;">
                                <li>A/C Rooms</li>
                                <li>Non A/C Rooms</li>
                                <li>Room Service</li>
                                <li>Restaurant</li>
                            </ul>
                        </div>
                        <div class="price_grid">
                            <div class="discount_grid">
                                <p class="save_price">
                                    Save ₹ 5000
                                </p>
                                <p class="old_price">
                                    <span style="text-decoration: line-through">₹ 16500</span>
                                </p>
                            </div>
                            <p class="actual_price">
                                <span style="float:left;">₹ 11500</span>
                            </p>
                            <span style="line-height: 1;width:100%;float:right;"></span>
                            <div class="button_grid">
                            <a href ="form_room_6.php"><button <?php echo $v[5]; ?> class="button_style">
                                    Book Now
                                </button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="external_grid">
            <div class="image_grid">
                <a>
                    <img src="images/hotel_images/Lalit_Ashok/hotel.jpg" style="height:220px; width:100%">
                </a>
            </div>
            <div class="content_grid1">
                <div class="content_grid2">
                    <div class="content_grid2 content_grid3">
                        <div class="content_grid2 content_grid3 content_grid4">
                            <div class="content_grid2" style="line-height: 1;font-size: 20px;">
                                <a href="The_Lalit_Ashok.php">
                                    <span class="hotel_title">The Lalit Ashok</span>
                                    <span class="stars">
                                        <i class="glyphicon glyphicon-star" style="color:goldenrod;"></i>
                                        <i class="glyphicon glyphicon-star" style="color:goldenrod;"></i>
                                        <i class="glyphicon glyphicon-star" style="color:goldenrod;"></i>
                                        <i class="glyphicon glyphicon-star" style="color:goldenrod;"></i>
                                    </span>
                                </a>
                                <p class="address">
                                    <span>Kumara Krupa High Grounds, Sheshadripuram,Bengaluru</span>
                                </p>
                                <div style="height:30%;width:100%;margin-top:30px;">
                                    <div class="couple_friendly">
                                        <span class="couple_content">Couple Friendly</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content_grid2 content_grid3 content_grid5">
                            <div>
                                <span style="float:left;color:#f26722;padding-top:0;padding-left:10px;padding-bottom: 20px;width:65px;height:20%">Ratings</span>
                                <div class="rating">
                                    <span class="rating_content"><span class="rating_value">4.4</span>/5</span>
                                </div>
                            </div>
                            <span class="reviews">276 reviews</span>
                        </div>
                    </div>
                    <div class="features">
                        <div class="facilities">
                            <ul style="margin-left: 0;margin-top:10px;padding-left: 0;font-size: 15px;">
                                <li>A/C Rooms</li>
                                <li>Non A/C Rooms</li>
                                <li>Room Service</li>
                                <li>Restaurant</li>
                            </ul>
                        </div>
                        <div class="price_grid">
                            <div class="discount_grid">
                                <p class="save_price">
                                    Save ₹ 1250
                                </p>
                                <p class="old_price">
                                    <span style="text-decoration: line-through">₹ 7200</span>
                                </p>
                            </div>
                            <p class="actual_price">
                                <span style="float:left;">₹ 5950</span>
                            </p>
                            <span style="line-height: 1;width:100%;float:right;"></span>
                            <div class="button_grid">
                            <a href ="form_room_7.php"><button <?php echo $v[6]; ?> class="button_style">
                                    Book Now
                                </button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="external_grid">
            <div class="image_grid">
                <a>
                    <img src="images/hotel_images/Ritz_Carlton/hotel.jpg" style="height:220px; width:100%">
                </a>
            </div>
            <div class="content_grid1">
                <div class="content_grid2">
                    <div class="content_grid2 content_grid3">
                        <div class="content_grid2 content_grid3 content_grid4">
                            <div class="content_grid2" style="line-height: 1;font-size: 20px;">
                                <a href="The_Ritz_Carlton.php">
                                    <span class="hotel_title">The Ritz Carlton</span>
                                    <span class="stars">
                                        <i class="glyphicon glyphicon-star" style="color:goldenrod;"></i>
                                        <i class="glyphicon glyphicon-star" style="color:goldenrod;"></i>
                                        <i class="glyphicon glyphicon-star" style="color:goldenrod;"></i>
                                        <i class="glyphicon glyphicon-star" style="color:goldenrod;"></i>
                                    </span>
                                </a>
                                <p class="address">
                                    <span>99,Residency Road,Bengaluru</span>
                                </p>
                                <div style="height:30%;width:100%;margin-top:30px;">
                                    <div class="couple_friendly">
                                        <span class="couple_content">Couple Friendly</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content_grid2 content_grid3 content_grid5">
                            <div>
                                <span style="float:left;color:#f26722;padding-top:0;padding-left:10px;padding-bottom: 20px;width:65px;height:20%">Ratings</span>
                                <div class="rating">
                                    <span class="rating_content"><span class="rating_value">4.4</span>/5</span>
                                </div>
                            </div>
                            <span class="reviews">278 reviews</span>
                        </div>
                    </div>
                    <div class="features">
                        <div class="facilities">
                            <ul style="margin-left: 0;margin-top:10px;padding-left: 0;font-size: 15px;">
                                <li>A/C Rooms</li>
                                <li>Non A/C Rooms</li>
                                <li>Room Service</li>
                                <li>Restaurant</li>
                            </ul>
                        </div>
                        <div class="price_grid">
                            <div class="discount_grid">
                                <p class="save_price">
                                    Save ₹ 1100
                                </p>
                                <p class="old_price">
                                    <span style="text-decoration: line-through">₹ 13100</span>
                                </p>
                            </div>
                            <p class="actual_price">
                                <span style="float:left;">₹ 12200</span>
                            </p>
                            <span style="line-height: 1;width:100%;float:right;"></span>
                            <div class="button_grid">
                            <a href ="form_room_8.php"><button <?php echo $v[7]; ?> class="button_style">
                                    Book Now
                                </button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="external_grid">
            <div class="image_grid">
                <a>
                    <img src="images/hotel_images/St_Mark's/hotel.jpg" style="height:220px; width:100%">
                </a>
            </div>
            <div class="content_grid1">
                <div class="content_grid2">
                    <div class="content_grid2 content_grid3">
                        <div class="content_grid2 content_grid3 content_grid4">
                            <div class="content_grid2" style="line-height: 1;font-size: 20px;">
                                <a href="St_Marks's.php">
                                    <span class="hotel_title">St. Mark's Hotel</span>
                                    <span class="stars">
                                        <i class="glyphicon glyphicon-star" style="color:goldenrod;"></i>
                                        <i class="glyphicon glyphicon-star" style="color:goldenrod;"></i>
                                        <i class="glyphicon glyphicon-star" style="color:goldenrod;"></i>
                                    </span>
                                </a>
                                <p class="address">
                                    <span>4/1, St. Mark's Road,Bengaluru</span>
                                </p>
                                <div style="height:30%;width:100%;margin-top:30px;">
                                    <div class="couple_friendly">
                                        <span class="couple_content">Couple Friendly</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content_grid2 content_grid3 content_grid5">
                            <div>
                                <span style="float:left;color:#f26722;padding-top:0;padding-left:10px;padding-bottom: 20px;width:65px;height:20%">Ratings</span>
                                <div class="rating">
                                    <span class="rating_content"><span class="rating_value">3.7</span>/5</span>
                                </div>
                            </div>
                            <span class="reviews">132 reviews</span>
                        </div>
                    </div>
                    <div class="features">
                        <div class="facilities">
                            <ul style="margin-left: 0;margin-top:10px;padding-left: 0;font-size: 15px;">
                                <li>A/C Rooms</li>
                                <li>Non A/C Rooms</li>
                                <li>Restaurant</li>
                            </ul>
                        </div>
                        <div class="price_grid">
                            <div class="discount_grid">
                                <p class="save_price">
                                    Save ₹ 810
                                </p>
                                <p class="old_price">
                                    <span style="text-decoration: line-through">₹ 8750</span>
                                </p>
                            </div>
                            <p class="actual_price">
                                <span style="float:left;">₹ 7940</span>
                            </p>
                            <span style="line-height: 1;width:100%;float:right;"></span>
                            <div class="button_grid">
                            <a href ="form_room_9.php"><button <?php echo $v[8]; ?> class="button_style">
                                    Book Now
                                </button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="external_grid">
            <div class="image_grid">
                <a>
                    <img src="images/hotel_images/Taj_hotel/hotel.jpg" style="height:220px; width:100%">
                </a>
            </div>
            <div class="content_grid1">
                <div class="content_grid2">
                    <div class="content_grid2 content_grid3">
                        <div class="content_grid2 content_grid3 content_grid4">
                            <div class="content_grid2" style="line-height: 1;font-size: 20px;">
                                <a href="Taj_Yeshwantpur.php">
                                    <span class="hotel_title">Taj Yeshwantpur</span>
                                    <span class="stars">
                                        <i class="glyphicon glyphicon-star" style="color:goldenrod;"></i>
                                        <i class="glyphicon glyphicon-star" style="color:goldenrod;"></i>
                                        <i class="glyphicon glyphicon-star" style="color:goldenrod;"></i>
                                        <i class="glyphicon glyphicon-star" style="color:goldenrod;"></i>
                                        <i class="glyphicon glyphicon-star" style="color:goldenrod;"></i>
                                    </span>
                                </a>
                                <p class="address">
                                    <span>2275, Tumkur Road,Yeshwantpur,Bengaluru</span>
                                </p>
                                <div style="height:30%;width:100%;margin-top:30px;">
                                    <div class="couple_friendly">
                                        <span class="couple_content">Couple Friendly</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content_grid2 content_grid3 content_grid5">
                            <div>
                                <span style="float:left;color:#f26722;padding-top:0;padding-left:10px;padding-bottom: 20px;width:65px;height:20%">Ratings</span>
                                <div class="rating">
                                    <span class="rating_content"><span class="rating_value">4.7</span>/5</span>
                                </div>
                            </div>
                            <span class="reviews">307 reviews</span>
                        </div>
                    </div>
                    <div class="features">
                        <div class="facilities">
                            <ul style="margin-left: 0;margin-top:10px;padding-left: 0;font-size: 15px;">
                                <li>A/C Rooms</li>
                                <li>Non A/C Rooms</li>
                                <li>Room Service</li>
                                <li>Swimming Pool</li>
                                <li>Restaurant</li>
                            </ul>
                        </div>
                        <div class="price_grid">
                            <div class="discount_grid">
                                <p class="save_price">
                                    Save ₹ 3100
                                </p>
                                <p class="old_price">
                                    <span style="text-decoration: line-through">₹ 13000</span>
                                </p>
                            </div>
                            <p class="actual_price">
                                <span style="float:left;">₹ 9900</span>
                            </p>
                            <span style="line-height: 1;width:100%;float:right;"></span>
                            <div class="button_grid">
                            <a <?php echo $r[9]; ?>><button <?php echo $v[9]; ?> class="button_style">
                                    Book Now
                                </button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </div>
    </body>
</html>