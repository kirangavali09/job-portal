<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/global/signup.css">
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/global/layout.css">
    </head>
    <body>
        
        <div class="square">
            <div class="heading">
		    		<h2>Sign up</h2>
		    </div>
            <div class="text">
                <h3>You are</h3>
            </div>
            <div class="flex-container">
                <div><a href="<?php echo site_url('employer/signup') ?>">Employer</a></div>
                <div><a href="<?php echo site_url('candidate/signup') ?>">Candidate</a></div>
            </div>        
        </div>
    
    </body>
</html>