<?php
require_once "pdo.php";
session_start();
$stmt=$pdo->query("SELECT * FROM `products`");
?>
<html>
    <head>
        <title>Data</title>
        <link rel="stylesheet" href="css/table.css">
         
    </head>
<body>
    <div class="head">
        <h1>Inventory</h1>
    </div>
<div class = "container">
<table>

<?php    
echo "<thead style = 'font-weight : bold;background-color : red'>" ;
echo "<tr><td>" ;
echo 'Product ID' ;
echo "</td><td>" ;
echo 'Product Name';
echo '</td><td>';
echo 'Quantity';
echo '</td><td>';
echo 'Unit Price' ;
echo "</td><td>" ;
echo 'Mfg. Date';
echo "</td></tr>" ;
echo "</thead>" ;

            $arows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($arows as $rows)
            {   
                
                    echo "<tr><td>";
                    echo($rows["product_id"]);
                    echo("</td><td>");
                    echo($rows["product_name"]);
                    echo("</td><td>");
                    echo($rows['qty']);
                    echo("</td><td>");
                    echo($rows['price']);
                    echo("</td><td>");
                    echo($rows['mfg_date']);
                    echo("</td></tr>");
            }
            ?>
</table>
</div>
</body>
</html>