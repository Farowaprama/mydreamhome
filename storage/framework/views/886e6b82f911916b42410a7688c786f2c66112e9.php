
<?php $__env->startSection('maincontent'); ?>
<?php echo $__env->make('admin.layout.leftmenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>
  .designsh{
    white-space: nowrap;
  }
  .select2-selection{
    height: 37px !important;

  }
  </style>

       <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <?php if(Auth::user()->usertype != 'renter'): ?>
              <li class="breadcrumb-item"> <a class="btn btn-success" href="<?php echo e(url('billing_history')); ?>" >Pay Bill</a></li>
              <?php endif; ?>
              <li class="breadcrumb-item active">Billing History</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
             
  
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Pay Bill List </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered display nowrap responsive" cellspacing='0' width='100%' id="renter_list">

                        <thead>
                
                            <tr>
                
                                <th>No</th>
                                <th>Flat No</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Total Rent</th>
                                <th>Pay Rent</th>
                                <th>Due Rent</th>
                                <th>Month</th>
                                <th>Pay at</th>
                                <th>Status</th>
                                <th>Action</th>
                
                            </tr>
                
                        </thead>
                
                        <tbody>
                
                        </tbody>
                
                    </table>
  
                  
                
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

   

      

      <div class="modal fade" id="ajaxModel" aria-hidden="true">

        <div class="modal-dialog">
    
            <div class="modal-content">
    
                <div class="modal-header">
    
                    <h4 class="modal-title" id="modelHeading"></h4>
    
                </div>
    
                <div class="modal-body">
    
                    <form id="productForm" name="productForm" class="form-horizontal">
    
                       <input type="hidden" name="user_id" id="user_id">

                     
                      <div class="row">
                        <div class="col-md-12 col-md-12">
                          <div class="form-group">
                            <label>Enter Flat</label>
                            <select class="form-control select2" name="flat_id" id="flat_id" placeholder="Enter Flat" data-dropdown-css-class="select2-purple" style="width: 100%;">
                              <option selected="selected">Enter Flat</option>
                              <?php $__currentLoopData = $flat_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $flat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value=<?php echo e($flat->id); ?>><?php echo e($flat->flat_no); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                          </div>
                          <!-- /.form-group -->
                        </div>
                    
                      </div>
    
                       <div class="form-group row">
                        <div class="col-md-6">
                          <label for="exampleInputEmail1">First Name</label>
                          <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Enter First Name">
    
                          <input type="hidden" name="usertype" class="form-control" id="usertype" value="renter" placeholder="Enter email">
                          <input type="hidden" name="landlord_id" class="form-control" id="landlord_id" value="<?php echo e(auth()->user()->id); ?>" placeholder="Enter email">
                        </div>
                        <div class="col-md-6">
                          <label for="exampleInputEmail1">Last Name</label>
                          <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Enter Last Name">
                        </div>
                      </div>
    
                      <div class="form-group row">
                        <div class="col-md-6">
                          <label for="exampleInputEmail1">Mobile</label>
                          <input type="mobile" name="mobile" class="form-control" id="mobile" placeholder="Enter Mobile">
                        </div>
                        <div class="col-md-6">
                          <label for="exampleInputEmail1">Email</label>
                          <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email">
                        </div>
                      </div>
    
                      <div class="form-group">
                        <label for="exampleInputPassword1">Username</label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                      </div>
    
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                      </div>
    
            
    
                        <div class="col-sm-offset-2 col-sm-10">
    
                         <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
    
                         </button>
    
                        </div>
    
                    </form>
    
                </div>
    
            </div>
    
        </div>
    
      </div>
      <!-- /.content -->
      

      <div class="modal fade" id="ajaxModel_payBill" aria-hidden="true">

        <div class="modal-dialog">
    
            <div class="modal-content">
    
                <div class="modal-header">
    
                    <h4 class="modal-title" id="modelHeading_payBill"></h4>
    
                </div>
    
                <div class="modal-body">
    
                    <form id="productForm_payBill" name="productForm" class="form-horizontal">
    
                       <input type="hidden" name="user_id" id="payBill_user_id">

                       <input type="hidden" name="flat_id" id="payBill_flat_id">

                       <input type="hidden" name="id" id="payBill_id">

                       <input type="hidden" name="actual_total_bill" id="actual_total_bill">

                       <div class="form-group">
                        <label for="exampleInputEmail1">Flat NO </label> 
                        <input type="text" readonly class="form-control" id="flat_no" name="flat_no" placeholder="Enter Flat NO">
                      </div>

                       <div class="row">
                        <div class="col-md-12 col-md-12">
                          <div class="form-group">
                            <label>Select Month</label>
                            <select class="form-control" style="height:37px !important;" name="month" id="month" placeholder="Enter Flat" data-dropdown-css-class="select2-purple" style="width: 100%;">
                              <option>Select Month</option>
                             
                              <option value='January'>January</option>
                              <option value='February'>February</option>
                              <option value='March'>March</option>
                              <option value='April'>April</option>
                              <option value='May'>May</option>
                              <option value='June'>June</option>
                              <option value='July'>July</option>
                              <option value='August'>August</option>
                              <option value='Septembar'>Septembar</option>
                              <option value='Octabar'>Octabar</option>
                              <option value='November'>November</option>
                              <option value='Decembar'>Decembar</option>
                             
                            </select>
                          </div>
                          <!-- /.form-group -->
                        </div>
                    
                      </div>


                      <div class="row">
                        <div class="col-md-12 col-md-12">
                          <div class="form-group">

                            <label for="exampleInputEmail1">Year</label>
                            <input type="text" class="form-control" id="pay_year" name="pay_year" value="<?php echo e(date("Y")); ?>" placeholder="Enter year">
      
                          </div>
                          <!-- /.form-group -->
                        </div>
                    
                      </div>
    
                      
                      <div class="form-group">
                        <label for="exampleInputEmail1">House Rent paid</label><span style="color:blue" id="Rent">This is another paragraph.</span>
                        <input type="text" class="form-control paybill" id="house_rent" name="house_rent" placeholder="Enter House Rent">
                      </div>

                      <div class="form-group" id="gas_bill_hide">
                        <label for="exampleInputEmail1">Gas Bill paid</label><span style="color:blue"  id="Gas">This is another paragraph.</span>
                        <input type="text" class="form-control paybill" id="gas_bill" name="gas_bill" placeholder="Enter Gas Bill">
                      </div>

                      <div class="form-group" id="water_bill_hide">
                        <label for="exampleInputEmail1">Water Bill paid</label><span style="color:blue"  id="Water">This is another paragraph.</span>
                        <input type="text" class="form-control paybill" id="water_bill" name="water_bill" placeholder="Enter Water Bill">
                      </div>
                      <div class="form-group" id="garbage_bill_hide">
                        <label for="exampleInputEmail1">Garbage Bill paid</label><span style="color:blue"  id="Garbage">This is another paragraph.</span>
                        <input type="text" class="form-control paybill" id="garbage_bill" name="garbage_bill" placeholder="Enter Garbage Bill">
                      </div>
                      <div class="form-group" id="service_charge_hide">
                        <label for="exampleInputPassword1">Service Charge paid</label><span style="color:blue"  id="Service">This is another paragraph.</span>
                        <input type="text" class="form-control paybill" id="service_charge" name="service_charge" placeholder="Enter Garbage Bill">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Total Bill paid</label><span style="color:blue"  id="Total">This is another paragraph.</span>
                        <input type="text" class="form-control " id="total_bill" name="total_bill" placeholder="Total Bill">
                      </div>

                      <div class="form-group" id="due_bill_hide">
                        <label for="exampleInputPassword1" style="color:rgb(255, 0, 4)" >Due Bill</label>
                        <input type="text" class="form-control " id="due_bill" name="due_bill" placeholder="due Bill">
                      </div>

                      <div class="row">
                        <div class="col-md-12 col-md-12">
                          <div class="form-group">

                            <label for="exampleInputEmail1">Special Note</label>
                            <input type="text" class="form-control" id="note" name="note" value="" placeholder="Enter Special Note">
      
                          </div>
                          <!-- /.form-group -->
                        </div>
                    
                      </div>
    
            
    
                        <div class="col-sm-offset-2 col-sm-10">
    
                         <button type="submit" class="btn btn-primary" id="saveBtn_payBill" value="create">Save changes
    
                         </button>
    
                        </div>
    
                    </form>
    
                </div>
    
            </div>
    
        </div>
    
      </div>
      <!-- /.content -->
       

     
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



     



      

<?php $__env->startSection("scripts2"); ?>

<!-- Bootstrap 4 -->
<script src="<?php echo e(asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

<script src="<?php echo e(asset('admin/plugins/select2/js/select2.full.min.js')); ?>"></script>

<script type="text/javascript">

$(document).ready(function(){


  $("#due_bill_hide").hide();
        
      });

  $(function () {

    var id = "<?php echo e($id); ?>";
    if(id == ''){
      var url = "<?php echo e(url('pay_bill_list')); ?>";
      //alert(url);
    }
    else{
      var url = "<?php echo e(url('pay_bill_list/')); ?>/".id;
      //alert(url);
    }

     //Initialize Select2 Elements
     $('.select2').select2()
      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })

  
    /*------------------------------------------
     --------------------------------------------
     Pass Header Token
     --------------------------------------------
     --------------------------------------------*/ 

    $.ajaxSetup({

          headers: {

              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

          }

    });

    /*------------------------------------------
    --------------------------------------------
    Render DataTable
    --------------------------------------------
    --------------------------------------------*/

    var table = $('#renter_list').DataTable({

        processing: true,

        serverSide: true,

     

        ajax: url,

        columns: [
        

            {data: 'DT_RowIndex', name: 'renter_pay_bills.id', searchable: false},
            {data: 'flat_no', name: 'tbl_set_bills.flat_no'},
            {data: 'firstname', name: 'users.firstname'},
            {data: 'mobile', name: 'users.mobile'},
            {data: 'total_bill', name: 'tbl_set_bills.total_bill'},
            {data: 'total_pay', name: 'renter_pay_bills.total_pay'},
            {data: 'due_bill', name: 'renter_pay_bills.due_bill'},
            {data: 'month', name: 'renter_pay_bills.month'},
            {data: 'created_at', name: 'renter_pay_bills.created_at', render: function(data, type, row) {

return moment(row.created_at).format("MMMM Do YYYY");
}},
            {data: 'status', name: 'Status', orderable: false, searchable: false, className: 'designsh'},
            {data: 'action', name: 'Action', orderable: false, searchable: false, className: 'designsh'},

        ]

    });
    /*------------------------------------------
    --------------------------------------------
    Click to Button
    --------------------------------------------
    --------------------------------------------*/
    // $('#createNewProduct').click(function () {

    //     $('#saveBtn').val("create-product");

    //     $('#product_id').val('');

    //     $('#productForm').trigger("reset");

    //     $('#modelHeading').html("Add New Renter");

    //     $('#ajaxModel').modal('show');

    // });   

    $('body').on('click', '.payBill', function () {

      var flat_id = $(this).data('id');
      var user_id = $(this).attr('user_id');
      //alert(user_id);
      $.get("<?php echo e(route('flat-management.index')); ?>" +'/' + flat_id +'/edit', function (data) {

        $('#payBill_flat_id').val(data.id);
        $('#payBill_user_id').val(user_id);
        $('#actual_total_bill').val(data.total_bill);
        //alert(data.water_bill);
        $('#flat_no').val(data.flat_no);
        //$("#test2").html("<b>Hello world!</b>");
        $('#Rent').html(" [ Actual House rent : "+data.house_rent+"]");
        $('#Water').html( " [  Actual Water Bill : "+data.water_bill+"] ");
        $('#Gas').html( " [  Actual Gas Bill : "+data.gas_bill+"] ");
        $('#Garbage').html( " [  Actual Garbage Bill : "+data.garbage_bill+"] ");
        $('#Service').html( " [  Actual Service Bill : "+data.service_charge+"] ");
        $('#Total').html( " [  Actual Total Bill : "+data.total_bill+"] ");

        

        if(data.water_bill === null)
        {
          $("#water_bill_hide").hide();
        
        }
        else
        {
          $("#water_bill_hide").show();
        
        }

        if(data.gas_bill === null)
        {
          $("#gas_bill_hide").hide();
        
        }
        else
        {
          $("#gas_bill_hide").show();
        
        }

        if(data.garbage_bill === null)
        {
          $("#garbage_bill_hide").hide();
        
        }
        else
        {
          $("#garbage_bill_hide").show();
        
        }

        if(data.service_charge === null)
        {
          $("#service_charge_hide").hide();
        
        }
        else
        {
          $("#service_charge_hide").show();
        
        }

        $(".paybill").blur(function(){
          var sum = 0;
          $('.paybill').each(function() {
              sum += Number($(this).val());
          });
  
          $("#total_bill").val(sum);
          var due_bill = data.total_bill - sum;
          //alert(due_bill);
          //if(due_bill !== 0){

            $("#due_bill_hide").show();

            $("#due_bill").val(due_bill);

        // }

        })
 
        $('#saveBtn_payBill').val("create-product");

        $('#product_id').val('');

        //$('#productForm_payBill').trigger("reset");

        $('#modelHeading_payBill').html("Pay Bill");

        $('#ajaxModel_payBill').modal('show');

      })

    

    });  

    $('body').on('click', '.editpayBill', function () {
      //alert('vfd');exit;

      var flat_id = $(this).data('id');
      var user_id = $(this).attr('user_id');
      //alert(user_id);
      $.get("<?php echo e(route('billing_history.index')); ?>" +'/' + flat_id +'/edit', function (data) {
      //console.log(data.id);
      //alert(data.id);
        $('#payBill_id').val(data.id);
        $('#payBill_flat_id').val(data.flat_id);
        $('#payBill_user_id').val(data.renter_id);
        $('#actual_total_bill').val(data.total_bill);
        //alert(data.water_bill);
        
        $("#month").val(data.month);
        $("#pay_year").val(data.pay_year);
        $("#note").val(data.note);
        $('#house_rent').val(data.house_rent_pay);
        $('#water_bill').val(data.water_bill_pay);
        $('#gas_bill').val(data.gas_bill_pay);
        $('#garbage_bill').val(data.garbage_bill_pay);
        $('#service_charge').val(data.service_charge_pay);
        $('#flat_no').val(data.flat_no);
        //$("#test2").html("<b>Hello world!</b>");
        $('#Rent').html(" [ Actual House rent : "+data.house_rent+"]");
        $('#Water').html( " [  Actual Water Bill : "+data.water_bill+"] ");
        $('#Gas').html( " [  Actual Gas Bill : "+data.gas_bill+"] ");
        $('#Garbage').html( " [  Actual Garbage Bill : "+data.garbage_bill+"] ");
        $('#Service').html( " [  Actual Service Bill : "+data.service_charge+"] ");
        $('#Total').html( " [  Actual Total Bill : "+data.total_bill+"] ");

        

        if(data.water_bill === null)
        {
          $("#water_bill_hide").hide();
        
        }
        else
        {
          $("#water_bill_hide").show();
        
        }

        if(data.gas_bill === null)
        {
          $("#gas_bill_hide").hide();
        
        }
        else
        {
          $("#gas_bill_hide").show();
        
        }

        if(data.garbage_bill === null)
        {
          $("#garbage_bill_hide").hide();
        
        }
        else
        {
          $("#garbage_bill_hide").show();
        
        }

        if(data.service_charge === null)
        {
          $("#service_charge_hide").hide();
        
        }
        else
        {
          $("#service_charge_hide").show();
        
        }

        $(".paybill").blur(function(){
          var sum = 0;
          $('.paybill').each(function() {
              sum += Number($(this).val());
          });

          $("#total_bill").val(sum);
          var due_bill = data.total_bill - sum;
        // alert(due_bill);
          //if(due_bill !== 0){

            $("#due_bill_hide").show();

            $("#due_bill").val(due_bill);

        // }

        })

        $('#saveBtn_payBill').val("create-product");

        $('#product_id').val('');

        //$('#productForm_payBill').trigger("reset");

        $('#modelHeading_payBill').html("Pay Bill");

        $('#ajaxModel_payBill').modal('show');

      })



    }); 

   

    $('#saveBtn_payBill').click(function (e) {

        e.preventDefault();

        $(this).html('Sending..');

      

        $.ajax({

          data: $('#productForm_payBill').serialize(),

          url: "<?php echo e(url('store_payBill')); ?>",

          type: "POST",

          dataType: 'json',

          success: function (data) {

       

              // $('#productForm_payBill').trigger("reset");

              // $('#ajaxModel_payBill').modal('hide');

              // table.draw();

              $(".sErr").html("<div class='alert alert-danger'>Pay Bill successfully</div>");
            window.location = "<?php echo e(url('/receipt/')); ?>" +"/"+ data.id;

           

          },

          error: function (data) {

              console.log('Error:', data);

              $('#saveBtn_payBill').html('Submit');

          }

      });

    });
    /*------------------------------------------
    --------------------------------------------
    Delete Product Code
    --------------------------------------------
    --------------------------------------------*/
    $('body').on('click', '.deleteProduct', function () {

     

        var product_id = $(this).data("id");

        confirm("Are You sure want to delete !");

        

        $.ajax({

            type: "DELETE",

            url: "<?php echo e(route('products-ajax-crud.store')); ?>"+'/'+product_id,

            success: function (data) {

                table.draw();

            },

            error: function (data) {

                console.log('Error:', data);

            }

        });

    });

       

  });



  

</script>



<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\mydreamhome\resources\views/billing_history_list.blade.php ENDPATH**/ ?>