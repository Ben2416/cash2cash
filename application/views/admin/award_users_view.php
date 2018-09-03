        
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
							<th class="head0">Referrals</th>
                            <th class="head1"></th>
                        </tr>
                    </thead>
                    <tbody>
						<?php
							$count = 1;
							foreach($users_for_awards as $user){
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
								$d .= "<td class='center'>".$user['downlines']."</td>";
								$d .= "<td>
									<div class='btn-group'>
										<button data-toggle='dropdown' class='btn btn-primary dropdown-toggle'>Action <span class='caret'></span></button>
										<ul class='dropdown-menu'>
										<li><a href='#userDetailModel' data-toggle='modal' onclick='feedProfileDialog(".json_encode($user).")'>View Profile</a></li>";
										$d.="<li class='divider'></li>";
										$d.="<li><a href='#mergeAwardModal' data-toggle='modal' onclick='feedAwardMergeDialog(".json_encode($user).")'>Merge Award Winner</a></li>";
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