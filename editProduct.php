<?php include ("DBConnection.php");
$pname= $_GET['pname'];

$viewQuery ="SELECT*FROM product where product_Name= '$pname'";
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
      <h1>EDIT PRODUCT</h1>
      <div class="formcontainer">
      <hr/>
      <br>
      <div class="container">
        <label for="name"><strong>Product Name</strong></label>
        <br>
        <input type="text" id="product" value="<?php echo $details['product_Name'] ?>" placeholder="Product name" name="name">
        <br>
        <label for="address"><strong>Product Code</strong></label>
        <br>
        <input type="text" placeholder="Product Code" name="code" value="<?php echo $details['product_code'] ?>" required>
        <br>
        <label for="contact"><strong>Price</strong></label>
        <br>
        <input type="text" placeholder="price" name="prices" value="<?php echo $details['price'] ?>" name="prices" required>
        <br>
        <label for="contact"><strong>Expire Date</strong></label>
        <br>
        <input type="text" placeholder="Expire Date" name="expireDate" value="<?php echo $details['expire_Date'] ?>" required>
      </div>
      <br>
      <input type="submit" value="Edit" class="editClass" name="edit">
   
      </div>
    </form>

</body>
</html>


<?php
//Editing

if($_POST['edit']){
    $product_name   =$_POST['name'];
    $product_code   =$_POST['code'];
    $product_price  =$_POST['prices'];
    $product_expire =$_POST['expireDate'];

$query= "UPDATE product set product_code='$product_code ',price='$product_price'
,expire_Date='$product_expire 'where product_Name='$product_name '";
   
   $data=mysqli_query($con,$query);

   if($data){

    echo '<script>alert("Product details Edit successfully")</script>';
 
   }else{
    echo '<script>alert("Product details Edit unsuccessfully")</script>';
   }
 }

 ?>