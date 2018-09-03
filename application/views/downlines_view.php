<div class="content">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-md-12">
						<a href="<?php echo base_url();?>register_downlines" class="btn btn-lg btn-success btn-block" style="width: 250px;height: 50px;">Add New Downline</a>
	                        <div class="card">
	                            <div class="card-header" data-background-color="purple">
	                                <h4 class="title">Downlines</h4>
	                                <p class="category">List of Downlines</p>
	                            </div>
	                            <div class="card-content table-responsive">
	                                <table class="table">
	                                    <thead class="text-primary">
	                                    	<tr><th>#</th>
	                                    	<th>First Name</th>
	                                    	<th>Last Name</th>
											<th>Email</th>
											<th>Package</th>
	                                    </tr></thead>
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

	                    
	                </div>
	            </div>
	        </div>