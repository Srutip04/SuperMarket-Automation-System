<?php
require_once "pdo.php";
session_start();

$stmt = $pdo->query("SELECT customer.Name,customer.PhnNo,customer_id FROM `customer`");
?>
<html>

<head>
    <title>Data</title>
</head>

<body>
    <div class="head">
        <h1>CUSTOMER DATABASE</h1>
    </div>
    <div class="container">
        <table>
            <?php
            echo "<thead style = 'font-weight : bold;background-color : red'>";
            echo "<tr><td>";
            echo 'Customer Name';
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
                $cid = $rows['customer_id'];

                echo "<tr><td>";
                echo ($rows['Name']);
                echo ("</td><td>");
                echo ($rows['PhnNo']);
                echo ("</td><td>");
                echo ('<a href="delcust.php?customer_id=' . $cid . '">Delete</a>');
                echo ("</td><td>");
                echo ('<a href="editcust.php?customer_id=' . $cid . '">Edit</a>');
                echo ("</td></tr>");
            }
            ?>
        </table>
    </div>
</body>

</html>