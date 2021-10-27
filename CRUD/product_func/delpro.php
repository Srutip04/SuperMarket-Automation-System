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

        $stmt = $pdo->prepare("SELECT products.product_name,products.qty,products.cp,products.sp,products.mfg_date,products.supplier_id,product_id FROM products  INNER JOIN `supplier` ON products.supplier_id=supplier.supplier_id WHERE product_id = :cip");
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
				<img src="images/sell-products.png" alt="IMG">
			</div>

			<form method = "post"  class="contact1-form validate-form">
				<span class="contact1-form-title">
					CONFIRM DELETION
				</span>
                <input type="hidden" name="product_id" value="<?= $row['product_id'] ?>">
                
                <div class="wrap-input1">
                    <label for="name">PRODUCT NAME</label>
					<input class="input1" type="text" id="name" name="product_name" value="<?= $row['product_name'] ?>">
                    <span class="shadow-input1"></span>
                </div>
                <div class="wrap-input1">
                    <label for="qty"><span>QUANTITY</span></label>
					<input class="input1" type="text" id="qty" name="qty" value="<?= $row['qty'] ?>">
                    <span class="shadow-input1"></span>
                </div>
                <div class="wrap-input1">
                    <label for="cp">COST PRICE</label>
					<input class="input1" type="text" id="cp" name="price" value="<?= $row['cp'] ?>">
                    <span class="shadow-input1"></span>
                </div>
                <div class="wrap-input1">
                    <label for="sp">SELLING PRICE</label>
					<input class="input1" type="text" id="sp" name="price" value="<?= $row['sp'] ?>">
                    <span class="shadow-input1"></span>
                </div>
                <div class="wrap-input1">
                    <label for="date">Mfg_Date</label>
					<input class="input1" type="text" id="date" name="mfg_date" value="<?= $row['mfg_date'] ?>">
                    <span class="shadow-input1"></span>
                </div>
                <div class="wrap-input1">
                    <label for="sup">SUPPLIER ID</label>
					<input class="input1" type="text" name="supplier_id" id="sup" value="<?= $row['supplier_id'] ?>">
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
    <script src="main.js"></script>
    </body>
</html>