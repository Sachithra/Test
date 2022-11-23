<?php include ("DBConnection.php");?>
<!DOCTYPE html>
<html lang="en">

<head>
   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script src="scripts.js"></script>
    <title>Document</title>


</head>
<body>
   
    <form method="POST">
      <h1>CUSTOMER REGISTER</h1>
      <div class="formcontainer">
      <hr/>
      <br>
      <div class="container">
        <label for="name"><strong>Customer Name</strong></label>
        <br>
        <input type="text" placeholder="Customer name" name="name" required>
        <br>
        <label for="address"><strong>Customer Address</strong></label>
        <br>
        <input type="text" placeholder="Enter Address" name="address" required>
        <br>
        <label for="contact"><strong>Customer Contact</strong></label>
        <br>
        <input type="text" placeholder="Enter Contact" name="contact" required>
      </div>
      <br>
      <input type="submit" value="Add" class="addCus" name="addingCus">
      
      </div>
    </form>
    <br>
    <div>
    <button onclick="viewFunction()">View</button>
    </div>
<?php

//Adding

error_reporting(0);
if($_POST['addingCus']){
    $customer_name =$_POST['name'];
    $customer_address =$_POST['address'];
    $customer_contact =$_POST['contact'];
   

if( $customer_name !="" && $customer_address !="" &&  $customer_contact!=""){

   $Sql= "INSERT INTO customers (Customer_Name,Customer_Address,Customer_Contact) 
   VALUES(' $customer_name','$customer_address','$customer_contact')";

   $data=mysqli_query($con,$Sql);

   if($data){

    echo '<script>alert("Product details adding successfully")</script>';
 
   }else{
    echo '<script>alert("Product details adding unsuccessfully")</script>';
   }
 }else{
    echo '<script>alert("Please filling the values")</script>';
    }
}
 ?>



    <br><br><br>
    


<table border="2" id="hide" class="hidden">
  <tr>
    <th>Customer Name</th>
    <th>Customer Code</th>
    <th>Customer Address</th>
    <th>Customer Contact</th>
    <th>Edit Data</th>
  </tr>
  
<?php

//View Details

$viewCustomerQuery ="SELECT*FROM customers";
$data= mysqli_query($con,$viewCustomerQuery);
$rows=mysqli_num_rows($data);


if($rows !=0){
   $tableValues=0;
    while($details=mysqli_fetch_assoc($data)){
      echo"<tr>
            <td>".$details['Customer_Name']."</td>
            <td>".$details['Customer_Code']."</td>
            <td>".$details['Customer_Address']."</td>
            <td>".$details['Customer_Contact']."</td>
            <td><a href='editCustomer.php?cusCode=$details[Customer_Code]'>Edit</a></td>
        </tr>";
   }
}else{
    echo "No record find";
}

?>

</table>

</body>

</html>