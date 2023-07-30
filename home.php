<?php
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
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width,initial-scale=1.0">
<link rel="stylesheet" href="Style.css">
        <title>Login</title>
      
    </head>
    <body>
        
        <h1 style="color:aqua;">Bengaluru Electricity Supply Company</h1>
        <a  href="aboutus.html" style="margin-left:1400px;  display: flex; color: blue;">About Us</a>
        <br><br><br><br><br>
       
        <div id="loginDiv" class="one"> <h4 style="margin-left: 105px ;color:black;
            font-family:'Times New Roman', Times, serif;text-decoration:bold">Agent Login</h4>
            
            <form action="" method="post">
              <label for="username">AgentID:</label>
              <input type="text" id="username" name="username" placeholder="Enter AgentID"><br>
              <label for="password">Password:</label>
              <input type="password" id="password" name="password" placeholder="Enter Password"><br><br>
              <button type="submit"  name="submit" class="but">Login</button>
            </form> 
            <?php
            
            if(isset($_POST['submit'])){
              $name = $_POST['username'];
            $pass = $_POST['password'];
            $sql = "SELECT *FROM LOGIN WHERE U_ID='$name' AND PSWD='$pass'";
            $result = mysqli_query($con,$sql);
            $redirect_page='generate.php';
            if(mysqli_num_rows($result)) {
              echo'Login Successful';
              session_start();
              $row = mysqli_fetch_assoc($result);
              $_SESSION['agent'] = $row['A_NAME'];
              header("Location:$redirect_page");
              exit();
            }
            else
            {
              echo'<p style="color:red;">Invalid AgentID or Password</p>';
            }
            }
            ?>
          
          
          </div>
    
        <div id="icons" class="two"> <h4 style="margin-left: 70px ;color:black;
            font-family:'Times New Roman', Times, serif;text-decoration:bold">Customer Login</h4>
           
        <form action="" method="post">
              <label for="username">RR Number:</label>
              <input type="text" id="username" name="username1" placeholder="Enter RR Number"><br>
              <label for="password">Password:</label>
              <input type="password" id="password" name="password1" placeholder="Enter Password"><br><br>
              <button type="submit"  name="submit1" class="but">Login</button>
            </form>
            <?php
            
            if(isset($_POST['submit1'])){
              $name = $_POST['username1'];
            $pass = $_POST['password1'];
            $sql = "SELECT *FROM CONSUMER WHERE RR_NO='$name' AND PASS='$pass'";
            $result = mysqli_query($con,$sql);
            $redirect_page='customer.php';
            if(mysqli_num_rows($result)) {
              echo'Login Successful';
              session_start();
              $row = mysqli_fetch_assoc($result);
              $_SESSION['cust'] = $row['C_NAME'];
              $_SESSION['rrnum'] = $row['RR_NO'];
              $_SESSION['cid'] = $row['CONS_ID'];
        $_SESSION['tfc'] = $row['TF_CODE'];
        $_SESSION['address'] = $row['C_ADDRESS'];
              header("Location:$redirect_page");
              exit();
            }
            else
            {
              echo'<p style="color:red;">Invalid RR Number or Password</p>';
            }
            }
            ?>
        </div>
        <?php
}
?>     
    </body>
</html>
