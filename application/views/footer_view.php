<footer class="footer">
				<div class="container-fluid">
					
					<p class="copyright pull-right">
						&copy; <script>document.write(new Date().getFullYear())</script> <a href="http://cash2cashclub.com">Cash2CashClub</a>, Helping Hands
					</p>
				</div>
			</footer>
		</div>
	</div>

	<!--   Core JS Files   -->
	<script src="<?php echo base_url();?>assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/js/material.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/js/bootbox.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/js/demo.js" type="text/javascript"></script>
	

	<!--  Charts Plugin -->

	<!--  Notifications Plugin    -->
	<script src="<?php echo base_url();?>assets/js/bootstrap-notify.js"></script>

	<!--  Google Maps Plugin    -->
	
	<!-- Material Dashboard javascript methods -->
	<script src="<?php echo base_url();?>assets/js/material-dashboard.js"></script>
	
	<script type="text/javascript">
	    jQuery(document).ready(function(){
            jQuery('#hideshow').on('click', function(event) {        
                jQuery('#upgrade').toggle('show');
            });
			jQuery('#showcycle').on('click',function(event){
				jQuery('#nextcycle').toggle('show');
			});
			jQuery('#hidecycle').on('click',function(event){
				jQuery('#nextcycle').toggle('hide');
			});
        });
	</script>

	<script type="text/javascript">
