<?php
require_once "pdo.php";
session_start();
$stmt=$pdo->query("SELECT products.product_name,date_format(order_date,'%M') AS Sales_per_month,SUM(orders.qty) AS Quantity_sold,SUM(orders.qty * orders.price) AS SP,SUM(orders.qty * products.price) AS CP,SUM((orders.qty * orders.price) - (orders.qty * products.price)) AS Profit FROM `orders` INNER JOIN `products` ON orders.product_id=products.product_id GROUP BY products.product_name,year(order_date),month(order_date) ORDER BY year(order_date),month(order_date) LIMIT 0, 25");
?>
<html>
    <head>
        <title>Data</title>
        <link rel="stylesheet" href="css/table.css">
         
    </head>
<body>
    <div class="head">
        <h1>Orders</h1>
    </div>
<div class = "container">
<table>

<?php    
echo "<thead style = 'font-weight : bold;background-color : red'>" ;
echo "<tr><td>" ;
echo 'Product Name' ;
echo "</td><td>" ;
echo 'Month';
echo '</td><td>';
echo 'Quantity Sold';
echo '</td><td>';
echo 'Selling Price' ;
echo "</td><td>" ;
echo 'Cost Price';
echo "</td><td>" ;
echo 'Profit';
echo "</td></tr>" ;
echo "</thead>" ;

            $arows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($arows as $rows)
            {   
                
                    echo "<tr><td>";
                    echo($rows["product_name"]);
                    echo("</td><td>");
                    echo($rows["Sales_per_month"]);
                    echo("</td><td>");
                    echo($rows['Quantity_sold']);
                    echo("</td><td>");
                    echo($rows['SP']);
                    echo("</td><td>");
                    echo($rows['CP']);
                    echo("</td><td>");
                    echo($rows["Profit"]);
                    echo("</td></tr>");
            }
            ?>
</table>
</div>
</body>
</html>