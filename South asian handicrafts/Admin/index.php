<?php
session_start();
if(!isset($_SESSION['admin_name'])){
echo "<script>window.open('admin_login.php? not_adminstrator = You are not an administartor.','_self'</script>";
}
else
{
?>


<!DOCTYPE>
<html>
 <head>
  <title> This is Admin Panel</title>
  <style>
 .insert{height:100px;width:150px;background-color:"#F4F6F8"}
  .main_wrapper{padding-top:30px;text-align:center;}
  #manage{padding-top:80px;}
  .insert.hover{text-decoration:underline;}
  #logout{padding-top:10px;padding-left:1000px}
  </style>
  
 </head>
 
 <body>
  <div id="logout"><a href="admin_logout.php?">Admin Logout</a></div>
 <h2 id="manage" style="text-align:center;">Manage Content</h2>
 <div class="main_wrapper">
 
 <div id="header"></div>
 <div id="right"> 

 <a href="index.php?insert_product"><Button class="insert">Insert New Product</Button></a>
 <a href="index.php?view_products"><Button class="insert">View Products</Button></a>
 <a href="index.php?view_customers"><Button class="insert">View Customers</Button></a>
 <a href="index.php?employee_register"><Button class="insert">Employee Registeration</Button></a>
 <a href="index.php?view_employee"><Button class="insert">View Employee</Button></a>
 
 
 </div>

 
 <div id="left">
 <?php
 if(isset($_GET['insert_product'])){
 include("insert_product.php");
 }
 if(isset($_GET['view_products'])){
 include("view_products.php");
 }
 if(isset($_GET['edit_pro'])){
 include("edit_pro.php");
 }
 if(isset($_GET['view_customers'])){
 include("view_customers.php");
 }
if(isset($_GET['employee_register'])){
 include("employee_register.php");
 }
if(isset($_GET['view_employee'])){
 include("view_employee.php");
 }
 
 ?>
 
  </div>
 
 </body> 
 </html>
 <?php } ?>