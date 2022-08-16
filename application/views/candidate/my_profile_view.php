<!DOCTYPE html>
<html>
    <head>
        <title>Job Details</title>
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/candidate/job_details.css">
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/global/layout.css">

        <style>
            button{
                padding: 7px;
                width: 137%;
                margin-left: -119%;
            }
            h2
            {
                margin-left: 10%;
                width: 120px;
            }
        </style>
    </head>

    <body>
            <div class="square">
                <div class="dash">
                    <div>
                        <h2>My Profile</h2>
                    </div>
                    <div class="edit">
                        <a href='edit_profile?id=<?php foreach($val as $row) { echo $row->id;} ?>'><button>Edit</button></a>
                    </div>
                </div>
            
            <!-- <form method="post"  action="<?php //echo site_url('/candidate/apply_job/'); ?>"> -->
            <table class="table" id="table">
                <tr>
                    <td>Resume :</td>
                    <td><label name ="<?php foreach($val as $row) { echo $row->resume;} ?>"><a href="download_resume?id=<?php foreach($val as $row) { echo $row->id;} ?>"><?php foreach($val as $row) { echo $row->resume;} ?></a></label></td>
                </tr>
                <tr>
                    <td>Current CTC :</td>
                    <td><label name = "ctc"><?php foreach($val as $row) { echo $row->ctc;} ?></label></td>
                </tr>
                <tr>
                    <td>First Name :</td>
                    <td><label name = "first_name"><?php foreach($val as $row) { echo $row->first_name;} ?></label></td>
                </tr>
                <tr>
                    <td>Last Name :</td>
                    <td><label name = "last_name"><?php foreach($val as $row) { echo $row->last_name;} ?></label></td>
                </tr>
               <tr>
                    <td>Gender :</td>
                    <td><label name = "gender"><?php foreach($val as $row) { echo $row->gender;} ?></label></td>
                </tr>
                <tr>
                    <td>Date of Birth :</td>
                    <td><label name = "dob"><?php foreach($val as $row) { echo $row->dob;} ?></label></td>
                </tr>
                <tr>
                    <td>Contact Number :</td>
                    <td><label name = "contact_number"><?php foreach($val as $row) { echo $row->contact_number;} ?></label></td>
                </tr>
                <tr>
                    <td>Current Location :</td>
                    <td><label name = "current_location"><?php foreach($val as $row) { echo $row->current_location;} ?></label></td>
                </tr>
                <tr>
                    <td>Email Id :</td>
                    <td><label name = "email"><?php foreach($val as $row) { echo $row->email;} ?></label></td>
                </tr>
            </table>
        </div>
    </body>
<html>