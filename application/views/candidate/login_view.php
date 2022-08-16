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
			<h2>Candidate Login</h2>
		</div>
        <div class="center">
            <div class="login-box">
                
                <?php 
                    if ($this->session->flashdata('error')) 
                    {
                        echo $this->session->flashdata('error');
                    }
                ?>
                

                <form method="post"  action="<?php echo site_url('/candidate/login'); ?>">
                    <table class="center" cellpadding="5">
                        <tr>
                            <div class="form-group">
                                <td><label for="email">Email</label></td>
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
                                <td><label for="password">Password </label></td>
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
                                <td></td>
                                <td><button type="submit" class="btn btn-primary">Log in</button></td>
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <td></td>
                                <td><button type="submit" class="btn btn-primary" name="register"><a href="<?php echo site_url('candidate/signup') ?>">Signup</a></button></td>
                                
                            </div>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
    
    </body>
</html>