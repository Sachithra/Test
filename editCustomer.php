<?php include ("DBConnection.php");
$cusCode= $_GET['cusCode'];

$viewQuery ="SELECT*FROM customers where Customer_Code= '$cusCode'";
$data= mysqli_query($con,$viewQuery);
$details=mysqli_fetch_assoc($data);

?>
<?php

?>

<!DOCTYPE html>

<html lang="en">

<head>
   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


</head>
<body>
   
    <form method="POST">
      <h1>CUSTOMER EDIT</h1>
      <div class="formcontainer">
      <hr/>
      <br>
      <div class="container">
        <label for="name"><strong>Customer Name</strong></label>
        <br>
        <input type="text" placeholder="Customer name" name="name" value="<?php echo $details['Customer_Name'] ?> "required>
        <br>
        <label for="code"><strong>Customer Code</strong></label>
        <br>
        <input type="text" placeholder="Customer code" name="code" value="<?php echo $details['Customer_Code'] ?>" required>
        <br>
        <label for="address"><strong>Customer Address</strong></label>
        <br>
        <input type="text" placeholder="Enter Address" name="address" value="<?php echo $details['Customer_Address'] ?> "required>
        <br>
        <label for="contact"><strong>Customer Contact</strong></label>
        <br>
        <input type="text" placeholder="Enter Contact" name="contact" value="<?php echo $details['Customer_Contact'] ?>" required>
      </div>
      <br>
      <input type="submit" value="Edit" class="editCus" name="edit">
   
      </div>
    </form>


</body>
</html>


<?php

//Editing 

if($_POST['edit']){
    $customer_name   =$_POST['name'];
    $customer_code   =$_POST['code'];
    $customer_address  =$_POST['address'];
    $customer_contact =$_POST['contact'];

$query= "UPDATE customers set Customer_Name='$customer_name ',Customer_Address='$customer_address'
,Customer_Contact=' $customer_contact'where Customer_Code=' $customer_code'";
   
   $data=mysqli_query($con,$query);

   if($data){

    echo '<script>alert("Customer details Edit successfully")</script>';
 
   }else{
    echo '<script>alert("Customer details Edit unsuccessfully")</script>';
   }
 }

 ?>