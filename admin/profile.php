<?php include "includes/admin_header.php"?>
   <?php
if (isset($_SESSION['username'])){
	
$username = $_SESSION['username'];
}
 $query = "SELECT * FROM users WHERE username = '$username' ";

$select_user_profile_query = mysqli_query($connection, $query);
			while($row = mysqli_fetch_assoc($select_user_profile_query)){
			
			$query = "SELECT * FROM users WHERE username = '$username' ";
				$user_id = $row['user_id'];
					$username = $row['username'];
					$user_firstname = $row['user_firstname'];
					$user_lastname = $row['user_lastname'];
					$user_email = $row['user_email'];
					$user_image = $row['user_image'];
					$user_role = $row['user_role'];
				$user_password = $row['user_password'];
		
			}
?>
     
     
						 <?php


					if(isset($_POST['update_user'])) {

	
	                $username = $_POST['username'];
					$user_firstname = $_POST['user_firstname'];
					$user_lastname = $_POST['user_lastname'];
					$user_email = $_POST['user_email'];
//					$user_image = $_POST['user_image'];
					
				    $user_password = $_POST['user_password'];
	
	
	
	
					$query = "UPDATE users SET ";
					$query .="username = '{$username}', "; 
					$query .= "user_firstname  = '{$user_firstname}', ";
					 $query .= "user_lastname  = '{$user_lastname}', ";
					 $query .= "user_email  = '{$user_email}', ";
	//					 $query .= "user_image  = '{$user_image}', ";

					 $query .= " user_password  = '{$user_password}' ";
					 $query .= " WHERE username = '{$username}' ";




					$edit_user_query = mysqli_query($connection, $query);
					 if ($edit_user_query ){
						 $success_update ="User is updated";
					 }

					 confirmQuery($edit_user_query);

				}


?>
 
    <div id="wrapper">
    <!-- Navigation -->
          <?php include "includes/admin_navigation.php"?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       
                       <h1 class="page-header">
                            Welcome to Admin Page 
                            <small>Author</small>
                        </h1>  
     <form action="" method="post" enctype="multipart/form-data">    
     
            
             
      <div class="form-group">
         <label for="user_firstname">First Name </label>
          <input value="<?php echo $user_firstname;?>" type="text" class="form-control" name="user_firstname">
      </div>
         
           <div class="form-group">
      <label for="user_lastname">Last Name</label>
          <input value="<?php echo $user_lastname; ?>" type="text" class="form-control" name="user_lastname">
</div>
 
 
 <div class="form-group">
         <label for="user_image">Post Image</label>
          <input value="<?php echo $user_image; ?>"  type="file"  name="image">
      </div>

<!--
  <div class="form-group">
       
        <select name="user_role" id="">
         <option value="suscriber"><?php echo $user_role; ?></option>
        <?php
			if($user_role == 'admin'){
				echo "<option value='suscriber'>suscriber</option>";
			}else
			{
				echo "<option value='admin'>Admin</option>";
			}
			?>
       
        
   
     </select>
      </div>
-->

      <div class="form-group">
         <label for="username">Username</label>
          <input value="<?php echo $username; ?>" type="text" class="form-control" name="username">
      </div>
      
       <div class="form-group">
         <label for="email">Email</label>
          <input value="<?php echo $user_email; ?>" type="email" class="form-control" name="user_email">
      </div>
      
      
<!--
       <div class="form-group">
         <label for="user_role">User Role</label>
          <input type="text" class="form-control" name="user_role">
      </div>
-->
           
       <div class="form-group">
         <label for="password">Password</label>
          <input  autocomplete="off"  type="password" class="form-control" name="user_password">
      </div>
      
      

       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="update_user" value="Update User">
      </div>


      
     


</form>
    

                    </div>       
                   </div>
                <!-- /.row -->
                 </div>
            <!-- /.container-fluid -->
            </div>
     <?php include "includes/admin_footer.php"?>