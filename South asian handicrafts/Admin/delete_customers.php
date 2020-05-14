<?php
session_start();
error_reporting('0');
if(!isset($_SESSION['admin_name'])){
echo "<script>window.open('admin_login.php? not_adminstrator = You are not an administartor.','_self')</script>";
}
else {
    include_once ('includes/db.php');
}
if(isset($_GET['delete_customers'])){
$delete_id = $_GET['delete_customers'];

$delete_customers = "delete from customers where customer_id ='$delete_id'";
$run_delete = mysqli_query($con,$delete_customers);
if($run_delete)
{
echo "<script>alert('The Customer has been deleted')</script>";
echo"<script>window.open('index.php?view_customers','_self')</script>";
}

?>
<?php }?>