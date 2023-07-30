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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <link href="billpayment.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="wrapper">
        <h2><u>Online Payment</u></h2>
        <form method="POST">    
            <div class="input-group">
                <div class="input-box">
                   <h4> Amount to be paid:  </h4>
                   <h4> <?php
                    echo "Rs.";echo $_SESSION['net'];?></h4>
                    <br><br><br>
                </div>
            </div>
           
            <div class="input-group">
                <div class="input-box">
                    
                <button class="my-button"><a href="pay.php">PAY NOW</button></a>
                </div>
            </div>
        </form>
    </div>
</body>
<?php }
    ?>

</html>