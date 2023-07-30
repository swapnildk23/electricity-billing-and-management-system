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
        <script>
            function printDiv(data) {
                var printContents = document.getElementById('data').innerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;
            }
        </script>
        <div id = "data">
            <br><br>
            
            <h3 style="font-family: Arial, Helvetica, sans-serif;">BANGALORE ELECTRICITY COMPANY</h3><br><br>
            <h4 style="font-family: Arial, Helvetica, sans-serif;">PAYMENT RECEIPT</h4><br><br>
            Name:<?php echo $_SESSION['name'];?>
            <br><br>
            <?php
                $amount=$_SESSION['amt'];
                $rrno=$_SESSION['rr'];
                $billno=$_SESSION['billno'];
                $update = "UPDATE TOTAL_AMT SET STATUS='PAID' WHERE RR_NO=$rrno AND BILL_NO=$billno;";
                $res=mysqli_query($con,$update);
                $forrecno = "SELECT MAX(RECEPIT_NO) FROM PAY_CASH";
                $result1 = mysqli_query($con,$forrecno);
                $row = mysqli_fetch_assoc($result1);
                $latestrecno = $row['MAX(RECEPIT_NO)'];
                $latestrecno = $latestrecno + 1;
                $insert="INSERT INTO PAY_CASH VALUES($rrno,$latestrecno,$billno,'CASH',$amount,CURRENT_DATE());";
                $result2=mysqli_query($con,$insert);
                $display="SELECT * FROM PAY_CASH WHERE BILL_NO=$billno AND RR_NO=$rrno";
                $result3=mysqli_query($con,$display);
                $values=mysqli_fetch_assoc($result3);
                $_SESSION['recno']=$values['RECEPIT_NO'];
                $_SESSION['date']=$values['RECEPIT_DATE'];               
                
            ?>
            Consumer_ID:<?php echo $_SESSION['cid'];?><br><br>
            RR_Number:<?php echo $_SESSION['rr'];?><br><br>
            Tariff Code:<?php echo $_SESSION['tfc'];?><br><br>
            Address:<p7><?php echo $_SESSION['address'];?></p7><br><br>
            Subdivision Code:<?php echo $_SESSION['scode'];?><br><br>
            Receipt Number:<?php echo $_SESSION['recno'];?><br><br>
            Receipt Date:<?php echo $_SESSION['date'];?><br><br>
            Bill Number:<?php echo $_SESSION['billno'];?><br><br>
            PMT Mode: CASH<br><br>
            Paid Amt:Rs.<?php echo $_SESSION['amt'];?>
         
            
             <br><br><br>
             <br><br>

             <CENTER><button type="button" onclick="printDiv(data)"><span></span>&nbsp;Print receipt</button>
             <a href="generate.php"><button class="my-button">Back</button></a>
        </div>
        
        
    </body>
    <?php
    }
    ?>
</html>