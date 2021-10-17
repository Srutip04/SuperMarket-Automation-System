<?php
    require_once "pdo.php";
    session_start();  
    if(isset($_POST['order_id']))
        {
            $stmt = $pdo->prepare("DELETE FROM `orders` WHERE order_id = :cid");
            $stmt->execute(array(':cid' => $_POST['order_id']));
            $_SESSION['success'] = 'Record Deleted';
            header('Location:showorder.php');
            return;
        }

        $stmt = $pdo->prepare("SELECT order_id,orders.order_date,orders.qty,orders.price,products.product_name,products.mfg_date,customer.Name,customer.PhnNo,orders.product_id,orders.customer_id FROM `orders`
        INNER JOIN `products` ON orders.product_id=products.product_id INNER JOIN `customer` ON orders.customer_id=customer.customer_id  WHERE order_id = :cip");
        $stmt->execute(array(':cip' => $_GET['order_id']));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ( $row === false ) {
            $_SESSION['error'] = 'Bad value for order_id';
            header( 'Location: showorder.php' ) ;
            return;
        }


?>
<html>
    <head>
        <title>ORDERS</title>
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/util.css">
    </head>
    <body>
        <?php $row['order_date'] ?>
        <div class="contact1">
		<div class="container-contact1">
			<div class="contact1-pic js-tilt" data-tilt>
				<img src="images/order-icon-png-22.jpg" alt="IMG">
			</div>

            <form method = "post"  class="contact1-form validate-form">
				<span class="contact1-form-title">
					DELETE
				</span>
                <input type="hidden" name="order_id" value="<?= $row['order_id'] ?>">
                
                <div class="wrap-input1">
					<input class="input1" type="text" name="order_date" value="<?= $row['order_date'] ?>">
                    <span class="shadow-input1"></span>
                </div>
                <div class="wrap-input1">
					<input class="input1" type="text" name="qty" value="<?= $row['qty'] ?>">
                    <span class="shadow-input1"></span>
                </div>
                <div class="wrap-input1">
					<input class="input1" type="text" name="price" value="<?= $row['price'] ?>">
                    <span class="shadow-input1"></span>
                </div>
                <div class="wrap-input1">
					<input class="input1" type="text" name="product_id" value="<?= $row['product_id'] ?>">
                    <span class="shadow-input1"></span>
                </div>
                <div class="wrap-input1">
					<input class="input1" type="text" name="customer_id" value="<?= $row['customer_id'] ?>">
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