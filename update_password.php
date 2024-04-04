<?php
require_once 'php/connection.php';
session_start();

if (!isset($_SESSION['adminname1'])) {
    header("Location: login.html");
}else{
  $filter = $_SESSION['adminname1'];
  $query=mysqli_query($conn,"SELECT * FROM `users` WHERE `User_ID`='$filter'")or die(mysqli_error());
  $row1=mysqli_fetch_array($query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password Page</title>
     <link rel="stylesheet" href="style.css">
</head>
<body>

 <a href="index2.html">Home</a>
        <a href="photos.html">Photos</a>
        <a href="factors.html">Self-care Factors</a>
        <a href="table.html">Self-care Comparison</a>
        <a href="signup.html">Sign Up</a>
        
    <h2>New Password</h2>
    <form action="php/features.php" method="POST">
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
                                 <input type="hidden" value="<?php echo $filter; ?>" name="uid" required>
                                 <input type="hidden" required name="mod" value="1">
        <label for="password1">Confirm Password:</label><br>
        <input type="password" id="password1" name="cpassword"><br><br>                                 
        <input type="submit" name="upu" value="Update">
    </form>
</body>
</html>