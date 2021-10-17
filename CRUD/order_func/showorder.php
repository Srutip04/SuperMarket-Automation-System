<?php
require_once "pdo.php";
session_start();
$stmt=$pdo->query("SELECT order_id,orders.order_date,orders.qty,orders.price,products.product_name,products.mfg_date,customer.Name,customer.PhnNo FROM `orders`
        INNER JOIN `products` ON orders.product_id=products.product_id INNER JOIN `customer` ON orders.customer_id=customer.customer_id");
?>
<html>
    <head>
        <title>Data</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/table.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
         
    </head>
<body>
   
<div class = "container">
     <h2 class="text-center pb-2 mb-2">Orders</h2>
        <div class="table-responsive">
<table class="table table-dark table-hover" >

<?php    
echo "<thead style = 'font-weight : bold;background-color : red'>" ;
echo "<tr><td>" ;
echo 'Order Date' ;
echo "</td><td>" ;
echo 'Quantity';
echo '</td><td>';
echo 'Price';
echo '</td><td>';
echo 'Product Name' ;
echo "</td><td>" ;
echo 'mfg_date';
echo "</td><td>" ;
echo 'Customer Name';
echo '</td><td>';
echo 'Contact';
echo '</td><td>';
echo 'Delete ' ;
echo "</td><td>" ;
echo 'Edit ' ;
echo "</td></tr>" ;
echo "</thead>" ;
            $arows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($arows as $rows)
            {   $cid = $rows['order_id'];
                
                    echo "<tr><td>";
                    echo($rows['order_date']);
                    echo("</td><td>");
                    echo($rows['qty']);
                    echo("</td><td>");
                    echo($rows['price']);
                    echo("</td><td>");
                    echo($rows['product_name']);
                    echo("</td><td>");
                    echo($rows['mfg_date']);
                    echo("</td><td>");
                    echo($rows['Name']);
                    echo("</td><td>");
                    echo($rows['PhnNo']);
                    echo("</td><td>");
                    echo('<a href="delorder.php?order_id='.$cid.'">Delete</a>');
                    echo("</td><td>");
                    echo('<a href="editorder.php?order_id='.$cid.'">Edit</a>');
                    echo("</td></tr>");
            }
            ?>
</table>
        </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>