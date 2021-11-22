 
<html>
<head>
	<title>Employer Registration</title>
	 
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
		<div class="col-md-5">
			<div class="card mt-4">
  				<div class="card-header">
    				<div class="fw-bold">Employer Registration</div>
  				</div>
  				<form action="<?php echo base_url().'index.php/cdc/Auth/register'?>" name="registerForm" id="registerForm" method="post">
	  				<div class="card-body register">
	    			<p class="card-text">Fill your details</p>
	    				<div class="form-group">
	    					<label for="name">Employee Id</label>
	    					<input type="text" name="emp_id" id="emp_id" value="<?php echo set_value('emp_id')?>" class="form-control <?php echo (form_error('emp_id') !="") ? "is-invalid":'';?>" placeholder="Employee ID">
	    					<p class="invalid-feedback"><?php echo strip_tags(form_error('emp_id'));?></p>
	    				</div>

						<div class="form-group">
	    					<label for="name">Password</label>
	    					<input type="text" name="password" id="password" value="<?php echo set_value('password')?>" class="form-control <?php echo (form_error('password') !="") ? "is-invalid":'';?>" placeholder="Password">
	    					<p class="invalid-feedback"><?php echo strip_tags(form_error('password'));?></p>
	    				</div>

	    				<div class="form-group">
	    					<label for="name">Name</label>
	    					<input type="text" name="name" id="name" value="<?php echo set_value('name')?>" class="form-control <?php echo (form_error('name') !="") ? "is-invalid":'';?>" placeholder="Name">
	    					<p class="invalid-feedback"><?php echo strip_tags(form_error('name'));?></p>
	    				</div>

	    				<div class="form-group">
	    					<label for="name">Website</label>
	    					<input type="text" name="website" id="website" value="<?php echo set_value('website')?>" class="form-control <?php echo (form_error('website') !="") ? "is-invalid":'';?>" placeholder="website">
	    					<p class="invalid-feedback"><?php echo strip_tags(form_error('website'));?></p>
	    				</div>

	    				<div class="form-group">
	    					<label for="name">Email ID</label>
	    					<input type="text" name="email_id" id="email_id" value="<?php echo set_value('email_id')?>" class="form-control <?php echo (form_error('email_id') !="") ? "is-invalid":'';?>" placeholder="Email">
	    					<p class="invalid-feedback"><?php echo strip_tags(form_error('email_id'));?></p>
	    				</div>

	    				<div class="form-group">
	    					<label for="name">Contact Number</label>
	    					<input type="number" name="contact_no" id="contact_no" value="<?php echo set_value('contact_no')?>" class="form-control <?php echo (form_error('contact_no') !="") ? "is-invalid":'';?>" placeholder="Contact Number">
	    					<p class="invalid-feedback"><?php echo strip_tags(form_error('contact_no'));?></p>
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