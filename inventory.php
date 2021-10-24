<?php
require_once "pdo.php";
session_start();
$stmt=$pdo->query("SELECT product_id,products.product_name,products.qty,products.cp,products.sp,products.mfg_date,supplier.name,supplier.location FROM `products` INNER JOIN `supplier` ON products.supplier_id=supplier.supplier_id");
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Data</title>
        <link rel="stylesheet" href="table.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    </head>
<body>

    <div class = "container">
        <h2 class="text-center pb-2 mb-2">Inventory</h2>
        <div class="table-responsive">
           <table class="table table-dark table-hover">

             <?php    
              echo "<thead>" ;
              echo '<tr><td>' ;
              echo 'Product ID' ;
              echo '</td><td>' ;
              echo 'Product Name';
              echo '</td><td>';
              echo 'Quantity';
              echo '</td><td>';
              echo 'Cost Price' ;
              echo "</td><td>" ;
              echo 'Selling Price' ;
              echo "</td><td>" ;
              echo 'Mfg. Date';
              echo "</td><td>" ;
              echo 'Supplier Name' ;
              echo "</td><td>" ;
              echo 'Location' ;
              echo "</td></tr>" ;
              echo "</thead>" ;


                        $arows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($arows as $rows)
                        {   
                
                              echo "<tr><td data-label='Product ID'>";
                              echo($rows["product_id"]);
                              echo("</td><td data-label='Product Name'>");
                              echo($rows["product_name"]);
                              echo("</td><td data-label='Quantity'>");
                              echo($rows['qty']);
                              echo("</td><td data-label='Cost Price'>");
                              echo($rows['cp']);
                              echo("</td><td data-label='Selling Price'>");
                              echo($rows['sp']);
                              echo("</td><td data-label='Mfg. Date'>");
                              echo($rows['mfg_date']);
                              echo("</td><td data-label='Supplier Name'>");
                              echo($rows['name']);
                              echo("</td><td data-label='Location'>");
                              echo($rows['location']);
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