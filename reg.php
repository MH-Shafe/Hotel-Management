<?php
session_start();

if(isset($_POST['submit']))
{

$name =$_POST['fullname'];
$fname =$_POST['fname']; 
$mname =$_POST['mname']; 
$gender =$_POST['gender']; 
$DOB =$_POST['DOB']; 
$email=$_POST['email']; 
$phonenumber =$_POST['phonenumber']; 
$country =$_POST['country'];
$state =$_POST['state'];
$city =$_POST['city'];
$zip =$_POST['zip'];
$db = mysqli_connect("localhost","root","","hotel_management");
$sql = "insert into customer(name, fname, mname, gender, DOB, email, phone, country, state,city,zip) value('$name', '$fname', '$mname', '$gender', '$DOB', '$email', '$phonenumber', '$country', '$state', '$city', '$zip')";
if(mysqli_query($db,$sql))
{
    mysqli_query($db,"insert into login(email) value('$email')");
    $_SESSION['email'] = $email;

    header("location:reg1.php");

}
else
{
echo "data not insert";
}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Registration</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link href="img/icon.png" rel="icon" type="img/icon">
</head>
<style>
body {
  background-image: url('img/reg.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
td{
    width: 300px;
    height: 50px;
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
        
    </div>
    <center>
    <br><br><br><br>
    <div style="background:rgba(255,255,255,.5); width:70%; hight: 400px;"> 
        
            <form method="post" action="reg.php">
            
            <fieldset>
                <table>
                    <tr>
                    <td><label for="fullname">Name:</label></td>
                    <td><input type="text" name="fullname" id="fullname" placeholder="Full Name" required></td>
                    </tr>
                    <tr>
                    <td><label for="fname">Father's Name:</label></td>
                    <td><input type="text" name="fname" id="fathersname" placeholder="Father's Full Name" required></td>
                    </tr>
                    <tr>
                    <td><label for="mname">Mother's Name:</label></td>
                    <td><input type="text" name="mname" id="mothersname" placeholder="Mother's Full Name" required></td>
                    </tr>
                    <tr>
                    <td><label for="gender">Gender:</label></td>
                        <td>
                            Male<input type="radio" name="gender" id="gender" value="male" required>
                            Female<input type="radio" name="gender" id="gender" value="female">
                            Other<input type="radio" name="gender" id="gender" value="other">
                        </td>
                    </tr>
                    <tr>
                    <td><label for="email">Date of Birth</label></td>
                    <td><input type="date" name="DOB" id="DOB" required></td>
                    </tr>   
                    <tr>
                    <td><label for="email">E-mail:</label></td>
                    <td><input type="email" name="email" id="email" placeholder="email@xyz.com" required></td>
                    </tr>


                    <tr>
                    <td><label for="phonenumber">Tel/Mobile:</label></td>
                    <td><input type="tel" name="phonenumber" id="phonenumber" placeholder="XXX XXX XXXX" required></td>
                    </tr>
            </table>
                <h2><u>Address</u></h2>
            <table>
            <tr>
                <td><label for="country">Country:</label></td>
                <td><input type="text" name="country" id="country" placeholder="Country" required></td>
            </tr>
            <tr>
                <td><label for="state">State:</label></td>
                <td><input type="text" name="state" id="state" placeholder="State" required></td>
            </tr>
            <tr>
                <td><label for="city">City:</label></td>
                <td><input type="text" name="city" id="city" placeholder="City" required></td>
            </tr>
            <tr>
                <td><label for="zip">Zip Code:</label></td>
                <td><input type="number" name="zip" id="zip" placeholder="Zip Code" required></td>
            </tr>
            
            </table>
            <input style="width: 120px; height: 30px; border-radius: 20px; opacity: 0.7" type="submit" name="submit"value="submit">
            
            
            </form>
        </fieldset>
    </center>
<?php

?>
        </div>

    </div>

</body>
</html>