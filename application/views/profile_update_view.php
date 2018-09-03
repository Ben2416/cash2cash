<div class="content">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-md-8">
	                        <div class="card">
	                            <div class="card-header" data-background-color="purple">
	                                <h4 class="title">Edit Profile</h4>
									<p class="category">Complete your profile</p>
	                            </div>
	                            <div class="card-content">
	                                <?php $attributes = array('role'=>'form');
                            echo form_open(base_url().'profile/update',$attributes); ?>
                            <fieldset class="panel-body">
                                <div class="form-group">
                                    <input class="form-control" id="first_name" placeholder="First Name" name="first_name" type="text" value="<?php echo $first_name?>" autofocus disabled>
                                    <span class="text-danger"><?php echo form_error('first_name'); ?></span>
                                </div>
                                 <div class="form-group">
                                    <input class="form-control" id="last_name" placeholder="Last Name" name="last_name" type="text" value="<?php echo $last_name?>" autofocus disabled>
                                    <span class="text-danger"><?php echo form_error('last_name'); ?></span>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="email" placeholder="Email Address" name="email" type="email" value="<?php echo $email?>" autofocus disabled>
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
                                    <input class="form-control" id="phone_number" placeholder="Phone Number" name="phone_number" type="text" value="<?php echo $phone_number?>" autofoc disabled>
                                    <span class="text-danger"><?php echo form_error('phone_number'); ?></span>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="bank_name" placeholder="Bank Name" name="bank_name" type="text" value="<?php echo $bank_name?>" autofocus disabled>
                                    <span class="text-danger"><?php echo form_error('bank_name'); ?></span>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="account_name" placeholder="Account Name" name="account_name" type="text" value="<?php echo $account_name?>" autofocus disabled>
                                    <span class="text-danger"><?php echo form_error('account_name'); ?></span>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="account_number" placeholder="Account Number" name="account_number" type="text" value="<?php echo $account_number?>" autofocus disabled>
                                    <span class="text-danger"><?php echo form_error('account_number'); ?></span>
                                </div>
                               <div class="form-group">
                                           
                                            <select class="form-control" id="package" name="package" >
                                                <option value="Starter" <?php echo  set_select('package', 'Starter'); ?> <?php echo ($package=='starter' && empty(set_value('package')))?"selected":"" ?>>Starter N10,000</option>
                                                <option value="Mobile" <?php echo  set_select('package', 'Mobile'); ?> <?php echo ($package=='mobile' && empty(set_value('package')))?"selected":"" ?>>Mobile N20,000</option>
                                                <option value="Standard" <?php echo  set_select('package', 'Standard'); ?> <?php echo ($package=='standard' && empty(set_value('package')))?"selected":"" ?>>Standard N30,000</option>
                                                <option value="Boosters" <?php echo  set_select('package', 'Boosters'); ?> <?php echo ($package=='boosters' && empty(set_value('package')))?"selected":"" ?>>Boosters N50,000</option>
                                                <option value="Investors" <?php echo  set_select('package', 'Investors'); ?> <?php echo ($package=='investors' && empty(set_value('package')))?"selected":"" ?>>Investors N100,000</option>
                                                <option value="Achievers" <?php echo  set_select('package', 'Achievers'); ?> <?php echo ($package=='achievers' && empty(set_value('package')))?"selected":"" ?>>Achievers N200,000</option>
                                                <option value="Tycoons" <?php echo  set_select('package', 'Tycoons'); ?> <?php echo ($package=='tycoons' && empty(set_value('package')))?"selected":"" ?>>Tycoons N300,000</option>
                                                <option value="Enterpreneurs" <?php echo  set_select('package', 'Enterpreneurs'); ?> <?php echo ($package=='enterpreneurs' && empty(set_value('package')))?"selected":"" ?>>Enterpreneurs N500,000</option>
                                            
                                            </select>
                                        </div>

                              
                               
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block" name="update_profile" value="Update Profile">Update Profile
                                </button>
                                <br>
                                <br>

                            </fieldset>
                        </form>
	                            </div>
	                        </div>
	                    </div>
						<div class="col-md-4">
    						<div class="card card-profile">
    							<div class="card-avatar">
    								<a href="#pablo">
    									<img class="img-responsive avatar-view" src="<?php echo base_url();?>/assets/<?php echo ($passport!=null)?'photos/'.$passport:'img/profile_img.png'?>">
    								</a>
    							</div>

    							<div class="content">
    								<form name="pform" id="pform" method="post" action="" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Upload Photo</label>
                                <input type="file" id="userfile" name="userfile" class="form-control">
                                <label style="color:red;">Max Size: 1mb; Max Dimension: 1280x960</label>
                            </div>
							<button type="submit" class="btn btn-primary">Upload Photo</button>
                        </form>
    							</div>
    						</div>
		    			</div>
	                </div>
	            </div>
	        </div>