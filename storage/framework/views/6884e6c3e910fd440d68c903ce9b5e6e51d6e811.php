

<?php $__env->startSection('content'); ?>
<div class="container">
    <br><br><br><br>
    <div class="row">
        <div class="col-md-offset-4 col-md-7">
            
                <div style="height: 23px;width: 300px;margin-bottom:50px; margin-left:85px;">
                    <h2 style="font-weight:bold!important">[ Dream Home ]</h2>
                </div> 
            

        </div>

    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <?php echo $__env->make("layouts.includes.flash", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="panel panel-default">
                <div class="panel-heading">Reset Your Password</div>

                <div class="panel-body">
                    <?php if(session('status')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('status')); ?>

                    </div>
                    <?php endif; ?>

                    
                    <div class="card-body">
                        <div class="sErr text-center"></div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4"><?php echo e(__('User Email Address: ')); ?></label>
                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control required email" placeholder="<?php echo e(__('Valid Email Address')); ?>">
                                <span class="text-danger">A security code will be sent in your valid Email</span>
                            </div>
                        </div>
    
                        <div class="form-group row dnone">
                            <label for="email" class="col-md-4">Security Code</label>
                            <div class="col-md-8">
                                <input id="sCode" type="text" class="form-control required" placeholder="Security Code">
                                <span class="text-danger">Enter the security code here</span>
                            </div>
                        </div>
    
                        <div class="form-group row dnone">
                            <label for="email" class="col-md-4">New Password</label>
                            <div class="col-md-8">
                                <input id="newPswd" type="password" class="form-control required" placeholder="New Password">
                            </div>
                        </div>
    
                        <div class="form-group row mb-0">
                            <div class="col-md-4"></div>
                            <div class="col-md-2">
                                <a href="<?php echo e(url('/')); ?>">Go Back</a>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-primary float-right data_submit_pswd">
                                    <?php echo e(__('Submit')); ?>

                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("scripts"); ?>
<script type="text/javascript">
$(document).on("click", ".data_submit_pswd", function(){
    alert('fd');
    var ts = $(this);
    var email = $("#email");
    if(email.val()){
        $.ajax({
            url: "<?php echo e(url('email/reset/check')); ?>",
            method: "post",
            data: {email: email.val(), "_token": "<?php echo e(csrf_token()); ?>"},
            beforeSend: function(){
                ts.removeClass('data_submit_pswd').addClass('btn-warning').html('<i class="fa fa-spinner fa-spin"></i>');
            },
            success: function(rsp){
                if(rsp.error == true){
                    $(".sErr").html("<div class='alert alert-danger'>"+rsp.msg+"</div>");
                    ts.removeClass('btn-warning').addClass('btn btn-primary float-right data_submit_pswd').text('Submit');
                } else {
                    $(".dnone").show("slow").css("display", "flex");
                    ts.removeClass('btn-warning').addClass('btn btn-primary float-right data_submit_pswd_final').text('Verify & Submit');
                    $(".sErr").html("<div class='alert alert-success'>"+rsp.msg+"</div>");
                }
            },
            error: function(err, tst, sts){
                console.log(err);
                console.log(tst);
                console.log(sts);
            }
        });
    } else {
        required();
    }
});

$(document).on("click", ".data_submit_pswd_final", function(){
    
    var ts = $(this);
    var email = $("#email");
    var sCode = $("#sCode");
    var newPswd = $("#newPswd");
    if(email.val() && sCode.val() && newPswd.val()){
        $.ajax({
            url: "<?php echo e(url('newPswdSet')); ?>",
            method: "post",
            data: {email: email.val(), sCode: sCode.val(), password: newPswd.val(), "_token": "<?php echo e(csrf_token()); ?>"},
            beforeSend: function(){

            },
            success: function(rsp){
                if(rsp.error == true){
                    $(".sErr").html("<div class='alert alert-danger'>"+rsp.msg+"</div>");
                } else {
                    $(".sErr").html("<div class='alert alert-success'>"+rsp.msg+"</div>");
                    setTimeout(function(){
                        window.location = "<?php echo e(url('/')); ?>";
                    }, 2000);
                }
            },
            error: function(err, tst, sts){
                console.log(err);
                console.log(tst);
                console.log(sts);
            }
        });
    } else {
        required();
    }
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\mydreamhome\resources\views/auth/passwords/email.blade.php ENDPATH**/ ?>