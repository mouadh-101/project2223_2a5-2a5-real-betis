<?php

include 'components/connect.php';

session_start();


if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:user_login.php');
};

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['pay'])){

    $name = $_POST['name'];
    $card = $_POST['CN'];
    $cvv = $_POST['CVC'];
    $date = $_POST['cpass'];
    $coins=$_POST['inputfly'];
    $insert_coin = $conn->prepare("INSERT INTO `transaction`(user_id, name, card, cvv,date,coins) VALUES(?,?,?,?,?,?)");
    $insert_coin->execute([$user_id, $name, $card, $cvv,$date, $coins]);
    $message[] = 'Transaction successfully!';
    
 }
 

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css?<?php echo time(); ?>">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="form-container">

   <form action="" method="post">
      
        <p> 
            <input name="inputfly"id="inputfly" type="number" placeholder="Amount you want to buy"
             oninput="coinsConverter(this.value)" onchange="coinsConverter(this.value)" class="box">
        </p>
        <p>Dollar: <br><span id="outputCoins"></span></p>
      <h3>Payment information</h3>
      <input type="text" name="name" required placeholder="enter your name" maxlength="20"  class="box">
      <input type="card" name="CN" required placeholder="card number" maxlength="99999999999999999"  class="box">
      <input type="password" name="CVC" required placeholder="CVV" maxlength="999"  class="box">
      <h1>Expiration Date</h1>
      <input type="date" name="cpass" required placeholder="confirm your password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" name="pay" class="btn " value="Pay">
      
      
   </form>

</section>
<script>
        function coinsConverter(valNum) {
            document.getElementById("outputCoins").innerHTML = valNum/100 ;
        }
</script>












<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>