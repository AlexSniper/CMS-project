              
                        <div class="col-xs-6">
         <table class="table table-bordered table-hover">
                    	<thead>
                    		<tr>
                    			<th>Id </th>
                    			<th> Category Title </th>
                    		</tr>
                    	</thead>
                    	<tbody><tr>
                
                    	</tr>
                    	</tbody>
                    	
				<?php //FIND ALL CATEGORIES QUERY
			 
			 function showAllData(){
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
function deleteRows(){
						if(isset($_GET['delete'])){
							$the_cat_id = $_GET['delete'];
							$query ="DELETE FROM categories WHERE cat_id = {$the_cat_id}";
							$delete_query= mysqli_query($connection,$query);
						$delete_query= mysqli_query($connection,$query);
							header("Location: category.php");
						}
	}
						?>
                   
                
                    </table>
                    </div>