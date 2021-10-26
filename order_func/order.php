 <?php
require_once 'pdo.php';
session_start();
$cid=$_POST['customerID'];
$t=time();
$d=date("Y-m-d",$t);
?> 

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
  getCounter();
}
function getCounter(){
  document.getElementById('counterValue').setAttribute('value',counter);
}

</script>
</head>
<body>
  <form action="bill.php" method="post">

    
  <div id="myDIV">
    <div class="struct">
        <input type="text" name="orderDate" value="<?php echo($d);?>"/>
        
        <input type="number" name="timeStamp" value="<?php echo($t);?>"/>
        <input type="number" name="customerID" value="<?php echo($cid);?>"/>
        
        <input type="hidden" name="counter"  id ="counterValue" value=counter/>
    </div>
  </div>
  <button type="submit" value="Submit">Submit</button>
</form>

  <button onclick="myFunction()"><i class="fa fa-plus" aria-hidden="true"></i></button>



</body>
</html>