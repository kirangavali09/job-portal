<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $page_title; ?></title>
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/global/header.css">
        
    </head>

    <body>
            <h1>Job Portal</h1>
            <div class="dash-nav">
                <a href="<?php echo site_url('candidate/dashboard'); ?>">Dashboard</a>
                <a href="<?php echo site_url('candidate/search'); ?>">Search Jobs</a>
                <a href="<?php echo site_url('candidate/my_applied_jobs'); ?>">My Applied Jobs</a>
                <a href="<?php echo site_url('candidate/my_profile'); ?>">My Profile</a>

                <div class="logout">
                    <a href="#"><?php echo $this->session->userdata('first_name'); ?></a>
                    <a href="<?php echo site_url('candidate/logout')?>">Logout</a>
                </div>
            </div>
    </body>
<html>