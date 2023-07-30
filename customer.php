<?php
$con = mysqli_connect("localhost","root","","electricity");
session_start();
if (!$con){
    die("connection failed");
}
else{
  ?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width,initial-scale=1.0">
<link rel="stylesheet" href="search.css">
        <title>Customer Portal</title>
      
    </head>
    <body>
        <br>
        <br><br>
        <h1 style="text-align: center;color: white;font-family: Arial, Helvetica, sans-serif;text-decoration: bold;"> Bengaluru Electricity Board</h1>
        
        <br><br><br><br><br>
        <div>  Welcome Customer:
        <?php echo $_SESSION['cust'];?><br><br>
        <h4>Customer Options</h4>
        <a href="viewbill.php">
          <img src="view.png" alt="My icon" style="margin-right: 200px;" title="View Bill" width="105" height="105" style="margin-left: 100px;">
            </a><br><br><br>
            
            <a href="viewtransactions.php">
              <img src="transaction.png" style="margin-left: 150px;margin-top:-60px;"alt="My icon" title="Transactions" width="105" height="105" style="margin-left: 100px;">
            </a>
        
          <a href="Feedback.php">
            <img src="feedback.png" alt="My icon" style="margin-right: 100px;" title="Feedback" width="105" height="105" style="margin-left: 100px;">
          </a>
          <a href="home.php"><button class="my-button" style="font-family: monospace;font-size: 0.8rem;color: #FAFAFA;text-transform: uppercase;padding: 10px 20px;border-radius: 10px;border: 2px solid #FAFAFA;background:blue;box-shadow: 3px 3px red;cursor: pointer;margin: 35px 0;margin-left: 5px;">Logout</button></a>
        </div>
</body>
<?php
}
?>
</html>