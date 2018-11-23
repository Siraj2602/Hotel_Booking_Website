<html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="header_try.css">
    <link rel="stylesheet" type="text/css" href="form_room.css">
</head>
<style>
.pagination {
    display: inline-block;
}

.pagination a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
}

.pagination a.active {
    background-color: #4CAF50;
    color: white;
}

.pagination a:hover:not(.active) {background-color: #ddd;}
</style>


<body>

    <div class="header">
        <div class="i">
            <img id="l" src="images/new1logo3.png">
            <img id="bookar" src="images/new1logo2.png">
        </div>
        <div class="ele">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Book Room</a></li>
                <li><a href="#">Book Hotel</a></li>
                <li><a href="#">Login</a></li>
                <li><a href="#">Signup</a></li>
            </ul>
        </div>
    </div>

    <form method="post" accept-charset="utf-8">
        <div class="Date">
            <div class="Heading">
                <h4>1.Enter your reservation information</h4>
            </div>
            <div class="Content">
                <p>Check in date:</p>
                <input type="date" name="checkin" placeholder="Enter date">
                <p>Check out date</p>
                <input type="date" name="checkout" placeholder="Enter date">
                <p>Adults</p>
                <select name="adults" class="adults_drop">
                    <option>1</option>
                    <option selected>2</option>
                    <option>3</option>
                    <option>4</option>
                </select>
                <p>Children</p>
                <select name="children" class="children_drop">
                    <option selected>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                </select>
            </div>
            <div id=details>
                <h4>Enter Your details</h4>
                <p>Enter Your Firstname:</p>
                <input type="text" name = "firstname">
                <p>Enter Your lastname:</p>
                <input type="text" name = "lastname">
                <p>Enter Your email:</p>
                <input type = "email" name = "email">
                <p>Enter Your Phonenumber:</p>
                <input type = "text" name = "phonenumber">
                <input type = "submit" name = "Confirm Booking">
            </div>
        </div>
</body>


<script>

    var d = document.getElementById("details");
    //var f = document.getElementById("proceed");

    function loaddetail() {
        var e1 = document.createElement("p");
        e1.innerHTML = "Enter Your firstname:";
        /*var e2 = document.createElement("input");
        e2.setAttribute("name", "firstname");
        e2.setAttribute("type","text");
        var e3 = document.createElement("p");
        e3.innerHTML = "Enter Your Lastname";
        var e4 = document.createElement("input");
        e4.setAttribute("name", "lastname");
        e4.setAttribute("type","text");
        var e5 = document.createElement("p");
        e5.innerHTML = "Enter Your email";
        var e6 = document.createElement("input");
        e6.setAttribute("name", "email");
        e6.setAttribute("type","text");
        var e7 = document.createElement("p");
        e7.innerHTML = "Enter Your PhoneNumber";
        var e8 = document.createElement("input");
        e8.setAttribute("name", "phonenumber");
        e8.setAttribute("type","text");
        var e9 = document.createElement("input");
        e9.setAttribute("type","submit");
        e9.setAttribute("value","Confirm Booking");*/

        document.body.appendChild(e1);
        /*d.appendChild(e2);
        d.appendChild(e3);
        d.appendChild(e4);
        d.appendChild(e5);
        d.appendChild(e6);
        d.appendChild(e7);
        d.appendChild(e8);
        d.appendChild(e9);
        */


    }

</script>

</html>