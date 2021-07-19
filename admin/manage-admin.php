<?php include('partials/menu.php'); ?>
	<!--menu content starts-->
	<div class="menu-content">
		<div class="wrapper">
		   <h1>Manage Admin</h1>
		   <br><br>

		   <?php
		     if(isset($_SESSION['add'])) 
		     {
		     	echo $_SESSION['add'];//display session message
		     	unset($_SESSION['add']);//remove session message
		     }
		     if(isset($_SESSION['delete'])) 
		     {
		     	echo $_SESSION['delete'];//display session message
		     	unset($_SESSION['delete']);//remove session message
		     }
		   ?>

		   <br><br><br>
		   <!-- button to add admin-->

		   <a href="add-admin.php" class="btn-primary">Add admin</a>
		   <br><br><br>

		   <table class="tbl-full">
		   	<tr>
		   		<th>S.N.</th>
		   		<th>Full Name</th>
		   		<th>Username</th>
		   		<th>Actions</th>
		   	</tr>

            <?php
            $sql="SELECT * FROM tbl_admin";//get all admins
            $res=mysqli_query($conn,$sql);//execute the query
            if($res==TRUE)
            {
            	//count rows to check whether we have data in db or not
            	$count=mysqli_num_rows($res);

            	$sn=1;//create a var and assign the value

            	if($count>0)
            	{
            		//we have data in db
            		while($rows=mysqli_fetch_assoc($res))
            		{
            			//to get all data from db
            			$id=$rows['id'];
            			$full_name=$rows['full_name'];
            			$username=$rows['username'];

            			//display values in table
            			?>

            			<tr>
					   		<td><?php echo $sn++; ?></td>
					   		<td><?php echo $full_name; ?></td>
					   		<td><?php echo $username; ?></td>
					   		<td>
					   			<a href="#" class="btn-secondary">Update admin</a>
					   			<a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete admin</a>
					   			
					   		</td>
					   	</tr>

            			<?php

            			
            		}

            	}
            	else
            	{
            		//no data
            	}

            }
            ?>

		   	
		   </table>
		   
	    </div>
	</div>
	<!--menu content ends-->

	<?php include('partials/footer.php'); ?>