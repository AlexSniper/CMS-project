
   <?php include "includes/header.php"?>
    <!-- Navigation -->
 <?php include "includes/navigation.php"?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
   <?php 
		$per_page = 5;
	if(isset($_GET['page'])){
	

		$page = $_GET['page'];
	}else{
		$page =" ";
	}
	if($page==" " || $page ==1){
		$page_1 = 0;
	}else {
		$page_1 =($page* $per_page )-$per_page;
	}
	
	
				$post_query_count = "SELECT* FROM posts";
				$find_count = mysqli_query($connection, $post_query_count);
if(!$find_count ){
	echo "Query is faulty". mysqli_errno($connection);
}
               $count = mysqli_num_rows($find_count);
$count = ceil($count/ $per_page );


				$query = "SELECT * FROM posts LIMIT $page_1, $per_page ";

				$select_all_posts_query= mysqli_query($connection, $query);
          
   	
       while($row = mysqli_fetch_assoc($select_all_posts_query)){
           $post_id          = $row['post_id'];
		    $post_title      = $row['post_title'];
	       $post_author      = $row['post_author'];
		   $post_date        = $row['post_date'];
		   $post_image       = $row['post_image'];
		   $post_content     = substr($row['post_content'],0, 100);
	   	   $post_status      = $row['post_status'];
		   $post_views_count =       $row['post_views_count'];
		   echo"<tr>";
//		   if($post_status !== 'published') {
//
//			echo "<h1 class='text-center'> NO POST SORRY </h1>"; 
//			   break;
//		   }else {
			   
		   
                   
		   
		      ?>
		   
		       <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>
                

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
  
                </h2>
   
                <p class="lead">
                 by   <a href="author_posts.php?author=<?php echo $post_author ?>&p_id=<?php echo $post_id; ?>"><?php echo $post_author ?></a> Article viewed <?php echo $post_views_count ?> Times
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                <hr>
                 
                  <a href="post.php?p_id=<?php echo $post_id; ?>"><img class="img-responsive" src="images/<?php echo $post_image; ?> " alt=""></a>
                  
                  
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>



 

	  
	
	 
					
   <?php  }?>   
<div class="center"><h3>Page <?php 
 if($page <= 1){ echo $page =1;
			   } else {
	 echo $page;
 }
            ?> 
           of <?php echo $count; ?></h3></div>
            
            </div>

            <!-- Blog Sidebar Widgets Column -->
       <?php include "includes/sidebar.php"?>

        </div>
        <!-- /.row -->

        <hr>
<ul class="pager">
<?php
//	for($i=1;$i<=$count;$i++){
//		if($i == $page) {
//		
//		  echo "<li '><a class='active_link' href='index.php?page={$i}'>{$i}</a></li>";
//
//
//        }  else {
//
//            echo "<li '><a href='index.php?page={$i}'>{$i}</a></li>";
//		}
//	}

			
	?>
 
	   <li><a href="?page=1">First</a></li>
        <li class="<?php if($page <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($page <= 1){ echo '#'; } else { echo "?page=".($page - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if($page >= $count){ echo 'disabled'; } ?>">
            <a href="<?php if($page >= $count){ echo '#'; } else { echo "?page=".($page + 1); } ?>">Next</a>
        </li>
        <li><a href="?page=<?php echo $count; ?>">Last</a></li>
	
</ul>
       

<?php include "includes/footer.php"?>