<!DOCTYPE html>
<html>
    <head>
        <title>Employer Dashboard</title>
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/employer/add_job.css">
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/global/layout.css">
    </head>

    <body>
            <div class="square">
                <div class="dash">
                    <h2>Post New Job</h2>
                </div>
                <div class="div-1">
                    <?php 
                    if ($this->session->flashdata('success')) 
                    {
                        echo "<h3>".$this->session->flashdata('success')."</h3>";
                    }
                
                    ?>
                    <form method="post"  action="<?php echo site_url('employer/addjob'); ?>">
                    
                    <table class="center" cellpadding="15">
                        <tr>
                            <div class="form-group">
                                <td><label for="job_title">Job Title</label></td>
                                <td><input type="text" class="form-control" id="job_title" name="job_title"></td>
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <td><label for="description">Description</label></td>
                                <td><textarea rows="2" cols="22" id="description" name="description"></textarea></td>
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <td><label for="ctc">Budget (CTC)</label></td>
                                <td><input type="text" class="form-control" id="ctc" name="ctc">&nbsp;lakhs</td>
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <td><label for="experience">Min Experience</label></td>
                                <td><input type="text" class="form-control" id="experience" name="experience"></td>
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <td><label for="job_type">Job Type</label></td>
                                <td>
                                    <select name="job_type" id="job_type">
                                        <option value="Full Time">Full Time</option>
                                        <option value="Part Time">Part Time</option>
                                    </select>
                                </td>
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <td><label for="job_location">Job Location</label></td>
                                <td>
                                    <select name="job_location" id="job_location">
                                        <option value="mumbai">Mumbai</option>
                                        <option value="pune">Pune</option>
                                        <option value="banglore">Bangalore</option>
                                        <option value="delhi">Delhi</option>
                                    </select>
                                </td>
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <td></td>
                                <td><button type="submit" class="btn btn-primary">Post</button></td>
                            </div>
                        </tr>	
                    </table> 	
                    </form>
                </div>
            </div>
    </body>
<html>