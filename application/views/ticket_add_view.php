 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="page-header">Write to Cash2CashClub Support Team</h4>
                    </div>
                   <div class="col-md-8">
                       
                     <?php $attributes = array('role'=>'form');
                            echo form_open(base_url().'ticket',$attributes); ?>
                            <fieldset class="panel-body">
                                <div class="form-group" style="width:220px;">
                                    <select class="form-control" name="dept" id="dept" autofocus>
                                        <option value="">Select Department</option>
                                      <option value="Support Team">Support Team</option>
                                      <option value="General Enquiry">General Enquiry</option>
                                    </select>
                                    <span class="text-danger"><?php echo form_error('dept'); ?></span>
                                    
                                    
                                </div>
                                
                                <div class="form-group" style="width:220px;">
                                    <select class="form-control" name="priority" id="priority" autofocus>
                                        <option value="">Select Ticket Priority</option>
                                      <option value="High">High</option>
                                      <option value="Medium">Medium</option>
                                      <option value="Low">Low</option>
                                    </select>
                                    <span class="text-danger"><?php echo form_error('priority'); ?></span>
                                </div>
                                
                                <div class="form-group" style="width:220px;">
                                    <input class="form-control" id="subject" placeholder="Subject" name="subject" type="text" value="<?php echo set_value('subject')?>" autofocus>
                                    <span class="text-danger"><?php echo form_error('subject'); ?></span>
                                </div>

                                <div class="form-group">
                                    <textarea class="form-control" id="description" placeholder="Description" name="description" type="text" rows="5" autofocus><?php echo set_value('description')?></textarea>
                                    <span class="text-danger"><?php echo form_error('description'); ?></span>
                                </div>
                               
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block" name="submit_btn" value="submit" style="width:220px;">Submit
                                </button>
                            </fieldset>
                        </form>
                        
                        </div>
                </div>

                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
