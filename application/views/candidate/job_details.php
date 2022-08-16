<!DOCTYPE html>
<html>
    <head>
        <title>Job Details</title>
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/candidate/job_details.css">
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/global/layout.css">
    </head>

    <body>
            <div class="square">
                <div class="dash">
                    <h2>Job Details</h2>
                </div>
            
            <!-- <form method="post"  action="<?php //echo site_url('/candidate/apply_job/'); ?>"> -->
            <form method="post"  action="<?php echo base_url();?>index.php/candidate/apply_job/<?php foreach($val as $row) { echo $row->id;} ?>">
            <table class="table" id="table">
                <tr>
                    <td>Job ID :</td>
                    <td><label name = "id"><?php foreach($val as $row) { echo $row->id;} ?></label></td>
                </tr>
                <tr>
                    <td>Job Title :</td>
                    <td><label name = "job_title"><?php foreach($val as $row) { echo $row->job_title;} ?></label></td>
                </tr>
                <tr>
                    <td>Job Description :</td>
                    <td><label name = "description"><?php foreach($val as $row) { echo $row->description;} ?></label></td>
                </tr>
                <tr>
                    <td>Job Location :</td>
                    <td><label name = "job_location"><?php foreach($val as $row) { echo $row->job_location;} ?></label></td>
                </tr>
                <tr>
                    <td>Company :</td>
                    <td><label name = "company_name"><?php foreach($val as $row) { echo $row->company_name;} ?></label></td>
                </tr>
                <tr>
                    <td>Budget :</td>
                    <td><?php foreach($val as $row) { echo $row->ctc;} ?></td>
                </tr>
                <tr colspan="2">
                    <td><button type="submit" class="btn btn-primary" name ="id">Apply</button></td>    
                </tr>
            </table>
            <form>
        </div>
    </body>
<html>