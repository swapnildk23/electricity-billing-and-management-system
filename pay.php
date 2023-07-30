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
    <script>
            function printDiv(data) {
                var printContents = document.getElementById('data').innerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;
            }
        </script>
    <h1 style="text-align: center;color: white;
    font-family: Arial, Helvetica, sans-serif;
    text-decoration: bold;"> Bengaluru Electricity Board</h1>
        <br><br><br><br><br>
        <div id="data">
            <br><br>    
        <?php
        $rrno=$_SESSION['rr'];
        $amt=$_SESSION['net'];
        $bill=$_SESSION['bno'];
        $update = "UPDATE TOTAL_AMT SET STATUS='PAID' WHERE RR_NO=$rrno AND BILL_NO=$bill;";
        $res=mysqli_query($con,$update);
        $query2="SELECT MAX(TRANSACTION_ID) FROM PAY_ONLINE;";
        $result1 = mysqli_query($con,$query2);
        $row = mysqli_fetch_assoc($result1);
        $latesttid = $row['MAX(TRANSACTION_ID)'];
        $latesttid = $latesttid + 1;
        $insert="INSERT INTO PAY_ONLINE VALUES ($rrno,$bill,CURRENT_DATE(),'UPI',$latesttid,'SUCCESS');";
        $result2=mysqli_query($con,$insert);
        ?>
        <h4 style="font-family: Arial, Helvetica, sans-serif;"> PAYMENT RECEIPT</h4><br><br> 
        RR Number:<?php echo $rrno;?><br><br>
        Bill Number:<?php echo $bill;?><br><br>
        Transaction ID:<?php echo $latesttid;?><br><br>
        Amount :<?php echo $amt;?><br><br>
        Status :<?php echo "SUCCESS"?><br><br>
        

             <br><br><br>
             <br><br>

             <CENTER><button type="button" class="my-button" onclick="printDiv(data)"><span></span>&nbsp;Print receipt</button>
             <a href="customer.php"><button class="my-button">Back</button></a>
        </div>
        
    </body>
    <?php
    }
    ?>
</html>