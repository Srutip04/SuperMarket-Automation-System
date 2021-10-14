<?php
    require_once "pdo.php";
    session_start();


    
    if(isset($_POST['product_id']))
        {
            $stmt = $pdo->prepare("DELETE FROM `products` WHERE product_id = :cid");
            $stmt->execute(array(':cid' => $_POST['product_id']));
            $_SESSION['success'] = 'Record Deleted';
            header('Location:showpro.php');
            return;
        }

        $stmt = $pdo->prepare("SELECT product_id,products.product_name,products.unit,products.price,products.mfg_date,products.comp_id FROM `products` JOIN `company` ON products.comp_id = company.comp_id WHERE product_id = :cip");
        $stmt->execute(array(':cip' => $_GET['product_id']));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ( $row === false ) {
            $_SESSION['error'] = 'Bad value for product_id';
            header( 'Location: showpro.php' ) ;
            return;
        }


?>
<html>
    <head>
        <title>Products</title>
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/util.css">
    </head>
    <body>
        <?php $row['product_name'] ?>
	<div class="contact1">
		<div class="container-contact1">
			<div class="contact1-pic js-tilt" data-tilt>
				<img src="images/distributor.png" alt="IMG">
			</div>

			<form method = "post"  class="contact1-form validate-form">
				<span class="contact1-form-title">
					CONFIRM DELETION
				</span>
                <input type="hidden" name="product_id" value="<?= $row['product_id'] ?>">
                
                <div class="wrap-input1">
					<input class="input1" type="text" name="product_name" value="<?= $row['product_name'] ?>">
                    <span class="shadow-input1"></span>
                </div>
                <div class="wrap-input1">
					<input class="input1" type="text" name="unit" value="<?= $row['unit'] ?>">
                    <span class="shadow-input1"></span>
                </div>
                <div class="wrap-input1">
					<input class="input1" type="text" name="price" value="<?= $row['price'] ?>">
                    <span class="shadow-input1"></span>
                </div>
                <div class="wrap-input1">
					<input class="input1" type="text" name="mfg_date" value="<?= $row['mfg_date'] ?>">
                    <span class="shadow-input1"></span>
                </div>
                <div class="wrap-input1">
					<input class="input1" type="text" name="comp_id" value="<?= $row['comp_id'] ?>">
                    <span class="shadow-input1"></span>
                </div>

                <div class="container-contact1-form-btn">
                <button class="contact1-form-btn">
                <span >
                <input style = "background-color : rgba(0,0,0,0)" type="submit" value="Delete" name="delete">
                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                </span>
                </button>
                </div>
			</form>
		</div>
	</div>
    </body>
</html>