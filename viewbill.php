<?php
    session_start();
    $con = mysqli_connect("localhost","root","","electricity",);
    if (!$con){
        die("connection failed");
    }
    else{
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
        <h3 style="font-family: Arial, Helvetica, sans-serif;">BANGALORE ELECTRICITY COMPANY</h3><br><br>
            <h4 style="font-family: Arial, Helvetica, sans-serif;"> ELECTRICITY BILL</h4><br><br>
            <?php
                $rrno=$_SESSION['rrnum'];
                $query="SELECT * FROM TOTAL_AMT T WHERE T.RR_NO='$rrno' AND T.STATUS='UNPAID';";
                $result1=mysqli_query($con,$query);
                $rows=mysqli_fetch_assoc($result1);
                if (mysqli_num_rows($result1)) {
                $_SESSION['net'] = $rows['NET_AMT'];
                $_SESSION['bdate'] = $rows['BILL_DATE'];
                $_SESSION['ddate'] = $rows['DUE_DATE'];
                $_SESSION['bno'] = $rows['BILL_NO'];
                $_SESSION['stat'] = $rows['STATUS'];
                
                    

            ?>
        Name:<?php echo $_SESSION['name'];?>
            <br><br>
            Consumer ID:<?php echo $_SESSION['cid'];?><br><br>
            RR Number:<?php echo $_SESSION['rrnum'];?><br><br>
            Tariff Code:<?php echo $_SESSION['tfc'];?><br><br>
            Address:<p7><?php echo $_SESSION['address'];?></p7><br><br>
          
            Bill number: <?php echo $_SESSION['bno'];  ?><br><br>
            Bill Date:<?php echo $_SESSION['bdate'];?><br><br>
            Due Date:<?php echo $_SESSION['ddate'];?><br><br>
            Net Amount:Rs.<?php echo $_SESSION['net'];?><br><br>
            Status:<?php echo $_SESSION['stat'];?>
             <br><br>
             <a href="billpayment.php"> <button class="my-button">Pay</button></a>
             
            <?php
                }
                else {
                    ?><h4><?php echo "No pending Bills";
                    
                }?></h4>
             
                    
             <a href="customer.php"><button class="my-button">Back</button></a>
                
        </div>
    </body>
    <?php }
    ?>
</html>