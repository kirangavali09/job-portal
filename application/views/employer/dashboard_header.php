<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $page_title; ?></title>
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/global/header.css">
    </head>

    <body>
        <h2>Job Portal</h2>
        <div class="dash-nav">
            <a href="<?php echo site_url('employer/dashboard') ?>">Dashboard</a>
            <a href="<?php echo site_url('employer/addjob') ?>">Post New Job</a>
            <a href="<?php echo site_url('employer/myjobs') ?>">My Jobs</a>
            <a href="#about">My Profile</a>
            <div class="logout">
                <a href="#"><?php echo $this->session->userdata('company_name'); ?></a>
                <a href="<?php echo site_url('employer/logout')?>">Logout</a> 
            </div>
        </div>
    </body>
<html>