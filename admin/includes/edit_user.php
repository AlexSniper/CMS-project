
<?php

if(isset($_GET['edit_user'])){
 $the_user_id=$_GET['edit_user'];
}
   $query = "SELECT * FROM users WHERE user_id =$the_user_id";
			$select_user_query = mysqli_query($connection, $query);
			while($row = mysqli_fetch_assoc($select_user_query)){
			
			$query = "SELECT * FROM users WHERE user_id = $the_user_id ";
					
				    $user_id        = $row['user_id'];
					$username       = $row['username'];
					$user_firstname = $row['user_firstname'];
					$user_lastname  = $row['user_lastname'];
					$user_email     = $row['user_email'];
					$user_image     = $row['user_image'];
					$user_role      = $row['user_role'];
				$user_password      = $row['user_password'];
               

			}


?>
 <?php 
if(isset($_POST['update_user'])) {

	
	                $username       = escape($_POST['username']);
					$user_firstname = escape($_POST['user_firstname']);
					$user_lastname  = escape($_POST['user_lastname']);
					$user_email     = escape($_POST['user_email']);
//					$user_image     = $_POST['user_image'];
					$user_role      = escape($_POST['user_role']);

	
	
	


	

		
			$query = "UPDATE users SET ";
					$query  .="username         = '{$username}', "; 
					$query  .= "user_firstname  = '{$user_firstname}', ";
					 $query .= "user_lastname   = '{$user_lastname}', ";
					 $query .= "user_email      = '{$user_email}', ";
					 $query .= "user_image      = '{$user_image}', ";
					 $query .= " user_role      = '{$user_role}' ";

					 $query .= " WHERE user_id = {$the_user_id}";


		
	$edit_user_query = mysqli_query($connection, $query);
	
	
	 confirmQuery($edit_user_query);
			 header("users.php");
				
echo "User Updated". "<a href='users.php'>View Users?</a>";

}
//} else{
//header("Location: index.php");
//}
	
				




?>
    <?php 
if(isset($_POST['update_password'])) {

	
	            
				    $user_password = $_POST['user_password'];
	
	
	


	
	if(!empty($user_password)){
		$query_password ="SELECT  user_password FROM users WHERE user_id =$the_user_id ";
		$get_user_query = mysqli_query($connection, $query_password);
		 
		confirmQuery($get_user_query);
		$row = mysqli_fetch_array($get_user_query);
		$db_user_password = $row['user_password'];
		
		if($db_user_password != $user_password){
	$hashed_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost'=>12));
		}
		
			$query = "UPDATE users SET ";
				
				 $query .= " user_password  = '{$hashed_password}' ";
					 $query .= " WHERE user_id = {$the_user_id}";


		
	$edit_password_query = mysqli_query($connection, $query);
	
	
	 confirmQuery($edit_password_query);
			 header("users.php");
				
echo "User Password is Updated";
}

	}


?>
    <form action="" method="post" enctype="multipart/form-data">    
     
            
             
      <div class="form-group">
         <label for="user_firstname">First Name</label>
          <input value="<?php echo $user_firstname; ?>" type="text" class="form-control" name="user_firstname">
      </div>
         
           <div class="form-group">
      <label for="user_lastname">Last Name</label>
          <input value="<?php echo $user_lastname; ?>" type="text" class="form-control" name="user_lastname">
</div>
 
 
 <div class="form-group">
         <label for="user_image">Post Image</label>
          <input value="<?php echo $user_image; ?>"  type="file"  name="image">
      </div>

       
                 <div class="form-group">
       
       <select name="user_role" id="">
       
    <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
       <?php 

          if($user_role == 'admin') {
          
             echo "<option value='subscriber'>subscriber</option>";
          
          } else {
          
            echo "<option value='admin'>admin</option>";
          
          }
    
      ?>
        
       </select>
       
       
       
       
      </div>
			
       

      
   

      <div class="form-group">
         <label for="username">Username  </label>
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
--> <div class="form-group">
          <input class="btn btn-primary" type="submit" name="update_user" value="Edit User">
      </div>
           
       <div class="form-group">
         <label for="password">Password</label>
          <input  autocomplete="off" type="password" class="form-control" name="user_password">
      </div>
      
      

       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="update_password" value="Edit Password">
      </div>


      
     


</form>
    



       