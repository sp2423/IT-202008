<?php
session_start();
error_reporting('0');
if(!isset($_SESSION['admin_name'])){
echo "<script>window.open('admin_login.php? not_adminstrator = You are not an administartor.','_self')</script>";
}
else {

include_once ('includes/db.php');
}
 if(isset($_GET['delete_pro'])){
 
 $delete_id = $_GET['delete_pro'];
 $delete_pro = "delete from products where product_id='$delete_id'";
 $run_delete = mysqli_query($con,$delete_pro);
  if($run_delete)
  {
  echo "<script>alert('A product has been deleted')</script>";
  echo "<script>window.open('index.php?view_products','_self')</script>";
  }
 
 
 


?>
<?php } ?>