
<?php $__env->startSection('maincontent'); ?>
<?php echo $__env->make('admin.layout.leftmenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>
 .card-body{
background:#eee;
margin-top:20px;
}
.text-danger strong {
        	color: #9f181c;
		}
		.receipt-main {
			background: #ffffff none repeat scroll 0 0;
			border-bottom: 12px solid #333333;
			border-top: 12px solid #9f181c;
			margin-top: 50px;
			margin-bottom: 50px;
			padding: 40px 30px !important;
			position: relative;
			box-shadow: 0 1px 21px #acacac;
			color: #333333;
			font-family: open sans;
		}
		.receipt-main p {
			color: #333333;
			font-family: open sans;
			line-height: 1.42857;
		}
		.receipt-footer h1 {
			font-size: 15px;
			font-weight: 400 !important;
			margin: 0 !important;
		}
		.receipt-main::after {
			background: #414143 none repeat scroll 0 0;
			content: "";
			height: 5px;
			left: 0;
			position: absolute;
			right: 0;
			top: -13px;
		}
		.receipt-main thead {
			background: #414143 none repeat scroll 0 0;
		}
		.receipt-main thead th {
			color:#fff;
		}
		.receipt-right h5 {
			font-size: 16px;
			font-weight: bold;
			margin: 0 0 7px 0;
		}
		.receipt-right p {
			font-size: 12px;
			margin: 0px;
		}
		.receipt-right p i {
			text-align: center;
			width: 18px;
		}
		.receipt-main td {
			padding: 9px 20px !important;
		}
		.receipt-main th {
			padding: 13px 20px !important;
		}
		.receipt-main td {
			font-size: 13px;
			font-weight: initial !important;
		}
		.receipt-main td p:last-child {
			margin: 0;
			padding: 0;
		}	
		.receipt-main td h2 {
			font-size: 20px;
			font-weight: 900;
			margin: 0;
			text-transform: uppercase;
		}
		.receipt-header-mid .receipt-left h1 {
			font-weight: 100;
			margin: 34px 0 0;
			text-align: right;
			text-transform: uppercase;
		}
		.receipt-header-mid {
			margin: 24px 0;
			overflow: hidden;
		}
		
		#container {
			background-color: #dcdcdc;
		}
  </style>

       <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header noPrint">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"> <a class="btn btn-success" href="<?php echo e(url('billing_history')); ?>" id=""> Pay Bill</a></li>
              <li class="breadcrumb-item active">Generate Receipt</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

  

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
             
  
              <div class="card" id="PrintMe">
                
                <!-- /.card-header -->
                <div class="card-body">

                  
                   
                  
                  <div class="col-md-12">   

                    
                     <!-- this row will not appear when printing -->
                     <div class="row no-print">
                      <div class="col-12">

                        <a href="javascript:" @click.prevent="printme" target="_blank" class="btn btn-primary float-right print_me"><i class="fa fa-print"></i> Print</a>
                        

                        <a  href="<?php echo e(url('pay_bill_list')); ?>" class="btn btn-danger float-right" style="margin-right: 5px;">
                          <i class="fa fa-times"></i> Cancel
                        </a> 

                      </div>
                    </div>
                    
                    <div class="row">
                       
                           <div class="receipt-main col-xs-12 col-sm-12 col-md-12 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                              
                            <div class="row mb-2">
                              <div class="col-sm-2">
                                <div class="receipt-left1">
                                  <img class="img-responsive" alt="iamgurdeeposahan" src="<?php echo e(asset('assets/img/favicon.png')); ?>" style="width: 100px;">
                                </div>
                                
                              </div>
                              <div class="col-sm-6">
                                <div class="receipt-left">
                                  <h5><b><?php echo e($data['receipt_info']->firstname); ?> <?php echo e($data['receipt_info']->lastname); ?> </b></h5>
                                  <span><b>Mobile :</b> <?php echo e($data['receipt_info']->mobile); ?></span><br>
                                  
                                  
                                  <span><b>Flat No:</b> <?php echo e($data['receipt_info']->flat_no); ?></span><br>
                                  <span><b>Total Bill:</b> <?php echo e($data['receipt_info']->total_bill); ?></span><br>
                                  <span><b>Receipt Id:</b> <?php echo e($data['receipt_info']->id); ?></span>,
                                    <span><b>Date:</b> <?php echo e(date("d-m-Y", strtotime($data['receipt_info']->created_at))); ?></span>
                                  
                                 
                                </div>
                                
                              </div>
                              <div class="col-sm-4 text-right">
                               
                                  
                                  <div class="receipt-right1 float-sm-right">
                                    <h5><b><?php echo e($data['landlord_info']->house_name); ?></b></h5>
                                    <span><?php echo e($data['landlord_info']->location); ?></span><br>
                                    <span><b>Contact No:</b> <?php echo e($data['landlord_info']->mobile); ?></span><br>
                                    <span><b>Email:</b> <?php echo e($data['landlord_info']->email); ?></span><br>
                                    
                                    
                                    
                                  </div>
                           
                              </div>
                            </div>


                        
                         
                               <div>
                                   <table class="table table-bordered">
                                       <thead>
                                           <tr>
                                               <th>Payment for <?php echo e($data['receipt_info']->month); ?> <?php echo e($data['receipt_info']->pay_year); ?></th>
                                               <th>Amount</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                                           <tr>
                                               <td class="col-md-9">বাড়ি ভাড়া</td>
                                               <td class="col-md-3"><i class="fa fa-inr"></i> <?php echo e($data['receipt_info']->house_rent); ?>/-</td>
                                           </tr>
                                           <tr>
                                               <td class="col-md-9">গ্যাস বিল</td>
                                               <td class="col-md-3"><i class="fa fa-inr"></i> <?php echo e($data['receipt_info']->gas_bill); ?>/-</td>
                                           </tr>
                                           
                                           <tr>
                                               <td class="text-right">
                                                <p>
                                                   <strong>Total Tk: </strong>
                                               </p>
                                               <p>
                                                <strong>বাড়ি ভাড়া পরিশোধ: </strong>
                                            </p>
                                            <p>
                                              <strong>গ্যাস বিল পরিশোধ: </strong>
                                            </p>
                                            
                                               
                                              
                              
                               
                                 </td>
                                               <td>
                                               <p>
                                                   <strong><i class="fa fa-inr"></i> <?php echo e($data['receipt_info']->total_bill); ?>/-</strong>
                                               </p>
                                               <p>
                                                <strong><i class="fa fa-inr"></i> <?php echo e($data['receipt_info']->house_rent_pay); ?>/-</strong>
                                            </p>
                                            <p>
                                              <strong><i class="fa fa-inr"></i> <?php echo e($data['receipt_info']->gas_bill_pay); ?>/-</strong>
                                          </p>
                                          
                                              
                                              
                                           
                                 </td>
                                           </tr>
                                           <tr>
                                              
                                               <td class="text-right"><h2><strong>Total Pay: </strong></h2></td>
                                               <td class="text-left text-danger"><h2><strong><i class="fa fa-inr"></i> <?php echo e($data['receipt_info']->total_pay); ?>/-</strong></h2></td>
                                               
                                           </tr>
                                           <tr>
                                            <td class="text-right"><h4>Balance Due:</h4></td>
                                               <td class="text-left text-danger"><h2><strong><i class="fa fa-inr"></i> <?php echo e($data['receipt_info']->due_bill); ?>/-</strong></h2></td>
                                           </tr>
                                       </tbody>
                                   </table>
                               </div>


                               
                               <div class="row mb-2">
                                <div class="col-sm-6">
                                  <div class="receipt-left1">
                                    <p><b>Date :</b> <?php echo e(date("d-m-Y", strtotime($data['receipt_info']->created_at))); ?></p>
                                    <p style="color: rgb(78, 19, 196);"><b>বিশেষ দ্রষ্টব্য:  </b> <?php echo e($data['receipt_info']->note); ?></p>
                                    <h5 style="color: rgb(15, 8, 30);">Thanks for Pay.!</h5>
                                  </div>
                                  
                                </div>
                               
                                <div class="col-sm-6 text-right">
                                 
                                    
                                    <div class="receipt-right1 float-sm-right">
                                      <h6>বাড়িয়ালার স্বাক্ষর</h6>
                                      <img class="img-responsive" alt="iamgurdeeposahan" src="<?php echo e(asset('profile_img/'.$data['landlord_info']->sign_image)); ?>" style="width: 140px;">
                                    </div>
                             
                                </div>
                              </div>

                               
                         
                       
                         
                           </div>    
                     </div>
                   </div>
                  
                  
                
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->

   

      

     
      <!-- /.content -->
      

   
      <!-- /.content -->

  
    </div>
    <!-- /.content-wrapper -->



     



      

<?php $__env->startSection("scripts2"); ?>

<!-- Bootstrap 4 -->
<script src="<?php echo e(asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

<script src="<?php echo e(asset('admin/plugins/select2/js/select2.full.min.js')); ?>"></script>

<script type="text/javascript">

$(document).on("click", ".print_me", function(){
    $(".noPrint").hide();
  window.print();
  $(".noPrint").show();
});



</script>



<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\mydreamhome\resources\views/renter/show_receipt.blade.php ENDPATH**/ ?>