<?php
require_once 'php/connection.php';
session_start();

if ((!isset($_SESSION['type']) && !isset($_SESSION['uid']))) {
    header("Location: login.html");
}else{

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One Time Password Page</title>
     <link rel="stylesheet" href="style.css">
</head>
<body>

 <a href="index2.html">Home</a>
        <a href="photos.html">Photos</a>
        <a href="factors.html">Self-care Factors</a>
        <a href="table.html">Self-care Comparison</a>
        <a href="signup.html">Sign Up</a>
        
    <h2>Verify One Time Password</h2>
    <form action="php/login.php" method="POST">
        <label for="password">One Time Password:</label><br>
        <input type="password" id="password" name="itp"><br><br>
                                                           <?php

                  if (isset($_SESSION['type']) && isset($_SESSION['uid'])) {

                    $uidd = $_SESSION['uid'];
                    $utype = $_SESSION['type'];
                  echo "<input type='hidden' required value='1' name='mod'>";
                  echo "<input type='hidden' required value='" . $uidd . "' name='uid'>";
                  echo "<input type='hidden' required value='". $utype ."' name='type'>";                  
                  }else if (isset($_SESSION['type1']) && isset($_SESSION['uid1'])){
                    $uidd = $_SESSION['uid1'];
                    $utype = $_SESSION['type1'];
                    echo "<input type='hidden' required value='3' name='mod'>";
                    echo "<input type='hidden' required value='" . $uidd . "' name='uid1'>";
                    echo "<input type='hidden' required value='". $utype ."' name='type1'>";                    
                  }
                  ?>
        <input type="submit" value="Verify" name="login">
    </form>
</body>
</html>
