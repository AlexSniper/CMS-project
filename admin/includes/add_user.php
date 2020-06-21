
<?php
if (isset($_POST['create_user'])){

        
//	        $user_id=$_POST['user_id'];
            $username          = escape($_POST['username']);
	        $user_firstname    = escape($_POST['user_firstname']);
	        $user_lastname     = escape($_POST['user_lastname']); 
	        $user_image        = escape($_FILES['image']['name']);
            $user_image_temp   = escape($_FILES['image']['tmp_name']);
            $user_email        = escape($_POST['user_email']);
            $user_role         = escape($_POST['user_role']);
	        $user_password     = escape($_POST['user_password']);
	        
          $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost'=>10));
//move_uploaded_file($user_image_temp, "../images/$user_image");
	
	
$query = "INSERT INTO users(username, user_firstname, user_lastname, user_image, user_email, user_role, user_password ) ";

	$query .=" VALUES ('$username' , '$user_firstname', '$user_lastname', '$user_image', '$user_email', '$user_role', '$user_password' ) ";
	
	$create_user_query = mysqli_query($connection, $query);
	
//	 confirmQuery($create_user_query);
	echo"User Created: " . " " . "<a href='users.php'>View Users</a>";
	
}

?>
    <form action="" method="post" enctype="multipart/form-data">    
     
     
      <div class="form-group">
         <label for="user_firstname">First Name</label>
          <input type="text" class="form-control" name="user_firstname">
      </div>
         
           <div class="form-group">
      <label for="user_lastname">Last Name</label>
          <input type="text" class="form-control" name="user_lastname">
</div>
 
 
 <div class="form-group">
         <label for="user_image">Post Image</label>
          <input type="file"  name="image">
      </div>
  <label for="user_role">User Role</label>
  <div class="form-group">
       
        <select name="user_role" id="">
        
        <option value="suscriber">Select Options</option>
        <option value="admin">Admin</option>
        <option value="subscriber">Subscriber</option>
     </select>
      </div>

      <div class="form-group">
         <label for="username">Username</label>
          <input type="text" class="form-control" name="username">
      </div>
      
       <div class="form-group">
         <label for="email">Email</label>
          <input type="email" class="form-control" name="user_email">
      </div>
      
      
<!--
       <div class="form-group">
         <label for="user_role">User Role</label>
          <input type="text" class="form-control" name="user_role">
      </div>
-->
           
       <div class="form-group">
         <label for="password">Password</label>
          <input type="password" class="form-control" name="user_password">
      </div>
      
      

       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
      </div>


      
     


</form>
    



       