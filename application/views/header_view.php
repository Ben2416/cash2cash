<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Welcome to Cash2Cash Club, where  we  are revolutionalizing Peer-to-Peer Donation. Thanks for accepting our invitation to join us. We are glad to welcome you to a place where you can achieve your financial dreams and aspirations. Here, we share a common interest; to be committed to the financial upliftment of our club members and their community. We currently employ the 2:1 Matrix to reward you with 200% of your donation for any package of your choice. Cash2Cash Club is more than a peer-to-peer donation hub. ">
    <meta name="author" content="Cash2Cash Club">

    <title><?=$page_title ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

 <!--  Material Dashboard CSS    -->
    <link href="<?php echo base_url();?>assets/css/material-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo base_url();?>assets/css/demo.css" rel="stylesheet" />
	
	<!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>

<body>

	<div class="wrapper">

	    <div class="sidebar" data-color="blue" data-image="<?php echo base_url();?>assets/img/sidebar-1.jpg">
			<!--
		        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

		        Tip 2: you can also add an image using data-image tag
		    -->

			<div class="logo">
				<a href="<?php echo base_url();?>cash2cash" class="simple-text">
					Cash2CashClub
				</a>
			</div>

	    	<div class="sidebar-wrapper">
	            <ul class="nav">
	                <li class="active">
	                    <a href="<?php echo base_url();?>cash2cash">
	                        <i class="material-icons">dashboard</i>
	                        <p>Member Dashboard</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="<?php echo base_url();?>profile">
	                        <i class="material-icons">person</i>
	                        <p>My Account</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="<?php echo base_url();?>downlines">
	                        <i class="material-icons">content_paste</i>
	                        <p>My Referral</p>
	                    </a>
	                </li>
					<li>
	                    <a href="<?php echo base_url();?>award">
	                        <i class="material-icons">bubble_chart</i>
	                        <p>Club Award</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="<?php echo base_url();?>loh">
	                        <i class="material-icons">bubble_chart</i>
	                        <p>Letter of Happiness</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="http://cash2cashclub.com/support">
	                        <i class="material-icons">bubble_chart</i>
	                        <p>C2CC Support</p>
	                    </a>
	                </li>
	                
	                
					<li class="active-pro">
	                    <a href="upgrade.html">
	                        <i class="material-icons"></i>
			<img src="http://cash2cashclub.com/images/logo.png" class="img-responsive" alt="logo">
	                    </a>
	                </li>
	            </ul>
	    	</div>
	    </div>

	    <div class="main-panel">
			<nav class="navbar navbar-transparent navbar-absolute">
				<div class="container-fluid">
					<div class="navbar-header">
					    <button type="button" class="navbar-toggle" data-toggle="collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">Welcome <?=$firstname?> <?=$lastname?> to your dashboard </a>
												
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
							
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									Member Option<i class="material-icons">person</i>
									<p class="hidden-lg hidden-md">Member Option</p>
								</a>
								<ul class="dropdown-menu">
									<li><a href="<?php echo base_url();?>profile">My Club Profile</a></li>
									<li><a href="<?php echo base_url();?>downlines">Mandatory Club Referral</a></li>
									<li><a href="<?php echo base_url();?>award">Club Awards</a></li>
									<li><a href="<?php echo base_url();?>logout">Logout</a></li>
									
								</ul>
							</li>
							
						</ul>

						<?php $pre = 'alert alert'; ?>
		<?php if($this->session->flashdata('success_msg')): ?>
			<p><div class="<?=$pre?>-success text-center" role="alert"><?php echo $this->session->flashdata('success_msg'); ?><button type="button" class="close" data-dismiss="alert">&times;</button></div></p>
		<?php endif; ?>
		<?php if($this->session->flashdata('error_msg')): ?>
			<p><div class="<?=$pre?>-danger text-center" role="alert"><?php echo $this->session->flashdata('error_msg'); ?><button type="button" class="close" data-dismiss="alert">&times;</button></div></p>
		<?php endif; ?>
		<?php if($this->session->flashdata('info_msg')): ?>
			<p><div class="<?=$pre?>-info text-center" role="alert"><?php echo $this->session->flashdata('info_msg'); ?><button type="button" class="close" data-dismiss="alert">&times;</button></div></p>
		<?php endif; ?>
		<?php if($this->session->flashdata('warning_msg')): ?>
			<p><div class="<?=$pre?>-warning text-center" role="alert"><?php echo $this->session->flashdata('warning_msg'); ?><button type="button" class="close" data-dismiss="alert">&times;</button></div></p>
		<?php endif; ?>
		<?php if($this->session->flashdata('news_msg')): ?>
			<p><div class="<?=$pre?>-primary text-center" role="alert"><?php echo $this->session->flashdata('news_msg'); ?><button type="button" class="close" data-dismiss="alert">&times;</button></div></p>
		<?php endif; ?>
					</div>
					
				</div>
				
			</nav>