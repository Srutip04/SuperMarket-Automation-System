<?php
require_once 'pdo.php';
session_start();

if (isset($_POST['order_date']) && isset($_POST['product_id']) && isset($_POST['customer_id']) && isset($_POST['comp_id'])) {
    $stmt = $pdo->prepare("INSERT INTO `orders` (order_date,product_id,customer_id,comp_id) VALUES(:order_date,:product_id,:customer_id,:comp_id)");
    $stmt->execute(array(
        ':order_date' => $_POST['order_date'], 
        ':product_id' => $_POST['product_id'],
        ':customer_id' => $_POST['customer_id'],
        ':comp_id' => $_POST['comp_id']
    ));
    $_SESSION['success'] = 'Record Added';
    header("Location: showorder.php");
    return;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Orders</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/util.css">
</head>

<body>
    <div class="contact1">
        <div class="container-contact1">
            <div class="contact1-pic js-tilt" data-tilt>
                <img src="images/distributor.png" alt="IMG">
            </div>

            <form method="post" action="orderadd.php" class="contact1-form validate-form">
                <span class="contact1-form-title">
                   ORDERS
                </span>

                <div class="wrap-input1 validate-input" data-validate="Name is required">
                    <input class="input1" type="text" name="order_date" placeholder="Order Date">
                    <span class="shadow-input1"></span>
                </div>

                <div class="wrap-input1 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                    <input class="input1" type="text" name="product_id" placeholder="Product ID">
                    <span class="shadow-input1"></span>
                </div>
                <div class="wrap-input1 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                    <input class="input1" type="text" name="customer_id" placeholder="customer_id">
                    <span class="shadow-input1"></span>
                </div>
                 <div class="wrap-input1 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                    <input class="input1" type="text" name="comp_id" placeholder="Company ID">
                    <span class="shadow-input1"></span>
                </div>





                <div class="container-contact1-form-btn">
                    <button class="contact1-form-btn">
                        <span>
                            ADD ORDER
                            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        </span>
                    </button>
                </div>
            </form>
            <form method="post" action="showorder.php" class="contact1-form validate-form">
                <div class="container-contact1-form-btn">
                    <button class="contact1-form-btn">
                        <span>
                            DELETE/EDIT
                            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>