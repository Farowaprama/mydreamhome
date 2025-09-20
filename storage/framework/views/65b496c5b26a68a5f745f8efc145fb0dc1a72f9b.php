
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
              <li class="breadcrumb-item"> <a class="btn btn-success" href="<?php echo e(url('admin_role')); ?>" >User List</a></li>
              <li class="breadcrumb-item active">Add New User</li>
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
                  <h3 class="card-title">Add New User </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  
                    <?php echo $__env->make('layouts.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <form action="<?php echo e(route('admin_role.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="name">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="email">User Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="username">User Name</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Unique Username">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="email">Mobile</label>
                                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="password">Assign Roles</label>
                                <select name="roles" id="roles" class="form-control">
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($role->name); ?>"><?php echo e($role->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group col-md-12 col-sm-12" id="events" style="display:none">
                                <label for="password">Assign Events</label>
                                <select class="selectpicker form-control" name="events[]" multiple data-live-search="true">
                                    
                                  </select>
                            </div>
                            <script>
                                $('.selectpicker').selectpicker();
                            </script>

                        </div>


                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save User</button>
                    </form>
  
                  
                
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
<?php echo $__env->make('admin.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\mydreamhome\resources\views/admin/create.blade.php ENDPATH**/ ?>