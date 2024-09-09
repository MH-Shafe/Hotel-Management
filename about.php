<?php
include 'sqlquery/function.php';
session_start();

$email = null; // Initialize the $email variable to null
?>
<!DOCTYPE html>
<html>
<head>
<title>About Us</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link href="img/icon.png" rel="icon" type="img/icon">
</head>
<style>

td{
    width: 300px;
    height: 50px;
}
</style>
<body>
<div id="full">
    <div style="background-image: url('img/bms.jpg');background-size: 100% 1080px; width: 100%; height: 900px">
        <div id="header"> <div id="logo">
            <h1><font color="white">Hotel</font></h1>
        </div>

            <div id="nav">
                <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="contact.php">Contect Us</a></li> 
                <li><a href="bms.php">BOOK ROOM</a></li>
                <li><a href="about.php">Our Hotel</a></li> 
                    <?php
        if (isset($_SESSION['email'])) {
            echo '<li><a href="logout.php"><p>Logout</p></a></li>';
        } else {
            echo '<li><a href="login.php"><p>Login</p></a></li>';
        }
        ?>
                </ul>
            </div>
        <center>  
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <div style="background:rgba(255,255,255,.7); width:70%; hight: 400px;"> 
        <h1>Welcome to our hotel!</h1>
        <fieldset>
        <table>
        <tr>
        
<h3>
At our hotel, we pride ourselves on providing a memorable and exceptional hospitality experience. Situated in the heart of [City/Location], our hotel offers a perfect blend of modern luxury and warm, personalized service.

Our beautifully designed rooms and suites offer a serene ambiance, providing you with the ultimate comfort and relaxation during your stay. Each room is thoughtfully appointed with modern amenities to cater to your every need.

Indulge in delectable culinary delights at our on-site restaurant, where our talented chefs curate a diverse menu to satisfy every palate. Whether you're seeking a fine dining experience or a casual meal, our restaurant promises an unforgettable culinary journey.

Unwind and rejuvenate at our spa and wellness center, where you can indulge in a range of therapeutic treatments and therapies, leaving you feeling revitalized and refreshed.

For business travelers, our state-of-the-art conference and meeting facilities provide the perfect setting for your corporate events, ensuring success and productivity.

At our hotel, we take great pride in delivering exceptional service, making every guest feel like a valued member of our family. Our dedicated team of hospitality professionals is committed to exceeding your expectations and creating unforgettable memories during your stay.

Whether you're visiting for business or pleasure, our hotel offers the perfect oasis, welcoming you to experience the true essence of luxury and comfort. We look forward to welcoming you and providing an extraordinary stay at our hotel. Your satisfaction is our priority, and we are dedicated to making your time with us truly special.

Experience the finest in hospitality at our hotel, where every moment is designed to be cherished and treasured. Come and discover a world of elegance and sophistication, where every detail is carefully crafted to ensure a truly unforgettable stay.

our hotel - Where luxury meets hospitality.
    </h3>
        </tr>
        </table>
        </fieldset>
        </div>
        </center>
    </div>
</div>

</body>
</html>