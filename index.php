<?php
require_once 'php/connection.php';
session_start();

if (!isset($_SESSION['adminname'])) {
    header("Location: index2.html");
}else{
  $filter = $_SESSION['adminname'];
  $query=mysqli_query($conn,"SELECT * FROM `users` WHERE `User_ID`='$filter'")or die(mysqli_error());
  $row1=mysqli_fetch_array($query);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Skin Care Guide - Administrator Homepage</title>
    <h1>SKINCARE GUIDE</h1>
    <h3>By Winnie</h3>
    <a href="https://www.everydayhealth.com/self-care/">Click me</a>
    <br>
<a href="mailto:wwangari686@gmail.com">Email me</a><br>
    <hr>
    <link rel="stylesheet" href="style.css">
<script src="signup.js"></script>
<style>
        /* Style the container to align links horizontally */
        .navbar {
            text-align: center; /* Center-align the links */
            margin-bottom: 20px; /* Add some space below the links */
        }

        /* Style the links */
        .navbar a {
            display: inline-block; /* Make links sit horizontally */
            padding: 10px 20px; /* Add padding to the links for spacing */
            text-decoration: none; /* Remove underline */
            color: #333; /* Set link color */
        }
    </style>
     <style type="text/css">
        
          table{
    align-items: center;
  }

   th, tr, td{
    padding: 10px 10px;
  }
    </style>

            <script type="text/javascript">
function printData()
{
   var divToPrint=document.getElementById("printTable");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('button').on('click',function(){
printData();
})  
</script>

            <script type="text/javascript">
function printData1()
{
   var divToPrint=document.getElementById("printTable1");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('button').on('click',function(){
printData1();
})  
</script>

            <script type="text/javascript">
function printData2()
{
   var divToPrint=document.getElementById("printTable2");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('button').on('click',function(){
printData2();
})  
</script>

            <script type="text/javascript">
function printData3()
{
   var divToPrint=document.getElementById("printChart");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('button').on('click',function(){
printData3();
})  
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
</head>
<body>
    <!-- Navigation links -->
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="php/logout.php">Logout</a>
    </div>

Welcome <?php echo $row1['User_Type']; ?>, <strong class="color"><?php echo $row1['Fullname']; ?>!</strong>

      <div id="data" class="plants">
         <div class="container">
            <div class="row">
               <div class="col-md-12 ">
                  <div class="titlepage">
                     <h2>Database</h2>
                  </div>
               </div>
            </div>
         </div>
         <div class="container">
            <div class="row">
               <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12">
                  <div class="plants-box">
                     <h3>List of Users</h3>
                     <br>
            <table id="printTable">
<tr style="text-align: left;
  padding: 8px;">
<th style="text-align: left;
  padding: 8px;">User ID</th>
<th style="text-align: left;
  padding: 8px;">Fullname</th>
  <th style="text-align: left;
  padding: 8px;">Email Address</th>
 <th style="text-align: left;
  padding: 8px;">Phone Number</th>
  <th style="text-align: left;
  padding: 8px;">User Type</th>
   <th style="text-align: left; padding: 8px;"></th>
</tr>

<?php

$sql = "SELECT `User_ID`, `Fullname`, `Phone_Number`, `Email_Address`, `User_Type` FROM `users`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
?>
<tr>
<td><?php echo($row["User_ID"]); ?></td>
<td><?php echo($row["Fullname"]); ?></td>
<td><?php echo($row["Email_Address"]); ?></td>
<td><?php echo($row["Phone_Number"]); ?></td>
<td><?php echo($row["User_Type"]); ?></td>
<td><button onclick="return confirm('Are you sure that you want to delete this user?')?window.location.href='php/features.php?action=deleteU&id=<?php echo($row["User_ID"]); ?>':true;" title='Delete User'>Delete</button></td>
</tr>
<?php
}
} else { echo "No results"; }
?>

</table>
<br>
                        <div class="read-more">
                           <a class="abtn" style="color: black;" onclick="printData();">Print</a>
                           <br>
                        </div>
                  </div>
               </div>
               <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12">
                  <div class="plants-box">
                     <h3>List of Products</h3>
                     <br>
            <table id="printTable1">
<tr style="text-align: left;
  padding: 8px;">
<th style="text-align: left;
  padding: 8px;">Product ID</th>
<th style="text-align: left;
  padding: 8px;">Name</th>
  <th style="text-align: left;
  padding: 8px;">Description</th>
 <th style="text-align: left;
  padding: 8px;">Quantity</th>
  <th style="text-align: left;
  padding: 8px;">Price</th>
  <th style="text-align: left;
  padding: 8px;">Picture</th>  
   <th style="text-align: left; padding: 8px;"></th>
</tr>

<?php

$sql = "SELECT `Product_ID`, `Name`, `Description`, `Quantity`, `Price`, `Image` FROM `product`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
?>
<tr>
<td><?php echo($row["Product_ID"]); ?></td>
<td><?php echo($row["Name"]); ?></td>
<td><?php echo($row["Description"]); ?></td>
<td><?php echo($row["Quantity"]); ?></td>
<td><?php echo($row["Price"]); ?> kshs.</td>
<td><img src="images/<?php echo($row["Image"]); ?>" style="width: 150px;" alt></td>
<td><button onclick="return confirm('Are you sure that you want to delete this product?')?window.location.href='php/features.php?action=deleteP&id=<?php echo($row["Product_ID"]); ?>':true;" title='Delete Product'>Delete</button></td>
</tr>
<?php
}
} else { echo "No results"; }
?>

</table>
<br>
                        <div class="read-more">
                           <a class="abtn" style="color: black;" onclick="printData1();">Print</a>
                           <br>
                        </div>
                  </div>
               </div>
                              <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12">
                  <div class="plants-box">
                     <h3>List of Orders</h3>
                     <br>
<table id="printTable2">
<tr style="text-align: left;
  padding: 8px;">
<th style="text-align: left;
  padding: 8px;">Order ID</th>
<th style="text-align: left;
  padding: 8px;">User Details</th>
  <th style="text-align: left;
  padding: 8px;">Product</th>
 <th style="text-align: left;
  padding: 8px;">Price</th>
  <th style="text-align: left;
  padding: 8px;">Quantity</th>
  <th style="text-align: left;
  padding: 8px;">Status</th>  
   <th style="text-align: left; padding: 8px;"></th>
   <th style="text-align: left; padding: 8px;"></th>
</tr>

<?php

$sql = "SELECT `orders`.`Order_ID`, `orders`.`User_ID`, `orders`.`Product_ID`, `orders`.`Total_Price`, `orders`.`Quantity`, `orders`.`Created_At`, `orders`.`Status`, `users`.`Fullname`, `users`.`Phone_Number`, `users`.`Email_Address` FROM `orders` JOIN `users` ON `orders`.`User_ID` = `users`.`User_ID`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
?>
<tr>
<td><?php echo($row["Order_ID"]); ?></td>
<td><?php echo($row["Fullname"]); ?> reach out on <?php echo($row["Phone_Number"]); ?> & <?php echo($row["Email_Address"]); ?></td>
<td><?php echo($row["Product_ID"]); ?></td>
<td><?php echo($row["Total_Price"]); ?> kshs.</td>
<td><?php echo($row["Quantity"]); ?></td>
<td><?php echo($row["Status"]); ?></td>
<?php
if ($row['Status'] != 'Completed') {
?>
<td><button onclick="return confirm('Are you sure that you want to complete this order?')?window.location.href='php/features.php?action=completeO&id=<?php echo($row["Order_ID"]); ?>&id1=<?php echo($row["Quantity"]); ?>&id2=<?php echo($row["Product_ID"]); ?>':true;" title='Complete Order'>Complete</button></td>
<?php
}else{
?>
<td></td>
<?php
}
?>
<td><button onclick="return confirm('Are you sure that you want to delete this order?')?window.location.href='php/features.php?action=deleteO&id=<?php echo($row["Order_ID"]); ?>':true;" title='Delete Order'>Delete</button></td>
</tr>
<?php
}
} else { echo "No results"; }
?>

