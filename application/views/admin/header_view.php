<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Cash2Cash Admin</title>
<link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/style.default.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/admin/prettify/prettify.css" type="text/css" />
<script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/jquery.uniform.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/admin/prettify/prettify.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/custom.js"></script>
</head>

<body>

<div class="mainwrapper">
	
    <!-- START OF LEFT PANEL -->
    <div class="leftpanel">
    	
        <div class="logopanel">
        	<h1><a href="#">Cash2Cash <span>Admin</span></a></h1>
        </div><!--logopanel-->
        
        <div class="datewidget">Today is</div>
    
        
        
       <div class="leftmenu">        
            <ul class="nav nav-tabs nav-stacked">
            	<li class="nav-header">Main Navigation</li>
                <li><a href="<?=base_url()?>admin/cash2cash"><span class="icon-align-justify"></span> Dashboard</a></li>
                
                <li class="dropdown"><a href="#"><span class="icon-th-list"></span> Club Members</a>
                	<ul>
                    	<li><a href="<?=base_url()?>admin/users">All Registered Club Members</a></li>
                       <!-- <li><a href="<?=base_url()?>admin/users/users_due_for_merge">Users Due for Merging</a></li> -->
                        <li><a href="<?=base_url()?>admin/users/merged_users">Merged Club Members</a></li>
                        <li><a href="<?=base_url()?>admin/users/members_summary">Club Members Summary</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span class="icon-align-justify"></span> Club Members by Package</a>
                    <ul>
				<?php
					foreach($packages as $pack){
						?>
						<li class="dropdown"><a href="#"><span class="icon-align-justify"></span> <?=ucfirst($pack['package_name'])?> Plan</a>
							<ul>
								<li><a href="<?=base_url()?>admin/users/users_by_package/<?=strtolower($pack['package_name'])?>"><span class="icon-th-list"></span> All Club Members (<?=ucfirst($pack['package_name'])?> Plan)</a></li>
								<li><a href="<?=base_url()?>admin/users/users_by_package/<?=strtolower($pack['package_name'])?>/0"><span class="icon-th-list"></span> Members on PH List(<?=ucfirst($pack['package_name'])?> Plan)</a></li>
								<li><a href="<?=base_url()?>admin/users/users_by_package/<?=strtolower($pack['package_name'])?>/2"><span class="icon-th-list"></span> GH waiting List(<?=ucfirst($pack['package_name'])?> Plan)</a></li>
								<li><a href="<?=base_url()?>admin/users/users_by_package/<?=strtolower($pack['package_name'])?>/3"><span class="icon-th-list"></span> Members on GH List(<?=ucfirst($pack['package_name'])?> Plan)</a></li>
								<li><a href="<?=base_url()?>admin/users/users_by_package/<?=strtolower($pack['package_name'])?>/14"><span class="icon-th-list"></span> Merged Members(<?=ucfirst($pack['package_name'])?> Plan)</a></li>
								<li><a href="<?=base_url()?>admin/users/users_by_package/<?=strtolower($pack['package_name'])?>/5"><span class="icon-th-list"></span> Members Waiting to Recycle (<?=ucfirst($pack['package_name'])?> Plan)</a></li>
							</ul>
						</li>
						<?php
					}
				?>
                    </ul>
                </li>
				<li class="dropdown"><a href="#"><span class="icon-align-justify"></span>Awards</a>
					<ul>
						<li><a href="<?=base_url()?>admin/awards">Members Stats</a></li>
						<li><a href="#">Current Winner</a></li>
						<li><a href="#">Previous Winners</a></li>
					</ul>
                </li>
                <li class="dropdown"><a href="#"><span class="icon-align-justify"></span>Ticket</a>
					<ul>
						<li><a href="#">All Tickets</a></li>
						<li><a href="#">Unresolved Tickets</a></li>
						<li><a href="#">Resolved Tickets</a></li>
					</ul>
                </li>
                
                <li><a href="<?=base_url()?>admin/users/blocked_users"><span class="icon-align-justify"></span>Blocked Users</a></li>
                
                <li class="dropdown"><a href="#"><span class="icon-th-list"></span>Manage Notification</a>
					<ul>
						<li><a href="<?=base_url()?>admin/notifications">View Notifications</a></li>
						<li><a href="<?=base_url()?>admin/notifications/add">Add Notifications</a></li>
					</ul>
				</li>
				<li><a href="<?=base_url()?>admin/adminaccounts"><span class="icon-align-justify"></span> Admin Accounts</a></li>

            </ul>
        </div><!--leftmenu-->
        
    </div><!--mainleft-->
    <!-- END OF LEFT PANEL -->
    
    <!-- START OF RIGHT PANEL -->
    <div class="rightpanel">
    	<div class="headerpanel">
        	<a href="#" class="showmenu"></a>
            
            <div class="headerright">
            	<div class="dropdown notification">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="http://themepixels.com/page.html">
                    	<span class="iconsweets-globe iconsweets-white"></span>
                    </a>
                    
                </div><!--dropdown-->
                
    			<div class="dropdown userinfo">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="http://themepixels.com/page.html">Hi, Admin! <b class="caret"></b></a>
                    
                </div><!--dropdown-->
    		
            </div><!--headerright-->
            
    	</div><!--headerpanel-->
        <div class="breadcrumbwidget">
        	<ul class="skins">
                <li><a href="default" class="skin-color default"></a></li>
                <li><a href="orange" class="skin-color orange"></a></li>
                <li><a href="dark" class="skin-color dark"></a></li>
                <li>&nbsp;</li>
                <li class="fixed selected"><a href="#" class="skin-layout fixed"></a></li>
                <li class="wide"><a href="#" class="skin-layout wide"></a></li>
            </ul><!--skins-->
        	<ul class="breadcrumb">
                <li><a href="dashboard.html">Home</a> <span class="divider">/</span></li>
                <li class="active"><?=$page_title?></li>
            </ul>
        </div><!--breadcrumbs-->
		<div class="pagetitle">
        	<h1><?=$page_title?></h1> <span><?=$title_text?></span>
        </div><!--pagetitle-->


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