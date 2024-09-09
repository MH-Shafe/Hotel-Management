<?php
include 'sqlquery/function.php';
session_start();

$email; // Initialize the $email variable to null
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
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
        
    </div>
    <?php

    ?>
    <center>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <div style="background:rgba(255,255,255,.5); width:70%; hight: 400px;"> 
        
            <form method="post" action="login.php">
            
            <fieldset>
                <table>

                    <tr>
                    <td><label for="username">Uername:</label></td>
                    <td><input type="username" name="username" id="username" placeholder="Username" ></td>
                    </tr>
                    <tr>
                    <td><label for="password">Password:</label></td>
                    <td><input type="text" name="password" id="password" placeholder="Password" ></td>
                    </tr>
					<tr>
					<td><input style="width: 120px; height: 30px; border-radius: 20px; opacity: 0.7" type="submit" name="reg"value="Sing Up"></td>
					<td><input style="width: 120px; height: 30px; border-radius: 20px; opacity: 0.7" type="submit" name="login"value="Login"></td>
					</tr>
                    <tr>
    	            <a href= 'forget.php'><u><p><label style="color:red;">Forget Username/Password?</lable></p></u></a>
                    </tr>
                </table>
                
	

                </div>

            </form>

        </fieldset>
        </center>



    </div>
<?php
if(isset($_POST['login']))
{
$username =$_POST['username'];
$password =$_POST['password']; 

$db = mysqli_connect("localhost","root","","hotel_management");
$query = "SELECT email from login where username = '$username' AND password = '$password'";
$varify = getString($query);

if($username == 'admin' && $password='admin'){
    $_SESSION['email'] = getString($query);
	//print("<center>Login Successfull!</center>");
	//cookies implementation
    $email=$_SESSION['email'];
	header("location: Admin/index.php");	
}
else if($varify == 'Error') //1 row return
{
    print("<center>Wrong username/password!</center>");
	//echo ("<center><a href= 'forget.php'>Forget Username/Password?</a></center>");
	
}
else 
{
    $_SESSION['email'] = getString($query);
	//print("<center>Login Successfull!</center>");
	//cookies implementation
    $email=$_SESSION['email'];
	header("location: index.php");	
}
}
if (isset($_POST['reg'])){
	header("location: reg.php");	
}
?>
        
</body>
</html>