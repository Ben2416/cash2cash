<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login | Cash2Cash Club</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url();?>assets/css/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>assets/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
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
			<img src="http://cash2cashclub.com/images/logo.png" class="img-responsive" alt="logo" style="margin-top: 50px;margin-left: 25%;">
                <div class="login-panel panel panel-default panel-success">
                    <div class="panel-heading">
                        <h4 class="panel-title">Please Sign In</h4>
                    </div>
                    <div class="panel-body">
						<?php $attributes = array('role'=>'form','autocomplete' => 'off'); ?>
                        <?php echo form_open(base_url().'login',$attributes); ?>
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="username" type="email" autofocus>
									<span class="text-danger"><?php echo form_error('username'); ?></span>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
									<span class="text-danger"><?php echo form_error('password'); ?></span>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block" name="login_btn" value="Login">Login</button>
                                <br>
                                <a href="<?php echo base_url();?>register" class="">Register</a> | 
								<a href="<?php echo base_url();?>forgot" class="">Forgot Password</a>
								 | 
								<a href="http://cash2cashclub.com/test/">Back to Home</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="assets/js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="assets/js/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="assets/js/sb-admin-2.js"></script>

</body>

</html>
