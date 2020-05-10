<?php
	include 'db.php';

	if($_REQUEST['req'] != '')
	{
		if ($_REQUEST['req'] == 'add_new_record')
		{
			$student_name = $_REQUEST['stu_name'];
		$student_subject = $_REQUEST['stu_sub'];
		$student_fee = $_REQUEST['stu_fee'];
		
		$ins_sql= "INSERT INTO students_data (student_name,subject,fee) VALUES ('$student_name','$student_subject','$student_fee')";
		$run_sql = mysqli_query($conn,$ins_sql);
		}
		elseif ($_REQUEST['req'] == 'delete_record')
		{
			$del_id = $_REQUEST['id'];
			$del_req = " DELETE FROM students_data WHERE id= '$del_id' ";
			$run_sql = mysqli_query($conn,$del_req);
		}
		

	}

	$sql= "SELECT * FROM students_data";
	$run= mysqli_query($conn,$sql);
	while ($rows = mysqli_fetch_assoc($run)) {
		# code...?>
		<tr>
						<td><?php echo $rows['id'];?></td>
						<td><?php echo $rows['student_name'];?></td>
						<td><?php echo $rows['subject'];?></td>
						<td><?php echo $rows['fee'];?></td>
						<td>
							<div class="dropdown">
								<button class="btn btn-primary" data-toggle="dropdown">actions<span class="caret"></span></button>
								<ul class="dropdown-menu">
									<li><a href="javascript:void(0)" onclick="edit_request('edit_req',<?php echo $rows['id'];?>)">Edit</a></li>
									<li><a href="javascript:void(0)" onclick="ajax_request('delete_record',<?php echo $rows['id'];?>)">Delete</a></li>
								</ul>
							</div>
						</td>
					</tr>
<?php }
?>

					