<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
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
        <script>
            function printDiv(data) {
                var printContents = document.getElementById('data').innerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;
            }
        </script>
        <br><br><br><br><br>
        <div class='f1' id="data">
            <?php
            $bill = 0; 
            $total = 0;
            
            $fix = 0;
            $mailid = $_SESSION['$mail'];
            $rr2 = $_SESSION['rr'];
            $present=$_POST['pres'];
            $sqlquery = "SELECT * FROM INVOICE WHERE `invoice`.`RR_NO` = $rr2 ";
            $sqlresult = mysqli_query($con,$sqlquery);
            $sqlrow = mysqli_fetch_assoc($sqlresult);
            $_SESSION['previ'] = $sqlrow['PREST_READING'];
            $previous = $_SESSION['previ'];
            $updatequery = "UPDATE INVOICE SET PREV_READING = PREST_READING WHERE RR_NO = $rr2 ";
            $updateresult = mysqli_query($con,$updatequery);
            $updatequery2 = "UPDATE INVOICE SET PREST_READING = $present WHERE RR_NO = $rr2 ";
            $updateresult2 = mysqli_query($con,$updatequery2);
            $disco = $_SESSION['disc'];
            $uni = $present - $previous;
            $name = $_SESSION['name'];
            $cid = $_SESSION['cid'];
            $address = $_SESSION['address'];
            $tfccode = $_SESSION['tfc'];
            $insert = "UPDATE `invoice` SET `CONS_UNITS` = $uni WHERE `invoice`.`RR_NO` = $rr2 ";
            $result = mysqli_query($con,$insert);
            

            ?>
            <h3 style="font-family: Arial, Helvetica, sans-serif;">BANGALORE ELECTRICITY COMPANY</h3><br><br>
            <h4 style="font-family: Arial, Helvetica, sans-serif;"> ELECTRICITY BILL</h4><br><br>
            <CENTER>Name:<?php echo $_SESSION['name'];?>
            <br><br>
            Consumer_ID:<?php echo $_SESSION['cid'];?><br><br>
            RR_Number:<?php echo $_SESSION['rr'];?><br><br>
            Tariff Code:<?php echo $tfccode;?><br><br>
            Address:<p7><?php echo $_SESSION['address'];?></p7><br><br>
            Previous Reading:<?php echo $previous;?><br><br>
            Present Reading:<?php echo $present;?><br><br>
            Units Consumed:<?php echo $uni; ?><br><br>
            Email ID:<?php echo $_SESSION['$mail'];?><br><br>
            <?php 
            if($tfccode == 'LT-2(a)(i)'){
                $fix = 100;
                if($uni <= 30){
                    $bill = $uni*4.1 ;
                }
                elseif($uni <= 100) {
                    $bill = 30*4.1+($uni-30)*5.5;
                }   
                elseif ($uni <= 200) {
                    $bill = 30*4.1+70*5.5+($uni-100)*7.1;
                }
                else {
                    $bill = 30*4.1+70*5.5+100*7.1+($uni-200)*8.15;
                }
                $bill = $bill+$fix;
            }
            elseif($tfccode == 'LT-2(a)(ii)'){
                $fix = 100;
                if($uni <= 50){
                    $bill = $uni*4 ;
                }
                elseif($uni <= 100) {
                    $bill = 50*4+($uni-50)*5.25;
                }   
                elseif ($uni <= 200) {
                    $bill = 50*4+50*5.25+($uni-100)*6.80;
                }
                else {
                    $bill = 50*4+50*5.25+100*6.80+($uni-200)*8.15;
                }
                $bill = $bill+$fix;
            }
            elseif($tfccode =='HT-4'){
                $fix = 155;
                $bill = $uni*7.05;
            }
            elseif($tfccode == 'LT-3(ii)'){
                $fix = 200;
                if($uni <= 50){
                    $bill = $uni*7.85 ;
                }
                else{
                    $bill = 50*7.85+($uni-50*8.85) ;
                }
                $bill = $bill+$fix;
            }
            elseif($tfccode =='HT-2(a)(ii)'){
                $fix = 250;
                if($uni <= 1000){
                    $bill = $uni*7.35 ;
                }
                else{
                    $bill = 1000*7.35+($uni-1000*7.75) ;
                }
            }
            else{
                $fix = 155;
                if($uni <= 200){
                    $bill = $uni*7.3 ;
                }
                else{
                    $bill = 200*7.3+($uni-200*8.5) ;
                }

            }
            $total = $bill-$disco; 
            ?>
            <?php
            $forbillno = "SELECT MAX(BILL_NO) FROM `total_amt`";
            $result1 = mysqli_query($con,$forbillno);
            $row = mysqli_fetch_assoc($result1);
            $latestbillno = $row['MAX(BILL_NO)'];
            $latestbillno = $latestbillno + 1;
            $curdate = date_create(date("Y-m-d"));
            $duedate1 = date_add($curdate,date_interval_create_from_date_string("16 days"));
            $duedate = date_format($duedate1,"Y-m-d");
            $insert1 = "INSERT INTO TOTAL_AMT VALUES($rr2,CURRENT_DATE(),$latestbillno,$bill,0,$total,'$duedate','UNPAID')";
            $result3 = mysqli_query($con,$insert1);
            ?>
            Bill Number:<?php echo $latestbillno;?><br><br>
            Bill Amount:<?php echo $bill;?><br><br>
            Discount:<?php echo $disco;?><br><br>
            Net Amount:<?php echo $total;?><br><br>
             <br><br>
        <?php
        
        
        require 'phpmailer/src/Exception.php';
        require 'phpmailer/src/PHPMailer.php';
        require 'phpmailer/src/SMTP.php';
        
        $mail = new PHPMailer(true);
        
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = '';//sender email id
        $mail->Password = '';// sender password
        $mail->SMTPSecure = '';//smtp secure
        $mail->Port = 465 ;//port number
        $mail->setFrom('');//sender email address
        $mail->addAddress('');//recipient email address
        $mail->isHTML(true);
        $mail->Subject = "Electricity Bill";
        $mail->Body ="<br>
        <h3>BANGALORE ELECTRICITY COMPANY</h3><br><br>
            <h4> ELECTRICITY BILL</h4><br><br>
        Name: $name
        <br><br>
        Consumer_ID: $cid<br><br>
        RR_Number: $rr2<br><br>
        Tariff Code: $tfccode<br><br>
        Address:$address<br><br>
        Previous Reading: $previous<br><br>
        Present Reading: $present<br><br>
        Units Consumed: $uni<br><br>
        Email ID: $mailid <br><br>
        Bill Number: $latestbillno<br><br>
        Bill Amount: $bill<br><br>
        Discount: $disco<br><br>
        Net Amount: $total<br><br>
        ";
        $mail->send();
        echo"
        <script>
        alert('Mail Sent' );
        </script>";
        ?>
        <CENTER><button class="my-button" type="button" onclick="printDiv(data)"><span></span>&nbsp;Print Bill</button>
        <a href="generate.php"><button class="my-button">Back</button>
        </div>
        
    </body>
    <?php }
    ?>
</html>