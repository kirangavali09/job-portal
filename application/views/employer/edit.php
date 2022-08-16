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
                    <h2>Update</h2>
                </div>
                <div class="div-1">
                    <?php 
                    if ($this->session->flashdata('success')) 
                    {
                        echo "<h3>".$this->session->flashdata('success')."</h3>";
                    }
                
                    ?>
                    <form method="post"  action="<?php echo base_url(); ?>index.php/employer/update_job/<?php echo $val->id; ?>">
                    
                    <table class="center" cellpadding="15">
                        <tr>
                            <div class="form-group">
                                <td><label for="job_title">Job Title</label></td>
                                <td><input type="text" class="form-control" id="job_title" name="job_title" value="<?php echo $val->job_title; ?>"></td>
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <td><label for="description">Description</label></td>
                                <td><textarea rows="2" cols="22" id="description" name="description"><?php echo $val->description; ?></textarea></td>
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <td><label for="ctc">Budget (CTC)</label></td>
                                <td><input type="text" class="form-control" id="ctc" name="ctc" value="<?php echo $val->ctc; ?>">&nbsp;lakhs</td>
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <td><label for="experience">Min Experience</label></td>
                                <td><input type="text" class="form-control" id="experience" name="experience" value="<?php echo $val->experience; ?>"></td>
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <td><label for="job_type">Job Type</label></td>
                                <td>
                                    <select name="job_type" id="job_type">
                                        <option value="Full Time" <?php if($val->job_type == "Full Time") echo 'selected="selected"'; ?>>Full Time</option>
                                        <option value="Part Time" <?php if($val->job_type == "Part Time") echo 'selected="selected"'; ?>>Part Time</option>
                                    </select>
                                </td>
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <td><label for="job_location">Job Location</label></td>
                                <td>
                                    <select name="job_location" id="job_location">
                                        <option value="mumbai" <?php if($val->job_location == "mumbai") echo 'selected="selected"'; ?>>Mumbai</option>
                                        <option value="pune" <?php if($val->job_location == "pune") echo 'selected="selected"'; ?>>Pune</option>
                                        <option value="bangalore" <?php if($val->job_location == "bangalore") echo 'selected="selected"'; ?>>Bangalore</option>
                                        <option value="delhi" <?php if($val->job_location == "delhi") echo 'selected="selected"'; ?>>Delhi</option>
                                    </select>
                                </td>
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <td></td>
                                <td><button type="submit" class="btn btn-primary">Update</button></td>
                            </div>
                        </tr>	
                    </table> 	
                    </form>
                </div>
            </div>
    </body>
<html>