<div class="content">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-md-6">
	                        <div class="card">
	                            <div class="card-header" data-background-color="blue">
	                                <h4 class="title">Letter of Happiness</h4>
									<p class="category">Complete the form below</p>
	                            </div>
	                            <div class="card-content">
	                                
	                                <?php $attributes = array('role'=>'form');
                                        echo form_open(base_url().'loh',$attributes); ?>
                                        <fieldset class="panel-body">
                                            <div class="form-group">
                                                <input class="form-control" id="username" placeholder="Username" name="username" type="hidden" value="<?=$firstname?> <?=$lastname?>" autofocus>
                                                <span class="text-danger"><?php echo form_error('username'); ?></span>
                                            </div>
                                
                                            <div class="form-group">
                                                <input class="form-control" id="email" placeholder="Email Address" name="email" type="hidden" value="<?=$email?>" autofocus>
                                                <span class="text-danger"><?php echo form_error('email'); ?></span>
                                            </div>
                                            
            
                                            <div class="form-group">
                                                <textarea class="form-control" id="testimonial" placeholder="Testimonial" name="testimonial" type="text" value="<?php echo set_value('testimonial')?>" autofocus></textarea>
                                                <span class="text-danger"><?php echo form_error('testimonial'); ?></span>
                                            </div>
                                           
                                            <!-- Change this to a button or input when using this as a form -->
                                            <button type="submit" class="btn btn-lg btn-success btn-block" name="submit_btn" value="submit">Submit
                                            </button>
                                        </fieldset>
                                    </form>
	                           
	                            </div>
	                        </div>
	                    </div>
						<div class="col-md-6">
    						
    						<div class="card">
	           <div class="card-header" data-background-color="orange">
	               <h4 class="title">Letter of Happiness</h4>
	                    <p class="category">Cash2CashClub.....</p>
	           </div>
	           <div class="card-content table-responsive">
	               <table class="table table-hover">
	                    <thead class="text-warning">
	                       <tr><th>ID</th>
	                       <th>Content</th>
	                                    	
	                       </tr></thead>
	                       <tbody>
                                        <?php
											$count = 1;
											foreach($lohs as $loh){
												$d = "<tr>";
												$d .= "<td>".$count."</td>";
												$d .= "<td>".ucfirst($loh['testimonial'])."</td>";
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
	        </div>
	        
	        
	        