
              	            
<?php 
if(isset($_POST['checkBoxArray'])){
foreach($_POST['checkBoxArray'] as $postValueId){

	
	 $bulk_options =$_POST['bulk_options'];

              
		 
		switch($bulk_options){
			
				
			case 'published':

$query= "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId} " ;
				$updete_to_published_status = mysqli_query($connection, $query);
				confirmQuery($updete_to_published_status );
				
				break;
					case 'draft':
$query= "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId} " ;
				$updete_to_draft_status = mysqli_query($connection, $query);
				confirmQuery($updete_to_draft_status );
				
				break;
				
									case 'clone':
$query= "SELECT * FROM posts  WHERE post_id = '{$postValueId}' " ;
				$select_post_query = mysqli_query($connection, $query);
				if(!$select_post_query){
	die("Query Failed".mysqli_error($connection));
}
	
	while($row = mysqli_fetch_assoc($select_post_query))
	{
	
					$post_category_id   = $row['post_category_id'];
					$post_title         = $row['post_title'];
					$post_author        = $row['post_author'];
				   	$post_status        = $row['post_status'];
					$post_image         = $row['post_image'];
					$post_image         = $row['post_image'];
//					$post_content = substr($row['post_content'],0, 100);
					$post_content       = $row['post_content'];
		            $post_tag           = $row['post_tag'];
					$post_comment_count = $row['post_comment_count'];
				    $post_date          = $row['post_date'];
	}
					
$query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tag, post_status) ";
				
					$query .=" VALUES ($post_category_id, '$post_title', '$post_author',now(), '$post_image', '$post_content', '$post_tag', '$post_status' ) ";
	
	$copy_query = mysqli_query($connection, $query);
	
if(!$copy_query){
	die("Query Failed".mysqli_error($connection));
}
				header("Location: post.php");
	
				break;
		
								case 'delete':
				
                            
$query ="DELETE FROM posts WHERE post_id = {$postValueId}";
 $delete_query= mysqli_query($connection,$query);
						    
				confirmQuery($delete_query);
				
				break;
			
		}
	
                   
          
	

}
}

?>

              	            <form action="" method='post'>
               	            
<table class="table table-bordered table-hover">
                   	<div id="bulkOptionsContainer"class="col-xs-4">
        
                   		<select class="form-control" name="bulk_options" id="">
                   			<option value="">Select Option</option>
                   			<option value="published">Publish</option>
                   			<option value="draft">Draft</option>
                   			<option value="delete">Delete</option>
                   			<option value="clone">Clone</option>
                   	
                   			
                   		</select>
                   	

                    	
                    	</div>

                   	           		 <div class="col-xs-4">

<input type="submit" name="submit" class="btn btn-success" value="Apply">
<a class="btn btn-primary" href="post.php?source=add_post">Add New</a>
 
<!--post.php?source=add_post-->

 </div>
                    	<thead>
                    		<tr>
			<th><input id="selectAllBoxes" type="checkbox"></th>
                    			<th>Id</th>
                    			<th>Author</th>
                    			<th>Title</th>
                    			<th>Category</th>
                    			<th>Status</th>
                    			<th>Image</th>
                    			<th>Tags</th>
                    			<th>Content</th><th>Comments</th>
                    			<th>Date</th>
                    			<th>Comment Count</th>
                    			<th>Edit</th>
                    			<th>Delete</th>
                    			<th>View Post</th>
                    			<th>View Reset</th>
                    	
                    			
                    			
                    		</tr>
                    	</thead>
                 
                      <tbody>
                      
                      <?php 
		$per_page = 25;
	if(isset($_GET['page'])){
	

		$page = escape($_GET['page']);
	}else{
		$page =" ";
	}
	if($page==" " || $page ==1){
		$page_1 = 0;
	}else {
		$page_1 =($page* $per_page )-$per_page;
	}
	
	
				$post_query_count = "SELECT * FROM posts  ORDER BY post_id DESC ";
				$find_count = mysqli_query($connection, $post_query_count);
if(!$find_count ){
	echo "Query is faulty". mysqli_errno($connection);
}
               $count = mysqli_num_rows($find_count);
