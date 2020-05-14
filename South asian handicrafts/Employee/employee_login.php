<?php
session_start();
?>
<!DOCTYPE>
<html>
<head>
<style>
#login_admin{padding:200px}
#admin_info{padding-left:300px}
</style>
 <title>Login Form </title>
</head>
<body background="building_bg2.jpg">

<div class="login">
<h2 style="color:black; text-align:center:"><?php echo @$_GET['Employee Logout']; ?></h2>
<div id="login_admin">
<div><h2 id="admin_info">Employee Login</h2></div>
  <form method="post">
  <table width="1000" align="center">
    
    
<tr>
  <td align="right"><b>Name:</b></td>
  <td><input type="text" name="employee_name" placeholder="employee_name" required="required" /></td>
</tr>
<tr>  
  <td align="right"><b>Password:</b></td>
  <td><input type="password" name="employee_pass" placeholder="Password" required="required" /></td>
</tr>
<tr align="center">  
  <td colspan="2"><button type="submit" class="btn btn-primary btn-block btn-large" name="login"> Login</button></td>
  <h2 style="color:black; text-align:center;"><?php echo @$_GET['not_emplyoee']; ?></h2>
  </form>
  </div>
  </div>
  </body>
  </html>
  <?php

include_once ('db.php');
  if(isset($_POST['login'])){
  $employee_name = mysqli_real_escape_string($con,$_POST['employee_name']);
  $employee_pass = mysqli_real_escape_string($con,$_POST['employee_pass']);
  $employee_pass =md5($employee_pass);
  $sel_employee = "select * from employee where employee_name='$employee_name' AND employee_pass = '$employee_pass'";
  $run_employee = mysqli_query($con,$sel_employee);
  $check_employee = mysqli_num_rows($run_employee);
  
  if($check_employee==0){
  echo"<script>alert('Password or Name is wrong,try again')</script>";
  
  }
  else
  {
  $_SESSION['employee_name'] = $employee_name;
  echo "<script>window.open('index.php','_self')</script>";
  }
  }
  ?>