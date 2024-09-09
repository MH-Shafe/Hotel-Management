<?php
session_start();
if(isset($_SESSION['email']))
{
    $email=$_SESSION['email'];		
}	

?>
<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link href="img/icon.png" rel="icon" type="img/icon">
</head>
<style>
p{
    text-align: right;
    }
</style>
<body>
    <div id="full">
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
        <div>
            <video id="background-video" autoplay loop muted>
            <source src="img/b1.mp4" type="video/mp4">
            </video>
        </div>
        <div id="f1"> 
        <center>    
        <table>
                <tr>
                    <th width="20%" height="50px">Destination</th> 
                    <th width="20%" height="50px">Chack In Date</th> 
                    <th width="20%" height="50px">Chack Out Date</th> 
                    <th width="20%" height="50px">Room</th>
                    <td rowspan = "2"><input type="submit" value="Chack" name="sub"> </td>
                </tr>
                <tr>
                    <td width="20%" height="50px"><center><input type="text" name="d1" placeholder="Enter Destination"></center></td>
                    <td width="20%" height="50px"><center><input type="date" name="ci"></center></td>
                    <td width="20%" height="50px"><center><input type="date" name=""co></center></td> 
                    <td width="20%" height="50px">
                    <center><select>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                    </center></select>
                </tr>
            </table>
        </center>
        </div>
    
        <div id ="welcome">
            <center>
                <h1 style="color: red;">Welcome</h1>
                <h3>Savour your penchant for finer comforts. Partner with sheer luxury at Cinnamon Grand, as you attend a business event in the capital city.Let the opulence of our meeting rooms and conference halls seep into flourishing work partnerships. Raise a toast to all the success at our plush restaurants and taste jubilance like never before. When you’ve enjoyed every bit of your Grand accomplishments, retire to your room, and relish in the exquisite comforts that Colombo’s most lavish business hotel has to offer.</h3>
            </center>
        </div>
    <table id="g0" width="100%" height="700">
        <tr><td></td><td><h1 style="color: red;text-align: center;">Our Brands</h1><br><br></td></tr>
        <tr>
            <td id="g1" width="33"><img src="img/g1.jpg" width="100%"></td>
            <td id="g2" width="33%"><img src="img/g2.jpg" width="100%"></td>
            <td id="g3" width="33%"><img src="img/g3.jpg" width="100%"></td>
        </tr>
        <tr>
            <td>
            <center>
                <h2>Taj</h2>
                    Spanning world-renowned landmarks, modern business hotels, idyllic beach resorts, authentic Rajput palaces and rustic safari lodges, each Taj hotel reinterprets the tradition of hospitality in a refreshingly modern way to create unique experiences and lifelong memories.
            </center>
            </td>
            <td>
            <center><h2>VIVANTA</h2>
                <font>HOTEL AND RESTORENT</font><br>
                    Work hard and play hard. Relax and energize. Ideate and confer. Evolve and transform. Revel in a spirit that presents the normal with an unexpected twist. Stylish and sophisticated, Vivanta by Taj delivers experiences with imagination, energy and efficiency.<br>
                </center>
            </td>
            <td>
                <center><h2 style="color: red">GATEWAY</h2>
                    <font color="red">HOTEL AND RESTORENT</font><br>
                    The Gateway Hotels and Resorts are designed for the modern traveller. Which is why we have a 24x7 attitude across services like dining and fitness. So when you feel like a quick bite at 1 am or a heart pumping jog at 4 am, we got you covered</td>
            
        </tr>
    </table>

    </div>



</body>
</html>