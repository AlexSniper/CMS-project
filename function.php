
<?php
function insert_categories(){
	global $connection;
	if(isset($_POST['submit'])){
		     $cat_title = $_POST['cat_title'];
	if($cat_title == "" || empty($cat_title)){
		
		echo"this field should not be empty";
	}else{
	$query= "INSERT  INTO categories(cat_title) ";
		$query .="VALUES('$cat_title')";
	}
		  
		if($cat_title != null){
		$create_category_query =  mysqli_query($connection ,$query);
			echo " $cat_title.Query was successfully added ";
			
		}else{
            echo " Error creating table: " . mysqli_error($connection);

		
//			die(' Query failed '.mysqli_error($connection));//All commands will stop
    
			}
	}
}

function findAllCategories(){
	global $connection;
		$query = "SELECT * FROM categories";
				$select_categories= mysqli_query($connection, $query);
				while($row = mysqli_fetch_assoc($select_categories)){
				$cat_id = $row['cat_id'];
					$cat_title = $row['cat_title'];
					echo "<tr>";
				echo 	"<td> {$cat_id}</td>";
					echo 	"<td> {$cat_title}</td>";
					echo 	"<td> <a href='category.php?delete={$cat_id}'>Delete</a></td>";
					echo 	"<td> <a href='category.php?edit={$cat_id}'>Edit</a></td>";
					echo "<tr>";
				}
}
function deleteCategory(){
	global $connection;
	
	                       if(isset($_GET['delete'])){
							$the_cat_id = $_GET['delete'];
							$query ="DELETE FROM categories WHERE cat_id = {$the_cat_id}";
							$delete_query= mysqli_query($connection,$query);
						     $delete_query= mysqli_query($connection,$query);
							header("Location: category.php");
   }
}

?>