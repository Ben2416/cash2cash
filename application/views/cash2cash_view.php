<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="blue">
									<i class="material-icons">content_copy</i>
								</div>
								<div class="card-content">
									<p class="category">Package Name</p>
									<h3 class="title"><small><?=$package?></small></h3><small>&#8358;<?=$get_in_full[0]['package_price']?></small>
								</div>
								<div class="card-footer">
									<div class="stats">
										<a href="<?php echo base_url();?>plans">Club Package Info</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="green">
									<i class="material-icons">store</i>
								</div>
								<div class="card-content">
									<p class="category">Downlines</p>
									<h3 class="title">No.<?=$downlines_number?></h3>
								</div>
								<div class="card-footer">
									<div class="stats">
										<i class="material-icons">date_range</i> 
										<a href="<?php echo base_url();?>downlines">View Downlines</a>
									</div>
								</div>
							</div>
						</div>
						
						

						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="orange">
									<i class="fa fa-heart"></i>
								</div>
								<div class="card-content">
									<p class="category">Heart of Gold</p>
									<h4 class="title"><small>Community Initiative</small></h4>
								</div>
								<div class="card-footer">
									<div class="stats">
										<a href="<?php echo base_url();?>heart">Read More</a>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4" style="display: block;word-break: break-all;border-right: #e4e0e0 solid 1px;">
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
															Ref Link:<a href="<?=base_url().'register/'.$myref?>" target="_blank"><?=base_url().'register/'.$myref?></a>
									</p>
									<?php
										switch($status){
											case 0 : $status = "Ready to Provide Help";break;
											case 1 : $status = "Merged to Provide Help	";break;
											case 2 : $status = "Awaiting to Get (P.S Make sure you and your mandatory referral have been confirmed)";break;
											case 3 : $status = "<span class='text-success'>Qualified to GH</span>";break;
											case 4 : $status = "Merged to Get Help";break;
											case 5 : $status = "Recycle Account (Upgrade / Retain Package)";break;
											default:break;
										}
									
									?>
									
									<div class="card-footer">
									<div class="stats">
										<i class="material-icons">access_time</i> Club status: <?php echo $status; ?>
									</div>
								</div>
    							</div>
    						</div>
						</div>
						
						<div class="col-md-4 hide" id="accountblocked">
							<div class="card">
								<div class="card-content">
									<h4 class="title">Ooops!</h4>
									<p class="category">Your account has been blocked.</p>
									<p>Please contact administrator: <a>Support</a></p>
								</div>
							</div>
						</div>
						
						<div class="col-md-4 hide" id="phnext_merge">
							<div class="card">
								<div class="card-content">
									<h4 class="title">Please Wait</h4>
									<p class="category">You will be Merged Shortly</p>
									<p>You will soon be merged to pay.</p>
								</div>
							</div>
						</div>
						
						<div class="col-md-4 hide" id="ghnext_merge">
							<div class="card">
								<div class="card-content">
									<h4 class="title">Please Wait</h4>
									<p class="category">You will be Merged Shortly</p>
									<p>You will be merged soon for pay.<!--<span id="time"></span> minutes!--></p>
									<p><div id='demo'>Loading time...</div></p>
								</div>
							</div>
						</div>
						
						<div class="col-md-4 hide" id="next_action">
							<div class="card">
								<div class="card-content">
									<h4 class="title">Congratulations!</h4>
									<p class="category">You have completed a cycle.<br/>Choose next action:</p>
									<p><div id='recycletime'>Loading time left...</div></p>
									<a href="#nextcycle" class="btn btn-info btn-round" id='showcycle'>Next Cycle</a>
									<div id='nextcycle' style="display:none">
										<?php $attributes = array('role'=>'form');
											echo form_open(base_url().'cash2cash/nextCycle',$attributes); ?>
									        <input type="hidden" name="user_id" id="user_id" value="<?=$userid?>">
									        <button type="submit" class="btn btn-sm btn-success btn-block" name="cycle_btn" value="Cycle Account">Next Cycle</button>     
									        <a href="#nextcycle" class="btn btn-sm btn-info btn-block" id="hidecycle">Cancel</a>
									    </form>
									</div>
									
									<a href="#upgrade" class="btn btn-md btn-success btn-round" id='hideshow'>Upgrade Account</a>
									<div id='upgrade' style="display:none;">
									    <?php $attributes = array('role'=>'form');
											echo form_open(base_url().'cash2cash/upgradePackage',$attributes); ?>
									        
									        <input type="hidden" name="user_id" id="user_id" value="<?=$userid?>">
									        <div class="form-group">    
            									<select class="form-control" id="package" name="package">
            										<option selected>Select Package</option>
            										<?php
														foreach($upackages as $pkgs){
															echo "<option value='".$pkgs['package_name']."'>".$pkgs['package_name']." ₦".$pkgs['package_price']."</option>";
														}
													?>
            									</select>
            								</div>
            								<button type="submit" class="btn btn-md btn-success btn-block" name="upgrade_btn" value="Upgrade Account">Upgrade</button>     
									    </form>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-5 hide" id="merged_to">
							<div class="card">
								
								<div class="card-content">
									<h4 class="title">Merged To Pay</h4>
									<p>Merge Time: <div id='mergetime'>Loading time...</div></p>
									<p>Full Name: <span id='fullname'></span>
									<br/>Phone Number: <span id='phone_number'></span></p>
									<p>Package: <?=$package?>
									<br/>Amount: &#8358;<?=$get_in_full[0]['package_price']?></p>
                                	 <p style="color:red">Bank Name: <span id='bank_name'></span><br/>
									 Account Name: <span id='account_name'></span><br/>
									 Account Number: <span id='account_number'></span>
									 </p>
                                	  <form name="evform" id="evform" method="post" action="" enctype="multipart/form-data">
											<div class="form-group">
												<label>Upload proof of Payment</label>
												<input type="file" id="userfile" name="userfile" class="form-control">
												<em>Image or PDF document</em>
											</div>
                                           <button type="submit" class="btn btn-default">Upload Evidence</button>
										</form>
								</div>

							</div>
						</div>
						
						<div class="col-md-4 hide" id="merged_party1">
							<div class="card">
								
								<div class="card-content">
									<h4 class="title">Receive Payment From Club Member</h4>
									<p>Merge Time: <div id='mergetime1'>Loading time...</div></p>
									<p>Full Name: <span id='mp1fullname'></span>
									<br/>Phone Number: <span id='mp1phone_number'></span></p>                                	
                                	 <p style="color:red">Bank Name: <span id='mp1bank_name'></span><br/>
									 Account Name: <span id='mp1account_name'></span><br/>
									 Account Number: <span id='mp1account_number'></span><br/>
									 Evidence of pay: <a href="" id="mp1dl"><span id='mp1evop'></span></a>
									 <br/>Confirmed: <img src="" id="mp1conf"/>
									 </p>
                                	  <form name="mp1frm" id="mp1frm" method="post" action="">
                                                  <button type="submit" class="btn btn-default">Click to Confirm Pay Receipt</button>
                                			  </form>
								</div>

							</div>
						</div>
						
						<div class="col-md-4 hide" id="merged_party2">
							<div class="card">
								
								<div class="card-content">
									<h4 class="title">Receive Payment From Club Member</h4>
									<p>Merge Time: <div id='mergetime2'>Loading time...</div></p>
									<p>Full Name: <span id='mp2fullname'></span>
									<br/>Phone Number: <span id='mp2phone_number'></span></p>                                	
                                	 <p style="color:red">Bank Name: <span id='mp2bank_name'></span><br/>
									 Account Name: <span id='mp2account_name'></span><br/>
									 Account Number: <span id='mp2account_number'></span><br/>
									 Evidence of pay: <a href="" id="mp2dl"><span id='mp2evop'></span></a>
									 <br/>Confirmed: <span><image src="" id="mp2conf"/></span>
									 </p>
                                	  <form name="mp2frm" id="mp2frm" method="post" action="">
                                                  <button type="submit" class="btn btn-default">Click to Confirm Pay Receipt</button>
                                			  </form>
								</div>

							</div>
						</div>

						
					</div>

					<div class="row">
					<div class="col-lg-6 col-md-12">
							<div class="card">
	                            <div class="card-header" data-background-color="orange">
	                                <h4 class="title">My Referrals</h4>
	                                <p class="category">List of Downlines</p>
	                            </div>
	                            <div class="card-content table-responsive">
	                                <table class="table table-hover">
	                                    <thead class="text-warning">
	                                        <th>#</th>
	                                    	<th>First Name</th>
	                                    	<th>Last Name</th>
	                                    	<th>Email</th>
											<th>Package</th>
	                                    </thead>
	                                    <tbody>
	                                        <?php
											$count = 1;
											foreach($downlines as $downline){
												$d = "<tr>";
												$d .= "<td>".$count."</td>";
												$d .= "<td>".ucfirst($downline['first_name'])."</td>";
												$d .= "<td>".ucfirst($downline['last_name'])."</td>";
												$d .= "<td>".strtolower($downline['email'])."</td>";
												$d .= "<td>".ucfirst($downline['package'])."</td>";
												$d .= "</tr>";
												echo $d;$count++;
											}
										?>
	                                        
	                                    </tbody>
	                                </table>
	                            </div>
	                        </div>
						</div>
						<div class="col-lg-6 col-md-12">
							<div class="card card-nav-tabs">
								<div class="card-header" data-background-color="purple">
									<div class="nav-tabs-navigation">
										<div class="nav-tabs-wrapper">
											<span class="nav-tabs-title"></span>
											<ul class="nav nav-tabs" data-tabs="tabs">
												<li class="active">
													<a href="#profile" data-toggle="tab">
														<i class="material-icons">bug_report</i>
														Notification
													<div class="ripple-container"></div></a>
												</li>
												
											</ul>
										</div>
									</div>
								</div>

								<div class="card-content">
									<div class="tab-content">
										<div class="tab-pane active" id="profile">
											<table class="table">
												<tbody>
												<?php foreach($notifications as $notification){?>
													<tr>
														<td>
															
														</td>
														<td><span style="color:red;"><?=$notification['notification_topic']?></span></b><br><?=$notification['notification_content']?></td>
														<td class="td-actions text-right">															
															<label><em><?=$notification['notification_datetime']?></em></label>													
														</td>
													</tr>
													<?php } ?>
												</tbody>
											</table>
										</div>
										
									</div>
								</div>
							</div>
						</div>

						
					</div>
				</div>
			</div>
        
        
<script>
 /*    function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            timer = duration;
        }
    }, 1000);
}

window.onload = function () {
    var fiveMinutes = 60 * 60,
        display = document.querySelector('#time');
    //startTimer(fiveMinutes, display);
}; */
</script>
    