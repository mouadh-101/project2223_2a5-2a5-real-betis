<?php
   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
?>

<header class="header">


   <section class="flex">


   <a href="home.php"><img src="images/logo.png" width="100px" alt=""></a>
   <nav class="navbar">
      
         <a href="home.php">home</a>
         <a href="about.php">about</a>
         <a href="orders.php">orders</a>
         <a href="shop.php">shop</a>
         <a href="reclamtions.php">Reclamations</a>
      </nav>
   </section>

</header>