$(function(){
    $('.source-code').each(function(index){
        var $section = $(this);
        var code = $(this).html().replace('<!--', '').replace('-->', '');
        
        // Code preview
        var $codePreview = $('<pre class="prettyprint lang-javascript"></pre>');
        $codePreview.text(code);
        $section.html($codePreview);
        
        // Run code
        if($section.hasClass('runnable')){
            var $button = $('<button class="btn btn-primary">Run the code</button>');
            $button.on('click', {code: code}, function(event){
                eval(event.data.code);
            });
            $button.insertAfter($section);
            $('<div class="clearfix" style="margin-bottom: 10px;"></div>').insertAfter($button);
        }
    });
});
</script>

	<script>
		$(document).ready(function(){
			var merge_status = <?=$status?>;
			var mergeid = <?=$mergeid?>;
			var nextcycle = <?=$nextcycle?>;
			var recycle = <?=$recycletime?>;
			var account_blocked = <?=$isblocked?>;
			if(account_blocked == 1){
				$("#accountblocked").removeClass("hide");
			}else if(merge_status==0){
				$('#phnext_merge').removeClass("hide");//will be merged soon
			}else if(merge_status==1){
				$("#merged_to").removeClass("hide");
				getMergedToParty();//getMergedToParty
				timeLeft(nextcycle,"mergetime");
			}else if(merge_status==2 || merge_status==3){
				$('#ghnext_merge').removeClass("hide");//not yet merged
				timeLeft(nextcycle,"demo");
			}else if(merge_status==4){
				$('#merged_party1').removeClass("hide");//getMergedParties
				$('#merged_party2').removeClass("hide");
				getMergedParties();
				timeLeft(nextcycle,"mergetime1");
				timeLeft(nextcycle,"mergetime2");
			}else if(merge_status==5){
				$('#next_action').removeClass("hide");//restart cycle or upgrade account
				timeLeft(recycle,"recycletime");
			}else{
				$('#next_merge').removeClass("hide");//will be merged soon
				timeLeft(nextcycle,"demo");
			}
			
			function getMergedToParty(){
				$.ajax({
					url:'<?php echo base_url()."cash2cash/getMergedToParty/$userid/$mergeid";?>',
					async:false,
					dataType:'JSON',
					success:function(data){
						$('#fullname').text(data[0].first_name+" "+data[0].last_name);
						$('#phone_number').text(data[0].phone_number);
						$('#email').text(data[0].email);
						$('#bank_name').text(data[0].bank_name);
						$('#account_name').text(data[0].account_name);
						$('#account_number').text(data[0].account_number);
						//timeLeft(data[0].merge_time,"mergetime");
					},
					error:function(xhr,st,er){
						alert(xhr+" failed "+er);
					}
				});
			}
			function getMergedParties(){
				$.ajax({
					url:'<?php echo base_url()."admin/users/getMergedParties/$userid/$mergeid";?>',
					async:false,
					dataType: 'JSON',
					success:function(data){
						for(var i=0;i<2;i++){
							//$('#mp'+(i+1)+'user_id').html(data[i].user_id);
							$('#mp'+(i+1)+'fullname').text(data[i].first_name+" "+data[i].last_name);
							$('#mp'+(i+1)+'first_name').text(data[i].first_name);
							$('#mp'+(i+1)+'phone_number').text(data[i].phone_number);
							$('#mp'+(i+1)+'bank_name').text(data[i].bank_fullname);
							$('#mp'+(i+1)+'account_name').text(data[i].account_name);
							$('#mp'+(i+1)+'account_number').text(data[i].account_number);
							$('#mp'+(i+1)+'email').text(data[i].email);
							$('#mp'+(i+1)+'frm').attr('action',"<?php echo base_url().'cash2cash/confirmPay/';?>"+data[i].user_id+'/'+data[i].merge_id);
							if(data[i].evidence_of_pay != null){
								$('#mp'+(i+1)+'evop').text(data[i].evidence_of_pay);
								$('#mp'+(i+1)+'dl').attr('href',"<?php echo base_url().'assets/evidence_of_pay/';?>"+data[i].evidence_of_pay);
							}else{
								$('#mp'+(i+1)+'evop').text('Not Uploaded!');
								$('#mp'+(i+1)+'dl').attr('href','#');
							}
							if(data[i].confirm_pay == 0){
								$('#mp'+(i+1)+'conf').attr('src',"<?php echo base_url().'assets/img/close.png';?>");
							}else{
								$('#mp'+(i+1)+'conf').attr('src',"<?php echo base_url().'assets/img/check.png';?>");
							}
						}
					},
					error:function(xhr,st,er){
						alert(xhr+" failed "+er);
					}
				});
			}
			
			var form = $('#pform');
			form.submit(function(c){
				c.preventDefault();
				if (typeof FormData !== 'undefined') {
					var fdata = new FormData(this);
					$.ajax({
						url:'<?php echo base_url()."profile/uploadPhoto";?>',
						async:false,
						type:'POST',
						data: fdata,
						//dataType: 'JSON',
						//cache : false,
						contentType : false,
						processData : false,
						success:function(data){
							alert(data);
							location.href='<?php echo base_url()."profile/update";?>';
						},
						error:function(xhr,st,er){
							alert(xhr+" failed "+er);
						}
					});
				}else{
					alert("Your browser does not support form data.");
				}
			});
			
			var evform = $('#evform');
			evform.submit(function(c){
				c.preventDefault();
				if (typeof FormData !== 'undefined') {
					var fdata = new FormData(this);
					$.ajax({
						url:'<?php echo base_url()."Cash2cash/uploadEvidence";?>',
						async:false,
						type:'POST',
						data: fdata,
						contentType : false,
						processData : false,
						success:function(data){
							alert(data);
						},
						error:function(xhr,st,er){
							alert(xhr+" failed "+er);
						}
					});
				}else{
					alert("Your browser does not support form data.");
				}
			});
			
			p1form.submit(function(c){
				c.preventDefault();
				var conff = confirm("Are you sure want to confirm this payment?");
			});
			
			function timeLeft(mtime, div="demo"){
				var time = mtime+'000';
				// Set the date we're counting down to
				var countDownDate = time;//new Date(time).getTime();//"Jan 5, 2018 15:37:25").getTime();

				// Update the count down every 1 second
				var x = setInterval(function() {

				  // Get todays date and time
				  var now = new Date().getTime();

				  // Find the distance between now an the count down date
				  var distance = countDownDate - now;

				  // Time calculations for days, hours, minutes and seconds
				  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
				  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
				  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

				  // Display the result in the element with id="demo"
				  document.getElementById(div).innerHTML = "Time Left: " + days + "days " + hours + "hours "
				  + minutes + "minutes " + seconds + "seconds. ";

				  // If the count down is finished, write some text 
				  if (distance < 0) {
					clearInterval(x);
					document.getElementById(div).innerHTML = "EXPIRED";
				  }
				}, 1000);
			}
			
		});
	</script>

<?php $this->session->set_userdata('referred_from', current_url());?>
</body>

</html>
