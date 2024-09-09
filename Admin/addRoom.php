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
    <title>Home (Motel Management)</title>
    <link href="img/icon.png" rel="icon" type="img/icon">
    <style>
        td {
            background: lightblue;
            width: 200px;
            height: 50px;
        }
    </style>
</head>
<body>
<br><br><br>
<center><h1>Dashboard</h1>
    <form method="post" action="addRoom.php">

                    <br><br><br><br><br><br><br>
                    <div style="background:rgba(255,255,255,.5); width:70%;"> 
                        <table>
                            <tr>
                            <td><h3><a href="addRoom.php">Add Room</a></h3></td>
                            <td><h3><a href="removeRoom.php">Romove Room</a></h3></td>
                            <td><h3><a href="removeCustomer.php">Remove Customer</a></h3></td>
                            <td><h3><a href="index.php">Add Employe</a></h3></td>
                            <td><h3><a href="index.php">Remove Employe</a></h3></td>
                            <td>
                                <?php
                                if (isset($_SESSION['email'])) {
                                   
                                    echo '<h3><a href="../logout.php">Logout</a></h3>';
                                } 
                                else {
                                    echo '<h3><a href="../login.php">Login</a></h3>';
                                }
                                ?>  
                            </td>
                            </tr>

                        </table>
                    </div>
                
    <table>

                    <tr>
                    <td><label for="roomNo">Room Number:</label></td>
                    <td><input type="text" name="roomNo" id="roomNo" placeholder="Room Number" required></td>
                    </tr>
                    <tr>
                    <td><label for="price">Price:</label></td>
                    <td><input type="text" name="price" id="price" placeholder="Price" required></td>
                    </tr>
					<tr>
					<td colspan="2"><center><input style="width: 120px; height: 30px; border-radius: 20px; opacity: 0.7" type="submit" name="submit"value="Add room"></center></td>
					</tr>
                </table>

                <?php
                
if(isset($_POST['submit']))
{

$roomNo =$_POST['roomNo'];
$price =$_POST['price']; 

$db = mysqli_connect("localhost","root","","hotel_management");
$sql = "insert into room(roomNo, price) value('$roomNo', '$price')";
if(mysqli_query($db,$sql))
{
    echo "Room Added";


}
else
{
echo "data not insert";
}
}
                
                ?>

    </center>
    </form> 
</body>
</html>
