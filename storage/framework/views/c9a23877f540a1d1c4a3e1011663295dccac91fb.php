
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
              <li class="breadcrumb-item"> <a class="btn btn-success" href="<?php echo e(url('roles')); ?>" >Role List</a></li>
              <li class="breadcrumb-item active">Add New Role</li>
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
                  <h3 class="card-title">Add New Role </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <?php echo $__env->make('layouts.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>               
                    <form action="<?php echo e(route('user.roles.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mt-3">
                            <label for="name">Role Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter a Role Name">
                        </div>

                        <div class="form-group m-3 p-3">
                            <label for="name">Permissions</label>
                            <hr>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="checkPermissionAll" value="1">
                                <label class="form-check-label" for="checkPermissionAll">All</label>
                            </div>
                            <hr>
                            <?php $i = 1; ?>
                            <?php $__currentLoopData = $permission_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="<?php echo e($i); ?>Management" value="<?php echo e($group->name); ?>" onclick="checkPermissionByGroup('role-<?php echo e($i); ?>-management-checkbox', this)">
                                            <label class="form-check-label" for="checkPermission"><?php echo e($group->name); ?></label>
                                        </div>
                                    </div>

                                    <div class="col-9 role-<?php echo e($i); ?>-management-checkbox">
                                        <?php
                                            $permissions = App\Models\User::getpermissionsByGroupName($group->name);
                                            $j = 1;
                                        ?>
                                        <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" name="permissions[]" id="checkPermission<?php echo e($permission->id); ?>" value="<?php echo e($permission->name); ?>">
                                                <label class="form-check-label" for="checkPermission<?php echo e($permission->id); ?>"><?php echo e($permission->name); ?></label>
                                            </div>
                                            <?php  $j++; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <br>
                                    </div>

                                </div>
                                <hr>
                                <?php  $i++; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            
                        </div>
                       
                        
                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save Role</button>
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

<?php echo $__env->make('roles.partials.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\mydreamhome\resources\views/roles/create.blade.php ENDPATH**/ ?>