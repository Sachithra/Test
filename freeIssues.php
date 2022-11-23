<?php include ("DBConnection.php");?>
<?php include("select.php");?>
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
      <h1>FREE ISSUE</h1>
      <div class="formcontainer">
      <hr/>
      <br>
      <div class="container">
        <label for="name"><strong>Free Issue Label</strong></label>
        <br>
        <input type="text" placeholder="Free Issue Label" name="label" required>
        <br>
        <label for="address"><strong>Type</strong></label>

        <?php

        //Get Free Quantity
    
        $quantity =$_POST['purchaseQuantity'];
        $operator =$_POST['type'];
      
        switch($operator){
        case "Flat":
        $ans=$quantity/10;
        if($quantity<10){
            $ans="0";
        }else{
            $ans;
        }
        break;
        case "Multiply":
        $ans=($quantity/10)*2;
        if($quantity<10){
            $ans="0";
        }else{
            $ans;
        }
        break;       
        }
        ?>



        <br>
        <select name="type" id="type" value="<?php echo $operator;?>">
        <option>Select</option>
        <option value="Flat">Flat</option>
        <option value="Multiply">Multiple</option>
        </select>
        <br>
        <label for="contact"><strong>Purchase Product</strong></label>
        <br>
        <select name="product" id="source" onchange="copyTextValue()" >

        <?php

        //Get Products into the dropdown

        $query ="SELECT product_Name FROM product";
        $result = $con->query($query);
        if($result->num_rows> 0){
          $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        ?>
        <option>Select product</option>
        <?php 
        foreach ($options as $option) {
        ?>
        <option value="<?php echo $option['product_Name']; ?>"><?php echo $option['product_Name']; ?> </option>
        <?php 
        }
        
        ?>
        </select>
        <br>
        <label for="Free-Product"><strong>Free Product</strong></label>
        <br>
        <input type="text" placeholder="Free Product" id="freeProduct" name="FreeProduct" required>
        <br>
        <label for="Purchase Quantity"><strong>Purchase Quantity</strong></label>
        <br>
        <input type="text" placeholder="Purchase Quantity" name="purchaseQuantity" required>
        <br>
        <label for="Free-Quantity"><strong>Free Quantity</strong></label>
        <br>
        <input type="text" placeholder="Free Quantity" name="freeQuantity" value="<?php echo $ans;?>" >
        
        <br>
        <label for="Lower-Limit"><strong>Lower Limit</strong></label>
        <br>
        <input type="text" placeholder="Lower Limit" name="lowerLimit" required>
        <br>
        <label for="Upper-Limit"><strong>Upper Limit</strong></label>
        <br>
        <input type="text" placeholder="Upper Limit" name="upperLimit" required>
      </div>
      <br>
      <input type="submit" value="Add" class="addIssues" name="productsIssuesAdding">
   
      </div>
    </form>
    <button onclick="viewFunction()">View</button>

    <?php

    //Adding

    if($_POST['productsIssuesAdding']){
    $label =$_POST['label'];
    $type =$_POST['type'];
    $product =$_POST['product'];
    $FreeProduct =$_POST['FreeProduct'];
    $purchaseQuantity =$_POST['purchaseQuantity'];
    $freeQuantity =$_POST['freeQuantity'];
    $lowerLimit =$_POST['lowerLimit'];
    $upperLimit =$_POST['upperLimit'];



   $Sql= "INSERT INTO issu_products VALUES(' $label','$type','$product','$FreeProduct,
   $purchaseQuantity,$freeQuantity,$lowerLimit,$upperLimit')";
   $data=mysqli_query($con,$Sql);

   if($data){

    echo '<script>alert("Product details adding successfully")</script>';
 
   }else{
    echo '<script>alert("Product details adding unsuccessfully")</script>';
   }

}

 ?>


<table border="2" id="hide" class="hidden">
  <tr>
    <th>Free issue label</th>
    <th>Type</th>
    <th>Purchase Product</th>
    <th>Free Product</th>
    <th>Purchase Quantity</th>
    <th>Free Quantity</th>
    <th>Free Quantity</th>
    <th>Lower Limit</th>
    <th>Upper Limit</th>
  </tr>
  
<?php


$viewCustomerQuery ="SELECT*FROM issu_products";
$data= mysqli_query($con,$viewCustomerQuery);
$rows=mysqli_num_rows($data);


if($rows !=0){
   $tableValues=0;
    while($details=mysqli_fetch_assoc($data)){
      echo"<tr>
            <td>".$details['free_issue_label']."</td>
            <td>".$details['types']."</td>
            <td>".$details['purchase_product']."</td>
            <td>".$details['free_product']."</td>
            <td>".$details['purchas_quantity']."</td>
            <td>".$details['free_quantity']."</td>
            <td>".$details['lower_quantity']."</td>
            <td>".$details['upper_limit']."</td>
            <td><a href='editProductIssue.php?issue=$details[free_issue_label]'>Edit</a></td>
        </tr>";
   }
}else{
    //echo "No record find";
}

?>

</table>


</body>
<script>
    //Get Same Value
    function copyTextValue() {
    const text1 = document.getElementById("source").value;
    document.getElementById("freeProduct").value = text1;
}

</script>
</html>