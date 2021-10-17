<?php
require_once "pdo.php";
session_start();

echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Order Date</th><th>Product Name</th><th>Price</th><th>Mfg Date</th><th>Customer Name</th><th>Contact</th><th>Company Name</th></tr>";

class TableRows extends RecursiveIteratorIterator
{
    function __construct($it)
    {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current()
    {
        return "<td style='width: 150px; border: 1px solid black;'>" . parent::current() . "</td>";
    }

    function beginChildren()
    {
        echo "<tr>";
    }

    function endChildren()
    {
        echo "</tr>" . "\n";
    }
}
$PhnNo= $_POST['PhnNo'];
if(isset($_POST['PhnNo'])){
$stmt = $pdo->prepare("SELECT orders.order_date,products.product_name,products.price,products.mfg_date,customer.Name,customer.PhnNo,company.comp_name FROM `orders`
        INNER JOIN `products` ON orders.product_id=products.product_id INNER JOIN `customer` ON orders.customer_id=customer.customer_id INNER JOIN `company` ON orders.comp_id=company.comp_id WHERE PhnNo = $PhnNo;");
$stmt->execute();
}

$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k => $v) {
    echo $v;
}