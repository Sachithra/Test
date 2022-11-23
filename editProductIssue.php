<?php include ("DBConnection.php");
$issues= $_GET['issue'];

$viewQuery ="SELECT*FROM issu_products where free_issue_label= '$issues'";
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
      <h1>ISSUE PRODUCT EDIT</h1>
      <div class="formcontainer">
      <hr/>
      <br>
      <div class="container">
        <label for="name"><strong>Free Issue Label</strong></label>
        <br>
        <input type="text" placeholder="Free Issue Label" name="free_issue_label" value="<?php echo $details['free_issue_label'] ?> "required>
        <br>
        <label for="code"><strong>Type</strong></label>
        <br>
        <input type="text" placeholder="Type" name="type" value="<?php echo $details['types'] ?>" required>
        <br>
        <label for="address"><strong>Purchase product</strong></label>
        <br>
        <input type="text" placeholder="Purchase product" name="purchase_product" value="<?php echo $details['purchase_product'] ?> "required>
        <br>
        <label for="contact"><strong>Free Product</strong></label>
        <br>
        <input type="text" placeholder="Free Product" name="free_product" value="<?php echo $details['free_product'] ?>" required>
        <br>
        <label for="contact"><strong>Purchase Quantity</strong></label>
        <br>
        <input type="text" placeholder="Purchase Quantity" name="purchas_quantity" value="<?php echo $details['purchas_quantity'] ?>" required>
        <br>
        <label for="contact"><strong>Free  Quantity</strong></label>
        <br>
        <input type="text" placeholder="Free  Quantity" name="free_quantity" value="<?php echo $details['free_quantity'] ?>" required>
        <br>
        <label for="contact"><strong>Lower Limit</strong></label>
        <br>
        <input type="text" placeholder="Lower Limit" name="lower_limit" value="<?php echo $details['lower_limit'] ?>" required>
        <br>
        <label for="contact"><strong>Upper Limit</strong></label>
        <br>
        <input type="text" placeholder="Upper Limit" name="upper_limit" value="<?php echo $details['upper_limit'] ?>" required>
      </div>
      <br>
      <input type="submit" value="Edit" class="edit" name="edit">
   
      </div>
    </form>


</body>
</html>


<?php

//Editing 

if($_POST['edit']){
    $Free_issue_label   =$_POST['free_issue_label'];
    $Type   =$_POST['types'];
    $Purchase_product  =$_POST['purchase_product'];
    $Free_product =$_POST['free_product'];
    $Purchas_quantity   =$_POST['purchas_quantity'];
    $Free_quantity   =$_POST['free_quantity'];
    $Lower_quantity  =$_POST['lower_quantity'];
    $Upper_limit =$_POST['upper_limit'];

$query= "UPDATE issu_product set free_issue_label='$Free_issue_label ',types='$Type'
        ,purchase_product=' $Purchase_product',free_product=' $Free_product'
        ,purchas_quantity='$Purchas_quantity',free_quantity='$Free_quantity'
        ,lower_quantity=' $Lower_quantity',upper_limit='  $Upper_limit'";
   
   $data=mysqli_query($con,$query);

   if($data){

    echo '<script>alert("Issue Product details Edit successfully")</script>';
 
   }else{
    echo '<script>alert("Issue Product details Edit unsuccessfully")</script>';
   }
 }

 ?>