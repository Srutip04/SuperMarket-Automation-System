<?php
require_once "pdo.php";
session_start();
$stmt=$pdo->query("SELECT product_id,products.product_name,products.unit,products.price,products.mfg_date,company.comp_name FROM `products` JOIN `company` ON products.comp_id = company.comp_id ");
?>
<html>
    <head>
        <title>Data</title>
         <link rel="stylesheet" href="css/table.css">
    </head>
    <body>
        <h1>Products Database</h1>
        <div class = "container">
        <table>
<?php
    
echo "<thead style = 'font-weight : bold;background-color : blue'>" ;
echo "<tr><td>" ;
echo 'Product Name' ;
echo "</td><td>" ;
echo 'Unit' ;
echo "</td><td>" ;
echo 'Price' ;
echo "</td><td>" ;
echo 'mfg_date';
echo "</td><td>" ;
echo 'Company Name';
echo '</td><td>';
echo 'Delete ' ;
echo "</td><td>" ;
echo 'Edit ' ;
echo "</td></tr>" ;
echo "</thead>" ;
            $arows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($arows as $rows)
            {   $cid = $rows['product_id'];
                
                    echo "<tr><td>";
                    echo($rows['product_name']);
                    echo("</td><td>");
                    echo($rows['unit']);
                    echo("</td><td>");
                    echo($rows['price']);
                    echo("</td><td>");
                    echo($rows['mfg_date']);
                    echo("</td><td>");
                    echo($rows['comp_name']);
                    echo("</td><td>");
                    echo('<a href="delpro.php?product_id='.$cid.'">Delete</a>');
                    echo("</td><td>");
                    echo('<a href="editpro.php?product_id='.$cid.'">Edit</a>');
                    echo("</td></tr>");
            }
            ?>
        </table>
        </div>
    </body>
</html>