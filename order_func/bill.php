<?php
require_once "pdo.php";
session_start();
// $oid=$_POST['order_id'];
// $stmt=$pdo->query("SELECT order_id,orders.qty,products.sp,products.product_name,customer.Name,customer.PhnNo,orders.qty * products.sp AS Amount FROM `orders` INNER JOIN `products` ON orders.product_id=products.product_id INNER JOIN `customer` ON orders.customer_id=customer.customer_id WHERE order_id =$oid");
// if(isset($_POST['submit'])){
    $cid=$_POST['customerID'];
$t=$_POST['timeStamp'];
// echo($t . "<br>");
$d=$_POST['orderDate'];
//   for($i=1;$i<=3;$i++){
//     $pid=$_POST['productId'. strval($i)];
//     $qty=$_POST['quantity'. strval($i)];
//     $price=$_POST['price'. strval($i)];
//     // if($pid!=='' && $qty!=='' && $price!==''){
//       $sql="INSERT INTO `orders` (order_date,product_id,qty,price,customer_id,bill_id) VALUES('$d',2,'$qty','$price','$cid','$t')";
//       $stmt=$pdo->prepare($sql);
//       $stmt->execute();
    
//   }
$cnt=$_POST['counter'];
for($i=1;$i<=$cnt;$i++){
//   // if(isset($_POST['product_id'. strval($i)])){
    
    $pid=$_POST['productId'. strval($i)];
    $qty=$_POST['quantity' . strval($i)];
    $price=$_POST['price' . strval($i)];
    
    {
      $sql="INSERT INTO `orders` (order_date,product_id,qty,price,customer_id,bill_id) VALUES('$d','$pid','$qty','$price','$cid','$t')";
      $stmt=$pdo->prepare($sql);
      $stmt->execute();
    // $_SESSION['success'] = 'Record Added';
    // header("Location: showbill.php");
    // return;
    }
}
    $stmt=$pdo->query("SELECT bill_id,order_id,products.product_name,orders.qty,products.sp,customer.Name,customer.PhnNo,orders.qty * products.sp AS Amount  FROM `orders` INNER JOIN `products` ON orders.product_id=products.product_id INNER JOIN `customer` ON orders.customer_id=customer.customer_id WHERE bill_id='$t' ");
  
   

// echo $_POST['productId1'];




?>
<html>
    <head>
        <title>Bill</title>
         <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/table.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    </head>
    <body>
        <div class="container">
            <h2 class="text-center pb-2 mb-2">Bill</h2>
            <div class="table-responsive">
              <table class="table table-dark table-hover" >
                  <?php 
                  echo "<thead>";
                  echo "<tr><td>" ;
                  echo 'Product Name';
                  echo '</td><td>';
                  echo 'Quantity';
                  echo '</td><td>';
                  echo 'Unit Price' ;
                  echo "</td><td>" ;
                  echo 'Amount';
                  echo "</td></tr>";
                  echo "</thead>";
                //   echo "<tr><th colspan=3>";
                //   echo "Total";
                //   echo "</th>";
                       $arows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                       foreach($arows as $rows){
                        //    $t=$rows['bill_id'];
                    echo "<tr><td>";
                    echo($rows['product_name']);
                    echo("</td><td>");
                    echo($rows['qty']);
                    echo("</td><td>");
                    echo($rows['sp']);
                    echo("</td><td>");
                    echo($rows['Amount']);
                    // echo("</td><td>");
                //      echo "<tr><th colspan=3>";
                //   echo "Total";
                //   echo "</th>";
                //     echo($rows['total']);
                    echo "</td></tr>";
                   
                       }
                  ?>
              </table>
            </div>
        </div>
    </body>
</html>
