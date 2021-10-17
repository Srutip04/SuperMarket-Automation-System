<?php
require_once 'pdo.php';
session_start();

if (isset($_POST['product_name']) && isset($_POST['unit']) && isset($_POST['price']) && isset($_POST['mfg_date']) && isset($_POST['comp_id'])) {
    $stmt = $pdo->prepare("INSERT INTO `products` (product_name,qty,price,mfg_date) VALUES(:product_name,:qty,:price,:mfg_date)");
    $stmt->execute(array(
        ':product_name' => $_POST['product_name'], 
        ':qty' => $_POST['qty'],
        ':price' => $_POST['price'],
        ':mfg_date' => $_POST['mfg_date']
    ));
    $_SESSION['success'] = 'Record Added';
    header("Location: showpro.php");
    return;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Products</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/util.css">
</head>

<body>
    <div class="contact1">
        <div class="container-contact1">
            <div class="contact1-pic js-tilt" data-tilt>
                <img src="images/sell-products.png" alt="IMG">
            </div>

            <form method="post" action="proadd.php" class="contact1-form validate-form">
                <span class="contact1-form-title">
                   PRODUCTS
                </span>

                <div class="wrap-input1 validate-input" data-validate="Name is required">
                    <input class="input1" type="text" name="product_name" placeholder="Product Name">
                    <span class="shadow-input1"></span>
                </div>

                <div class="wrap-input1 validate-input" data-validate="Required">
                    <input class="input1" type="text" name="unit" placeholder="Unit">
                    <span class="shadow-input1"></span>
                </div>
                <div class="wrap-input1 validate-input" data-validate="Required">
                    <input class="input1" type="text" name="price" placeholder="Price">
                    <span class="shadow-input1"></span>
                </div>
                 <div class="wrap-input1 validate-input" data-validate="Required">
                    <input class="input1" type="text" name="mfg_date" placeholder="Mfg Date">
                    <span class="shadow-input1"></span>
                </div>
                 





                <div class="container-contact1-form-btn">
                    <button class="contact1-form-btn">
                        <span>
                            ADD PRODUCT
                            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        </span>
                    </button>
                </div>
            </form>
            <form method="post" action="showpro.php" class="contact1-form validate-form">
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
    <script src="main.js"></script>
</body>