
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Cash2Cash Club Member Area</title>
    
    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="<?php echo base_url();?>assets/css/material-dashboard.css" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo base_url();?>assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
</head>

<body>
    
    <div class="wrapper wrapper-full-page">
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
        <div class="full-page lock-page" filter-color="black" data-image="../../assets/img/lock.jpeg">
            <!--   you can change the color of the filter page using: data-color="blue | green | orange | red | purple" -->
            <div class="content">
                <form method="#" action="#">
                    <div class="card card-profile card-hidden">
                        <div class="card-avatar">
                            <a href="#pablo">
                                <img class="avatar" src="http://cash2cashclub.com/images/logo.png" alt="...">
                            </a>
                        </div>
                        <div class="card-content">
                            <?php $attributes = array('role'=>'form','autocomplete' => 'off'); ?>
                            <?php echo form_open(base_url().'login',$attributes); ?>
                            <h4 class="card-title">Cash2CashClub Member Area</h4>
                            <div class="form-group label-floating">
                                    <input class="form-control" placeholder="E-mail" name="username" type="email" autofocus>
									<span class="text-danger"><?php echo form_error('username'); ?></span>
                            </div>
                            <div class="form-group label-floating">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
									<span class="text-danger"><?php echo form_error('password'); ?></span>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-rose btn-round" name="login_btn">Log In</button>
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</body>

</body>
<!--   Core JS Files   -->
<script src="<?php echo base_url();?>assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/js/material.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript">
    $().ready(function() {
        demo.checkFullPageBackgroundImage();

        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
</script>

</html>