<?php
    require_once "pdo.php";
    session_start();


    
        if (isset($_POST['product_id']) && isset($_POST['product_name']) && isset($_POST['unit']) && isset($_POST['price']) && isset($_POST['mfg_date']) && isset($_POST['comp_id'])) {
            $stmt = $pdo->prepare("UPDATE `products` SET product_name =:product_name,unit = :unit,price = :price,mfg_date=:mfg_date,comp_id=:comp_id WHERE product_id = :cid");
            $stmt->execute(array(':product_name' => $_POST['product_name'],':unit' => $_POST['unit'],':price' => $_POST['price'],':mfg_date' => $_POST['mfg_date'],':comp_id' => $_POST['comp_id'],':cid' =>$_POST['product_id']));
            $_SESSION['success'] = 'Record Edited';
            header('Location: showpro.php');
            return;
        }

        $stmt = $pdo->prepare("SELECT product_id,products.product_name,products.unit,products.price,products.mfg_date,company.comp_name,products.comp_id FROM `products` JOIN `company` ON products.comp_id = company.comp_id WHERE product_id = :cip");
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
        <div class="contact1">
		<div class="container-contact1">
			<div class="contact1-pic js-tilt" data-tilt>
				<img src="images/distributor.png" alt="IMG">
			</div>

            <form method = "post" action="editpro.php" class="contact1-form validate-form">
				<span class="contact1-form-title">
					EDIT
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
                <input style = "background-color : rgba(0,0,0,0)" type="submit" value="Edit" name="edit">
                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                </span>
                </button>
                </div>
			</form>
		</div>
	</div>

    </body>
</html>