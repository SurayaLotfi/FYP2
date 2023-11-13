<table border="1">
								<tr>
									<th>No</th>
									<th>Title</th>
									<th>Format</th>
									<th>Class ID</th>
									<th>Department</th>
									<th>Date Created</th>
									<th>Action</th>
								</tr>

							
							<?php 
							$i = 1;
							include "phpfiles/connect.php";
							$query = "SELECT * FROM class";
							$result = mysqli_query($db,$query);

							if($result){
								while($row = mysqli_fetch_assoc($result)){
									$id = $row['id'];								
			
						   ?>
								<tr>
									<td><?php echo $i ?></td>
									<td><?php echo $row['title'] ?></td>
									<td><?php echo $row['format'] ?></td>
									<td><?php echo $row['class_id'] ?></td>
									<td><?php echo $row['time_added'] ?></td>
									<td><?php echo $row['format'] ?></td>
									<td>
									<a href='' class='btn btn-success'>Update</a>
									</td>
								</tr>
							<?php
								}
							}
							?>
								
							</table>