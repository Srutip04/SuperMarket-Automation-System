<?php
    require_once "pdo.php";
    session_start();


    
    if(isset($_POST['customer_id']) && isset($_POST['Name']) && isset($_POST['PhnNo']))
        {
            $stmt = $pdo->prepare("UPDATE `customer` SET Name = :Name,PhnNo = :PhnNo WHERE customer_id = :cid");
            $stmt->execute(array(':Name' => $_POST['Name'],':PhnNo' => $_POST['PhnNo'],':cid' => $_POST['customer_id']));
            $_SESSION['success'] = 'Record Edited';
            header('Location:showcust.php');
            return;
        }

     // Guardian: Make sure that customer_id is present
    if (!isset($_GET['customer_id'])) {
    $_SESSION['error'] = "Missing customer_id";
    header('Location: showcust.php');
    return;
    }


        $stmt = $pdo->prepare("SELECT customer.Name,customer.PhnNo,customer_id FROM `customer` WHERE customer_id = :cip");
        $stmt->execute(array(':cip' => $_GET['customer_id']));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ( $row === false ) {
            $_SESSION['error'] = 'Bad value for customer_id';
            header( 'Location: showcust.php' ) ;
            return;
        }
?>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/util.css">
    </head>
    <body>
        <div class="contact1">
		<div class="container-contact1">
			<div class="contact1-pic js-tilt" data-tilt>
				<img src="images/distributor.png" alt="IMG">
			</div>

			<form method = "post" class="contact1-form validate-form">
				<span class="contact1-form-title">
					EDIT
				</span>
                <input type="hidden" name="customer_id" value="<?= $row['customer_id']?>">
                
                <div class="wrap-input1">
					<input class="input1" type="text" name="Name" value="<?= $row['Name']?>">
                    <span class="shadow-input1"></span>
                </div>
                <div class="wrap-input1">
					<input class="input1" type="text" name="PhnNo" value="<?= $row['PhnNo']?>">
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
