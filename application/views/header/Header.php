<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> <?php echo $title;?></title>
    <!-- BOOTSTRAP STYLES-->
    <link href="<?php echo base_url('assets');?>/binary/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="<?php echo base_url('assets');?>/binary/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="<?php echo base_url('assets');?>/binary/assets/css/custom.css" rel="stylesheet" />

    <link href="<?php echo base_url('assets');?>/jquery-ui-1.12.1.custom/jquery-ui.css" rel="stylesheet" />

    <link href="<?php echo base_url('assets');?>/plugins/datepicker/datepicker3.css" rel="stylesheet" />

    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Insta</a> 
            </div>
            <div style="color: white;
            padding: 15px 50px 5px 50px;
            float: right;
            font-size: 16px;"><a href="<?=base_url('conaddpost')?>" class="btn btn-default">Add Post</a> Halo <?=$this->session->userdata('nama')==null ? $this->session->userdata('username') : $this->session->userdata('nama')?> &nbsp; <?=$kertas == 1 ? '<a href="'.base_url("login/logout").'" class="btn btn-danger square-btn-adjust">Logout</a>' : ''?> </div>
        </nav>