<!DOCTYPE html>
<html lang="en">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="<?php echo base_url();?>dist/images/logo.svg" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="LEFT4CODE">
        <title>Dashboard <?php echo settings('nama')?></title>
        <!-- BEGIN: CSS Assets-->
      
        <link rel="stylesheet" href="<?php echo base_url();?>dist/css/app.css" />
        <!-- END: CSS Assets-->
        <style>
            .dataTables_wrapper {
                min-height: 500px
            }
            
            .dataTables_processing {
                position: absolute;
                top: 50%;
                left: 50%;
                width: 100%;
                margin-left: -50%;
                margin-top: -25px;
                padding-top: 20px;
                text-align: center;
                font-size: 1.2em;
                color:grey;
            }
            body{
                padding: 15px;
            }

            .nav-mobile {
                   
                background-color: #1c3faa;
                padding: 10px;
                text-align: center;
                width: 100%;
                color:#ffff;
                /* Pay special attention here! */
                position: sticky;
                bottom: 0px;
                z-index: 100;
                --border-opacity: 1;
                border-color: #2e51bb;
                border-color: rgba(46, 81, 187, var(--border-opacity));
            }
            .nav-mobile .mobile-menu-bar {
                height: 60px;
                padding-left: 2rem;
                padding-right: 2rem;
                display: flex;
            
            align-items: center;
            }

           

           
        </style>
      
    </head>
    
    <!-- END: Head -->
    
    <body class="app">

    
        
        
        

       
        <!-- END: Mobile Menu -->
        <div class="flex">
            <!-- BEGIN: Side Menu -->
           
            <nav class="side-nav">
                <a href="<?php echo base_url();?>" class="intro-x flex items-center pl-5 pt-4">
                    <img alt="logo" class="w-6" src="<?php echo base_url('assets/img/');?><?php echo settings('logo')?>">
                    <span class="hidden xl:block text-white text-lg ml-3"> <span class="font-medium"><?php echo settings('nama')?></span> </span>
                </a>
                <div class="side-nav__devider my-6"></div>
               
                <?= generate_menu(); ?>                
               
            </nav>
           
            

          
            <!-- END: Side Menu -->