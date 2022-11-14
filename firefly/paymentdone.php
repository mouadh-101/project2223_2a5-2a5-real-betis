<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   

   

   

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
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<section class="form-container">

   <form action="" method="post">
    <br>
      <h3>Payment done</h3>
      <br>
      
   </form>

</section>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>



<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>