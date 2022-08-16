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
                    <h2>My Jobs</h2>
                </div>
            
                <div>
                <table class="table">
                    <tr>
                    <th>Job Title</th>
                    <th>Job Location</th>
                    <th>Max CTC Budget</th>
                    <th>Applications</th>
                    <th>Action</th>
                    </tr>

                    <?php 
                    foreach ($val as $row)
                    {
                        echo "<tr>";
                        echo "<td>".$row->job_title."</td>"; 
                        echo "<td>".$row->job_location."</td>";
                        echo "<td>".$row->ctc."</td>";
                        echo "<td><a href='view_applicants?id=".$row->id."'>".$row->applications."</a></td>";
                        echo "<td><a href='edit_job?id=".$row->id."'>Edit</a>&nbsp;&nbsp;<a href='delete_job?id=".$row->id."'>Delete</a></td>";
                        echo "</tr>";
                    } 
                ?>
                       
                </table>
                </div>
            </div>
    </body>
<html>