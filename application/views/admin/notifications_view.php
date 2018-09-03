
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
                            <th class="head0">Sn</th>
                            <th class="head1">Topic</th>
                            <th class="head0">Content</th>
                            <th class="head1">Date/Time</th>
                            <th class="head0">Action</th>
                        </tr>
                    </thead>
                    <tbody>
						<?php
							$count = 1;
							foreach($notifications as $notification){
								$d = "<tr class='gradeX'>";
								$d .="<td class='aligncenter'><span class='center'><input type='checkbox' /></span></td>";
								$d .= "<td>".$count."</td>";
								$d .= "<td>".$notification['notification_topic']."</td>";
								$d .= "<td>".$notification['notification_content']."</td>";
								$d .= "<td class='center'>".$notification['notification_datetime']."</td>";
								$d .= "<td class='center'><a href='#".$notification['notification_id']."' class='btn'><span class='icon-edit'></span>".'Action'."</a></td>";
								$d .= "</tr>";
								echo $d;$count++;
							}
						?>
                        
                    </tbody>
                </table>
                
                <div class="divider15"></div>

                <div class="divider15"></div>
          
   				<div class="divider15"></div>

                
            </div><!--contentinner-->
        </div><!--maincontent-->
