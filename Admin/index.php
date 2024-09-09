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
            width: 300px;
            height: 50px;
        }
    </style>
</head>
<body>
<br><br><br>
<center><h1>Dashboard</h1></center>
                <left>  
                    <br><br><br><br><br><br><br>
                    <div style="background:rgba(255,255,255,.5); width:70%;"> 
                        <table>
                            <tr>
                            <td><h3><a href="addRoom.php">Add Room</a></h3></td>
                            </tr>
                            <tr>
                            <td><h3><a href="removeRoom.php">Romove Room</a></h3></td>
                            </tr>
                            <td><h3><a href="removeCustomer.php">Remove Customer</a></h3></td>
                            </tr>
                            </tr>
                            <td><h3><a href="index.php">Add Employe</a></h3></td>
                            </tr>
                            </tr>
                            <td><h3><a href="index.php">Remove Employe</a></h3></td>
                            </tr>
                            <tr>
                                <?php
                                if (isset($_SESSION['email'])) {
                                    echo '<li><a href="..\logout.php"><p>Logout</p></a></li>';
                                } else {
                                    echo '<li><a href="..\login.php"><p>Login</p></a></li>';
                                }
                                ?>  
                            </tr>
                        </table>
                    </div>
    </left>
</body>
</html>
