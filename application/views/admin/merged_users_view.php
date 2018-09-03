        
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
							foreach($merged_users as $user){
								$d = "<tr class='gradeX'>";
								$d .="<td class='aligncenter'><span class='center'><input type='checkbox' /></span></td>";
								//$d .= "<td>".$count."</td>";
								$d .= "<td>".ucfirst($user['first_name'])." ".ucfirst($user['last_name'])."</td>";
								$d .= "<td>".strtolower($user['email'])."</td>";
								$d .= "<td>".ucfirst($user['package'])."</td>";
								$status = ($user['status']==4)?"Merged to GH":"Merged to PH";
								$d .= "<td class='center'>".$status."</td>";
								$d .= "<td>
									<div class='btn-group'>
                                            <button data-toggle='dropdown' class='btn btn-primary dropdown-toggle'>Action <span class='caret'></span></button>
                                            <ul class='dropdown-menu'>
                                              <li><a href='#mergeDetailsModal' data-toggle='modal' onclick='feedMergeViewDialog(".json_encode($user).")'>View Merge Details</a></li>
											  <li><a href='#userDetailModel' data-toggle='modal' onclick='feedProfileDialog(".json_encode($user).")'>View Profile</a></li>
											  <li class='divider'></li>
											  <li><a href='#unmergeConfirmModal' data-toggle='modal' onclick='feedUnmergeConfirmDialog(".json_encode($user).")'>Unmerge</a></li>
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