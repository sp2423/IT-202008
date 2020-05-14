<?php
error_reporting('0');
session_start();
include_once ('includes/db.php');
if(!isset($_SESSION['admin_name'])){
echo "<script>window.open('admin_login.php? not_adminstrator = You are not an administartor.','_self')</script>";
}
else
{

if(isset($_GET['delete_admin'])){
$delete_id = $_GET['delete_admin'];
echo "$delete_id";
$delete_admin = "delete from administrator where admin_id ='$delete_id'";
$run_delete = mysqli_query($con,$delete_admin);
if($run_delete)
{
echo "<script>alert('The Admin has been deleted')</script>";
echo"<script>window.open('index.php?view_employee','_self')</script>";
}
}
?>
<?php }?>






