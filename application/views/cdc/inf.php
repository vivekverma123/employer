<html>
<head>
	<title>INF</title>
 	
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/style.css'?>">
</head>
<body>
	<div class="container">
		<?php 
			$msg = $this->session->flashdata('msg');
			if($msg!=""){
				echo "<div class='alert alert-success'>$msg</div>";
			}

		?>
		<div class="col-md-10">
			<div class="card mt-4">
  				<div class="card-header">
    				<div class="fw-bold">INF</div>
  				</div>
  				<form action="<?php echo base_url().'index.php/cdc/Auth/INFregister'?>" name="registerForm" id="registerForm" method="post">
	  				<div class="card-body register">
	    			<p class="card-text">Please fill the details</p>

	    				<div class="form-group">
	    					<label for="name">Employee ID</label>
	    					<input type="text" name="emp_id" id="emp_id" value="<?php echo set_value('emp_id')?>" class="form-control <?php echo (form_error('emp_id') !="") ? "is-invalid":'';?>" placeholder="Employee ID">
	    					<p class="invalid-feedback"><?php echo strip_tags(form_error('emp_id'));?></p>
	    				</div>

	    				<div class="form-group">
	    					<label for="name">Designation</label>
	    					<input type="text" name="designation" id="designation" value="<?php echo set_value('designation')?>" class="form-control <?php echo (form_error('designation') !="") ? "is-invalid":'';?>" placeholder="Designation">
	    					<p class="invalid-feedback"><?php echo strip_tags(form_error('designation'));?></p>
	    				</div>

	    				<div class="form-group">
	    					<label for="name">Job Describtion</label>
	    					<input type="text" name="jd" id="jd" value="<?php echo set_value('jd')?>" class="form-control <?php echo (form_error('jd') !="") ? "is-invalid":'';?>" placeholder="Job Describtion">
	    					<p class="invalid-feedback"><?php echo strip_tags(form_error('jd'));?></p>
	    				</div>

	    				<div class="form-group">
	    					<label for="name">Place</label>
	    					<input type="text" name="place" id="place" value="<?php echo set_value('place')?>" class="form-control <?php echo (form_error('place') !="") ? "is-invalid":'';?>" placeholder="Place">
	    					<p class="invalid-feedback"><?php echo strip_tags(form_error('place'));?></p>
                        </div>

                        <div class="form-group">
	    					<label for="name">Stipend</label>
	    					<input type="text" name="stipend" id="stipend" value="<?php echo set_value('stipend')?>" class="form-control <?php echo (form_error('stipend') !="") ? "is-invalid":'';?>" placeholder="stipend">
	    					<p class="invalid-feedback"><?php echo strip_tags(form_error('stipend'));?></p>
                        </div>

                        <div class="form-group">
	    					<label for="name">Duration in weeks</label>
	    					<input type="text" name="duration_weeks" id="duration_weeks" value="<?php echo set_value('duration_weeks')?>" class="form-control <?php echo (form_error('duration_weeks') !="") ? "is-invalid":'';?>" placeholder="duration in weeks">
	    					<p class="invalid-feedback"><?php echo strip_tags(form_error('duration_weeks'));?></p>
                        </div>
                        
                        <div class="form-group">
	    					<label for="name">Resume Shortlist?</label>
	    					<input type="text" name="resume_shortlist" id="resume_shortlist" value="<?php echo set_value('resume_shortlist')?>" class="form-control <?php echo (form_error('resume_shortlist') !="") ? "is-invalid":'';?>" placeholder="Resume Shortlist">
	    					<p class="invalid-feedback"><?php echo strip_tags(form_error('resume_shortlist'));?></p>
                        </div>

						<h3> 4-Year Bachelor of Technology - Admitted through JEE Advanced </h3>
						<?php
							foreach($btech as $key => $row)
							{
								$branch_name = '';
								foreach($branch as $key1 => $row1)
								{
									if($row1->id==$row->branch_id)
									{
										$branch_name = $row1->name;
										break;
									}
								}
								echo '<input class="form-group" type=checkbox name = "check[]" id = "'.$row->course_id.'" value = "'.$row->course_branch_id.'">'; 
								echo '<label for="'.$row->course_id.'">  '.$branch_name.'</label><br>';
							}
						?>

						<h3> 5-Year Integrated M. Tech - Admitted through JEE Advanced</h3>
						<?php
							foreach($int_mtech as $key => $row)
							{
								$branch_name = '';
								foreach($branch as $key1 => $row1)
								{
									if($row1->id==$row->branch_id)
									{
										$branch_name = $row1->name;
										break;
									}
								}
								echo '<input class="form-group" type=checkbox name = "'.$row->course_id.'" id = "'.$row->course_id.'" value = "'.$row->course_branch_id.'">'; 
								echo '<label for="'.$row->course_id.'">  '.$branch_name.'</label><br>';
							}
						?>

						<h3> 5-Year Dual Degree - Admitted through JEE Advanced </h3>
						<?php
							foreach($dual as $key => $row)
							{
								$branch_name = '';
								foreach($branch as $key1 => $row1)
								{
									if($row1->id==$row->branch_id)
									{
										$branch_name = $row1->name;
										break;
									}
								}
								echo '<input class="form-group" type=checkbox name = "check[]" id = "'.$row->course_id.'" value = "'.$row->course_branch_id.'">'; 
								echo '<label for="'.$row->course_id.'">  '.$branch_name.'</label><br>';
							}
						?>

					<h3> 2-Year Master of Technology - Admitted through GATE </h3>
						<?php
							foreach($mtech as $key => $row)
							{
								$branch_name = '';
								foreach($branch as $key1 => $row1)
								{
									if($row1->id==$row->branch_id)
									{
										$branch_name = $row1->name;
										break;
									}
								}
								echo '<input class="form-group" type=checkbox name = "check[]" id = "'.$row->course_id.'" value = "'.$row->course_branch_id.'">'; 
								echo '<label for="'.$row->course_id.'">  '.$branch_name.'</label><br>';
							}
						?>

					<h3> 3-Year Master of Science and Technology - Admitted through JAM </h3>
						<?php
							foreach($msc_tech as $key => $row)
							{
								$branch_name = '';
								foreach($branch as $key1 => $row1)
								{
									if($row1->id==$row->branch_id)
									{
										$branch_name = $row1->name;
										break;
									}
								}
								echo '<input class="form-group" type=checkbox name = "check[]" id = "'.$row->course_id.'" value = "'.$row->course_branch_id.'">'; 
								echo '<label for="'.$row->course_id.'">  '.$branch_name.'</label><br>';
							}
						?>

					<h3> Master of Business Administration - Admitted through CAT </h3>
						<?php
							foreach($mba as $key => $row)
							{
								$branch_name = '';
								foreach($branch as $key1 => $row1)
								{
									if($row1->id==$row->branch_id)
									{
										$branch_name = $row1->name;
										break;
									}
								}
								echo '<input class="form-group" type=checkbox name = "check[]" id = "'.$row->course_id.'" value = "'.$row->course_branch_id.'">'; 
								echo '<label for="'.$row->course_id.'">  '.$branch_name.'</label><br>';
							}
						?>
                        
                        <div class="form-group">
	    					<label for="name">Type of Test</label>
	    					<input type="text" name="type_of_test" id="type_of_test" value="<?php echo set_value('type_of_test')?>" class="form-control <?php echo (form_error('type_of_test') !="") ? "is-invalid":'';?>" placeholder="Type of Test">
	    					<p class="invalid-feedback"><?php echo strip_tags(form_error('type_of_test'));?></p>
                        </div>
                        
                        <div class="form-group">
	    					<label for="name">Number of rounds</label>
	    					<input type="text" name="rounds" id="rounds" value="<?php echo set_value('rounds')?>" class="form-control <?php echo (form_error('rounds') !="") ? "is-invalid":'';?>" placeholder="Number of rounds">
	    					<p class="invalid-feedback"><?php echo strip_tags(form_error('rounds'));?></p>
                        </div>
                        
                        <div class="form-group">
	    					<label for="name">Number of offers</label>
	    					<input type="text" name="offers" id="offers" value="<?php echo set_value('offers')?>" class="form-control <?php echo (form_error('offers') !="") ? "is-invalid":'';?>" placeholder="Number of offers">
	    					<p class="invalid-feedback"><?php echo strip_tags(form_error('offers'));?></p>
                        </div>
                        
                        <div class="form-group">
	    					<label for="name">GPA Criteria</label>
	    					<input type="text" name="gpa" id="gpa" value="<?php echo set_value('gpa')?>" class="form-control <?php echo (form_error('gpa') !="") ? "is-invalid":'';?>" placeholder="GPA">
	    					<p class="invalid-feedback"><?php echo strip_tags(form_error('gpa'));?></p>
                        </div>

                        <div class="form-group">
	    					<label for="name">Female Only (Y/N)</label>
	    					<input type="text" name="female_only" id="female_only" value="<?php echo set_value('female_only')?>" class="form-control <?php echo (form_error('female_only') !="") ? "is-invalid":'';?>" placeholder="Female Only">
	    					<p class="invalid-feedback"><?php echo strip_tags(form_error('female_only'));?></p>
                        </div>

						<div class="form-group">
	    					<label for="name">PPO Offer</label>
	    					<input type="text" name="ppo_offered" id="ppo_offered" value="<?php echo set_value('ppo_offered')?>" class="form-control <?php echo (form_error('ppo_offered') !="") ? "is-invalid":'';?>" placeholder="ppo offered">
	    					<p class="invalid-feedback"><?php echo strip_tags(form_error('ppo_offered'));?></p>
                        </div>

						<div class="form-group">
	    					<label for="name">CTC in LPA</label>
	    					<input type="text" name="ctc_lpa" id="ctc_lpa" value="<?php echo set_value('ctc_lpa')?>" class="form-control <?php echo (form_error('ctc_lpa') !="") ? "is-invalid":'';?>" placeholder="ctc in lpa">
	    					<p class="invalid-feedback"><?php echo strip_tags(form_error('ctc_lpa'));?></p>
                        </div>

	    				<div class="form-group">
	    					<button class="btn btn-block btn-primary mt-2">REGISTER</button>
	    				</div>
	  				</div>
  				</form>
			</div>
		</div>
	</div>
</body>
</html>