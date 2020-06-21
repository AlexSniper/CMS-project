
<?php

if (isset($_POST['create_post'])){

        
	        $post_category_id = escape($_POST['post_category_id']);
            $post_title       = escape($_POST['post_title']);
            $post_author      = escape($_POST['post_author']);
	        $post_date        = escape(date('d-m-y'));
            $post_image       = escape($_FILES['image']['name']);
            $post_image_temp  = escape($_FILES['image']['tmp_name']);
			$post_content     = escape($_POST['post_content']);
			$post_tag         = escape($_POST['post_tag']);
            $post_status      = escape($_POST['post_status']);
	        $post_views_count = 0;	
	
move_uploaded_file($post_image_temp, "../images/$post_image");
	
	
$query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tag, post_status, post_views_count ) ";

	$query .=" VALUES ($post_category_id, '$post_title', '$post_author',now(), '$post_image', '$post_content', '$post_tag', '$post_status', $post_views_count ) ";
	
	$create_post_query = mysqli_query($connection, $query);
	
	 confirmQuery($create_post_query);
	
	$the_post_id = mysqli_insert_id($connection);
	echo "<p class='bg-success'>Post Added.<a href='../post.php?p_id= {$the_post_id}'>View Post</a> or          <a href='post.php'>Edit More Post</a></p>";
				 header("edit_post.php");
	
}

?>


    <form action="" method="post" enctype="multipart/form-data">    
     
     
      <div class="form-group">
         <label for="title">Post Title</label>
          <input type="text" class="form-control" name="post_title">
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
				 
  if($cat_id == $post_category_id) {
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
        <input type="text" class="form-control" name="post_author">
      </div>





  
      
      

       <div class="form-group">
         <select name="post_status" id="">
             <option value="draft">Post Status</option>
             <option value="published">Published</option>
             <option value="draft">Draft</option>
         </select>
      </div>
      
<!--
           <div class="form-group">
       <label for="post_status"></label>
       <select name="" id="">
       	<option value="draft">Select Options</option>
       	  	<option value="published">Published</option>
       	  	  	<option value="draft">Draft</option>
       </select>
-->
<!--        <input type="text" class="form-control" name="post_status">-->
      

      
<!--      </div>-->
      
      
    <div class="form-group">
         <label for="post_image">Post Image</label>
          <input type="file"  name="image">
      </div>

      <div class="form-group">
         <label for="post_tag">Post Tags</label>
          <input type="text" class="form-control" name="post_tag">
      </div>
      
      <div class="form-group">
         <label for="post_content">Post Content</label>
         <textarea class="form-control "name="post_content" id="body" cols="30" rows="10">
         </textarea>

      </div>
      
      

       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
      </div>


</form>
    