</table>
<br>
                        <div class="read-more">
                           <a class="abtn" style="color: black;" onclick="printData2();">Print</a>
                           <br>
                        </div>
                  </div>
               </div>
                              <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12">
                  <div class="plants-box">
          <div class="detail-box">
            <div class="heading_container">
              <h3><br>
                <br>Chart of Popular Products</h3>
            </div>
            <div id="printChart">
                          <div class="card mt-4">
            <div class="card-body">
              <div class="chart-container pie-chart">
                <canvas id="pie_chart"></canvas>
              </div>
            </div>
          </div>
            </div>
          </div>
<br>
                        <div class="read-more">
                           <a class="abtn" style="color: black;" onclick="printData3();">Print</a>
                        </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end database -->
      <!--my module -->
      <div id="mod" class="contact">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>My Module</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 paddimg-right">
                  <div class="row">
                     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <form action="php/features.php" method="POST" enctype="multipart/form-data">
                           <div class="row">
                              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                 <input placeholder="Product Name" type="text" name="pname" required>
                              </div>
                              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <input placeholder="Product Price (in kshs.)" min="0" type="number" name="amo" required>
                              </div>
                              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                 <input placeholder="Product Quantity" type="number" min="0" name="quan" required>
                              </div>
                              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                 <textarea placeholder="Product Description" type="text" name="desc" required></textarea>
                              </div>
                              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <label style="color: black;">Product Picture:</label>
                                <br>
                                 <input class="form-control" type="file" name="image" required>
                              </div>                              
                              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                              <button type="submit" name="addP">Add Product</button>
                              <br>
                              <br>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
               <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 paddimg-right">
                  <div class="row">
                     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <form action="php/features.php" method="POST">
                           <div class="row">
                              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                              <select required name="pid">
                <option selected disabled value="0">Select A Product</option>
                <?php
                $sql = "SELECT * FROM `product`";
                $all_categories = mysqli_query($conn,$sql);
                while ($category = mysqli_fetch_array(
                $all_categories,MYSQLI_ASSOC)):;
                ?>
                <option value="<?php echo $category["Product_ID"];?>"><?php echo $category["Name"];?></option>
                <?php
                endwhile;
                ?>
                  </select>
                  <br>
                  <br>
                              </div>
                              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                 <input placeholder="Product Quantity" type="number" min="0" name="quan" required>
                              </div>                         
                              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                               <button type="submit" name="upp">Update A Product Quantity</button>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <br>
      <br>
      <!-- end my module -->
      <!-- footer -->
      <footer>
         <div id="contact" class="footer">
            <div class="copyright">
               <div class="container">
                  <p>Copyright 2024 All Rights Reserved Design.</p>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <script>
         $(document).ready(function(){
         $(".fancybox").fancybox({
         openEffect: "none",
         closeEffect: "none"
         });
         
         $(".zoom").hover(function(){
         
         $(this).addClass('transition');
         }, function(){
         
         $(this).removeClass('transition');
         });
         });
         
      </script>
         <script type="text/javascript">
      $(document).ready(function(){

        makechart();

      function makechart()
  {
    $.ajax({
      url:"php/chart.php",
      method:"POST",
      data:{action:'fetch'},
      dataType:"JSON",
      success:function(data)
      {
        var language = [];
        var total = [];
        var color = [];

        for(var count = 0; count < data.length; count++)
        {
          language.push(data[count].language);
          total.push(data[count].total);
          color.push(data[count].color);
        }

        var chart_data = {
          labels:language,
          datasets:[
            {
              label:'Vote',
              backgroundColor:color,
              color:'#fff',
              data:total
            }
          ]
        };

        var options = {
          responsive:true,
          scales:{
            yAxes:[{
              ticks:{
                min:0
              }
            }]
          }
        };

     var group_chart1 = $('#pie_chart');

        var graph1 = new Chart(group_chart1, {
          type:"pie",
          data:chart_data
        });
      }
    })
  }

});

    </script> 
   </body>
</html>