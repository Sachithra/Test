<?php include ("DBConnection.php");?>
<!DOCTYPE html>
<html lang="en">

<head>
   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Stylesheet" href="style.css">
    <script src="script.js"></script>
    <title>Document</title>


</head>
<body>
   
    <form method="POST">
      <h1>PLACE ORDER</h1>
      <div class="formcontainer">
      <hr/>
      <br>
      <div class="container">
        <label for="name"><strong>Customer Name</strong></label>
        <br>
        <select name="product" id="source" onchange="copyTextValue()" >

        <?php

        //getCustomers values

        $query ="SELECT Customer_Name FROM customers";
        $result = $con->query($query);
        if($result->num_rows> 0){
          $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        ?>
        <option>Select product</option>
        <?php 

        //Auto increment value

        $value=1;
        foreach ($options as $option) {
           $sum= $value++;
        ?>
        <option value="<?php echo $sum; ?>"><?php echo $option['Customer_Name']; ?> </option>
        <?php 
        }
        
        ?>
        </select>
        <br>
        <label for="address"><strong>Order Number</strong></label>
        <br>
        <input type="text" placeholder="Order Number" name="on" id="orderNum" required>
       
      </div>
      <br>
      <input type="submit" value="Add" class="addCus" name="addingCus">
   
      </div>
    </form>

  <table border="2">
  <tr>
    <th>Product Name/th>
    <th>Product Code</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Free</th>
    <th>Amount</th>
  </tr>
  
<?php

//Get Amount

$Query ="SELECT p.product_Name,p.product_code,price,i.purchas_quantity,i.free_product
                     price*purchas_quantity AS 'Amount'from product p JOIN issu_products i
                     on p.product_Name=i.purchase_product";

$data= mysqli_query($con,$Query);
$rows=mysqli_num_rows($data);


if($rows !=0){
   $tableValues=0;
    while($details=mysqli_fetch_assoc($data)){
      echo"<tr>
            <td>".$details['product_Name']."</td>
            <td>".$details['product_code']."</td>
            <td>".$details['purchase_product']."</td>
            <td>".$details['purchas_quantity']."</td>
            <td>".$details['free_product']."</td>
            <td>".$details['Amount']."</td>
          
        </tr>";
   }
}else{
    //echo "No record find";
}

?>

</table>


</body>

</script>
</html>
