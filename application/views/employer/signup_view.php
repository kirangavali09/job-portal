<!DOCTYPE html>
<html>
    <head>
        <title>Employer Register</title>
		<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/global/signup.css">
		<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/global/layout.css">
    </head>

    <body>
        <div class="square">
            <div class="heading">
				<h2>Employer Sign up</h2>
			</div>
            <?php 
				if ($this->session->flashdata('success')) 
				{
					echo "<h4>".$this->session->flashdata('success')."</h4>";
				}
			
			?>	
			<form method="post"  action="<?php echo site_url('employer/signup'); ?>"> 
	    		<table class="center" cellpadding="5">
	    			<tr>
	    				<div>
                        <td><img src=""></td>
	    					<td><div class="box">I'm an Employer</div>
						</td>
	    				</div>
	    			</tr>
	    			<tr>
	    				<div class="form-group">
	    					<td><label for="company_name" class="required">Company Name</label></td>
	    					<td><input type="text" class="form-control" id="company_name" name="company_name"></td>
	    				</div>
	    			</tr>
					<tr>
	    				<div class="form-group">
	    					<td></td>
	    					<td> <?php echo form_error('company_name', '<div class="error">','</div>'); ?></td>
	    				</div>
	    			</tr>
                    <tr>
					    <div class="form-group">
					    	<td><label for="company_address">Company Address</label></td>
					    	<td><textarea rows="2" cols="21" id="company_address" name="company_address"></textarea></td>
					    </div>
				    </tr>
	    			<tr>
	    				<div class="form-group">
	    					<td><label for="first_name" class="required">First Name</label></td>
	    					<td><input type="text" class="form-control" id="first_name" name="first_name"></td>
	    				</div>
	    			</tr>
					<tr>
	    				<div class="form-group">
	    					<td></td>
	    					<td> <?php echo form_error('first_name', '<div class="error">','</div>'); ?></td>
	    				</div>
	    			</tr>
                    <tr>
	    				<div class="form-group">
	    					<td><label for="last_name" class="required">Last Name</label></td>
	    					<td><input type="text" class="form-control" id="last_name" name="last_name"></td>
	    				</div>
	    			</tr>
					<tr>
	    				<div class="form-group">
	    					<td></td>
	    					<td> <?php echo form_error('last_name', '<div class="error">','</div>'); ?></td>
	    				</div>
	    			</tr>
                    <tr>
	    				<div class="form-group">
	    					<td><label>Gender</label></td>
	    					<td><input type="radio" id="gender" name="gender" value="male"/> Male     
                                <input type="radio" id="gender" name="gender" value="female"/> Female 
                            </td>
	    				</div>
	    			</tr>
                    <tr>
	    				<div class="form-group">
	    					<td><label for="contact_number">Contact Number</label></td>
	    					<td><input type="text" class="form-control" id="contact_number" name="contact_number"></td>
	    				</div>
	    			</tr>
                    <tr>
	    				<div class="form-group">
	    					<td><label for="current_location">Current Location</label></td>
	    					<td><input type="text" class="form-control" id="current_location" name="current_location"></td>
	    				</div>
	    			</tr>
	    			<tr>
	    				<div class="form-group">
	    					<td><label for="email" class="required">Email address</label></td>
	    					<td><input type="email" class="form-control" id="email" name="email"></td>
	    				</div>
	    			</tr>
					<tr>
	    				<div class="form-group">
	    					<td></td>
	    					<td> <?php echo form_error('email', '<div class="error">','</div>'); ?></td>
	    				</div>
	    			</tr>
                    <tr>
	    				<div class="form-group">
	    					<td><label for="password" class="required">Password </label></td>
	    					<td><input type="password" class="form-control" id="password" name="password"></td>
	    				</div>
	    			</tr>
					<tr>
	    				<div class="form-group">
	    					<td></td>
	    					<td> <?php echo form_error('password', '<div class="error">','</div>'); ?></td>
	    				</div>
	    			</tr>
                    <tr>
	    				<div class="form-group">
	    					<td><label for="repassword" class="required">Re-enter Password</label></td>
	    					<td><input type="password" class="form-control" id="repassword" name="repassword"></td>
	    				</div>
	    			</tr>
					<tr>
	    				<div class="form-group">
	    					<td></td>
	    					<td> <?php echo form_error('repassword', '<div class="error">','</div>'); ?></td>
	    				</div>
	    			</tr>
                    <tr>
	    				<div class="form-group">
	    					<td></td>
                            <td><input type="checkbox" class="form-control" id="terms" name="terms"><label for="terms">I agree to the terms and conditions</label></td>
	    				</div>
	    			</tr>
	    			<tr>
	    				<div class="form-group">
	    					<td></td>
	    					<td><button type="submit" class="btn btn-primary">Register</button></td>
	    				</div>
	    			</tr>	
	    		</table> 	
	    	</form>
        </div>
    </body>
</html>