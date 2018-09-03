        
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
						<col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                    </colgroup>
                    <thead>
                        <tr>
                          	<th class="head0 nosort"><input type="checkbox" class="checkall" /></th>
                            <th class="head1">Package</th>
                            <th class="head0">Awaiting PH</th>
                            <th class="head1">PH Users</th>
                            <th class="head0">Awaiting GH</th>
                            <th class="head1">Qualified to GH</th>
                            <th class="head0">GH Users</th>
							<th class="head1">Recycle Users</th>
                            <th class="head0">Total</th>
                        </tr>
                    </thead>
                    <tbody>
						<?php
							foreach($members_summary as $ms){
								$d = "<tr class='gradeX'>";
								$d .="<td class='aligncenter'><span class='center'><input type='checkbox' /></span></td>";
								$d .= "<td>".$ms['package_name']."</td>";
								$d .= "<td>".$ms['awaiting_ph_users']."</td>";
								$d .= "<td>".$ms['package_ph_users']."</td>";
								$d .= "<td>".$ms['awaiting_gh_users']."</td>";
								$d .= "<td>".$ms['qualified_gh_users']."</td>";
								$d .= "<td>".$ms['package_gh_users']."</td>";
								$d .= "<td>".$ms['recycle_users']."</td>";
								$d .= "<td>".$ms['package_users']."</td>";
								$d.="</td>";
								$d .= "</tr>";
								echo $d;
							}
						?>
                    </tbody>
                </table>
                
                <div class="divider15"></div>

            </div><!--contentinner-->
        </div><!--maincontent-->
	
	