<?php 
 
require 'connection.php';

session_start();

//Register User
if (isset($_POST['regu'])) {
 $fname = $_POST['finame'] . " " . $_POST['lname'];
 $email = $_POST['email'];
 $mod = $_POST['mod'];
 $phone = $_POST['phone'];
 $password = $_POST['password'];
 $passwordconfirm = $_POST['cpassword'];

 // if ($password == $passwordconfirm) {

  $sql = "INSERT INTO `users`(`Fullname`, `Phone_Number`, `Email_Address`,`User_Type`, `Password`) VALUES ('$fname','$phone','$email','User',md5('$password'))";
     mysqli_query($conn, $sql);
  header("Location: ../index2.html?userregistration=success");

// }else{
//   echo "Passwords do not match.";
//  }
}

//Update User
if (isset($_POST['upu'])) {
 $uid = $_POST['uid'];
 $password = $_POST['password'];
 $passwordconfirm = $_POST['cpassword'];
 $mod = $_POST['mod'];

 if ($password == $passwordconfirm) {
  if ($mod == 1) {
  $sql = "UPDATE `users` SET `Password`=md5('$password') WHERE `User_ID`='$uid'";
     mysqli_query($conn, $sql);
  header("Location: ../login.html?updateadministrator=success");
  }else if ($mod == 2) {
  $sql = "UPDATE `users` SET `Password`=md5('$password') WHERE `User_ID`='$uid'";
     mysqli_query($conn, $sql);
  header("Location: ../login.html?updateuser=success");
  }
 }else{
  echo "Passwords do not match.";
 }
}

//Delete A User
if($_REQUEST['action'] == 'deleteU' && !empty($_REQUEST['id'])){ 
$deleteItem = $_REQUEST['id'];
$sql = "DELETE FROM `users` WHERE `User_ID` = '$deleteItem'";
mysqli_query($conn, $sql); 
$sql1 = "DELETE FROM `orders` WHERE `User_ID` = '$deleteItem'";
mysqli_query($conn, $sql1); 
header("Location: ../index.php?deleteuser=success");
}

//Make An Order
if (isset($_POST['makeO'])) {
    $uid = $_SESSION['username'];
    $quan = $_POST['quan'];
    $sp = explode(',', $_POST['pid']);
    $pid = $sp[0];
    $tp = $quan * $sp[1];
    $lvl = $sp[2] - $quan;

    // echo $lvl;

    if ($lvl > 0) {
    
$sql = "INSERT INTO `orders`(`User_ID`, `Product_ID`, `Total_Price`, `Quantity`) VALUES ('$uid','$pid','$tp','$quan')";

  mysqli_query($conn, $sql);

  // var_dump($sql);

  header("Location: ../index1.php?makeanorder=success");
}else{
    echo "Cannot carry out the order, as the quantity inputted exceeds the stock level of the selected product. Kindly try again with a different product or quantity of less than " . $sp[2] .  " for the same product.";
}
}

//Delete An Order 
if($_REQUEST['action'] == 'deleteO' && !empty($_REQUEST['id'])){ 
$deleteItem = $_REQUEST['id'];
$sql = "DELETE FROM `orders` WHERE `Order_ID` = '$deleteItem'";
mysqli_query($conn, $sql);
header("Location: ../index.php?deleteanorder=success");
}

//Cancel An Order 
if($_REQUEST['action'] == 'cancelO' && !empty($_REQUEST['id'])){ 
$deleteItem = $_REQUEST['id'];
$sql = "UPDATE `orders` SET `Status` = 'Cancelled' WHERE `Order_ID` = '$deleteItem'";
mysqli_query($conn, $sql); 
header("Location: ../index1.php?cancelanorder=success");
}

//Complete An Order 
if($_REQUEST['action'] == 'completeO' && !empty($_REQUEST['id']) && !empty($_REQUEST['id1']) && !empty($_REQUEST['id2'])){ 
$updateItem = $_REQUEST['id'];
$pid = $_REQUEST['id2'];
$quan = $_REQUEST['id1'];
$sql = "UPDATE `orders` SET `Status` = 'Completed' WHERE `Order_ID` = '$updateItem'";
mysqli_query($conn, $sql); 
$sql1 = "UPDATE `product` SET `Quantity` = `Quantity` - '$quan' WHERE `Name` = '$pid'";
mysqli_query($conn, $sql1); 
header("Location: ../index.php?completeanorder=success");
}

//Add A Product
if(isset($_POST["addP"])){

    $pname = $_POST['pname'];
    $desc = $_POST['desc'];
    $quan = $_POST['quan'];
    $amo = $_POST['amo'];

$filename = $_FILES['image']['name'];

$valid_extensions = array("jpg","jpeg","png");

$extension = pathinfo($filename, PATHINFO_EXTENSION);

if((in_array(strtolower($extension),$valid_extensions))) {

if((move_uploaded_file($_FILES['image']['tmp_name'], "../images/".$filename))){

  $sql = "INSERT INTO `product`(`Name`, `Description`, `Quantity`, `Price`, `Image`) VALUES ('$pname','$desc','$quan','$amo','$filename')";

   mysqli_query($conn, $sql);

  header("Location: ../index.php?addaproduct=success");

 }else{
  echo "An Error Occured: Image directory not found.";
}
}else{
  echo "An Error Occured: Kindly check the image format, current format is not accepted.";
} 
 }

//Update A Product
if(isset($_POST["upp"])){

    $pid = $_POST['pid'];
    $quan = $_POST['quan'];

  $sql = "UPDATE `product` SET `Quantity` = `Quantity` + '$quan' WHERE `Product_ID` = '$pid'";

   mysqli_query($conn, $sql);

  header("Location: ../index.php?updateaproduct=success");

 }

//Delete A Product 
if($_REQUEST['action'] == 'deleteP' && !empty($_REQUEST['id'])){ 
$deleteItem = $_REQUEST['id'];
$sql = "DELETE FROM `product` WHERE `Product_ID` = '$deleteItem'";
mysqli_query($conn, $sql);
header("Location: ../index.php?deleteaproduct=success");
}

?>