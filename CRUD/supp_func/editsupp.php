<?php
    require_once "pdo.php";
    session_start();


    
    if(isset($_POST['supplier_id']) && isset($_POST['name']) && isset($_POST['phn']))
        {
            $stmt = $pdo->prepare("UPDATE `supplier` SET name = :name,phn = :phn WHERE supplier_id = :cid");
            $stmt->execute(array(':name' => $_POST['name'],':phn' => $_POST['phn'],':cid' => $_POST['supplier_id']));
            $_SESSION['success'] = 'Record Edited';
            header('Location:showsupp.php');
            return;
        }

     // Guardian: Make sure that user_id is present
    if (!isset($_GET['supplier_id'])) {
    $_SESSION['error'] = "Missing supplier_id";
    header('Location: showsupp.php');
    return;
    }


        $stmt = $pdo->prepare("SELECT supplier.name,supplier.phn,supplier_id FROM `supplier` WHERE supplier_id = :cip");
        $stmt->execute(array(':cip' => $_GET['supplier_id']));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ( $row === false ) {
            $_SESSION['error'] = 'Bad value for supplier_id';
            header( 'Location: showsupp.php' ) ;
            return;
        }
?>
<html>
    <head>
        <title>Supplier</title>
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/util.css">
    </head>
    <body>
        <div class="contact1">
		<div class="container-contact1">
			<div class="contact1-pic js-tilt" data-tilt>
				<img src="images/suppliers-png-11553367919th2abyyrif.png" alt="IMG">
			</div>

			<form method = "post" class="contact1-form validate-form">
				<span class="contact1-form-title">
					EDIT
				</span>
                <input type="hidden" name="supplier_id" value="<?= $row['supplier_id']?>">
                
                <div class="wrap-input1">
					<input class="input1" type="text" name="name" value="<?= $row['name']?>">
                    <span class="shadow-input1"></span>
                </div>
                <div class="wrap-input1">
					<input class="input1" type="text" name="phn" value="<?= $row['phn']?>">
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
