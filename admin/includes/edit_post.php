<!--
           <form action="" method="post">
                <div class="form-group">  
                <label for="cat_title"> Edit</label>
-->
              <?php //FIND ALL CATEGORIES QUERY	
			if(isset($_GET['p_id'])){
				$the_post_id =$_GET['p_id'];
			}
		   $query = "SELECT * FROM posts WHERE post_id =$the_post_id ";
			$select_post_id = mysqli_query($connection, $query);
confirmQuery($select_post_id);
			while($row = mysqli_fetch_assoc($select_post_id)){
			$post_id = $row['post_id'];
					$post_category_id   = $row['post_category_id'];
					$post_title         = $row['post_title'];
					$post_author        = $row['post_author'];
				   	$post_status        = $row['post_status'];
					$post_image         = $row['post_image'];
					$post_tag           = $row['post_tag'];
				    $_post_content      = $row['post_content'];
			         $post_content = mysqli_real_escape_string($connection, $_post_content);
				confirmQuery($select_post_id);
					$post_comment_count = $row['post_comment_count'];
				    $post_date          = $row['post_date'];
			}
				if(isset($_POST['update_post'])) {
					$post_category_id = escape($_POST['post_category_id']);
					$post_title       = escape($_POST['post_title']);
					$post_author      = escape($_POST['post_author']);
				   	$post_status      = escape($_POST['post_status']);
				    $post_image       = escape($_FILES['image']['name']);
                    $post_image_temp  = escape($_FILES['image']['tmp_name']);
					$post_tag         = escape($_POST['post_tag']);
				    $post_content     = escape($_POST['post_content']);
					if (empty($_POST['post_comment_count'])){
					$post_comment_count= escape($_POST['post_comment_count'])=0;
					}else{$post_comment_count = escape($_POST['post_comment_count']);}
				
				 
					
	move_uploaded_file($post_image_temp, "../images/$post_image");
	if(empty($post_image)){
		$query ="SELECT * FROM posts WHERE post_id = $the_post_id ";
		$select_image = mysqli_query($connection, $query);
		while($row = mysqli_fetch_assoc($select_image)){
			
	       $post_image         = $row['post_image'];
	}
		if(empty($post_image )){
				echo "No Picture was selected";
			}
}
					$query = "UPDATE posts SET ";
					 $query .= "post_category_id  =$post_category_id , ";
					$query .="post_title = '{$post_title}', "; 
					$query .= "post_author  = '{$post_author}', ";
					 $query .= "post_image  = '{$post_image}', ";
					 $query .= "post_content  = '{$post_content}', ";
					 $query .= " post_tag  = '{$post_tag}', ";
					 $query .= " post_comment_count = {$post_comment_count}, ";
					 $query .= " post_status  = '{$post_status}' ";
					 $query .= " WHERE post_id = {$the_post_id}";


		
	$update_post = mysqli_query($connection, $query);
					
	
	 confirmQuery($update_post);
					echo "<p class='bg-success'>Post Updated.<a href='../post.php?p_id= {$the_post_id}'>View Post</a> or          <a href='post.php'>Edit More Post</a></p>";
				 header("edit_post.php");
				}

				?>
	
		       	    <form action="" method="post" enctype="multipart/form-data">    
     

     
     
      <div class="form-group">
         <label for="title">Post Title</label>
          <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="post_title">
      </div>
      
      
      
           <div class="form-group">
       <label for="categories">Categories</label>
       <select name="post_category_id" id="">
  <?php

			$query = "SELECT * FROM categories";
			$select_categories= mysqli_query($connection, $query);
				 
				 confirmQuery($select_categories);
			while($row = mysqli_fetch_assoc($select_categories)){
			$cat_id = $row['cat_id'];
			$cat_title = $row['cat_title'];
				 
  if($cat_id == $post_category_id ) {

      
        echo "<option selected value='{$cat_id}'>{$cat_title}</option>";


        } else {

          echo "<option value='{$cat_id}'>{$cat_title}</option>";


        }

            
        }

?>
           
        
       </select>

      </div>
      
      
      
      
      
 <div class="form-group">
       <label for="users">Post Author</label>
        <input value="<?php echo $post_author; ?>" type="text" class="form-control" name="post_author">
      </div>

          
           <div class="form-group">
         <select name="post_status" id="">
             <option value="<?php echo $post_status; ?>">Post Status</option>
             <option value="published">Published</option>
             <option value="draft">Draft</option>
         </select>
      </div>
      
          
    
    
<!--
      </div>
           <div class="form-group">
       <label for="users">Post Status</label>
        <input value="" type="text" class="form-control" name="post_status">
      
-->
      
      
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <img width="100" src="../images/<?php echo $post_image; ?>" alt="">
          <input type="file"  name="image">
      </div>

      <div class="form-group">
         <label for="post_tag">Post Tags</label>
          <input  value="<?php echo $post_tag; ?>" type="text" class="form-control" name="post_tag">
      </div>
           <div class="form-group">
         <label for="post-comment-count">post comment count</label>
          <input  value="<?php echo $post_comment_count; ?>" type="number" class="form-control" name="post_comment_count">
      </div>
      
      <div class="form-group">
         <label for="post_content">Post Content</label>
         <textarea  class="form-control "name="post_content" id="body" cols="30" rows="10">
        <?php echo $post_content; ?>
         </textarea>
      </div>
      
      
      
      
      
<div class="form-group">
          <input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
      </div>
</form>                     