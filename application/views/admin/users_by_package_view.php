        
        <div class="maincontent">
        	<div class="contentinner">
			<?php if($status==3 && count($users_by_package)>0){?>
            <!--<button type="button" class="btn btn-primary">Auto Merge</button><br/>-->
			<a href='#confirmAutoMergeModal' data-toggle='modal' class="btn btn-primary" >Auto Merge Accounts</a>
			<?php } ?>
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
							foreach($users_by_package as $user){
								$d = "<tr class='gradeX'>";
								$d .="<td class='aligncenter'><span class='center'><input type='checkbox' /></span></td>";
								//$d .= "<td>".$count."</td>";
								$d .= "<td>".ucfirst($user['first_name'])." ".ucfirst($user['last_name'])."</td>";
								$d .= "<td>".strtolower($user['email'])."</td>";
								$d .= "<td>".ucfirst($user['package'])."</td>";
								$ustatus = "";
								switch($user['status']){
									case 0 : $ustatus = "Ready to PH";break;
									case 1 : $ustatus = "Merged to PH	";break;
									case 2 : $ustatus = "Awaiting to GH";break;
									case 3 : $ustatus = "Qualified to GH";break;
									case 4 : $ustatus = "Merged to GH";break;
									case 5 : $ustatus = "Recycle Account";break;
									default:break;
								}
								$d .= "<td class='center'>";$d.=($user['account_blocked'] == 0)?$ustatus:"Blocked";$d.="</td>";
								$d .= "<td>
									<div class='btn-group'>
										<button data-toggle='dropdown' class='btn btn-primary dropdown-toggle'>Action <span class='caret'></span></button>
										<ul class='dropdown-menu'>
										  <li><a href='#userDetailModel' data-toggle='modal' onclick='feedProfileDialog(".json_encode($user).")'>View Profile</a></li>";
										  $d.=($user['status']==1)?"<li><a href='#pairedDetailsModal' data-toggle='modal' onclick='feedPairedViewDialog(".json_encode($user).")'>View Paired Party</a></li>":"";
										  $d.=($user['status']==4)?"<li><a href='#mergeDetailsModal' data-toggle='modal' onclick='feedMergeViewDialog(".json_encode($user).")'>View Merge Details</a></li>":"";
										  $d.="<li class='divider'></li>";
										  $d.=($user['status']==3)?"<li><a href='#mergeModal' data-toggle='modal' onclick='feedMergeDialog(".json_encode($user).")'>Merge</a></li>":"";
										  $d.=($user['account_blocked']==0)?"<li><a href='#blockUserAccount' data-toggle='modal' onclick='feedBlockDialog(".json_encode($user).")'>Block Account</a></li>":"";
										  $d.="<li class='divider'></li>";
										  $d.=($user['status']==4)?"<li><a href='#unmergeConfirmModal' data-toggle='modal' onclick='feedUnmergeConfirmDialog(".json_encode($user).")'>Unmerge</a></li>
										  <li><a href='' data-toggle='modal'>Merge History</a></li>":"";
										$d.="</ul>
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