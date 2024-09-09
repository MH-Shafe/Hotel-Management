<?php
session_start();
if(isset($_SESSION['email']))
{
    $email= $_SESSION['email'];
}
// Step 1: Handle the form submission
if(isset($_POST['send']))
{
    $submittedEmail = $_POST['email'];
    
    // Step 2: Check if the submitted email exists in your user database
    // Perform the necessary checks here, such as querying the database
    
    // Step 3: Generate a random code
    $randomCode = mt_rand(100000, 999999);
    // Step 4: Store the random code and the associated email in your database
    // Store the code and email in a database table or any other suitable storage mechanism
    
    // Step 5: Send the email with the random code
    $to = $submittedEmail;
    $subject = "Password Reset Code";
    $message = "Your password reset code is: " . $randomCode;
    $headers = "From: mhshafe83@gmail.com\r\n"; // Replace with your email address
    
    $mailSent = mail($to, $subject, $message, $headers);
    if ($mailSent) {
        //database query start
		$db = mysqli_connect("localhost","root","","hotel_management");
		$sql = "UPDATE customer SET rendom_code = '$randomCode ' WHERE email = '$submittedEmail'";
		mysqli_query($db,$sql); //data insertion
		//database query end
        echo "<center>An email with the password reset code has been sent to your email address.</center>";
    } else {
        echo "<center>Failed to send the email. Please try again.</center>";
    }
}
if(isset($_POST['update']))
{
	$pass1 = $_POST['pass1'];
	$pass2 = $_POST['pass2'];
    $email = $_POST['email'];
    $code = $_POST['code'];
    //database query start
		$db = mysqli_connect("localhost","root","","hotel_management");
		$sql = "select rendom_code from customer WHERE email = '$email';";
		$result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);
        $code1 = $row['code']; //data insertion
		//database query end
	if ($code == $code1)
    {
        if($pass1 == $pass2)
	{
		//database query start
		$db = mysqli_connect("localhost","root","","hotel_management");
		$sql = "UPDATE login SET password = '$pass1' WHERE email = '$email';";
		mysqli_query($db,$sql); //data insertion
		//database query end
		echo "<center><i>Password successfully changed</i></center>";
        echo "<center><a href='login.php'>Login</a></center>";
		}
		else
		{
			echo "<i>Password doesn't match</i>";
		}
    }
    else
		{
			echo "<i>Codde doesn't match</i>";
		}
    
    
}
?>
<!-- Display the forget password form-->
<!DOCTYPE html>
<html>
<head>
    <title>Forget Password</title>
</head>
<body>
    
    <fieldset>
		<legend><i>Forget Password</i></legend>
        <center>
    <h2>Forget Password</h2>
    <form method="POST" action="">
       <table>
       <tr>
			<td>Email:</td>
			<td><input type="email" name="email" placeholder="Enter your Email" ></td>
		</tr>
        <tr>
            <td></td>
            <td><center><input type="submit" name="send" value="Send email"></center></td>
        </tr>
        <tr>
			<td>Code:</td>
			<td><input type="text" name="code" placeholder="Enter 6 Digit Code"></td>
		</tr>
        <tr>
			<td>Password:</td>
			<td><input type="password" name="pass1" placeholder="Enter your password" >
	    </tr>
		<tr>
			<td>Confirm Password:</td>
			<td><input type="password" name="pass2" placeholder="Enter your password again" >
		</tr>
        <tr>
        <td></td>
            <td><center><input type="submit" name="update" value="Update"></center></td>
        </tr>
        </table>
    </form>
</center>
</fieldset>
</body>
</html>

