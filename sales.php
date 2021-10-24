<?php
require_once "pdo.php";
session_start();
$stmt=$pdo->query("SELECT products.product_name,date_format(order_date,'%M') AS Sales_per_month,SUM(orders.qty) AS Quantity_sold,SUM(orders.qty * products.sp) AS SP,SUM(orders.qty * products.cp) AS CP,SUM((orders.qty * products.sp) - (orders.qty * products.cp)) AS Profit FROM `orders` INNER JOIN `products` ON orders.product_id=products.product_id GROUP BY products.product_name,year(order_date),month(order_date) ORDER BY year(order_date),month(order_date) LIMIT 0, 25");
?>
<html>
    <head>
        <title>Data</title>
        <link rel="stylesheet" href="table.css">
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
         
    </head>
<body>
    
    <div class = "container">
         <h2 class="text-center pb-2 mb-2">Sales</h2>
          <div class="table-responsive">
              <table class="table table-dark table-hover">
                  <?php
                  echo "<thead>" ;
                  echo '<tr><td>' ;
                  echo 'Product Name' ;
                  echo '</td><td>' ;
                  echo 'Month';
                  echo '</td><td>';
                  echo 'Quantity Sold';
                  echo '</td><td>';
                  echo 'Selling Price' ;
                  echo "</td><td>" ;
                  echo 'Cost Price';
                  echo "</td><td>" ;
                  echo "Profit";
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>
 