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
        <br><br><br><br><br>
        <div class='f1'>
            
            
            Name:<?php echo $_SESSION['name'];?>
            <br><br>
            Consumer_ID:<?php echo $_SESSION['cid'];?><br><br>
            RR_Number:<?php echo $_SESSION['rr'];?><br><br>
            Tariff Code:<?php echo $_SESSION['tfc'];?><br><br>
            Address:<p7><?php echo $_SESSION['address'];?></p7><br><br>
            Email ID:<?php echo $_SESSION['$mail'];?><br><br>
            
            <?php 
            $rr3=$_SESSION['rr'];
             $query = "SELECT * FROM INVOICE WHERE RR_NO=$rr3;";
             $queryresult=mysqli_query($con,$query);
             $rows=mysqli_fetch_assoc($queryresult);
             $_SESSION['prev']=$rows['PREST_READING'];
             ?>
             Previous Reading:<?php echo $_SESSION['prev'];?>
            <form action="bill.php" method="post">
             <input type="number" id="units" name="pres" placeholder="Enter PRESENT Reading">
            <button class="my-button" type="submit">Calculate</button>
            </form>
             <a href="generate.php"><button class="my-button">Back</button></a>

        </div>
    </body>
    <?php }
    ?>
</html>