			<!-- =========================== Footer Start ========================================= -->
			<footer class="dark-footer skin-dark-footer">
				<div>
					<div class="container">
						<div class="row">
							
							<div class="col-lg-4 col-md-6">
								<div class="footer-widget">
									<img src="assets/img/logo.png" class="img-fluid f-logo" width="120" alt="">
									<p>407-472 Rue Saint-Sulpice, Montreal<br>Dhaka, H2Y 2V8</p>
									<ul class="footer-bottom-social">
										<li><a href="#"><i class="ti-facebook"></i></a></li>
										<li><a href="#"><i class="ti-twitter"></i></a></li>
										<li><a href="#"><i class="ti-instagram"></i></a></li>
										<li><a href="#"><i class="ti-linkedin"></i></a></li>
									</ul>
								</div>
							</div>		
							<div class="col-lg-2 col-md-4">
								<div class="footer-widget">
									<h4 class="widget-title">Useful links</h4>
									<ul class="footer-menu">
										<li><a href="#">About Us</a></li>
										<li><a href="#">FAQs Page</a></li>
										<li><a href="#">Checkout</a></li>
										<li><a href="#">Login</a></li>
									</ul>
								</div>
							</div>
							
							<div class="col-lg-2 col-md-4">
								<div class="footer-widget">
									<h4 class="widget-title">Developers</h4>
									<ul class="footer-menu">
										<li><a href="#">Booking</a></li>
										<li><a href="#">Stays</a></li>
										<li><a href="#">Adventures</a></li>
										<li><a href="#">Author Detail</a></li>
									</ul>
								</div>
							</div>
							
							<div class="col-lg-2 col-md-4">
								<div class="footer-widget">
									<h4 class="widget-title">Useful links</h4>
									<ul class="footer-menu">
										<li><a href="#">About Us</a></li>
										<li><a href="#">Jobs</a></li>
										<li><a href="#">Events</a></li>
										<li><a href="#">Press</a></li>
									</ul>
								</div>
							</div>
									
							<div class="col-lg-2 col-md-4">
								<div class="footer-widget">
									<h4 class="widget-title">Useful links</h4>
									<ul class="footer-menu">
										<li><a href="#">Support</a></li>
										<li><a href="#">Contact Us</a></li>
										<li><a href="#">Privacy &amp; Terms</a></li>
									</ul>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				
				<div class="footer-bottom">
					<div class="container">
						<div class="row align-items-center">
							
							<div class="col-lg-12 col-md-12 text-center">
								<p class="mb-0">© 2023 DreamHome. Designd By <a href="https://dreamhome.com/">My Dream Home</a> All Rights Reserved</p>
							</div>
							
						</div>
					</div>
				</div>
			</footer>
			<!-- =========================== Footer End ========================================= -->
			
			<!-- Log In Modal -->
			<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="registermodal" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
					<div class="modal-content" id="registermodal">
						<div class="modal-header">
							<h4>Sign In</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ti-close"></i></span></button>
						</div>
						<div class="modal-body">

							<div class="sErr text-center"></div>
							
							<div class="login-form">
								<form>
								
									<div class="form-group">
										<label>User Name<span style="color:red">*<span></label>
										<input type="text" name="username" id="username" class="form-control" placeholder="Username">
									</div>
									
									<div class="form-group">
										<label>Password<span style="color:red">*<span></label>
										<input type="password" name="password" id="password" class="form-control" placeholder="*******">
									</div>
									
									<div class="form-group">
										<button type="button" class="btn dark-2 btn-md full-width pop-login">Login</button>
									</div>
								
								</form>
							</div>
							
							<div class="form-group text-center">
								<span>Or Signin with</span>
							</div>
							
							<div class="social_logs mb-4">
								<ul class="shares_jobs text-center">
									
									<li><a href="<?php echo e(route('loginWithSchoialMedia', 'google')); ?>" class="share gp"><i class="fa fa-google"></i></a></li>
									
								</ul>
							</div>
							
						</div>
						<div class="modal-footer">

							
							<div class="mf-link"><i class="ti-user"></i>Haven't An Account?<a href="javascript:void(0)" data-toggle="modal" data-target="#upload-resume" class="theme-cl"> Sign Up</a></div>
							<div class="mf-forget"><a href="<?php echo e(route('password.request')); ?>"><i class="ti-help"></i>Forget Password</a></div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Modal -->

			<!-- Upload Resume -->
			<div class="modal fade" id="upload-resume" tabindex="-1" role="dialog" aria-labelledby="resumeupload" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
					<div class="modal-content" id="resumeupload">
						<div class="modal-header">
							<h4>Registration Form </h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ti-close"></i></span></button>
						</div>
						<div class="modal-body">

							<div class="sErr text-center"></div>
							
							<div class="login-form">
								<form  action="" method="POST">             
									

                                    <div class="form-group">
										<label>Join as a<span style="color:red">*<span></label>
										<select name="usertype" class="form-control" id="usertype">
											<option value="">Select</option>
                                            <option value="landlord">বাড়িওয়ালা</option>
                                            <option value="renter">ভাড়াটিয়া</option>
                                        </select>
										<span id="error_usertype" class="text-danger"></span>
									</div>
								
									<div class="form-row">
										<div class="col-lg-6 col-md-12">
											<div class="form-group">
												<label>First Name<span style="color:red">*<span></label>
												<input type="text" name="firstname" id="firstname" class="form-control" placeholder="First Name">
												<span id="error_firstname" class="text-danger"></span>
											</div>
										</div>
										
										<div class="col-lg-6 col-md-12">
											<div class="form-group">
												<label>Last Name<span style="color:red">*<span></label>
										        <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Last Name">
												<span id="error_lastname" class="text-danger"></span>
											</div>
										</div>
									</div>

                                    <div class="form-row">
										
										
										<div class="col-lg-6 col-md-12">
											<div class="form-group">
												<label>Mobile<span style="color:red">*<span></label>
										        <input type="mobile" name="mobile" id="mobile" class="form-control" placeholder="Use 11 digit mobile number">
												<span id="error_mobile" class="text-danger"></span>
											</div>
										</div>
										<div class="col-lg-6 col-md-12">
											<div class="form-group">
												<label>E-Mail ID</label>
										        <input type="email" name="email" id="email" class="form-control" placeholder="ucicl@gmail.com">
												<span id="error_email" class="text-danger"></span>
											</div>
										</div>
									</div>
									
                                  
									
									<div class="form-group">
										<label>Username<span style="color:red">*<span></label>
										<input type="text" name="username" id="username2" class="form-control" placeholder="Username">
										<span id="error_username" class="text-danger"></span>
										
									</div>

                                    <div class="form-group">
										<label>Password<span style="color:red">*<span></label>
										<input type="password" name="password" id="password2" class="form-control" placeholder="Password">
										<span id="error_password" class="text-danger"></span><br>
										<small>Use minimum 6 characters which contain at least one numeric digit, one uppercase and one lowercase letter</small>
										
									</div>
									
									<div class="form-group">
										<button type="button" class="btn dark-2 btn-md full-width user_res">Submit</button>
									</div>
								
								</form>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<!-- Upload Resume -->			

		</div>
		<!-- ============================================================== -->
		<!-- End Wrapper -->
		<!-- ============================================================== -->
       

		<!-- ============================================================== -->
		<!-- All Jquery -->
		<!-- ============================================================== -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/select2.min.js"></script>
		<script src="assets/js/owl.carousel.min.js"></script>
		<script src="assets/js/ion.rangeSlider.min.js"></script>
		<script src="assets/js/counterup.min.js"></script>
		<script src="assets/js/materialize.min.js"></script>
		<script src="assets/js/metisMenu.min.js"></script>
		<script src="assets/js/custom.js"></script>
		<!-- MDB -->
		<script
		type="text/javascript"
		src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"
		></script>

        <script>
            $(document).on("click", ".user_res", function(){
                //alert('gg');exit;
                

				var error_email = '';
				var error_firstname = '';
				var error_firstlast = '';
				var error_password = '';
                var error_mobile = '';
				var error_usertype = '';
				var error_username = '';
                var mobfilter = /^\d*(?:\.\d{1,2})?$/;
				var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				var passw = /^(?=.*\d)(?=.*[a-z]).{6,20}$/;
            
				if($.trim($('#email').val()).length != 0)
				{

					if (!filter.test($('#email').val()))
					{
					error_email = 'Invalid Email';
					$('#error_email').text(error_email);
					$('#email').addClass('has-error');
					}
					else
					{
					error_email = '';
					$('#error_email').text(error_email);
					$('#email').removeClass('has-error');
					}
				}

				if($.trim($('#username2').val()).length == 0)
				{
					error_username = 'Username is required';
				$('#error_username').text(error_username);
				$('#username2').addClass('has-error');
				}
				else
				{
					error_username = '';
				$('#error_username').text(error_username);
				$('#username2').removeClass('has-error');
				}

				if($.trim($('#usertype').val()).length == 0)
				{
					
				error_usertype = 'Usertype is required';
				$('#error_usertype').text(error_usertype);
				$('#usertype').addClass('has-error');
				}
				else
				{
				error_usertype = '';
				$('#error_usertype').text(error_usertype);
				$('#usertype').removeClass('has-error');
				}

				if($.trim($('#firstname').val()).length == 0)
				{
				error_firstname = 'First Name is required';
				$('#error_firstname').text(error_firstname);
				$('#firstname').addClass('has-error');
				}
				else
				{
				error_firstname = '';
				$('#error_firstname').text(error_firstname);
				$('#firstname').removeClass('has-error');
				}
				if($.trim($('#lastname').val()).length == 0)
				{
				error_lastname = 'Last Name is required';
				$('#error_lastname').text(error_lastname);
				$('#lastname').addClass('has-error');
				}
				else
				{
				error_lastname = '';
				$('#error_lastname').text(error_lastname);
				$('#lastname').removeClass('has-error');
				}
				if($.trim($('#password2').val()).length == 0)
				{
					error_password = 'Password is required';
					$('#error_password').text(error_password);
					$('#password2').addClass('has-error');
				}
				else
				{
					error_password = '';
					$('#error_password').text(error_password);
					$('#password2').removeClass('has-error');
				}
                if($.trim($('#mobile').val()).length != 0)
				{

					if (mobfilter.test($('#mobile').val()))
					{
						if($.trim($('#mobile').val()).length != 11 )
						{

							error_mobile = 'Please put 11  digit mobile number';
							$('#error_mobile').text(error_mobile);
							$('#mobile').addClass('has-error');
						}
						else{
							error_mobile = '';
							$('#error_mobile').text(error_mobile);
							$('#mobile').addClass('has-error');
						}

					}
					else
					{
						error_mobile = 'Invalid Mobile No';
						$('#error_mobile').text(error_mobile);
						$('#mobile').addClass('has-error');
					}
				}
				else if($.trim($('#mobile').val()).length == 0)
				{
					error_mobile = 'Mobile Number is required';
					$('#error_mobile').text(error_mobile);
					$('#mobile').addClass('has-error');
				}
				else{

					error_mobile = '';
					$('#error_mobile').text(error_mobile);
					$('#mobile').addClass('has-error');

				}

				if(error_email != '' ||error_usertype != '' ||  error_lastname != ''|| error_firstname != ''|| error_username != '' || error_password != '' || error_mobile != '')
				{
				return false;
				}
				else
				{
            
					var ts = $(this);
					var firstname = $("#firstname").val();
					var lastname = $("#lastname").val();
					var usertype = $("#usertype").val();
					var mobile = $("#mobile").val();	
					var email = $("#email").val();
					var username = $("#username2").val();
					var password2 = $("#password2").val();
             
                   
              
                    var data = {
                        usertype: usertype,
                        firstname: firstname,
                        lastname: lastname,
                        mobile: mobile,
                        email: email,
                        username: username,
                        password: password2
                    };
               
            
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            
                $.ajax({
                    url: "<?php echo e(url('submit_registration')); ?>",
                    method: "post",
                    data: data,
                    beforeSend: function(){
                        ts.removeClass("bg-navy").addClass("bg-primary ").html("<i class='fa fa-spinner fa-spin'></i>")
                    },
                    success: function(rsp){
                        if(rsp.error == false){
                           console.log(rsp.data.usertype);
                            $(".sErr").html("<div class='alert alert-success'>"+rsp.msg+"</div>");
                            $("input").val("");
                            ts.removeClass("bg-primary ").addClass("bg-navy").html("<i class='fa fa-save'></i> Submit");
                            setTimeout(function(){
                                if(rsp.data.usertype == 'Student' || rsp.data.usertype == 'Authority' || rsp.data.usertype == 'Parent' || rsp.data.usertype == 'Teacher'){
                                // window.location = "<?php echo e(url('home')); ?>";
                                $(".sErr").html("<div class='alert alert-danger'>Please First Update Your Profile</div>");
                                window.location = "<?php echo e(url('gsettings')); ?>" + "#success";
                                }
                                else if(rsp.data['type'] == 'Teacher'){
                                var id = rsp.data['user_id'];
                                console.log("id");
                                console.log(id);
                               // window.location = "<?php echo e(url('otp-verification')); ?>-"+id;
                                //window.location = "<?php echo e(url('home')); ?>";
                                 $(".sErr").html("<div class='alert alert-danger'>Please First Update Your Profile</div>");
                                window.location = "<?php echo e(url('gsettings')); ?>"+ "#success";
                               }
                               else if(rsp.data['type'] == 'Participant'){
                                $(".sErr").html("<div class='alert alert-danger'>Please First Update Your Profile</div>");
                                window.location = "<?php echo e(url('/dashboard')); ?>" + "#success";
                                   }
                               else{
                                 //window.location = "<?php echo e(url('user-dashboard')); ?>";
                                 $(".sErr").html("<div class='alert alert-success'>Welcome In DreamHome Dashboard</div>");
                                window.location = "<?php echo e(url('/dashboard')); ?>" + "#success";
                               }
                            }, 2000);
                        } else {
                            $(".sErr").html("<div class='alert alert-danger'>"+rsp.msg+"</div>");
                            ts.removeClass("bg-primary ").addClass("bg-navy").html("<i class='fa fa-save'></i> Submit");
                        }
                    },
                    error: function(err, txt, sts){
                        console.log(err);
                        console.log(txt);
                        console.log(sts);
                    }
                });

				}
            });

			$(document).on("click", ".pop-login", function() {
                var ts = $(this);
                var username = $("#username").val();
                var password = $("#password").val();


                if (!username && !password) {
                    required();
                    return false;
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "<?php echo e(url('myLogin')); ?>",
                    method: "post",
                    data: {
                        username: username,
                        password: password,
                        _token: "<?php echo e(csrf_token()); ?>"
                    },
                    beforeSend: function() {
                        ts.removeClass("bg-navy").addClass("bg-warning").html(
                            "<i class='fa fa-spinner fa-spin'></i>")
                    },
                    success: function(rsp) {
                        console.log(rsp);
                        if (rsp.error == false) {
                            $(".sErr").html("<div class='alert alert-primary text-center'>" + rsp.msg +
                                "</div>");
                            $("input").val("");
                            ts.removeClass("bg-warning").addClass("bg-navy").html(
                                "<i class='fa fa-save'></i> Submit");
                            setTimeout(function() {
                                if (rsp.data.usertype == 'Innovator' || rsp.data.usertype ==
                                    'Mentor' || rsp.data.usertype == 'Enterprenuer' || rsp.data
                                    .usertype == 'Educator' ||  rsp.data
                                    .usertype == 'Participant'|| rsp.data.usertype ==
                                    'Support_System' || rsp.data.usertype == 'Manufacturers' || rsp
                                    .data.usertype == 'Small_Investors' || rsp.data.usertype ==
                                    'Innovation_Investors' || rsp.data.usertype ==
                                    'School_Participant') {
                                     window.location = "<?php echo e(url('/dashboard')); ?>";
                                   // window.location.reload();
                                } else {
                                    window.location = "<?php echo e(url('/dashboard')); ?>";
                                }
                            }, 2000);
                        } else {
                            $(".sErr").html("<div class='alert alert-danger'>" + rsp.msg + "</div>");
                            ts.removeClass("bg-warning").addClass("bg-navy").html(
                                "<i class='fa fa-save'></i> Submit");
                        }
                    },
                    error: function(err, txt, sts) {
                        console.log(err);
                        console.log(txt);
                        console.log(sts);
                    }
                });
            });
            </script>
		<!-- ============================================================== -->
		<!-- This page plugins -->
		<!-- ============================================================== -->

		
	</body>

<!-- Mirrored from themezhub.net/workoo-demo/workoo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 10 Jan 2022 13:16:59 GMT -->
</html><?php /**PATH C:\laragon\www\mydreamhome\resources\views/frontend/layout/footer.blade.php ENDPATH**/ ?>