<?php
include('../config/constants.php');
$id=$_GET['id'];
$sql="DELETE FROM tbl_admin WHERE id=$id";
$res=mysqli_query($conn,$sql);
if($res==TRUE)
{
$_SESSION['delete']="<div class='success'>Admin deleted successfully.</div>";
header("location:".SITEURL."admin/manage-admin.php");
}
else
{
$_SESSION['delete']="<div class='error'>Failed to delete admin.</div>";
header("location:".SITEURL."admin/manage-admin.php");
}

?>