<?php
require_once "pdo.php";
session_start();

$stmt = $pdo->query("SELECT supplier.name,supplier.phn,supplier_id FROM `supplier`");
?>
<html>

<head>
    <title>Data</title>
     <link rel="stylesheet" href="css/table.css">
</head>

<body>
    <div class="head">
        <h1>SUPPLIER DATABASE</h1>
    </div>
    <div class="container">
        <table>
            <?php
            echo "<thead style = 'font-weight : bold;background-color : red'>";
            echo "<tr><td>";
            echo 'Supplier Name';
            echo "</td><td>";
            echo 'Phone No.';
            echo "</td><td>";
            echo 'Delete customer';
            echo "</td><td>";
            echo 'Edit customer';
            echo "</td></tr>";
            echo "</thead>";
            $arows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($arows as $rows) {
                $cid = $rows['supplier_id'];

                echo "<tr><td>";
                echo ($rows['name']);
                echo ("</td><td>");
                echo ($rows['phn']);
                echo ("</td><td>");
                echo ('<a href="delsupp.php?supplier_id=' . $cid . '">Delete</a>');
                echo ("</td><td>");
                echo ('<a href="editsupp.php?supplier_id=' . $cid . '">Edit</a>');
                echo ("</td></tr>");
            }
            ?>
        </table>
    </div>
</body>

</html>