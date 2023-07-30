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
      <meta name="viewport" content="width=device-width,initial-scale=1.0">
     <link rel="stylesheet" href="cash.css">
    </head>
    <body>
    <h1 style="text-align: center;color: white;
    font-family: Arial, Helvetica, sans-serif;
    text-decoration: bold;"> Bengaluru Electricity Board</h1>
        <br><br><br><br><br>
        <div>
            <br><br>
            
            <h3 style="font-family: Arial, Helvetica, sans-serif;">BANGALORE ELECTRICITY COMPANY</h3><br><br><br><br>
            Name:<?php echo $_SESSION['name'];?>
            <br><br>
            Consumer_ID:<?php echo $_SESSION['cid'];?><br><br>
            RR_Number:<?php echo $_SESSION['rr'];?><br><br>
            Tariff Code:<?php echo $_SESSION['tfc'];?><br><br>
            Address:<p7><?php echo $_SESSION['address'];?></p7><br><br>
            Subdivision Code:<?php echo $_SESSION['scode'];?><br><br>
            Bill Number:<?php echo $_SESSION['billno'];?><br><br>
            PMT Mode: CASH<br><br>
            Paid Amt:Rs.<?php echo $_SESSION['amt'];?>
            
             <br><br><br>
             <br><br>

             <a href="payconfirm.php"> <button class="my-button">Payment Confirm</button></a>
             <a href="generate.php"><button class="my-button">Back</button></a>
        </div>
    </body>
    <?php
    }
    ?>
</html>