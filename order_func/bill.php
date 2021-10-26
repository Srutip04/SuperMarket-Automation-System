<?php
require_once "pdo.php";
session_start();
$cid=$_POST['customerID'];
$t=$_POST['timeStamp'];
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
    
    }
}
    $stmt=$pdo->query("SELECT bill_id,order_id,products.product_name,orders.qty,products.sp,customer.Name,customer.PhnNo,orders.qty * products.sp AS Amount  FROM `orders` INNER JOIN `products` ON orders.product_id=products.product_id INNER JOIN `customer` ON orders.customer_id=customer.customer_id WHERE bill_id='$t' ");
  


 $total=0;


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
            <h1 class="text-center pb-2 mb-2">Bill</h1>
            <div class="card text-white bg-dark mb-3">
                <div class="card-body">
                 <h4>Bill ID: <span><?php echo($t)?></span></h4><br>
                 <h4>Date: <span><?php echo($d)?></span></h4><br>
               </div>
           </div>
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
                
                       $arows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                       foreach($arows as $rows){
                      
                    echo "<tr><td>";
                    echo($rows['product_name']);
                    echo("</td><td>");
                    echo($rows['qty']);
                    echo("</td><td>");
                    echo($rows['sp']);
                    echo("</td><td>");
                    echo($rows['Amount']);
                    echo "</td></tr>";
                   
                    $amt=$rows['qty'] * $rows['sp'];
                    $total+=$amt;
                   
                       }
                   
                  ?>
              </table>
              <div class="card text-white bg-dark mb-3" style="float:right">
                   <div class="card-body">
                     <h2>Total: <span><?php echo $total?></span></h2>
                     </div>
             </div>
            </div>
        </div>
    </body>
</html>
