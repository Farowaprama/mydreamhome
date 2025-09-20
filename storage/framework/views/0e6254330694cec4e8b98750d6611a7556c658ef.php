<!DOCTYPE html>
<html lang="zxx">
	
<!-- Mirrored from themezhub.net/workoo-demo/workoo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 10 Jan 2022 13:16:35 GMT -->
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
   
    	<link rel="icon" type="image/x-icon" href="<?php echo e(asset('assets/img/favicon.png')); ?>">
		
        <title>Dream Home</title>
		
        <!-- All Plugins Css -->
        <link href="<?php echo e(asset('assets/css/plugins.css')); ?>" rel="stylesheet">
		 

        <!-- Custom CSS -->
        <link href="<?php echo e(asset('assets/css/styles.css')); ?>" rel="stylesheet">

		<!-- Font Awesome mdf slider -->
		<link
		href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
		rel="stylesheet"
		/>
		<!-- Google Fonts -->
		<link
		href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
		rel="stylesheet"
		/>
		<!-- MDB -->
		<link
		href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css"
		rel="stylesheet"
		/>
    </head>
	
    <body class="blue-skin">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="Loader"></div>
		
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">
		
            <!-- ============================================================== -->
            <!-- Top header  -->
            <!-- ============================================================== -->
            <!-- Start Navigation -->
			<div class="header header-transparent dark-text">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<nav id="navigation" class="navigation navigation-landscape">
								<div class="nav-header">
									<a class="nav-brand" href="<?php echo e(url('/')); ?>">
										<img src="assets/img/logo.png" class="logo" alt="" />
									</a>
									<div class="nav-toggle"></div>
								</div>
								<div class="nav-menus-wrapper">
									<ul class="nav-menu">
									
										<li class="active"><a href="<?php echo e(url('/')); ?>">Home<span class="submenu-indicator"></span></a>
											
										</li>
										
										
										
										<li><a href="<?php echo e(url('/')); ?>">Our Service</a></li>
										
										
										
									</ul>
									
									<ul class="nav-menu nav-menu-social align-to-right">
										<?php if(auth()->guard()->guest()): ?>
										<li>
											<a href="javascript:void(0);" data-toggle="modal" data-target="#upload-resume">
												<i class="ti-user mr-1"></i>Sign up
											</a>
										</li>
										<li class="add-listing dark-bg">
											<a href="#" data-toggle="modal" data-target="#login">
												 <i class="ti-user mr-1"></i> Sign in
											</a>
										</li>
										<?php endif; ?>

										<?php if(Auth::check()): ?>
										<li class="add-listing dark-bg">
											<?php if(Auth::user()->usertype): ?>
											<a href="<?php echo e(url('/dashboard')); ?>">
												<i class="fa fa-user mr-2"></i>My Account
											</a>
											<?php endif; ?>
										</li>
										<?php endif; ?>
									</ul>
								</div>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<!-- End Navigation -->

        <?php echo $__env->yieldSection(); ?>
       
        <!-- main content  -->
     
        <?php echo $__env->yieldContent('maincontent'); ?>
        <!-- main content end-->
        <?php echo $__env->make('frontend.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\mydreamhome\resources\views/frontend/layout/header.blade.php ENDPATH**/ ?>