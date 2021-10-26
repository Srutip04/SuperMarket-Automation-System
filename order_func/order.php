 <?php
require_once 'pdo.php';
session_start();
// echo $_POST['customer_id'];
// console.log($_POST['customer_id']);
$cid=$_POST['customerID'];
$t=time();
// echo($t . "<br>");
$d=date("Y-m-d",$t);

for($i=1;$i<=3;$i++){
//   // if(isset($_POST['product_id'. strval($i)])){
    
    $pid=$_POST['productId1'];
    $qty=$_POST['quantity1'];
    $price=$_POST['price1'];
    
    {
      $sql="INSERT INTO `orders` (order_date,product_id,qty,price,customer_id,bill_id) VALUES('$d',2,'$qty','$price','$cid','$t')";
      $stmt=$pdo->prepare($sql);
      $stmt->execute();
    }
   
  }

      
 

?> 

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <form action="bill.php" method="post">

    
  <div id="myDIV">
    <div class="struct">
        <input type="text" name="orderDate" value="<?php echo($d);?>"/>
        
        <input type="number" name="timeStamp" value="<?php echo($t);?>"/>
        <input type="number" name="customerID" value="<?php echo($cid);?>"/>
        
        
    </div>
  </div>
  <button type="submit" value="Submit"><a href="#">Submit</a></button>
</form>

  <button onclick="myFunction()"><i class="fa fa-plus" aria-hidden="true"></i></button>

<script>
  var counter=0;
function myFunction() {
  counter++;
  var para = document.createElement("div");
  para.setAttribute('id', 'div23');

  var inp1 = document. createElement("input"); 
  inp1.setAttribute('type', 'text');
  inp1.setAttribute('name', 'productId'+ counter.toString());
  inp1.setAttribute('id', 'productId');

  var inp2 = document. createElement("input"); 
  inp2.setAttribute('type', 'number');
  inp2.setAttribute('name', 'quantity' + counter.toString());
  inp2.setAttribute('id', 'quantity');

  var inp3 = document. createElement("input"); 
  inp3.setAttribute('type', 'number');
  inp3.setAttribute('name', 'price'+ counter.toString());
  inp3.setAttribute('id', 'price');
  
  para.appendChild(inp1);
  para.appendChild(inp2);
  para.appendChild(inp3);
  document.getElementById("myDIV").appendChild(para);
  console.log('productId'+ counter.toString());
}

</script>

</body>
</html>