<?php
include 'sqlquery/function.php';
session_start();

$email = null; // Initialize the $email variable to null
if(isset($_SESSION['email']))
{
    $email=$_SESSION['email'];		
}
$query = "SELECT roomNo FROM room WHERE status='no'";

// Call the function to execute the query
$resultSet = getForCombo($query);
?>
<!DOCTYPE html>
<html>
<head>
<title>Book My Stay</title>
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
<form method="post" action="bms.php">

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
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <div style="background:rgba(255,255,255,.5); width:70%;"> 
        
                <table>
                    
                    <tr>
                    <td width="20%" height="50px">Chack In Date</td> 
                    <td width="20%" height="50px"><center><input type="date" name="checkin"></center></td>

                    </tr>
                    <tr>
                    <td width="20%" height="50px">Chack Out Date</td> 
                    <td width="20%" height="50px"><center><input type="date" name="checkout"></center></td> 

                    </tr>

                    <tr>
                    <td width="20%" height="50px">Room</td>

                    <td width="20%" height="50px">
                    <select name="roomNo">
                    <?php
                    // Loop through the results and fetch the data
                    if ($resultSet) {
                        while ($row = $resultSet->fetch(PDO::FETCH_ASSOC)) {
                            // Access the data using column name 'roomNo'
                            $roomNo = $row['roomNo'];

                            // Display the data as options in the <select> dropdown
                            echo "<option value='$roomNo'>$roomNo</option>";
                        }
                    }
                    ?>
                    </tr>
                    <tr>
                    <td colspan="2"><center><input style="width: 120px; height: 30px; border-radius: 20px; opacity: 0.7" type="submit" name="chackin"value="Chack"></center></td>
                </tr>
                </table>

        </div>
        <?php
           
           if(isset($_POST['chackin']) && isset($_SESSION['email']))
            {
                
                $checkin = $_POST['checkin'];
                $checkout = $_POST['checkout'];
                $roomNo = $_POST['roomNo'];
                $db = mysqli_connect("localhost", "root", "", "hotel_management");
                $sql = "UPDATE customer SET checkin='$checkin', checkout='$checkout', roomNo='$roomNo', status = 'Booked' WHERE email='$email'";
                if(mysqli_query($db, $sql))
                {
                    mysqli_query($db, "UPDATE room SET status='Booked', cEmail='$email' WHERE roomNo='$roomNo'");
                    echo "Room Booked ";
                }
                else
                {
                    echo "Data not inserted";
                }
            }
            elseif (isset($_POST['chackin']))
            {
                header("Location: login.php");
                exit;
            }

                ?>
        </center>
    </div>
        </form>
</div>

</body>
</html>