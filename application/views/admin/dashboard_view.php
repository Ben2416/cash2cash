 <div class="maincontent">
	<div class="contentinner">
	
		<ul class="widgeticons row-fluid">
			<li class="one_fifth">
				<a href="<?=base_url()?>admin/users">
					<img src="<?php echo base_url();?>assets/admin/img/gemicon/users.png" alt="" class="">
					<span style="color:red;">All Users</span>
					<span style="font-size:10px;margin-bottom:0px;padding-bottom:0px;">Total Users: 		<?=$number_of_users[0]['package_users']?></span>
					<span style="font-size:10px;margin-bottom:0px;padding-bottom:0px;">Awaiting PH: 		<?=$number_of_users[0]['awaiting_ph_users']?></span>
					<span style="font-size:10px;margin-bottom:0px;padding-bottom:0px;">PH Users: 		<?=$number_of_users[0]['package_ph_users']?></span>
					<span style="font-size:10px;margin-bottom:0px;padding-bottom:0px;">Awaiting GH: 		<?=$number_of_users[0]['awaiting_gh_users']?></span>
					<span style="font-size:10px;margin-bottom:0px;padding-bottom:0px;">Qualified to GH: 	<?=$number_of_users[0]['qualified_gh_users']?></span>
					<span style="font-size:10px;margin-bottom:0px;padding-bottom:0px;">GH Users: 		<?=$number_of_users[0]['package_gh_users']?></span>
					<span style="font-size:10px;margin-bottom:0px;padding-bottom:0px;">Recycle Users: <?=$number_of_users[0]['recycle_users']?></span>
				</a>
			</li>
			<?php
			foreach($user_package_summary as $pt){
				?>
				<li class="one_fifth">
					<a href="<?=base_url()?>admin/users/users_by_package/<?=$pt['package_name']?>">
						<img src="<?php echo base_url();?>assets/admin/img/gemicon/users.png" alt="" class="">
						<span style="color:red;"><?=$pt['package_name']?> Plan</span>
						<span style="font-size:10px;margin-bottom:0px;padding-bottom:0px;">Total Users: <?=$pt['package_users']?></span>
						<span style="font-size:10px;margin-bottom:0px;padding-bottom:0px;">Awaiting PH: <?=$pt['awaiting_ph_users']?></span>
						<span style="font-size:10px;margin-bottom:0px;padding-bottom:0px;">PH Users: <?=$pt['package_ph_users']?></span>
						<span style="font-size:10px;margin-bottom:0px;padding-bottom:0px;">Awaiting GH: <?=$pt['awaiting_gh_users']?></span>
						<span style="font-size:10px;margin-bottom:0px;padding-bottom:0px;">Qualified to GH: <?=$pt['qualified_gh_users']?></span>
						<span style="font-size:10px;margin-bottom:0px;padding-bottom:0px;">GH Users: <?=$pt['package_gh_users']?></span>
						<span style="font-size:10px;margin-bottom:0px;padding-bottom:0px;">Recycle Users: <?=$pt['recycle_users']?></span>
					</a>
				</li>
				<?php } ?>
			<li class="one_fifth last"><a href="<?=base_url()?>admin/notifications"><img src="<?php echo base_url();?>assets/admin/img/gemicon/notify.png" alt=""><span>Notifications</span></a></li>
			<!--<li class="one_fifth"><a href="<?=base_url()?>admin/users/users_by_package/starter"><img src="<?php echo base_url();?>assets/admin/img/gemicon/users.png" alt="" class=""><span>Starter Plan</span></a></li>
			<li class="one_fifth"><a href="<?=base_url()?>admin/users/users_by_package/mobile"><img src="<?php echo base_url();?>assets/admin/img/gemicon/users.png" alt="" class=""><span>Mobile Plan</span></a></li>
			<li class="one_fifth"><a href="<?=base_url()?>admin/users/users_by_package/standard"><img src="<?php echo base_url();?>assets/admin/img/gemicon/users.png" alt="" class=""><span>Standard Plan</span></a></li>
			<li class="one_fifth"><a href="<?=base_url()?>admin/users/users_by_package/standard"><img src="<?php echo base_url();?>assets/admin/img/gemicon/users.png" alt="" class=""><span>Booster Plan</span></a></li>
			<li class="one_fifth"><a href="<?=base_url()?>admin/users/users_by_package/investors"><img src="<?php echo base_url();?>assets/admin/img/gemicon/users.png" alt="" class=""><span>Investors Plan</span></a></li>
			<li class="one_fifth"><a href="<?=base_url()?>admin/users/users_by_package/achievers"><img src="<?php echo base_url();?>assets/admin/img/gemicon/users.png" alt="" class=""><span>Achievers Plan</span></a></li>
			<li class="one_fifth"><a href="<?=base_url()?>admin/users/users_by_package/tycoons"><img src="<?php echo base_url();?>assets/admin/img/gemicon/users.png" alt="" class=""><span>Tycoons Plan</span></a></li>
			<li class="one_fifth"><a href="<?=base_url()?>admin/users/users_by_package/enterpreneurs"><img src="<?php echo base_url();?>assets/admin/img/gemicon/users.png" alt="" class=""><span>Enterpreneurs Plan</span></a></li>
			<li class="one_fifth last"><a href="<?=base_url()?>admin/notifications"><img src="<?php echo base_url();?>assets/admin/img/gemicon/notify.png" alt=""><span>Notifications</span></a></li>-->
		</ul>

	</div><!--contentinner-->
</div><!--maincontent-->