<?php
require_once 'pdo.php';
session_start();

if (isset($_POST['name']) && isset($_POST['phn'])) {
    $stmt = $pdo->prepare("INSERT INTO `supplier` (name,phn) VALUES(:name,:phn)");
    $stmt->execute(array(':name' => $_POST['name'], ':phn' => $_POST['phn']));
    $_SESSION['success'] = 'Record Added';
    header("Location: showsupp.php");
    return;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Supplier</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/util.css">
</head>

<body>
    <div class="contact1">
        <div class="container-contact1">
            <div class="contact1-pic js-tilt" data-tilt>
                <img src="images/suppliers-png-11553367919th2abyyrif.png" alt="IMG">
            </div>

            <form method="post" action="suppadd.php" class="contact1-form validate-form">
                <span class="contact1-form-title">
                    SUPPLIER FUNCTIONS
                </span>

                <div class="wrap-input1 validate-input" data-validate="Name is required">
                    <input class="input1" type="text" name="name" placeholder="Name">
                    <span class="shadow-input1"></span>
                </div>

                <div class="wrap-input1 validate-input" data-validate="Required">
                    <input class="input1" type="text" name="phn" placeholder="Phone no.">
                    <span class="shadow-input1"></span>
                </div>




                <div class="container-contact1-form-btn">
                    <button class="contact1-form-btn">
                        <span>
                            ADD SUPPLIER
                            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        </span>
                    </button>
                </div>
            </form>
            <form method="post" action="showsupp.php" class="contact1-form validate-form">
                <div class="container-contact1-form-btn">
                    <button class="contact1-form-btn">
                         <a href="http://localhost/supplychain/CRUD/supp_func/view.php">
                        <span>
                            VIEW
                            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        </span>
                         </a>
                    </button>
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
</html>