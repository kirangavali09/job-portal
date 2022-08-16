<!DOCTYPE html>
<html>
    <head>
        <title>My Applied Jobs</title>
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/employer/myjob.css">
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/global/layout.css">
    </head>

    <body>
            <div class="square">
                <div class="dash">
                    <h2>My Applied Jobs</h2>
                </div>
            
                <div>
                <table class="table">
                    <tr>
                    <th>Title</th>
                    <th>Company Name</th>
                    <th>Current Location</th>
                    <th>Min Experience Required</th>
                    <th>Applied On</th>
                    </tr>

                    <?php 
                    foreach ($value as $row)
                    {
                        echo "<tr>";
                        echo "<td>".$row->job_title."</td>";
                        echo "<td>".$row->company_name."</td>"; 
                        echo "<td>".$row->current_location."</td>";
                        echo "<td>".$row->experience."</td>";
                        echo "<td>".$row->applied_on."</td>";
                        echo "</tr>";
                    } 
                ?>
                       
                </table>
                </div>
            </div>
    </body>
</html>