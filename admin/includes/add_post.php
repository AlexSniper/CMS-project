
<?php
if (isset($_POST['create_post'])){

        
	        $post_category_id=$_POST['post_category_id'];
            $post_title=$_POST['post_title'];
            $post_author=$_POST['post_author'];
	        $post_date=date('d-m-y');
            $post_image=$_FILES['image']['name'];
            $post_image_temp=$_FILES['image']['tmp_name'];
    
       $post_content=$_POST['post_content'];
            $post_tag=$_POST['post_tag'];
	          $post_comment_count=$_POST['post_comment_count'];
             $post_status=$_POST['post_status'];
move_uploaded_file($post_image_temp, "../images/$post_image");
	
	
$query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tag, post_comment_count, post_status) ";

	$query .=" VALUES ($post_category_id, '$post_title', '$post_author',now(), '$post_image', '$post_content', '$post_tag', $post_comment_count, '$post_status' ) ";
	
	$create_post_query = mysqli_query($connection, $query);
	
	 confirmQuery($create_post_query);
	
}

?>
    <form action="" method="post" enctype="multipart/form-data">    
     
     
      <div class="form-group">
         <label for="title">Post Title</label>
          <input type="text" class="form-control" name="post_title">
      </div>

         <div class="form-group">
       <label for="category">Category</label>
     <input type="number" class="form-control" name="post_category_id">
      
      </div>


       <div class="form-group">
       <label for="users">Post Author</label>
        <input type="text" class="form-control" name="post_author">
      </div>





  
      
      

<!--
       <div class="form-group">
         <select name="post_status" id="">
             <option value="draft">Post Status</option>
             <option value="published">Published</option>
             <option value="draft">Draft</option>
         </select>
      </div>
-->
      
           <div class="form-group">
       <label for="users">Post Status</label>
        <input type="text" class="form-control" name="post_status">
      </div>
      
      
    <div class="form-group">
         <label for="post_image">Post Image</label>
          <input type="file"  name="image">
      </div>

      <div class="form-group">
         <label for="post_tag">Post Tags</label>
          <input type="text" class="form-control" name="post_tag">
      </div>
           <div class="form-group">
         <label for="post_tag">post comment count</label>
          <input type="number" class="form-control" name="post_comment_count">
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
    