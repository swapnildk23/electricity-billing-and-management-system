<?php
    session_start();
    $con = mysqli_connect("localhost","root","","electricity");
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
      <link href="view.css" rel="stylesheet">
      <title>Transaction History</title>
       
    </head>
        <body>
            <br><br><br><br><br>
            <div>
            <h3 style="font-family: Arial, Helvetica, sans-serif;">BANGALORE ELECTRICITY COMPANY</h3>
                <h4>Payment History</h4>
    <table style="border:1px solid black;width:600px; width: 100%;
      height: 20%;margin-left:auto; margin-right:auto;">
    <tr bgcolor="aqua"  > 
        <th >RR Number</th>
        <th>Name</th>
        <th >Bill No</th>
        <th style="width:200px">Pay Date</th>
        <th>Mode</th>
        <th>Transaction ID</th>
        <th>Status</th>
        
    </tr>
    
    <?php
        $rrnum = $_SESSION['rrnum'];
        $queryview = "SELECT C.C_NAME,C.RR_NO,P.BILL_NO,P.PREST_DATE,P.PMT_MODE,P.TRANSACTION_ID,P.STATUS FROM CONSUMER C JOIN PAY_ONLINE P ON C.RR_NO=P.RR_NO WHERE C.RR_NO=$rrnum;";
        $resultview = mysqli_query($con,$queryview);
        $num = mysqli_num_rows($resultview);
        while($row = mysqli_fetch_assoc($resultview)) {
            
        ?><tr><td><?php echo $row['RR_NO']?></td>
        <td><?php echo $row['C_NAME']?></td>
        <td ><?php echo $row['BILL_NO']?></td>
        <td ><?php echo $row['PREST_DATE']?></td>
        <td><?php echo $row['PMT_MODE']?></td>
        <td><?php echo $row['TRANSACTION_ID']?></td>
        <td><?php echo $row['STATUS']?></td></tr>
         <?php   
        }
}
?>
</table>
<br><br>
       


<a href="customer.php"><button  class="my-button">Back</button></a>
</div>

</body>
</html>