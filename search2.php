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
      <link href="search1.css" rel="stylesheet">
      <title>Search</title>
    </head>
        <body>
            <br><br><br><br><br>
            <div class="body">
                <br><br>
            <form class="form" action="" method="post">
        <button type="submit">
            <svg width="17" height="16" fill="none" xmlns="http://www.w3.org/2000/svg" role="img" aria-labelledby="search">
            <path d="M7.667 12.667A5.333 5.333 0 107.667 2a5.333 5.333 0 000 10.667zM14.334 14l-2.9-2.9" stroke="currentColor" stroke-width="1.333" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </button>
    <input class="input" name="rrno1" placeholder="Enter RR Number" required="" type="text">
    <?php
    if(isset($_POST['rrno1'])){
        $rrno = $_POST['rrno1'];
    $sql2 = "SELECT C.CONS_ID,C.C_NAME,C.TF_CODE,C.C_ADDRESS,C.RR_NO,C.SUB_CODE,T.BILL_NO,T.NET_AMT,T.STATUS FROM CONSUMER C,TOTAL_AMT T WHERE C.RR_NO=T.RR_NO AND C.RR_NO='$rrno' AND T.STATUS='UNPAID'";
    $result = mysqli_query($con,$sql2);
    if(mysqli_num_rows($result)) {
         $row = mysqli_fetch_assoc($result);
         $_SESSION['cid'] = $row['CONS_ID'];
         $_SESSION['name'] = $row['C_NAME'];
         $_SESSION['tfc'] = $row['TF_CODE'];
         $_SESSION['address'] = $row['C_ADDRESS'];
         $_SESSION['rr'] = $row['RR_NO'];
         $_SESSION['scode'] = $row['SUB_CODE'];
         $_SESSION['billno'] = $row['BILL_NO'];
         $_SESSION['amt'] = $row['NET_AMT'];
         if($row['STATUS']=='UNPAID'){
         $redirect_page='cash.php';
         header("Location:$redirect_page");
         }
         else{
            ?><h4 style ="margin-top:160px; margin-left:-50px; white-space:nowrap;"> <?php echo nl2br ("No Pending Bills for Consumer \nwith RRNumber:   ");
            echo $_SESSION['rr'];
         }?></h4><?php
         
 }
 else{
    ?><h4  style ="margin-top:120px; margin-left:-50px; color:red; white-space:nowrap;"><?php echo'*Invalid RR Number:',$rrno;?><?php echo "*"?></h4><?php

}
}
}
?>
    <button class="reset" type="reset">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </button>
</form>
<br><br><br><br>
<br><br><br>
<a href="generate.php"><button class="my-button">Back</button></a>
</div>
</body>

</html>