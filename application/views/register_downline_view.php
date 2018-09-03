<div class="content">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-md-8">
	                        <div class="card">
	                            <div class="card-header" data-background-color="blue">
	                                <h4 class="title">Register Downline</h4>
									<p class="category">Complete the form below</p>
	                            </div>
	                            <div class="card-content">
	                               <?php $attributes = array('role'=>'form', 'class'=>'form');
                            echo form_open(base_url().'downlines/register',$attributes); ?>
                            <fieldset class="panel-body">
                                <div class="form-group">
                                    <input class="form-control" id="first_name" placeholder="First Name" name="first_name" type="text" value="<?php echo set_value('first_name')?>" autofocus>
                                    <span class="text-danger"><?php echo form_error('first_name'); ?></span>
                                </div>
                                 <div class="form-group">
                                    <input class="form-control" id="last_name" placeholder="Last Name" name="last_name" type="text" value="<?php echo set_value('last_name')?>" autofocus>
                                    <span class="text-danger"><?php echo form_error('last_name'); ?></span>
                                </div>
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
                                        </div>
                                <div class="form-group">
                                    <input class="form-control" id="bank_name" placeholder="Bank Name" name="bank_name" type="text" value="<?php echo set_value('bank_name')?>" autofocus>
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
								</div>
                                <div class="form-group">
                                    <input class="form-control" id="referral" placeholder="referral email" name="referral" type="text" value="<?php echo (empty(set_value('referral')))?$email:set_value('referral')?>" autofocus>
                                    <span class="text-danger"><?php echo form_error('referral'); ?></span>
                                </div>
                               
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block" name="register_btn" value="Register">Register
                                </button>
                                
                            </fieldset>
                        </form>
	                            </div>
	                        </div>
	                    </div>
						<div class="col-md-4">
    						<div class="card card-profile">
    						<div class="card-avatar">
    								<a href="#pablo">
    									<img class="img-responsive avatar-view" style="border:1px solid #000" src="<?php echo base_url();?>assets/photos/<?php echo ($passport==null)?'profile_img.png':$passport;?>" alt="Avatar" width="180px" height="180px" title="<?=$passport?>">
    								</a>
    							</div>

    							<div class="content">
    								<h6 class="category text-gray"><?=$firstname?> <?=$lastname?></h6>
    								<p class="card-content">Tel:<?=$phone?> <br/>
															E-mail:<?=$email?><br/>
									</p>
									
    								<a href="#pablo" class="btn btn-primary btn-round">Upgrade Account</a>
    							</div>	
    						</div>
    						</div>
		    			</div>
	                </div>
	            </div>
	        </div>