<?php
    
    $con = mysqli_connect("localhost","root","","electricity");
    if (!$con){
        die("connection failed");
    }
    else{
?>
<?php
  session_start();
  ?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width,initial-scale=1.0">
      <link rel="stylesheet" href="generate.css">
   </head>
  <body>
    <br><br><br><br><br><br><br>
    <div>
        <br><br><br><br>
        
      
        Welcome,Agent <?php echo $_SESSION['agent'] ?>
        <a href="search.php"> <button class="my-button">Generate Bill</button></a>
        <a href="search2.php"><button class="my-button">Pay</button></a>
        <a href="home.php"><button class="my-button">Logout</button></a>
      </div>
      
  </body>
  <?php }
    ?>
</html>