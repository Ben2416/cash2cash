 
        <div class="maincontent">
        	<div class="contentinner">
				<h4 class="widgettitle nomargin">Add Notifications</h4>
            	<div class="widgetcontent bordered shadowed nopadding">
					<?php 	$attributes = array('class'=>'stdform stdform2');
							echo form_open(base_url().'admin/notifications/add', $attributes); ?>              
                            <p>
								<label>Topic <small>Enter notification header</small></label>
								<span class="field"><input type="text" name="notification_topic" id="notification_topic" /></span>
								<?php echo form_error('notification_topic'); ?>
							</p>
							<p>
                                <label>Description <small>Enter notification message</small></label>
                                <span class="field"><textarea cols="80" rows="3" name="notification_content" id="notification_content" class="span5"></textarea></span>
								<?php echo form_error('notification_content'); ?>
                            </p>
                                        
                            <p class="stdformbutton">
                                <button class="btn btn-primary">Add Notification</button>
                                <button type="reset" class="btn">Reset Notification</button>
                            </p>
                        </form>
                    </div>
                <div class="divider15"></div>
                
            </div><!--contentinner-->
        </div><!--maincontent-->