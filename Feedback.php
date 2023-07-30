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
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width,initial-scale=1.0">
      <link rel="stylesheet" href="Style2.css">
        <title>FeedBack</title>
        
        </head>
        <body>
          <br><br><br><br><br><br>
            <form action = "" id="searchForm" method = "post">
                
                <label for="feedback">Feedback:</label><br>
                <textarea rows="10" cols="70" type="input" id="feedback" name="feedback" size="75"></textarea><br><br>
                <button type="submit" value="Submit" name = "submit" class="sub">Submit</button> 
                <a href="customer.php"><button type="button" class="sub">Back</button>
              </form>
           <?php
           if(isset($_POST['submit'])){
           $rrn2 = $_SESSION['rrnum'];
           $fdback = $_POST['feedback'];
           $consumer = "SELECT * FROM CONSUMER WHERE RR_NO =$rrn2 ";
           $res = mysqli_query($con,$consumer);
           if(mysqli_num_rows($res)){
            
            $feedinsert = "INSERT INTO `feedback` (`RR_NO`, `FEEDBACK_TXT`) VALUES ($rrn2,'$fdback')";
            $feedquery = mysqli_query($con,$feedinsert);
           }
          }
           ?>
              
        </body>
        <?php }
    ?>
</html>