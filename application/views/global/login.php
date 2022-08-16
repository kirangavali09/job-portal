<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/global/login.css">
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/global/layout.css">
    </head>
    <body>
        
        <div class="square">
            <div class="heading">
		    		<h2>Log in</h2>
		    </div>
            <div class="text">
                <h3>You are</h3>
            </div>
            <div class="flex-container">
                <div><a href="<?php echo site_url('employer/login'); ?>">Employer</a></div>
                <div><a href="<?php echo site_url('candidate/login'); ?>">Candidate</a></div>
            </div>        
        </div>
    
    </body>
</html>