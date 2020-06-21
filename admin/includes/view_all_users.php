          <table class="table table-bordered table-hover">
                    	<thead>
                    		<tr>
                    		<th>Id</th>
                    		<th>Username</th>
                    		<th>First Name</th>
                    		<th>Last Name</th>
                    		<th>Email</th>
                    		<th>Role</th>
                            <th>Delete</th>
                    		</tr>
                    	</thead>
                 
                      <tbody>
                      
                      <?php 
	
	$query = "SELECT * FROM users";//Shoving all data from DB 
				$select_users= mysqli_query($connection, $query);
				while($row = mysqli_fetch_assoc($select_users)){
				$user_id = $row['user_id'];
					$username = $row['username'];
					$user_firstname = $row['user_firstname'];
					$user_lastname = $row['user_lastname'];
					$user_email = $row['user_email'];
					$user_image = $row['user_image'];
					$user_role = $row['user_role'];
//		            $user_password =  $row['user_password'];
               
			
					
			echo"<tr>";
			echo"<td>$user_id</td>";
			echo"<td>$username</td>";
			echo"<td>$user_firstname</td>";
	        echo"<td>$user_lastname</td>";
			echo"<td>$user_email</td>";
		    echo"<td>$user_role</td>";
					
$query = "SELECT * FROM users WHERE user_id = $user_id  ";

          		echo 	"<td> <a href='users.php?delete={$user_id}'>Delete</a></td>";
					
					    echo 	"<td> <a href='users.php?change_to_admin={$user_id}'>Admin</a></td>";
	       echo 	"<td> <a href='users.php?change_to_sub={$user_id}'>Subscriber</a></td>";
					echo 	"<td> <a href='users.php?source=edit_user&edit_user={$user_id}'>Edit</a></td>";
				
					echo"</tr>";
						}
	                  ?>
                      
                      </tbody>
                          </table>
                          
      
                         <?php if(isset($_GET['delete']))// Deleting choosen data from DB
				     		if(isset($_SESSION['user_role'])){
							if($_SESSION['user_role'] == 'admin'){
                            if(isset($_GET['delete'])){
							$the_user_id = mysqli_real_escape_string ($connection ,$_GET['delete']);
							$query ="DELETE FROM users WHERE user_id = {$the_user_id}";
						     $delete_query= mysqli_query($connection,$query);
						    header("Location: users.php");
		}						
	}
}
	

?>
               	                    <?php 

                            if(isset($_GET['change_to_admin'])){
								
			$the_user_id= $_GET['change_to_admin'];	
				$query ="UPDATE users SET  user_role = 'admin' WHERE user_id = $the_user_id "; // Where 'unapprove' is static value bassically it's just a string
				$change_to_admin_query= mysqli_query($connection,$query);
								   if (!$change_to_admin_query){
								die("Query Failed".mysqli_error($connection));
							   }
				header("Location: users.php");
	}

?>      
                    
               	                    <?php 

                            if(isset($_GET['change_to_sub'])){
			$the_user_sub= $_GET['change_to_sub'];	
				$query ="UPDATE users SET  user_role = 'subscriber' WHERE user_id = $the_user_sub "; // Where 'unapprove' is static value bassically it's just a string
				$change_to_sub_query= mysqli_query($connection,$query);
								   if (!$change_to_sub_query){
								die("Query FAiled".mysqli_error($connection));
							   }
				header("Location: users.php");
	}

?>      

 
 
  <?php // Update And Include Query
if(isset($_GET['edit'])){
	$cat_id = $_GET['edit'];
	}
//	include "edit_post.php";
		 ?>