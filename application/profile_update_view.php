
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="page-header">Update Profile</h4>
                    </div>
                   <div class="col-md-8">
                       
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
                                                <option value="standard" <?php echo  set_select('package', 'standard'); ?> <?php echo ($package=='standard' && empty(set_value('package')))?"selected":"" ?>>Standard N10,000</option>
                                                <option value="business" <?php echo  set_select('package', 'business'); ?> <?php echo ($package=='business' && empty(set_value('package')))?"selected":"" ?>>Business N50,000</option>
                                                <option value="premium" <?php echo  set_select('package', 'premium'); ?> <?php echo ($package=='premium' && empty(set_value('package')))?"selected":"" ?>>Premium N100,000</option>
                                                <option value="gold" <?php echo  set_select('package', 'gold'); ?> <?php echo ($package=='gold' && empty(set_value('package')))?"selected":"" ?>>Gold N300,000</option>
                                                <option value="diamond" <?php echo  set_select('package', 'diamond'); ?> <?php echo ($package=='diamond' && empty(set_value('package')))?"selected":"" ?>>Diamond N500,000</option>
                                                <option value="ultimate" <?php echo  set_select('package', 'ultimate'); ?> <?php echo ($package=='ultimate' && empty(set_value('package')))?"selected":"" ?>>Ultimate N1,000,000</option>
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
                    
                    <div class="col-md-4">
                        <img style="border:1px solid #000" width="150px" height="150px" src="<?php echo base_url();?>/assets/<?php echo ($passport!=null)?'photos/'.$passport:'img/profile_img.png'?>" alt="Avatar" title="Change the avatar">
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
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
