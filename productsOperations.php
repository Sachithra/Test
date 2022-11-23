<?php include ("DBConnection.php");?>

<!DOCTYPE html>

<html lang="en">

<head>
   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Stylesheet" href="styles.css">
    <script src="scripts.js"></script>
    <title>Document</title>


</head>
<body>
   

    <form method="POST">
      <h1>PRODUCT REGISTER</h1>
      <div class="formcontainer">
      <hr/>
      <br>
      <div class="container">
        <label for="name"><strong>Product Name</strong></label>
        <br>
        <input type="text" placeholder="Product name" name="pname"required>
        <br>
        <label for="address"><strong>Product Code</strong></label>
        <br>
        <input type="text" placeholder="Product Code" name="pcode"required>
        <br>
        <label for="contact"><strong>Price</strong></label>
        <br>
        <input type="text" placeholder="Price" name="price-name"required>
        <br>
        <label for="contact"><strong>Expire Date</strong></label>
        <br>
        <input type="date" placeholder="Expire Date" name="expireDate"required>           
       <br>
       <br>
      <input type="submit" value="Add" class="addbtn" name="adding">
      </div>
    </form>
    <br>
    <button onclick="viewFunction()">View</button>
   
    
<?php

//Adding

error_reporting(0);
if($_POST['adding']){
    $product_name =$_POST['pname'];
    $product_code =$_POST['pcode'];
    $product_price =$_POST['price-name'];
    $product_expire =$_POST['expireDate'];

if( $product_name !="" && $product_name !="" && $product_code !="" &&  $product_price
    !="" &&  $product_expire){

   $Sql= "INSERT INTO product VALUES(' $product_name','$product_code','$product_price','$product_expire')";
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
 


  <table border="2" id="hide" class="hidden">
  <tr>
    <th>Product Name</th>
    <th>Product Code</th>
    <th>Price</th>
    <th>Expire Date</th>
    <th>Edit Data</th>
  </tr>

<?php
//View Details

$viewQuery ="SELECT*FROM product";
$data= mysqli_query($con,$viewQuery);
$rows=mysqli_num_rows($data);


if($rows !=0){
   $tValues=0;
    while($details=mysqli_fetch_assoc($data)){
      echo"<tr>
            <td>".$details['product_Name']."</td>
            <td>".$details['product_code']."</td>
            <td>".$details['price']."</td>
            <td>".$details['expire_Date']."</td>
            <td><a href='editProduct.php?pname=$details[product_Name]'>Edit</a></td>
        </tr>";
   }
}else{
    echo "No record find";
}

?>

</table>

</body>

</html>