$count = ceil($count/ $per_page );


				$query = "SELECT * FROM posts LIMIT $page_1, $per_page ";

				$select_all_posts_query= mysqli_query($connection, $query);
          
   	
       while($row = mysqli_fetch_assoc($select_all_posts_query)){
      				$post_id = $row['post_id'];
					$post_category_id = $row['post_category_id'];
					$post_title =      $row['post_title'];
					$post_author =     $row['post_author'];
				   	$post_status =     $row['post_status'];
					$post_image =      $row['post_image'];
					$post_image =      $row['post_image'];
					$post_content = substr($row['post_content'],0, 100);
//					$post_content=     $row['post_content'];
		            $post_tag =        $row['post_tag'];
					$post_comment_count = $row['post_comment_count'];
				    $post_date =       $row['post_date'];
					$view_post= "View";
				    $post_views_count =       $row['post_views_count'];
					$reset_view_post= "reset";
					
			echo"<tr>";

		      ?>
                      
                      
                      
              			
							<td> <input class ='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $post_id; ?>'></td>
<!--	value of $post_id' will save id in 	'checkBoxArray'				-->
					<?php
					
			
			echo"<td>$post_id</td>";
			echo"<td>$post_author</td>";
			echo"<td>$post_title</td>";
					
			$query = "SELECT * FROM categories WHERE cat_id =$post_category_id ";
					if (empty($query)){
						$query="No value such value is available";
					}
			$select_categories_id = mysqli_query($connection, $query);
			while($row = mysqli_fetch_assoc($select_categories_id)){
				
			$cat_id = $row['cat_id'];
			$cat_title = $row['cat_title'];
				if (empty($cat_title)){
				echo"No category were choosen";	
				}
					
			echo"<td>$cat_title </td>";
			}
					echo"<td>$post_status </td>";
			echo"<td><img width='100' class='img-responsive' src='../images/$post_image' alt='image'></td>";
//		   Retriving comments which is related to perticular Article
//		   $query ="SELECT * FROM comments WHERE comment_post_id = $post_id";
//		   $send_comment_query = mysqli_query($connection, $query);
//		   if(!$send_comment_query){
//			   die("Something went wrong").mysqli_errno($connection);
//		   }
//            $row = mysql_fetch_array($send_comment_query);
//		   $comment_id = $row['comment_id'];
//		   $count_comments = mysqli_num_rows($send_comment_query);
		   echo"<td>$post_tag </td>";
		   echo"<td>$post_content </td>";
		   echo"<td><a href='../admin/post_comments.php?p_id={$post_id}'>All Comments</a></td>";
		   
					
					
			echo"<td>$post_date</td>";
		   echo"<td>$post_comment_count</td>";
			
          echo 	"<td> <a href='post.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
						echo 	"<td> <a onClick=\"javascript: return confirm('Do you want to delete article $post_title author $post_author ?')\" href='post.php?delete={$post_id}'>Delete</a></td>";
					echo
						"<td> <a href='../post.php?p_id={$post_id}'>View Post</a></td>";
				
					
					echo 	"<td> <a onClick=\"javascript: return confirm('Current view amount is $post_views_count in this  article $post_title  would you like to reset it ?')\" href='post.php?reset={$post_id}'>$post_views_count</a></td>";
				
					echo"</tr>";
						}
	                  ?>
                      
                      </tbody>
                          </table>
                          </form>
                          
                         <?php //Deleting choosen data from DB

                            if(isset($_GET['delete'])){
								if(isset($_SESSION['user_role'])){
	                        if($_SESSION['user_role'] == 'admin'){
							$the_post_id = escape($_GET['delete']);
							$query ="DELETE FROM posts WHERE post_id = {$the_post_id }";
							$delete_query= mysqli_query($connection,$query);
						  
						    header("Location: post.php");
	}
  }
}

?>
                         <?php 

                            if(isset($_GET['reset'])){
							$the_post_id = escape($_GET['reset']);
								
								
							$query ="UPDATE `posts` SET `post_views_count` = '0' ";
					$query .= "WHERE post_id = $the_post_id ";
							$update_query= mysqli_query($connection,$query);
						 
						    header("Location: post.php");
	}

?>
 
 
 
  <?php // Update And Include Query
if(isset($_GET['edit'])){
	$cat_id = $_GET['edit'];
	}
//	include "edit_post.php";
		 ?>
		 
		
	<ul class="pager">

 
	   <li><a href="?page=1">First</a></li>
        <li class="<?php if($page <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($page <= 1){ echo '#'; } else { echo "?page=".($page - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if($page >= $count){ echo 'disabled'; } ?>">
            <a href="<?php if($page < 1){ echo "?page=1";} else { echo "?page=".($page + 1); } ?>">Next</a>
        </li>
        <li><a href="?page=<?php echo $count; ?>">Last</a></li>
	
</ul>
       