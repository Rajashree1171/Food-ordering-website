<?php include('partials/menu.php'); ?>

<div class="menu-content">
		<div class="wrapper">

			<h1>Add admin</h1>
			<br><br>

			<?php
			 if(isset($_SESSION['add']))
			 {
			 	echo $_SESSION['add'];
			 	unset($_SESSION['add']);

			 }
			?>

			<form action="" method="POST">
				<table class="tbl-30">
					<tr>
						<td>Full Name:</td>
						<td><input type="text" name="full_name" placeholder="enter your name"></td>
					</tr>
					<tr>
						<td>Username:</td>
						<td><input type="text" name="username" placeholder="username"></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><input type="password" name="password" placeholder="your password"></td>
					</tr>
					<tr>
						<td colspan="2">
							<input type="submit" name="submit" value="Add admin" class="btn-secondary">
						</td>
					</tr>
				</table>

			</form>
		</div>
</div>

<?php include('partials/footer.php'); ?>

<?php
//process the value from the form

//submit button
if(isset($_POST['submit']))
{
//echo "Button clicked";
//1.get data from form
	 $full_name=$_POST['full_name'];
	 $username=$_POST['username'];
	 $password=md5($_POST['password']);//password encrypted

	 //2.sql query to save data into database

	 $sql="INSERT INTO tbl_admin SET
	 full_name='$full_name',
	 username='$username',
	 password='$password'
    ";
     
     //execute query and saving data into db
    
   $res=mysqli_query($conn,$sql) or die(mysqli_error());

   //check whether query is executed or not
   if($res==TRUE)
   {
   	//echo "inserted";
   	//create session to display the message
   	$_SESSION['add']="Admin added successfully";

   	//redirect page to manade admin
   	header("location:".SITEURL."admin/manage-admin.php");
   }
   else
   {
   //	echo "not inserted";
   	$_SESSION['add']="failed to add admin";

   	//redirect page to add admin
   	header("location:".SITEURL."admin/add-admin.php");
   }

	 



}


?>