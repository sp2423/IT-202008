<?php
session_start();
?>
<!DOCTYPE>
<html>
<head>
<style>
#login_owner{padding:200px}
#owner_info{padding-left:350px}
</style>
 <title>Login Form </title>
</head>
<body background="baby_blue.jpg">

<div class="login">
<h2 style="color:black; text-align:center:"><?php echo @$_GET['Owner Logout']; ?></h2>
<div id="login_owner">
<div><h2 id="owner_info">Owner Login</h2></div>
  <form method="post">
  <table width="1000" align="center">
    
    
<tr>
  <td align="right"><b>Name:</b></td>
  <td><input type="text" name="admin_name" placeholder="admin_name" required="required" /></td>
</tr>
<tr>  
  <td align="right"><b>Password:</b></td>
  <td><input type="password" name="admin_pass" placeholder="Password" required="required" /></td>
</tr>
<tr align="center">  
  <td colspan="2"><button type="submit" class="btn btn-primary btn-block btn-large" name="login"> Login</button></td>
  <h2 style="color:black; text-align:center;"><?php echo @$_GET['not_admin']; ?></h2>
  </form>
  </div>
  </div>
  </body>
  </html>
  <?php

  include_once ('includes/db.php');
if (mysqli_connect_errno())
{
echo "Failed to connect to MYSQL: " .mysqli_connect_error();
}
  if(isset($_POST['login'])){
  $admin_name = mysqli_real_escape_string($con,$_POST['admin_name']);
  $admin_pass = mysqli_real_escape_string($con,$_POST['admin_pass']);
  $admin_pass =md5($admin_pass);
  $sel_admin = "select * from administrator where admin_name='$admin_name' AND admin_pass = '$admin_pass'";
  $run_admin = mysqli_query($con,$sel_admin);
  $check_admin = mysqli_num_rows($run_admin);
  
  if($check_admin==1){
  echo"<script>alert('Password or Name is wrong,try again')</script>";
  
  }
  else
  {
  $_SESSION['admin_name'] = $admin_name;
  echo "<script>window.open('index.php','_self')</script>";
  }
  }
  ?>