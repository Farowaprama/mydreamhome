<?php $__env->startSection('maincontent'); ?>
			<div class="clearfix"></div>
			<!-- ============================================================== -->
			<!-- Top header  -->
			<!-- ============================================================== -->
			
			
			<!-- ============================ Hero Banner  Start================================== -->
			<div class="hero-banner full jumbo-banner" style="background:#f4f9fd url(assets/img/bg2.png);">
				<div class="container">
					<div class="row align-items-center">	
					
						<div class="col-lg-7 col-md-8">

							<h1>Maintain your <span class="text-info"> Dream Home Smartly </span> & Make your Life Easy!</h1>
							<p class="lead"></p>
							
							
							
							<div class="linkeo_link">
								<a <?php if(Auth::check()): ?> href="<?php echo e(url('/dashboard')); ?>" <?php else: ?> href="#"
								data-toggle="modal" data-target="#login"
								<?php endif; ?> class="btn _hire_freelancers btn-info" style="border: 1px solid #390cb4; color: #390cb4">বাড়িওয়ালা</a>

								
								<a <?php if(Auth::check()): ?> href="<?php echo e(url('/dashboard')); ?>" <?php else: ?> href="#"
								data-toggle="modal" data-target="#login"
								<?php endif; ?> class="btn _loonking_job " style="border: 1px solid #390cb4; color:#f4f9fd">ভাড়াটিয়া</a>
							</div>

							
						</div>
						
						<div class="col-lg-5 col-md-4">
							<img src="assets/img/edu_2.png" alt="latest property" class="img-fluid">
						</div>

						
						<div class="col-lg-10 col-md-10">
							<form class="search-big-form shadows" style="box-shadow: 0 0 0 9px rgba(50, 137, 230, 0.77)!important;">
								<div class="row m-0">
									<div class="col-lg-5 col-md-5 col-sm-12 p-0">
										<div class="form-group">
											<i class="ti-search"></i>
											<input type="text" class="form-control l-radius b-0 b-r" placeholder="Rent or Buy">
										</div>
									</div>
									
									<div class="col-lg-5 col-md-4 col-sm-12 p-0">
										<div class="form-group">
											<i class="ti-location-pin"></i>
											<input type="text" class="form-control b-0" placeholder="Location">
										</div>
									</div>
									
									<div class="col-lg-2 col-md-3 col-sm-12 p-0">
										<button type="button" class="btn btn-warning theme-bg r-radius full-width">Find Home</button>
									</div>
								</div>
							</form>	
						</div>
						
					
					</div>

				</div>
			</div>
			<!-- ============================ Hero Banner End ================================== -->

			<!-- ============================ News Updates Start ==================================== -->
			<section class="min-sec">
				<div class="container">
				
					<div class="row justify-content-center">
						<div class="col-lg-7 col-md-9">
							<div class="sec-heading">
								<h2>Recent <span class="theme-cl-2">Tolate</span></h2>
								
							</div>
						</div>
					</div>
					
					<div class="row">
						
						<!-- Single blog Grid -->
						<!-- Single blog Grid -->
						<?php if(!empty($data['tolate'])): ?>
						<?php $__currentLoopData = $data['tolate']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							
						
						<div class="col-lg-4 col-md-4 col-sm-12">
							<div class="blog-wrap-grid">
								
								<div class="blog-thumb">
									
									
									<div id="carouselExampleCrossfade" class="carousel slide carousel-fade" data-mdb-ride="carousel">
										<div class="carousel-indicators">
										  <button
											type="button"
											data-mdb-target="#carouselExampleCrossfade"
											data-mdb-slide-to="0"
											class="active"
											aria-current="true"
											aria-label="Slide 1"
										  ></button>
										  <button
											type="button"
											data-mdb-target="#carouselExampleCrossfade"
											data-mdb-slide-to="1"
											aria-label="Slide 2"
										  ></button>
										  <button
											type="button"
											data-mdb-target="#carouselExampleCrossfade"
											data-mdb-slide-to="2"
											aria-label="Slide 3"
										  ></button>
										</div>
										<div class="carousel-inner">

											<?php
											if(!empty($value->image)){
												$dt = (json_decode($value->image));
												if ($dt != null) {
													foreach($dt as $val){
														//print_r($val);

											?>
										  <div class="carousel-item active">
											<img src="<?php echo e(asset('image/flat_img/'.$val)); ?>" class="d-block w-100" style="height: 213px" alt="Wild Landscape"/>
										  </div>
										  <?php } }}
										  else{?>
										  <div class="carousel-item active">
											<img src="assets/img/tolate2.jpg" class="d-block w-100" style="height: 213px" alt="Camera"/>
										  </div>
										  <?php }?>
										  
										</div>
										<button class="carousel-control-prev" type="button" data-mdb-target="#carouselExampleCrossfade" data-mdb-slide="prev">
										  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
										  <span class="visually-hidden">Previous</span>
										</button>
										<button class="carousel-control-next" type="button" data-mdb-target="#carouselExampleCrossfade" data-mdb-slide="next">
										  <span class="carousel-control-next-icon" aria-hidden="true"></span>
										  <span class="visually-hidden">Next</span>
										</button>
									  </div>
									
								</div>
								
								<div class="blog-info">
									
									<span class="post-date">Contact No: 01913415388</span>
								</div>
								<div class="blog-cates" style="padding: 0 20px 0px !important;">
									<ul class="_requirement_lists">
										<li><span class="_elios req_1">Flat</span></li>
										<li><span class="_elios req_2">Bed: <?php echo e($value->num_of_beds); ?></span></li>
										<li><span class="_elios req_6">Bath: <?php echo e($value->num_of_bathroom); ?></span></li>
										<li><span class="_elios"> <?php echo e($value->area); ?> sqft</span></li>
									</ul>
								</div>
								<div class="blog-body">
									<h4 class="bl-title"><a href="blog-detail.html"><?php echo e($value->total_bill); ?> TK</a></h4>
									
									<p>DHAKA, Banasree</p>
									
								</div>
							
								
							</div>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php endif; ?>

						<!-- Single blog Grid -->
						
						

						
					</div>
					
				</div>
			</section>
			<!-- ============================ News Updates End ==================================== -->




			
			
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\mydreamhome\resources\views/home.blade.php ENDPATH**/ ?>