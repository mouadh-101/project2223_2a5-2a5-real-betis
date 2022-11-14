<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

if(isset($_POST['update_payment'])){
   $order_id = $_POST['order_id'];
   $payment_status = $_POST['payment_status'];
   $payment_status = filter_var($payment_status, FILTER_SANITIZE_STRING);
   $update_payment = $conn->prepare("UPDATE `transaction` SET payment_status = ? WHERE id = ?");
   $update_payment->execute([$payment_status, $order_id]);
   $message[] = 'payment status updated!';
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_transaction = $conn->prepare("DELETE FROM `transaction` WHERE id = ?");
   $delete_transaction->execute([$delete_id]);
   header('location:placed_coins.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>placed orders</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php'; ?>

<section class="orders">

<h1 class="heading">placed coin orders</h1>

<div class="box-container">

   <?php
      $select_transaction = $conn->prepare("SELECT * FROM `transaction`");
      $select_transaction->execute();
      if($select_transaction->rowCount() > 0){
         while($fetch_transaction = $select_transaction->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box">
      <p> name : <span><?= $fetch_transaction['name']; ?></span> </p>
      <p> Cardnumber : <span><?= $fetch_transaction['card']; ?></span> </p>
      <p> CVV : <span><?= $fetch_transaction['cvv']; ?></span> </p>
      <p> Expiration date: <span><?= $fetch_transaction['date']; ?></span> </p>
      <p> coins : <span><?= $fetch_transaction['coins']; ?></span> </p>
      <form action="" method="post">
         <input type="hidden" name="order_id" value="<?= $fetch_orders['id']; ?>">
         <select name="payment_status" class="select">
            <option selected disabled><?= $fetch_orders['payment_status']; ?></option>
            <option value="pending">pending</option>
            <option value="completed">completed</option>
         </select>
         <div class="flex-btn">
        
        <input type="submit" value="update" class="option-btn" name="update_payment">
         <a href="placed_coins.php?delete=<?= $fetch_transaction['id']; ?>" class="delete-btn" onclick="return confirm('delete this transaction?');">delete</a>
        </div>
      </form>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">no orders placed yet!</p>';
      }
   ?>

</div>

</section>

</section>












<script src="../js/admin_script.js"></script>
   
</body>
</html>