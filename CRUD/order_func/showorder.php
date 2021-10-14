<?php
require_once "pdo.php";
session_start();
$stmt=$pdo->query("SELECT order_id,orders.order_date,products.product_name,products.price,products.mfg_date,customer.Name,customer.PhnNo,company.comp_name FROM `orders`
        INNER JOIN `products` ON orders.product_id=products.product_id INNER JOIN `customer` ON orders.customer_id=customer.customer_id INNER JOIN `company` ON orders.comp_id=company.comp_id");
?>
<html>
    <head>
        <title>Data</title>
         <link rel="stylesheet" href="css/table.css">
    </head>
    <body>
        <h1>Orders Database</h1>
        <div class = "container">
        <table>
<?php
    
echo "<thead style = 'font-weight : bold;background-color : blue'>" ;
echo "<tr><td>" ;
echo 'Order Date' ;
echo "</td><td>" ;
echo 'Product Name' ;
echo "</td><td>" ;
echo 'Price' ;
echo "</td><td>" ;
echo 'mfg_date';
echo "</td><td>" ;
echo 'Customer Name';
echo '</td><td>';
echo 'Contact';
echo '</td><td>';
echo 'Company Name';
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
                    echo($rows['product_name']);
                    echo("</td><td>");
                    echo($rows['price']);
                    echo("</td><td>");
                    echo($rows['mfg_date']);
                    echo("</td><td>");
                    echo($rows['Name']);
                    echo("</td><td>");
                    echo($rows['PhnNo']);
                    echo("</td><td>");
                    echo($rows['comp_name']);
                    echo("</td><td>");
                    echo('<a href="delorder.php?order_id='.$cid.'">Delete</a>');
                    echo("</td><td>");
                    echo('<a href="editorder.php?order_id='.$cid.'">Edit</a>');
                    echo("</td></tr>");
            }
            ?>
        </table>
        </div>
    </body>
</html>