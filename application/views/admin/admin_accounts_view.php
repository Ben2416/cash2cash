        
        <div class="maincontent">
        	<div class="contentinner">
            
            	<table class="table table-bordered" id="dyntable">
                    <colgroup>
                        <col class="con0" style="align: center; width: 4%" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                    </colgroup>
                    <thead>
                        <tr>
                          	<th class="head0 nosort"><input type="checkbox" class="checkall" /></th>
                            <th class="head0">Full Name</th>
                            <th class="head1">Email</th>
                            <th class="head0">Package</th>
                            <th class="head1">Status</th>
                            <th class="head0"></th>
                        </tr>
                    </thead>
                    <tbody>
						<?php
							$count = 1;
							foreach($admin_accounts as $user){
								$d = "<tr class='gradeX'>";
								$d .="<td class='aligncenter'><span class='center'><input type='checkbox' /></span></td>";
								//$d .= "<td>".$count."</td>";
								$d .= "<td>".ucfirst($user['first_name'])." ".ucfirst($user['last_name'])."</td>";
								$d .= "<td>".strtolower($user['email'])."</td>";
								$d .= "<td>".ucfirst($user['package'])."</td>";
								$status = "";
								switch($user['status']){
									case 0 : $status = "Ready to PH";break;
									case 1 : $status = "Merged to PH	";break;
									case 2 : $status = "Awaiting to GH";break;
									case 3 : $status = "Qualified to GH";break;
									case 4 : $status = "Merged to GH";break;
									case 5 : $status = "Recycle Account";break;
									default:break;
								}
								$d .= "<td class='center'>";$d.=($user['account_blocked'] == 0)?$status:"Blocked";$d.="</td>";
								$d .= "<td>
									<div class='btn-group'>
										<button data-toggle='dropdown' class='btn btn-primary dropdown-toggle'>Action <span class='caret'></span></button>
										<ul class='dropdown-menu'>
										  <li><a href='#userDetailModel' data-toggle='modal' onclick='feedProfileDialog(".json_encode($user).")'>View Profile</a></li>
										  <li><a href='#mergeDetailsModal' data-toggle='modal' onclick='feedMergeViewDialog(".json_encode($user).")'>View Merge Details</a></li>
										  <li class='divider'></li>
										  <li><a href='#mergeModal' data-toggle='modal' onclick='feedMergeDialog(".json_encode($user).")'>Merge</a></li>
										  <li><a href='#recycleModal' data-toggle='modal' onclick='feedRecycleDialog(".json_encode($user).")'>Recycle</a></li>
										  <li><a href='#blockUserAccount' data-toggle='modal' onclick='feedBlockDialog(".json_encode($user).")'>Block Account</a></li>
										  <li><a href='#ghConfirmModal' data-toggle='modal' onclick='feedGHConfirmDialog(".json_encode($user).")'>Qualify to GH</a></li>
										  <li><a href='#removeAdminConfirmModal' data-toggle='modal' onclick='feedRemoveAdminConfirmDialog(".json_encode($user).")'>Remove Admin</a></li>
										  <li class='divider'></li>
										  <li><a href='#unmergeConfirmModal' data-toggle='modal' onclick='feedUnmergeConfirmDialog(".json_encode($user).")'>Unmerge</a></li>
										  <li><a href='#blockUserAccount' data-toggle='modal' onclick='feedBlockDialog(".json_encode($user).")'>Block Account</a></li>
										  <li><a href='' data-toggle='modal'>Merge History</a></li>
										</ul>
                                    </div>
								</td>";
								$d .= "</tr>";
								echo $d;$count++;
							}
						?>
                    </tbody>
                </table>
                
                <div class="divider15"></div>

            </div><!--contentinner-->
        </div><!--maincontent-->

		
		
		
		
        
    </div><!--mainright-->
    <!-- END OF RIGHT PANEL -->
    
    <div class="clearfix"></div>
    
    <div class="footer">
    	<div class="footerleft">Cash2Cash Admin UI 1.0</div>
    	<div class="footerright">&copy; <?=date('Y')?></div>
    </div><!--footer-->

	<script language='javascript'>
		function feedProfileDialog(udata){
			jQuery('#passport').attr('src',"<?php echo base_url().'assets/photos/';?>"+udata.passport);
			jQuery('#email').text(udata.email);
			jQuery('#phone_number').text(udata.phone_number);
			jQuery('#location').text(udata.location);
			jQuery('#referral').text(udata.referral);
			jQuery('#first_name').text(udata.first_name);
			jQuery('#last_name').text(udata.last_name);
			jQuery('#bank_name').text(udata.bank_name);
			jQuery('#account_name').text(udata.account_name);
			jQuery('#account_number').text(udata.account_number);
			jQuery('#package').text(udata.package);
			jQuery('#status').text(udata.status);
			jQuery('#downlines').text(udata.downlines);
		}
		function feedBlockDialog(udata){
			jQuery('#bfirst_name').text(udata.first_name);
			jQuery('#blast_name').text(udata.last_name);
			jQuery('#buser_id').val(udata.user_id);
		}
		function feedBlockConfirmDialog(udata){
			jQuery('#cfirst_name').text(udata.first_name);
			jQuery('#clast_name').text(udata.last_name);
			jQuery('#cpackage').text(udata.package);
			jQuery('#cdel').attr('href',"<?php echo base_url()?>admin/users/unblockuser/"+udata.user_id);
		}
		function feedMakeAdminConfirmDialog(udata){
			jQuery('#mafirst_name').text(udata.first_name);
			jQuery('#malast_name').text(udata.last_name);
			jQuery('#mapackage').text(udata.package);
			jQuery('#mkadmin').attr('href',"<?php echo base_url()?>admin/users/makeadmin/"+udata.user_id);
		}
		function feedRemoveAdminConfirmDialog(udata){
			jQuery('#rafirst_name').text(udata.first_name);
			jQuery('#ralast_name').text(udata.last_name);
			jQuery('#rapackage').text(udata.package);
			jQuery('#rmadmin').attr('href',"<?php echo base_url()?>admin/users/removeadmin/"+udata.user_id);
		}
		function feedGHConfirmDialog(udata){
			jQuery('#ghfirst_name').text(udata.first_name);
			jQuery('#ghlast_name').text(udata.last_name);
			jQuery('#ghpackage').text(udata.package);
			jQuery('#qgh').attr('href',"<?php echo base_url()?>admin/users/qualifytogh/"+udata.user_id);
		}
		function feedUnmergeConfirmDialog(udata){
			jQuery('#cufirst_name').text(udata.first_name);
			jQuery('#culast_name').text(udata.last_name);
			jQuery('#cupackage').text(udata.package);
			jQuery('#cudel').attr('href',"<?php echo base_url()?>admin/users/unmergeparties/"+udata.user_id);
		}
		function feedMergeDialog(udata){
			jQuery('#mphone_number').text(udata.phone_number);
			jQuery('#muser_id').text(udata.user_id);
			jQuery('#mfirst_name').text(udata.first_name);
			jQuery('#mlast_name').text(udata.last_name);
			jQuery('#mbank_name').text(udata.bank_name);
			jQuery('#maccount_name').text(udata.account_name);
			jQuery('#maccount_number').text(udata.account_number);
			jQuery('#mpackage').text(udata.package);
			getPartiesForMerge(udata.user_id, udata.package);
		}
		function feedMergeViewDialog(udata){
			getMergedParties(udata.user_id,udata.current_merge_id);
		}
		function getMergedParties(user,mergeid){
			jQuery('#merged_loader').show();
			jQuery.ajax({
				url:'<?php echo base_url()."admin/users/getMergedParties/";?>'+user+'/'+mergeid,
				async:false,
				dataType: 'JSON',
				success:function(data){
					for(var i=0;i<2;i++){
						jQuery('#mp'+(i+1)+'user_id').html(data[i].user_id);
						jQuery('#mp'+(i+1)+'first_name').text(data[i].first_name);
					   jQuery('#mp'+(i+1)+'last_name').text(data[i].last_name);
					   jQuery('#mp'+(i+1)+'first_name').text(data[i].first_name);
					   jQuery('#mp'+(i+1)+'phone_number').text(data[i].phone_number);
					   jQuery('#mp'+(i+1)+'bank_name').text(data[i].bank_name);
					   jQuery('#mp'+(i+1)+'account_name').text(data[i].account_name);
					   jQuery('#mp'+(i+1)+'account_number').text(data[i].account_number);
					   jQuery('#mp'+(i+1)+'package').text(data[i].package);
					}
					jQuery('#merged_loader').hide();
				},
				error:function(xhr,st,er){
					alert(xhr+" failed "+er);
				}
			});
		}
		function getPartiesForMerge(user, pack){
			jQuery('#participants_loader').show();
			jQuery.ajax({
				url:'<?php echo base_url()."admin/AdminAccounts/getPartiesForMerge/";?>'+user+'/'+pack,
				async:false,
				dataType:'JSON',
				success:function(data){
					for(var i=0;i<1;i++){
						jQuery('#p'+(i+1)+'user_id').html(data[i].user_id);
						jQuery('#p'+(i+1)+'first_name').text(data[i].first_name);
					   jQuery('#p'+(i+1)+'last_name').text(data[i].last_name);
					   jQuery('#p'+(i+1)+'first_name').text(data[i].first_name);
					   jQuery('#p'+(i+1)+'phone_number').text(data[i].phone_number);
					   jQuery('#p'+(i+1)+'bank_name').text(data[i].bank_name);
					   jQuery('#p'+(i+1)+'account_name').text(data[i].account_name);
					   jQuery('#p'+(i+1)+'account_number').text(data[i].account_number);
					   jQuery('#p'+(i+1)+'package').text(data[i].package);
					}
					jQuery('#participants_loader').hide();
				},
				error: function(xhr,st,er){
					alert(xhr+" failed "+er);
				}
			});
		}
		function mergeParticipants(){jQuery('#merge_loader').show();
			jQuery.ajax({
				url: '<?php echo base_url()."admin/adminaccounts/mergeParties/";?>'+jQuery('#muser_id').html()+'/'+jQuery('#p1user_id').html()+'/'+jQuery('#p1user_id').html()+'/'+jQuery('#mpackage').html(),
				async:false,
				success:function(data){
					alert('Message: '+data);
					jQuery('#merge_loader').hide();
					location.reload();
				},
				error:function(xhr,st,er){
					alert(xhr+" failed "+er);
					jQuery('#merge_loader').hide();
				}
			});
		}
	</script>
	
	
	
		<!-- Model Dialog box for Confirm Block-->
		<div aria-hidden="false" aria-labelledby="confirmBlockModal" role="dialog" tabindex="-1" class="modal hide fade in" id="confirmBlockModal">
            <div class="modal-header">
              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
              <h3 id="myModalLabel"> Confirm Block </h3>
            </div>
            <div class="modal-body">
              <h5>Are you sure you want to <em>unblock</em> this user?</h5>
			  <p>Account Information:</p>
			  <p>Name: <span id="cfirst_name"></span> <span id="clast_name"></span></p>
			  <p>Package: <span id="cpackage"></span></p>
            </div>
            <div class="modal-footer">
              <a id="cdel" href="#" class="btn btn-primary" >Ok</a>
			  <button data-dismiss="modal" class="btn">No</button>
            </div>
		</div><!--#confirmBlockModal-->
		<!-- Model Dialog box for Confirm Block-->
		<div aria-hidden="false" aria-labelledby="unmergeConfirmModal" role="dialog" tabindex="-1" class="modal hide fade in" id="unmergeConfirmModal">
            <div class="modal-header">
              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
              <h3 id="myModalLabel"> Confirm Block </h3>
            </div>
            <div class="modal-body">
              <h5>Are you sure you want to <em>unmerge</em> this pairing?</h5>
			  <p>Merge Information:</p>
			  <p>Name: <span id="cufirst_name"></span> <span id="culast_name"></span></p>
			  <p>Package: <span id="cupackage"></span></p>
            </div>
            <div class="modal-footer">
              <a id="cudel" href="#" class="btn btn-primary" >Ok</a>
			  <button data-dismiss="modal" class="btn">No</button>
            </div>
		</div><!--#confirmBlockModal-->
		
		<!-- Model Dialog box for Make Admin-->
		<div aria-hidden="false" aria-labelledby="makeAdminConfirmModal" role="dialog" tabindex="-1" class="modal hide fade in" id="makeAdminConfirmModal">
            <div class="modal-header">
              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
              <h3 id="myModalLabel"> Make Admin </h3>
            </div>
            <div class="modal-body">
              <h5>Are you sure you want to <em>Make Admin</em> current User?</h5>
			  <p>User Information:</p>
			  <p>Name: <span id="mafirst_name"></span> <span id="malast_name"></span></p>
			  <p>Package: <span id="mapackage"></span></p>
            </div>
            <div class="modal-footer">
              <a id="mkadmin" href="#" class="btn btn-primary" >Ok</a>
			  <button data-dismiss="modal" class="btn">No</button>
            </div>
		</div><!--#makeAdminModal-->
		
		<!-- Model Dialog box for Remove Admin-->
		<div aria-hidden="false" aria-labelledby="removeAdminConfirmModal" role="dialog" tabindex="-1" class="modal hide fade in" id="removeAdminConfirmModal">
            <div class="modal-header">
              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
              <h3 id="myModalLabel"> Remove Admin </h3>
            </div>
            <div class="modal-body">
              <h5>Are you sure you want to <em>Remove Admin</em> current User?</h5>
			  <p>User Information:</p>
			  <p>Name: <span id="rafirst_name"></span> <span id="ralast_name"></span></p>
			  <p>Package: <span id="rapackage"></span></p>
            </div>
            <div class="modal-footer">
              <a id="rmadmin" href="#" class="btn btn-primary" >Ok</a>
			  <button data-dismiss="modal" class="btn">No</button>
            </div>
		</div><!--#removeAdminModal-->
		
		<!-- Model Dialog box for Qualify to GH-->
		<div aria-hidden="false" aria-labelledby="ghConfirmModal" role="dialog" tabindex="-1" class="modal hide fade in" id="ghConfirmModal">
            <div class="modal-header">
              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
              <h3 id="myModalLabel"> Qualify to GH</h3>
            </div>
            <div class="modal-body">
              <h5>Are you sure you want to <em>Qualify to GH</em> the current User?</h5>
			  <p>User Information:</p>
			  <p>Name: <span id="ghfirst_name"></span> <span id="ghlast_name"></span></p>
			  <p>Package: <span id="ghpackage"></span></p>
            </div>
            <div class="modal-footer">
              <a id="qgh" href="#" class="btn btn-primary" >Ok</a>
			  <button data-dismiss="modal" class="btn">No</button>
            </div>
		</div><!--#ghConfirmModal-->
		
		<!-- Model Dialog box for Displaying User Profile-->
		<div aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal hide fade in" id="userDetailModel">
            <div class="modal-header">
              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
              <h3 id="myModalLabel">User Information </h3>
            </div>
            <div class="modal-body">
              <h5>Full Name: <span id='first_name'></span> <span id='last_name'></span></h5>
			  <p>passport image: <span><image width="150px" height="150px" src="" id="passport"/></span></p>
			  <p>Phone Number: <span id='phone_number'></span></p>
			  <p>Email: <span id='email'></span></p>
			  <p>Address: <span id='location'></span></p>
			  <p>Referred By: <span id='referral'></span></p>
			  <p>Package Type: <span id='package'></span></p>
			  <p>Bank Name: <span id='bank_name'></span></p>
			  <p>Account Name: <span id='account_name'></span></p>
			  <p>Account Number: <span id='account_number'></span></p>
			  <p>Status: <span id='status'></span></p>
			  <p>Number of Downlines: <span id='downlines'></span></p>
            </div>
            <div class="modal-footer">
              <button class="btn btn-primary" data-dismiss="modal">Ok</button>
            </div>
		</div><!--#myModal-->
		
		<!-- Model Dialog box for Merging-->
		<div aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal hide fade in" id="mergeModal">
            <div class="modal-header">
              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
              <h3 id="myModalLabel">Merge </h3>
            </div>
            <tr>
				<h4>Account Holder Details:</h4><div class="hide" id="muser_id"></div>
              <p>Full Name: <span id='mfirst_name'></span> <span id='mlast_name'></span></p>
			  <p>Phone Number: <span id='mphone_number'></span></p>
			  <p>Account Name: <span id='maccount_name'></span></p>
			  <p>Account Number: <span id='maccount_number'></span></p>
			  <p>Bank Name: <span id='mbank_name'></span></p>
			  <p>Package: <span id='mpackage'></span></p>
			  <hr>
			  <div>
			  <table width="100%"><tr>
				<div id="participants_loader" class="btn-warning">Loading participant...</div>
				<td>
					<h4>Participant One</h4><div class="hide" id="p1user_id"></div>
					<p>Full Name: <span id='p1first_name'></span> <span id='p1last_name'></span></p>
					<p>Phone Number: <span id='p1phone_number'></span></p>
					<p>Account Name: <span id='p1account_name'></span></p>
					<p>Account Number: <span id='p1account_number'></span></p>
					<p>Bank Name: <span id='p1bank_name'></span></p>
					<p>Package: <span id='p1package'></span></p>
				</td>
				<!--<td>
					<h4>Participant Two</h4><div class="hide" id="p2user_id"></div>
					<p>Full Name: <span id='p2first_name'></span> <span id='p2last_name'></span></p>
					<p>Phone Number: <span id='p2phone_number'></span></p>
					<p>Account Name: <span id='p2account_name'></span></p>
					<p>Account Number: <span id='p2account_number'></span></p>
					<p>Bank Name: <span id='p2bank_name'></span></p>
					<p>Package: <span id='p2package'></span></p>
				</td>-->
			  </tr></table>
			  <div id="merge_loader" class="btn-warning hide">Merging parties to participants...please wait.</div>
            </div>
            <div class="modal-footer">
				<button class="btn btn-primary" onclick='mergeParticipants()'>Accept</button>
              <button data-dismiss="modal" class="btn">Decline</button>
            </div>
		</div><!--#myModal-->
		
		<!-- Model Dialog box for Merging-->
		<div aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal hide fade in" id="mergeDetailsModal">
            <div class="modal-header">
              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
              <h3 id="myModalLabel">Merge </h3>
            </div>
            <div class="modal-body">
				<div id="merged_loader" class="btn-warning hide">Fetching merged parties...please wait.</div>
              <h4>Participant One</h4><div class="hide" id="mp1user_id"></div>
					<p>Full Name: <span id='mp1first_name'></span> <span id='mp1last_name'></span></p>
					<p>Phone Number: <span id='mp1phone_number'></span></p>
					<p>Account Name: <span id='mp1account_name'></span></p>
					<p>Account Number: <span id='mp1account_number'></span></p>
					<p>Bank Name: <span id='mp1bank_name'></span></p>
					<p>Package: <span id='mp1package'></span></p>
			  <hr>
			  <h4>Participant Two</h4><div class="hide" id="mp2user_id"></div>
					<p>Full Name: <span id='mp2first_name'></span> <span id='mp2last_name'></span></p>
					<p>Phone Number: <span id='mp2phone_number'></span></p>
					<p>Account Name: <span id='mp2account_name'></span></p>
					<p>Account Number: <span id='mp2account_number'></span></p>
					<p>Bank Name: <span id='mp2bank_name'></span></p>
					<p>Package: <span id='mp2package'></span></p>
            </div>
            <div class="modal-footer">
              <!--<button data-dismiss="modal" class="btn">Decline</button>
              <button class="btn btn-primary">Accept</button>-->
			  <button data-dismiss="modal" class="btn btn-primary">Ok</button>
            </div>
		</div><!--#myModal-->
		
		<!-- Model Dialog box to Block Users-->
		<div aria-hidden="false" aria-labelledby="blockUserAccount" role="dialog" tabindex="-1" class="modal hide fade in" id="blockUserAccount">
			<div class="modal-header">
			  <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
			  <h3 id="blockUserAccount">Block User Account </h3>
			</div>
			<div class="modal-body">
			<h4 class="widgettitle nomargin">Block User: <span id='bfirst_name'></span> <span id='blast_name'></span></h4>
			<div class="widgetcontent bordered shadowed nopadding">
					<?php $attributes = array('class'=>'stdform stdform2', 'accept-charset'=>'utf-8');
					echo form_open(base_url().'admin/Users/blockUser', $attributes); ?>
					<input type="hidden" name="buser_id" id="buser_id" />
					<p>
						<label>Reason <small>Reason for blocking user account</small></label>
						<span class="field">
						<textarea cols="80" rows="3" name="block_reason" id="block_reason" required="required"></textarea>
						<span><?php echo form_error('block_reason');?></span>
						</span>
					</p>
					<p class="stdformbutton">
						<button type="submit" class="btn btn-primary">Block User</button>
					</p>
				</form>
			</div>
			<div class="modal-footer">
			  <button data-dismiss="modal" class="btn">Cancel</button>
			</div>
		</div><!--#myModal-->
		

    
</div><!--mainwrapper-->
<script type="text/javascript">
jQuery(document).ready(function(){

	jQuery('.profilethumb').hover(function(){
		jQuery(this).find('a').fadeIn();
	},function(){
		jQuery(this).find('a').fadeOut();
	});
	
	jQuery('.taglist a').click(function(){
		return false;
	});
	jQuery('.taglist a span').click(function(){
		jQuery(this).parent().remove();
		return false;
	});
	
});
</script>
<?php $this->session->set_userdata('referred_from', current_url());?>
</body>
</html>