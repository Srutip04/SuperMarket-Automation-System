<?php
require_once "pdo.php";
session_start();

$stmt = $pdo->query("SELECT company.comp_owner,company.comp_name,comapny.location,comp_id FROM `company`");
?>
<html>

<head>
    <title>Data</title>
</head>

<body>
    <div class="head">
        <h1>COMPANY DATABASE</h1>
    </div>
    <div class="container">
        <table>
            <?php
            echo "<thead style = 'font-weight : bold;background-color : red'>";
            echo "<tr><td>";
            echo 'Company Owner';
            echo "</td><td>";
            echo 'Company Name';
            echo "</td><td>";
            echo 'Location';
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
                echo ($rows['comp_owner']);
                echo ("</td><td>");
                echo ($rows['comp_name']);
                echo ("</td><td>");
                echo ($rows['location']);
                echo ("</td></td>");
                echo ('<a href="delcomp.php?comp_id=' . $cid . '">Delete</a>');
                echo ("</td><td>");
                echo ('<a href="editcomp.php?comp_id=' . $cid . '">Edit</a>');
                echo ("</td></tr>");
            }
            ?>
        </table>
    </div>
</body>

</html>