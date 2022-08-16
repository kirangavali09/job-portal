<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/candidate/search.css">
    </head>

    <body>  
            <div class="content">
                <div class="dash">
                    <h2>Job Search</h2>
                </div>
                
                
                    <form method="post"  action="<?php echo site_url('/candidate/search'); ?>">
                    <div class="flex-container">
                        <div>
                            <p>Job Type: </p>
                            <select name="job_type" id="job_type">
                                <option value="all" selected disabled hidden>-- select --</option>
                                <option value="Full time" name = "fullTime">Full Time</option>
                                <option value="Part time" name = "partTime">Part time</option>
                                <option value="contract Based" name = "contractBased">Contract Based</option>
                                </select>
                        </div>
                        <div>
                            <p>Job Location:</p>
                            <select name="job_location" id="jobLocation">
                                <option value="all location">All Location</option>
                                    <option value="mumbai">mumbai</option>
                                    <option value="delhi">Delhi</option>
                                    <option value="bangalore">Bangalore</option>
                                </select>
                        </div>
                        <div id='btn'>
                            <button type="submit" name="search">Search</button>
                         </div>
                    
                </div>
                </form>
                
            </div>

            <div class="outer-div">
                <div class="inner-div">
                    <h2>Search Results</h2>
                </div>

                <div>
                <table class="table">
                    <tr>
                        <th>Job Title</th>
                        <th>Company Name</th>
                        <th>Job Location</th>
                    </tr>
                    <?php 
                        foreach ($val as $row)
                        {
                            echo "<tr>";
                            echo "<td><a href='job_Details?id=".$row->id."'>$row->job_title</a></td>"; 
                            echo "<td>".$row->company_name."</td>";
                            echo "<td>".$row->job_location."</td>";
                            echo "</tr>";
                        } 
                    ?>
    
                </table>
                </div>
            </div>
    </body>
<html>