<!DOCTYPE html>
<html>
    <head>
        <title>My Jobs</title>
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/employer/myjob.css">
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/global/layout.css">
    </head>

    <body>
            <div class="square">
                <div class="dash">
                    <h2>All Applicants</h2>
                </div>
            
                <div>
                <table class="table">
                    <tr>
                    <th>Name</th>
                    <!-- <th></th> -->
                    <th>Current CTC (lakhs)</th>
                    <th>Current Location</th>
                    <th>Action</th>
                    </tr>

                    <?php 
                    foreach ($val as $row)
                    {
                    ?> 
                        <tr>
                            <td><?php echo $row->name; ?></td>
                            <td><?php echo $row->ctc; ?></td> 
                            <td><?php echo $row->current_location; ?></td>
                            <td><a href="<?php echo base_url(); ?>index.php/employer/download_resume?id=<?php echo $row->id; ?>">Download</a></td>
                        </tr>
                    <?php } 
                    ?>
                       
                </table>
                </div>
            </div>
    </body>
<html>