<!DOCTYPE html>
<html>
    <head>
        <title>My Profile</title>
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/candidate/job_details.css">
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/global/layout.css">

        <style>
            .edit{
                    margin-top: 61px;
                    float: right;
                    margin-right: 2%;;
            }
        </style>
    </head>

    <body>
            <div class="square">
                <div class="dash">
                    <h2>My Profile</h2>
                </div>
                
                <?php echo $error;?>

            
            <form method="post"  action="update_candidate?id=<?php foreach($val as $row) { echo $row->id;} ?>" enctype = "multipart/form-data">
            <div class="edit">
                
            </div>
            <table class="table" id="table">
                <tr>
                    <td>
                        <?php //echo validation_errors(); ?>
                    </td>
                </tr>
                <tr>
                    <td>Resume :</td>
                    <td><input type="file" name="resume" class="form-control" id="resume"/></td>
                </tr>
                <tr>
                    <td>Current CTC :</td>
                    <td><input type="text" class="form-control" id="ctc" name="ctc" value="<?php foreach($val as $row) { echo $row->ctc;} ?>"></td>
                </tr>
                <tr>
                    <td>First Name :</td>
                    <td><input type="text" class="form-control" id="first_name" name="first_name" value="<?php foreach($val as $row) { echo $row->first_name;} ?>"></td>
                </tr>
                <tr>
                    <td>Last Name :</td>
                    <td><input type="text" class="form-control" id="last_name" name="last_name" value="<?php foreach($val as $row) { echo $row->last_name;} ?>"></td>
                </tr>
               <tr>
                    <td>Gender :</td>
                    <td><input type="text" class="form-control" id="gender" name="gender" value="<?php foreach($val as $row) { echo $row->gender;} ?>"></td>
                </tr>
                <tr>
                    <td>Date of Birth :</td>
                    <td><input type="text" class="form-control" id="dob" name="dob" value="<?php foreach($val as $row) { echo $row->dob;} ?>"></td>
                </tr>
                <tr>
                    <td>Contact Number :</td>
                    <td><input type="text" class="form-control" id="contact_number" name="contact_number" value="<?php foreach($val as $row) { echo $row->contact_number;} ?>"></td>
                </tr>
                <tr>
                    <td>Current Location :</td>
                    <td><input type="text" class="form-control" id="current_location" name="current_location" value="<?php foreach($val as $row) { echo $row->current_location;} ?>"></td>
                </tr>
                <tr>
                    <td>Email Id :</td>
                    <td><input type="text" class="form-control" id="email" name="email" value="<?php foreach($val as $row) { echo $row->email;} ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit" value = "upload">Update</button></td>
                </tr>
            </table>
        </div>
    </body>
<html>