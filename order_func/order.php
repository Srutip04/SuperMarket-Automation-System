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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
  inp1.setAttribute('placeholder','Product ID');

  var inp2 = document. createElement("input"); 
  inp2.setAttribute('type', 'number');
  inp2.setAttribute('name', 'quantity' + counter.toString());
  inp2.setAttribute('id', 'quantity');
  inp2.setAttribute('placeholder','Quantity');

  // var inp3 = document. createElement("input"); 
  // inp3.setAttribute('type', 'number');
  // inp3.setAttribute('name', 'price'+ counter.toString());
  // inp3.setAttribute('id', 'price');
  
  para.appendChild(inp1);
  para.appendChild(inp2);
  // para.appendChild(inp3);
  document.getElementById("myDIV").appendChild(para);
  console.log('productId'+ counter.toString());
  console.log(counter);
  getCounter();
}
function getCounter(){
  document.getElementById('counterValue').setAttribute('value',counter);
}



</script>
</head>
<body>
  <div class="card d-flex justify-content-center">
    <div class="card-body">
  <form action="bill.php" method="post">

    
  <div id="myDIV">
   <div class="struct">
   
      
        <label for="date">Order Date</label>
        <input type="text" name="orderDate" id="date" value="<?php echo($d);?>"/>
      
      
        <label for="bid">Bill ID</label>
        <input type="number" name="timeStamp" id="bid" value="<?php echo($t);?>"/>
      
      
        <label for="cid">Customer ID</label>
        <input type="number" name="customerID" id="cid" value="<?php echo($cid);?>"/>
          
        <input type="hidden" name="counter"  id ="counterValue" value=counter/>
    </div>
  </div>
  <button type="submit" value="Submit">Submit</button>
</form>
 </div>
  </div>

  <button onclick="myFunction()"><i class="fa fa-plus" aria-hidden="true"></i></button>
  


</body>
</html>