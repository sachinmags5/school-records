<?php

	include 'db.php';
	if($_REQUEST['req_type'] == 'edit_req')
	{
		$sel_sql = "SELECT * FROM students_data WHERE id = '$_REQUEST[edit_id]'";
		$run_sql = mysqli_query($conn,$sel_sql);
		while($rows = mysqli_fetch_assoc($run_sql)) { ?>
			
			<div class="form-group">
					<label class="control-label col-md-2">emp Name</label>
					<div class="col-md-6">
						<input type="text" value="<?php echo $rows['student_name'] ?>" id="ed_student_name1" name="name" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-2">Student subject</label>
					<div class="col-md-6">
						<input type="text" value="<?php echo $rows['subject'] ?>" id="ed_student_subject" name="sub" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-2">Student fee</label>
					<div class="col-md-6">
						<input type="text" value="<?php echo $rows['fee'] ?>" id="ed_student_fee" name="fee" class="form-control">
					</div>
				</div>	
				<div class="form-group">
					
					<div class="col-md-10 col-md-offset-2">
						<button class="btn btn-danger" name="submit" onclick="edit_request('edit_btn',<?php echo $rows['id'];?>);" class="form-control">Edit Record	</button>
					</div>
				</div>	


	<?php 
		}

	}
	elseif ($_REQUEST['req_type'] == 'edit_btn')
	{
		$update_sql = "UPDATE students_data SET student_name = '$_REQUEST[ed_stu_name]', subject = '$_REQUEST[ed_stu_sub]', fee = '$_REQUEST[ed_stu_fee]' WHERE id = '$_REQUEST[edit_id]' ";
		$ed_run = mysqli_query($conn, $update_sql);

	}
	

 ?>
				