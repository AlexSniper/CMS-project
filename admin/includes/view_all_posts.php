          <table class="table table-bordered table-hover">
                    	<thead>
                    		<tr>
                    			<th>Id</th>
                    			<th>Author</th>
                    			<th>Title</th>
                    			<th>Category</th>
                    			<th>Status</th>
                    			<th>Image</th>
                    			<th>Tags</th>
                    			<th>Comments</th>
                    			<th>Date</th>
                    			<th>Comment Count</th>
                    			<th>Edit</th>
                    			<th>Delete</th>
                    		</tr>
                    	</thead>
                 
                      <tbody>
                      
                      <?php 
	
	$query = "SELECT * FROM posts";//Shoving all data from DB 
				$select_posts= mysqli_query($connection, $query);
				while($row = mysqli_fetch_assoc($select_posts)){
				$post_id = $row['post_id'];
					$post_category_id = $row['post_category_id'];
					$post_title = $row['post_title'];
					$post_author = $row['post_author'];
				   	$post_status = $row['post_status'];
					$post_image = $row['post_image'];
					$post_content = $row['post_content'];
					$post_tag = $row['post_tag'];
					$post_comment_count = $row['post_comment_count'];
				    $post_date = $row['post_date'];
					
					echo"<tr>";
			echo"<td>$post_id</td>";
			echo"<td>$post_author</td>";
			echo"<td>$post_title</td>";
			echo"<td>$post_category_id</td>";
					echo"<td>$post_status </td>";
			echo"<td><img width='100' class='img-responsive' src='../images/$post_image' alt='image'></td>";
					echo"<td>$post_tag </td>";
					echo"<td>$post_content </td>";
			echo"<td>$post_date</td>";
			echo"<td>$post_comment_count</td>";
          echo 	"<td> <a href='post.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
						echo 	"<td> <a href='post.php?delete={$post_id}'>Delete</a></td>";
					echo"</tr>";
						}
	                  ?>
                      
                      </tbody>
                          </table>
                          
                         <?php if(isset($_GET['delete']))// Deleting choosen data from DB

                            if(isset($_GET['delete'])){
							$the_post_id = $_GET['delete'];
							$query ="DELETE FROM posts WHERE post_id = {$the_post_id }";
							$delete_query= mysqli_query($connection,$query);
						     $delete_query= mysqli_query($connection,$query);
						    header("Location: post.php");
	}

?>
 
 
 
  <?php // Update And Include Query
if(isset($_GET['edit'])){
	$cat_id = $_GET['edit'];
	}
//	include "edit_post.php";
		 ?>