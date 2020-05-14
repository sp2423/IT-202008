<?php
session_start();

?>
<!DOCTYPE HTML>
<html>
<head>
  <style>
    body{font-family: times,sans-serif;text-align: center;color: purple;font-weight:bold; font-size: 18px;}
      *{padding-top:6px;padding-bottom:6px;margin: left;}
    #image {background-image: url(images/customer_login.jpg);background-position: center;background-repeat: no-repeat;
  }
  </style>
</head>
<body background id="image">
<div>
<form method="post" action="">
    <table width="250" align="center">

<tr align="center">
    <td colspan="3"><h2>Login or Register</h2></td>
</tr>
<tr>
<td align="center"><b>Email:</b></td>
<td><input type="text" name="customer_email" placeholder="enter email"/></td>
</tr>

<tr>
 <td align="center"><b>Password:</b></td>
 <td><input type="password" name="customer_pass" placeholder="enter password" /></td>
</tr>

<tr align="center">
 <td colspan="3"><a href="checkout.php?forgot_pass">Forgot Password?</a></td>
</tr>

<tr align="center">
 <td colspan="3"><input type="submit" name="login" value="Login" /></td>
</tr>

</table>
<h2 style="float:center;padding-right:25px;"><a href="customer_register.php"style="text-decoration:none;">New? Register Here</a></h2>

</form>
<?php
include_once ('includes/db.php');
  if(isset($_POST['login'])){
  $customer_email = mysqli_real_escape_string($con,$_POST['customer_email']);
  echo $customer_email;
  $customer_pass = mysqli_real_escape_string($con,$_POST['customer_pass']);
  echo $customer_pass;
  $customer_pass =md5($customer_pass);
  $sel_customer = "select * from customers where customer_email='$customer_email' AND customer_pass = '$customer_pass'";
  $run_customer = mysqli_query($con,$sel_customer);
  $check_customer = mysqli_num_rows($run_customer);

  if($check_customer==0){
  echo"<script>alert('Password or Name is wrong,try again')</script>";

  }
  else
  {
  $_SESSION['customer_email'] = $customer_email;
  echo "<script>window.open('index.php','_self')</script>";
  }
  }
  ?>

</div>
</body>
</html>
