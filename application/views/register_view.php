<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register | Cash2Cash Club</title>

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
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Register to Join the Club</h3>
                    </div>
                    <div class="panel-body">
                        <?php $attributes = array('role'=>'form');
							echo form_open(base_url().'register/'.$ref.'/'.$rfd,$attributes); ?>
                            <fieldset>
								<div class="form-group">
                                    <input class="form-control" id="first_name" placeholder="First Name" name="first_name" type="text" value="<?php echo set_value('first_name')?>" autofocus>
									<span class="text-danger"><?php echo form_error('first_name'); ?></span>
                                </div>
                                 <div class="form-group">
                                    <input class="form-control" id="last_name" placeholder="Last Name" name="last_name" type="text" value="<?php echo set_value('last_name')?>" autofocus>
									<span class="text-danger"><?php echo form_error('last_name'); ?></span>
                                </div> <div class="form-group">
                                           
                                            <select class="form-control" id="location" name="location">
                                                <option selected>Your Location</option>
                                                <option value="abuja_fct" <?php echo  set_select('location', 'abuja_fct'); ?> >ABUJA FCT</option>
                                                <option value="abia" <?php echo  set_select('location', 'abia'); ?> >ABIA</option>
                                                <option value="adamawa" <?php echo  set_select('location', 'adamawa'); ?> >ADAMAWA</option>
                                                <option value="akwa_ibom" <?php echo  set_select('location', 'akwa_ibom'); ?> >AKWA IBOM</option>
                                                <option value="anambra" <?php echo  set_select('location', 'anambra'); ?> >ANAMBRA</option>
                                                <option value="bauchi" <?php echo  set_select('location', 'bauchi'); ?> >BAUCHI</option>
                                                <option value="bayelsa" <?php echo  set_select('location', 'bayelsa'); ?> >BAYELSA</option>
                                                <option value="benue" <?php echo  set_select('location', 'benue'); ?> >BENUE</option>
                                                <option value="borno" <?php echo  set_select('location', 'borno'); ?> >BORNO</option>
                                                <option value="cross_river" <?php echo  set_select('location', 'cross_river'); ?> >CROSS RIVER</option>
                                                <option value="delta" <?php echo  set_select('location', 'delta'); ?> >DELTA</option>
                                                <option value="ebonyi" <?php echo  set_select('location', 'ebonyi'); ?> >EBONYI</option>
                                                <option value="edo" <?php echo  set_select('location', 'edo'); ?> >EDO</option>
                                                <option value="ekiti" <?php echo  set_select('location', 'ekiti'); ?> >EKITI</option>
                                                <option value="enugu" <?php echo  set_select('location', 'enugu'); ?> >ENUGU</option>
                                                <option value="gombe" <?php echo  set_select('location', 'gombe'); ?> >GOMBE</option>
                                                <option value="imo" <?php echo  set_select('location', 'imo'); ?> >IMO</option>
                                                <option value="jigawa" <?php echo  set_select('location', 'jigawa'); ?> >JIGAWA</option>
                                                <option value="kaduna" <?php echo  set_select('location', 'kaduna'); ?> >KADUNA</option>
                                                <option value="kano" <?php echo  set_select('location', 'kano'); ?> >KANO</option>
                                                <option value="katsina" <?php echo  set_select('location', 'katsina'); ?> >KATSINA</option>
                                                <option value="kebbi" <?php echo  set_select('location', 'kebbi'); ?> >KEBBI</option>
                                                <option value="kogi" <?php echo  set_select('location', 'kogi'); ?> >KOGI</option>
                                                <option value="kwara" <?php echo  set_select('location', 'kwara'); ?> >KWARA</option>
                                                <option value="lagos" <?php echo  set_select('location', 'lagos'); ?> >LAGOS</option>
                                                <option value="nassarawa" <?php echo  set_select('location', 'nassarawa'); ?> >NASSARAWA</option>
                                                <option value="niger" <?php echo  set_select('location', 'niger'); ?> >NIGER</option>
                                                <option value="ogun" <?php echo  set_select('location', 'ogun'); ?> >OGUN</option>
                                                <option value="ondo" <?php echo  set_select('location', 'ondo'); ?> >ONDO</option>
                                                <option value="osun" <?php echo  set_select('location', 'osun'); ?> >OSUN</option>
                                                <option value="oyo" <?php echo  set_select('location', 'oyo'); ?> >OYO</option>
                                                <option value="plateau" <?php echo  set_select('location', 'plateau'); ?> >PLATEAU</option>
                                                <option value="rivers" <?php echo  set_select('location', 'rivers'); ?> >RIVERS</option>
                                                <option value="sokoto" <?php echo  set_select('location', 'sokoto'); ?> >SOKOTO</option>
                                                <option value="taraba" <?php echo  set_select('location', 'taraba'); ?> >TARABA</option>
                                                <option value="yobe" <?php echo  set_select('location', 'yobe'); ?> >YOBE</option>
                                                <option value="zamfara" <?php echo  set_select('location', 'zamfara'); ?> >ZAMFARA</option>
                                            </select>
											<span class="text-danger"><?php echo form_error('location'); ?></span>
                                        </div><hr>
                                <div class="form-group">
                                    <input class="form-control" id="email" placeholder="Email Address" name="email" type="email" value="<?php echo set_value('email')?>" autofocus>
									<span class="text-danger"><?php echo form_error('email'); ?></span>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="password" placeholder="Password" name="password" type="password" value="<?php echo set_value('password')?>" autofocus>
									<span class="text-danger"><?php echo form_error('password'); ?></span>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="confirm_password" placeholder="Confirm Password" name="confirm_password" type="password" value="<?php echo set_value('confirm_password')?>" autofocus>
									<span class="text-danger"><?php echo form_error('confirm_password'); ?></span>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="phone_number" placeholder="Phone Number" name="phone_number" type="text" value="<?php echo set_value('phone_number')?>" autofocus>
									<span class="text-danger"><?php echo form_error('phone_number'); ?></span>
                                </div>
                               <div class="form-group"> 
									<select class="form-control" id="package" name="package">
										<option selected>Select Package</option>
										<option value="Starter" <?php echo  set_select('package', 'Starter'); ?> >Starter ₦10,000</option>
										<option value="Mobile" <?php echo  set_select('package', 'Mobile'); ?> >Mobile ₦20,000</option>
										<option value="Standard" <?php echo  set_select('package', 'Standard'); ?> >Standard ₦30,000</option>
										<option value="Booster" <?php echo  set_select('package', 'Booster'); ?> >Booster ₦50,000</option>
										<option value="Investors" <?php echo  set_select('package', 'Investors'); ?> >Investors ₦100,000</option>
										<option value="Achievers" <?php echo  set_select('package', 'Achievers'); ?> >Achievers ₦200,000</option>
										<option value="Tycoons" <?php echo  set_select('package', 'Tycoons'); ?> >Tycoons ₦300,000</option>
										<option value="Enterpreneurs" <?php echo  set_select('package', 'Enterpreneurs'); ?> >Enterpreneurs ₦500,000</option>
									</select>
									<span class="text-danger"><?php echo form_error('package'); ?></span>
								</div>
                                <hr>
                                <div class="form-group">
                                           
                                            <select class="form-control" id="bank_name" name="bank_name">
                                                <option selected>Choose Your Bank</option>
                                                <option value="access" <?php echo  set_select('bank_name', 'access'); ?> >Access Bank</option>
                                                <option value="citibank" <?php echo  set_select('bank_name', 'citibank'); ?> >Citibank</option>
                                                <option value="diamond" <?php echo  set_select('bank_name', 'diamond'); ?> >Diamond Bank</option>
                                                <option value="ecobank" <?php echo  set_select('bank_name', 'ecobank'); ?> >Ecobank</option>
                                                <option value="enterprise" <?php echo  set_select('bank_name', 'enterprise'); ?> >Enterprise Bank</option>
                                                <option value="fidelity" <?php echo  set_select('bank_name', 'fidelity'); ?> >Fidelity Bank</option>
                                                <option value="first" <?php echo  set_select('bank_name', 'first'); ?> >First Bank</option>
                                                <option value="fcmb" <?php echo  set_select('bank_name', 'fcmb'); ?> >First City Monument Bank (FCMB)</option>
                                                <option value="gtb" <?php echo  set_select('bank_name', 'gtb'); ?> >Guarantee Trust Bank (GTB)</option>
                                                <option value="heritage" <?php echo  set_select('bank_name', 'heritage'); ?> >Heritage Bank</option>
                                                <option value="keystone" <?php echo  set_select('bank_name', 'keystone'); ?> >Keystone Bank</option>
                                                <option value="mainstreet" <?php echo  set_select('bank_name', 'mainstreet'); ?> >MainStreet Bank</option>
                                                <option value="skye" <?php echo  set_select('bank_name', 'skye'); ?> >Skye Bank</option>
                                                <option value="stanbic" <?php echo  set_select('bank_name', 'stanbic'); ?> >Stanbic IBTC Bank</option>
                                                <option value="standard" <?php echo  set_select('bank_name', 'standard'); ?> >Standard Chartered Bank</option>
                                                <option value="sterling" <?php echo  set_select('bank_name', 'sterling'); ?> >Sterling Bank</option>
                                                <option value="suntrust" <?php echo  set_select('bank_name', 'suntrust'); ?> >Suntrust Bank</option>
                                                <option value="union" <?php echo  set_select('bank_name', 'union'); ?> >Union Bank</option>
                                                <option value="uba" <?php echo  set_select('bank_name', 'uba'); ?> >United Bank for Africa (UBA)</option>
                                                <option value="unity" <?php echo  set_select('bank_name', 'unity'); ?> >Unity Bank</option>
                                                <option value="wema" <?php echo  set_select('bank_name', 'wema'); ?> >Wema Bank</option>
                                                <option value="zenith" <?php echo  set_select('bank_name', 'zenith'); ?> >Zenith Bank</option>
                                            </select>
											<span class="text-danger"><?php echo form_error('bank_name'); ?></span>
                                        </div>
                                <div class="form-group">
                                    <input class="form-control" id="account_name" placeholder="Account Name" name="account_name" type="text" value="<?php echo set_value('account_name')?>" autofocus>
									<span class="text-danger"><?php echo form_error('account_name'); ?></span>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="account_number" placeholder="Account Number" name="account_number" type="text" value="<?php echo set_value('account_number')?>" autofocus>
									<span class="text-danger"><?php echo form_error('account_number'); ?></span>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block" name="register_btn" value="Register">Register</button>

                                <a href="<?php echo base_url();?>login" class="">Back to Login</a>
								 | 
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
