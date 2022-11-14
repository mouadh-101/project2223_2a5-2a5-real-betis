<?php
  include 'connect.php';
  if(isset($_POST['submit'])){
    $user_id=$_POST['user_id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $number=$_POST['number'];  
    $message=$_POST['message'];  
    $sql="insert into 'crud' (user_id,name,email,number,message)
    values('$user_id,'$name','$email','$number','$message')";
    $result=mysqli_query($con,$sql);
    if($result){
      echo "Data inserted successfully";

    }else{
      die(mysqli_error($con));
    }


  }

  
?>
<!DOCTYPE html>
<html>

<head>
  <title>form</title>

  <head>

  <body>
    <h1>reclammation</h1>
    <br>
    <br>
      <br>      <label>id :</label>

        <br>
        <input type="number" placeholder="id" required id="user_id"></input>

        <br>    <label>nom :</label> <br>
       
        <form method="get">
        <input type="text" placeholder="Nom" required name="name"></input>
        <br>


        <br>
      <label>Email :</label>
      <input type="email" name="email" placeholder="Type your email">
      
      <br>
      <br>

      <br>
      <label>number :</label>
      <input type="number" name="number" placeholder="Type your phone number">
      
      <br>
    <
      <br>
      <label>reclammation :</label>
      <input type="text" name="message" placeholder="Type your reclammation">
      
      <br>
   
      
        
        <br>
        <br>
        <input type="submit" name="submit">
</body>
</html>