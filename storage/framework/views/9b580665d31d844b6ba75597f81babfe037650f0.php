
<?php $__env->startSection('maincontent'); ?>
<?php echo $__env->make('admin.layout.leftmenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>
  .designsh{
    white-space: nowrap;
  }
  </style>

       <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"> <a class="btn btn-success setBill" href="javascript:void(0)" id=""> Add Flat With Rent</a></li>
              <li class="breadcrumb-item active">Flat</li>
            </ol>
          </div>
          <div class="col-sm-6">
            <h1></h1>
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
                  <h3 class="card-title">Flat List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  
                  <?php if(session()->has('success')): ?>
                  <div class="alert alert-success">
                    <?php echo e(session()->get('success')); ?>

                  </div>
                <?php elseif(session()->has('error')): ?>
                  <div class="alert alert-danger">
                    <?php echo e(session()->get('error')); ?>

                  </div>
                <?php endif; ?>
        
             <?php if($errors->any()): ?>
             <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <div class="alert alert-danger"><?php echo e($error); ?></div>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             <?php endif; ?>

                  <div class="sErr"></div>
                    <table class="table table-bordered data-table display nowrap responsive" cellspacing='0' width='100%' id="flat_list" >

                        <thead>
                
                            <tr>
                
                                <th>No</th>
                
                                <th>Flat NO</th>
                                <th>Electricity Meter NO</th>
                                <th>Total Rent</th>   
                                <th>Created at</th>
                                <th >Status</th>
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

   

 

      <div class="modal fade" id="ajaxModel_setBill" aria-hidden="true">

        <div class="modal-dialog">
    
            <div class="modal-content">
    
                <div class="modal-header">
    
                    <h4 class="modal-title" id="modelHeading_setBill"></h4>
    
                </div>
    
                <div class="modal-body">

              

                 
                  <div class="alert alert-danger" style="display:none"></div>
    
                    <form id="setBillForm" name="productForm" class="form-horizontal">
    
                      <input type="hidden" name="flat_id" id="flat_id" value="">
                       <input type="hidden" name="renter_id" id="renter_id" value="">
    
                
    
                      <div class="form-group">
                        <label for="exampleInputEmail1">Flat NO <span style="color:red">*<span> </label>
                        <input type="text" class="form-control" id="flat_no" name="flat_no" placeholder="Enter Flat NO">
                        <span class="text-danger error-text flat_no_error"></span>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Electricity Meter No</label>
                        <input type="text" class="form-control" id="e_meter_no" name="e_meter_no" placeholder="Enter Electricity Meter No">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">House Rent <span style="color:red">*<span></label>
                        <input type="text" class="form-control bill" id="house_rent" name="house_rent" placeholder="Enter House Rent">
                        <span class="text-danger error-text house_rent_error"></span>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Gas Bill</label>
                        <input type="text" class="form-control bill" id="gas_bill" name="gas_bill" placeholder="Enter Gas Bill">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Water Bill</label>
                        <input type="text" class="form-control bill" id="water_bill" name="water_bill" placeholder="Enter Water Bill">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Garbage Bill</label>
                        <input type="text" class="form-control bill" id="garbage_bill" name="garbage_bill" placeholder="Enter Garbage Bill">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Service Charge</label>
                        <input type="text" class="form-control bill" id="service_charge" name="service_charge" placeholder="Enter Garbage Bill">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Total Bill</label>
                        <input type="text" class="form-control " id="total_bill" name="total_bill" placeholder="Total Bill">
                      </div>
                      
                
    
                        <div class="col-sm-offset-2 col-sm-10">
    
                         <button type="submit"  class="btn btn-primary" id="saveBtn_setBill" value="create">Submit
    
                         </button>
    
                        </div>
    
                    </form>
    
                </div>
    
            </div>
    
        </div>
    
      </div>

      <div class="modal fade" id="ajaxModel_setTolate" aria-hidden="true">

        <div class="modal-dialog modal-lg">
    
            <div class="modal-content">
    
                <div class="modal-header">
    
                    <h4 class="modal-title" id="modelHeading_setTolate"></h4>
    
                </div>
    
                <div class="modal-body">

              

                 
                  <div class="alert alert-danger" style="display:none"></div>
    
                    <form id="setTolateForm" action="<?php echo e(url('set_Tolate_store')); ?>" method="post" enctype="multipart/form-data" name="productForm" class="form-horizontal">
                      <?php echo csrf_field(); ?>
                       <!-- /.row -->
                      <div class="row">
                        <div class="col-md-12">
                          <div class="card card-default">
                            
                            <div class="card-body p-0">
                              <div class="bs-stepper">
                                <div class="bs-stepper-header" role="tablist">
                                  <!-- your steps here -->
                                  <div class="step" data-target="#logins-part">
                                    <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                                      <span class="bs-stepper-circle">1</span>
                                      <span class="bs-stepper-label">House Information</span>
                                    </button>
                                  </div>
                                  <div class="line"></div>
                                  <div class="step" data-target="#information-part">
                                    <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                                      <span class="bs-stepper-circle">2</span>
                                      <span class="bs-stepper-label">Location</span>
                                    </button>
                                  </div>
                                  <div class="line"></div>
                                  <div class="step" data-target="#tolate-part">
                                    <button type="button" class="step-trigger" role="tab" aria-controls="tolate-part" id="tolate-part-trigger">
                                      <span class="bs-stepper-circle">3</span>
                                      <span class="bs-stepper-label">Other Information</span>
                                    </button>
                                  </div>
                                </div>
                                <div class="bs-stepper-content">
                                  <!-- your steps content here -->
                                  <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">

                                    <input type="hidden" name="set_bill_id" id="set_bill_id" value="">

                                    <div class=" row">
                                      <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Beds</label>
                                        <input type="number" class="form-control"  name='beds' id="beds" placeholder="Enter Number of Bed">
                                      </div>
                                      

                                      <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Bathrooms</label>
                                        <input type="number" class="form-control" name="bathrooms" id="bathrooms" placeholder="Enter Number of Bathroom">
                                      </div>
                                    </div>

                                    <div class=" row">

                                    <div class="form-group col-md-6">
                                      <label for="exampleInputEmail1">Balcony</label>
                                      <input type="number" class="form-control" name="balcony" id="balcony" placeholder="Enter Number of Balcony">
                                    </div>

                                    <div class="form-group col-md-6">
                                      <label for="exampleInputEmail1">Area</label>
                                      <input type="number" class="form-control" name="area" id="area" placeholder="Enter sqft">
                                    </div>
                                  </div>

                                    

                                    

                                    <!-- ////////// -->
                                <div class="form-group ">
                                  <label for="file-upload" class="control-label">Upload House
                                      Image</label>
                                  <div <div class="video_container row">
                                    <div class="col-md-10">
                                        <div class="custom-file">
                                            <input type="file" class="  form-controlcustom-file-input1" name="image_file[]"
                                                id="video_file">
                                            
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-success video-add">
                                            <span class="fa fa-plus"></span>
                                        </button>
                                    </div>
                                  </div>
                              </div>
                              <!-- /////////// -->

                              <div class="form-group">
                                <label for="exampleInputEmail1">Other Facilities</label>
                                <textarea class="form-control" name="facilities" id="facilities" placeholder="Enter sqft">
                                </textarea>
                              </div>



                                   
                                    <button class="btn btn-primary" type="button"  onclick="stepper.next()">Next</button>
                                  </div>

                                  <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                                    
                                    <div class=" row">
                                      <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Division</label>
                                        <select name="division" id="division_id" class="form-control dynamic" data-dependent="district_id"
                                          data-table="districts">
                                          <option value="">Select Division</option>
                                          <?php $__currentLoopData = $division; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $division): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <option value="<?php echo e($division->id); ?>" <?php if(isset($division_id->division)): ?><?php if($division->id ==
                                            $division_id->division): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e($division->name); ?></option>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                        </select>
                                      </div>
                                      

                                      <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">District</label>
                                        <select name="district" id="district_id" class="form-control dynamic" data-dependent="upazila_id"
                                          data-table="upazilas">
                                          <option value="">Select District</option>
                                        </select>
                                      </div>
                                    </div>

                                    <div class=" row">

                                    <div class="form-group col-md-6">
                                      <label for="exampleInputEmail1">Upazila</label>
                                      <select name="upazilas" id="upazila_id" class="form-control dynamic" data-dependent="union_id"
                                        data-table="unions">
                                        <option value="">Select Upazila</option>
                                      </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                      <label for="exampleInputEmail1">Union</label>
                                      <select name="unions" id="union_id" class="form-control dynamic" data-dependent="upazila_id"
                                        data-table="upazilas">
                                        <option value="">Select Union</option>
                                      </select>
                                    </div>
                                  </div>

                                    <div class=" row">

                                    <div class="form-group col-md-6">
                                      <label for="exampleInputEmail1">Google Location</label>
                                      <input type="text" class="form-control" name="google_location" id="google_location" placeholder="Enter Google Location">
                                    </div>

                                    <div class="form-group col-md-6">
                                      <label for="exampleInputEmail1">Holding No</label>
                                      <input type="text" class="form-control" name="holding" id="holding" placeholder="Enter Holding No">
                                    </div>
                                  </div>
                                    
                                   
                                    <button class="btn btn-primary" type="button"  onclick="stepper.previous()">Previous</button>
                                    <button class="btn btn-primary" type="button"  onclick="stepper.next()">Next</button>
                                    

                                    
                                  </div>
                                  

                                  <div id="tolate-part" class="content" role="tabpanel" aria-labelledby="tolate-part-trigger">
                                    
                                   
                                    

                                      <div class="form-group col-md-12">
                                        <label for="exampleInputEmail1">Contact No</label>
                                        <input type="text" class="form-control" name="contact" id="contact" placeholder="Enter Contact No">
                                      </div>
                                      <div class="row">
                                      <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Start Date</label>
                                        <input type="date" class="form-control" name="start_date" id="start_date" data-target=""/>
                                      </div>

                                      <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">End Date</label>
                                        <input type="date" class="form-control" name="end_date" id="end_date"  data-target=""/>
                                      </div>
                                    </div>

                                    <div class="row">
                                    <div class="form-group col-md-6">
                                      <label for="exampleInputEmail1">Tolate purpose</label>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" value="Rent" name="purpose" id="purpose">
                                        <label class="form-check-label" >Rent</label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" value="Sell" name="purpose"  id="purpose">
                                        <label class="form-check-label"  >Sell</label>
                                      </div>
                                   
                                    </div>

                                    <div class="form-group col-md-6">

                                      <label for="exampleInputEmail1">House type</label>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" value="Residential" name="type" id="type">
                                        <label class="form-check-label" >Residential</label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" value="Commersial" name="type" id="type">
                                        <label class="form-check-label">Commersial</label>
                                      </div>
                                   
                                    </div>

                                  </div>

                                    
                                    
                                   
                                    <button class="btn btn-primary" type="button"  onclick="stepper.previous()">Previous</button>
                                    
                                    

                                    <button type="submit"  class="btn btn-primary" id="saveBtn_setTolate_old" value="create">Submit
    
                                    </button>
                                  </div>

                                  
                                </div>
                              </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                              Visit <a href="https://github.com/Johann-S/bs-stepper/#how-to-use-it">bs-stepper documentation</a> for more examples and information about the plugin.
                            </div>
                          </div>
                          <!-- /.card -->
                        </div>
                      </div>
                      <!-- /.row -->
    
                      
                      
                
    
                        
    
                    </form>
    
                </div>
    
            </div>
    
        </div>
    
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



     



      

<?php $__env->startSection("scripts2"); ?>

<script>
  $(document).ready(function(){

            $('.dynamic').change(function(){

              if($(this).val() != '')
              {
              var select = $(this).attr("id");
              var value = $(this).val();
              var dependent = $(this).data('dependent');
              var table = $(this).data('table');
              var _token = $('input[name="_token"]').val();

              $.ajax({
                url:"<?php echo e(url('dynamic_dependent/fetch')); ?>",
                method:"POST",
                data:{select:select, value:value, _token:_token, dependent:dependent, table:table},
                success:function(result)
                {
                $('#'+dependent).html(result);
                }

              })
              }
            });

            $('#division_id').change(function(){
              $('#district_id').val('');
              $('#upazila_id').val('');
            });

            $('#district_id').change(function(){
              $('#upazila_id').val('');
            });


            });
</script>

<script type="text/javascript">



  // ////////////////

  $(document)
  .on("click", ".video_container .video-add", function(e) {
    e.preventDefault();
    var current_obj = $(this).closest(".video_container");
    var cloned_obj = $(current_obj.clone())
      .insertAfter(current_obj)
      .find('input[type="file"]')
      .val("");

    current_obj
      .find(".fa-plus")
      .removeClass("fa-plus")
      .addClass("fa-minus");

    current_obj
      .find(".btn-success")
      .removeClass("btn-success")
      .addClass("btn-danger");

    current_obj
      .find(".video-add")
      .removeClass("video-add")
      .addClass("video-del");
  })
  .on("click", ".video-del", function(e) {
    e.preventDefault();
    $(this)
      .closest(".video_container")
      .remove();
    return false;
  });

  // ////////////////



  $(function () {

      

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
     Pass Header Token
     --------------------------------------------
     --------------------------------------------*/ 
    var table = $('#flat_list').DataTable({

        processing: true,

        serverSide: true,

     

        ajax: "<?php echo e(route('flat-management.index')); ?>",

        columns: [

            {data: 'DT_RowIndex', name: 'DT_RowIndex'},

            {data: 'flat_no', name: 'flat_no'},
            {data: 'e_meter_no', name: 'e_meter_no'},
            {data: 'total_bill', name: 'total_bill'},
        

            {data: 'created_at', name: 'Join at',searchable: false,

                  render: function(data, type, row) {

                  return moment(row.created_at).format("MMMM Do YYYY");
            }},
            {data: 'status', name: 'Status', orderable: false, searchable: false, className: 'designsh'},
            {data: 'action', name: 'Action', orderable: false, searchable: false, className: 'designsh'},

        ]

    });
    /*------------------------------------------
     --------------------------------------------
     Pass Header Token
     --------------------------------------------
     --------------------------------------------*/ 
  
      $('body').on('click', '.setBill', function () {

        // var flat_id = $(this).data('id');
        $('#flat_id').val('');
        $('#setBillForm').trigger("reset");

        $('#modelHeading_setBill').html("Add New Flat");

        $('#saveBtn_setBill').val("create-setBill");

        $('#ajaxModel_setBill').modal('show');

        //$('#renter_id').val(flat_id);

      });  

      $('body').on('click', '.setTolate', function () {

        var flat_id = $(this).data('id');
        // $('#flat_id').val('');
        $('#setTolateForm').trigger("reset");

        $('#modelHeading_setTolate').html("Add New Tolate");

        $('#saveBtn_setTolate').val("create-setTolate");

        $('#ajaxModel_setTolate').modal('show');

        $('#set_bill_id').val(flat_id);

      });  

  /*------------------------------------------
     --------------------------------------------
     Pass Header Token
     --------------------------------------------
     --------------------------------------------*/ 

      $(document).ready(function(){
        $(".bill").blur(function(){
        var sum = 0;
        $('.bill').each(function() {
            sum += Number($(this).val());
        });
 
          $("#total_bill").val(sum);
        
        })
      });
/*------------------------------------------
     --------------------------------------------
     Pass Header Token
     --------------------------------------------
     --------------------------------------------*/ 
      $('body').on('click', '.editBill', function () {

        var flat_id = $(this).data('id');

        $.get("<?php echo e(route('flat-management.index')); ?>" +'/' + flat_id +'/edit', function (data) {

            $('#modelHeading_setBill').html("Update Flat Information");

            $('#saveBtn_setBill').val("edit-user");

            $('#ajaxModel_setBill').modal('show');

            $('#flat_id').val(data.id);

            $('#flat_no').val(data.flat_no);
            $('#e_meter_no').val(data.e_meter_no);
            $('#house_rent').val(data.house_rent);

            $('#water_bill').val(data.water_bill);
            $('#gas_bill').val(data.gas_bill);
            $('#garbage_bill').val(data.garbage_bill);
            $('#service_charge').val(data.service_charge);
            $('#total_bill').val(data.total_bill);
          

        })

      });  

      $('body').on('click', '.editTolate', function () {

          var flat_id = $(this).data('id');
          //alert(flat_id);

          $.get("<?php echo e(route('tolate.index')); ?>" +'/' + flat_id +'/edit', function (data) {

              $('#modelHeading_setTolate').html("Update Tolate Information");

              $('#saveBtn_setTolate').val("edit-Tolate");

              $('#ajaxModel_setTolate').modal('show');

              //alert(data.id);

              $('#set_bill_id').val(data.set_bill_id);

              $('#beds').val(data.num_of_beds);
              $('#bathrooms').val(data.num_of_bathroom);
              $('#balcony').val(data.num_of_belcony);

              $('#drawing_dining').val(data.drawing_dining);
              $('#area').val(data.area);
              $('#facilities').val(data.other_facilities);
              $('#type').val(data.type);

              //$('#division_id').val(data.division_name);
              $('#holding').val(data.holding_no);
              $('#google_location').val(data.google_location);

              $('#purpose').val(data.purpose);
              $('#start_date').val(data.start_date);
              $('#end_date').val(data.end_date);
              $('#contact').val(data.contact_no);
            

            

          })

      }); 

/*------------------------------------------
     --------------------------------------------
     Pass Header Token
     --------------------------------------------
     --------------------------------------------*/ 
      $('#saveBtn_setBill').click(function (e) {

        //$('#setBillForm').scrollTop(0);
        // $("html, body").scrollTop($("#setBillForm").offset().top);

        e.preventDefault();

        $(this).html('Submit');





        $.ajax({

          data: $('#setBillForm').serialize(),

          url: "<?php echo e(url('set_bill_store')); ?>",

          type: "POST",

          dataType: 'json',

          beforeSend:function(){
                $(document).find('span.error-text').text('');
            },

          success: function (data) {


              

              if(data.status == 0){

                
                    $.each(data.error, function(prefix, val){
                        $('span.'+prefix+'_error').text(val[0]);
                    });

                   
                }else{
                  $('#setBillForm').trigger("reset");

                  $('#ajaxModel_setBill').modal('hide');
                  $(".sErr").html("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>Success!</strong>"+data.success+"</div>");

                  table.draw();
                }

          

          },

          error: function (data) {

              console.log(data.errors);

              //$(".sErr").html("<div class='alert alert-danger'>"+data.error+"</div>");

              //$('#saveBtn_setBill').html('Save Changes');

              // $('.alert-danger').empty();
              //               $.each(data.errors, function(key, value) {
              //                   $('.alert-danger').show();
              //                   $('.alert-danger').append('<p>'+value+'</p>');
              //               });

          }

        });

      });

      $('#saveBtn_setTolate2').click(function (e) {


          e.preventDefault();

          $(this).html('Submit');

          $.ajax({

            data: $('#setTolateForm').serialize(),

            url: "<?php echo e(url('set_Tolate_store')); ?>",

            type: "POST",

            dataType: 'json',

            beforeSend:function(){
                  $(document).find('span.error-text').text('');
              },

            success: function (data) {


                

                if(data.status == 0){

                  
                      $.each(data.error, function(prefix, val){
                          $('span.'+prefix+'_error').text(val[0]);
                      });

                    
                  }else{
                    $('#setTolateForm').trigger("reset");

                    $('#ajaxModel_setTolate').modal('hide');
                    $(".sErr").html("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>Success!</strong>"+data.success+"</div>");

                    table.draw();
                  }

            

            },

            error: function (data) {

                console.log(data.errors);

                //$(".sErr").html("<div class='alert alert-danger'>"+data.error+"</div>");

                //$('#saveBtn_setBill').html('Save Changes');

                // $('.alert-danger').empty();
                //               $.each(data.errors, function(key, value) {
                //                   $('.alert-danger').show();
                //                   $('.alert-danger').append('<p>'+value+'</p>');
                //               });

            }

          });

      });

      $('#saveBtn_setTolate').click(function (e) {


        e.preventDefault();

        //$(this).html('Submit');

        var formData = new FormData(this);
        alert('fvv');
        var TotalFiles = $('#video_file')[0].files.length; //Total files

        alert(TotalFiles);
        var files = $('#video_file')[0];
        for (var i = 0; i < TotalFiles; i++) {
            formData.append('files' + i, files.files[i]);
        }
        formData.append('TotalFiles', TotalFiles);

      //   $.ajax({
      //       type:'POST',
      //       url: "<?php echo e(url('set_Tolate_store')); ?>",
      //       data: formData,
      //       cache:false,
      //       contentType: false,
      //       processData: false,
      //       dataType: 'json',
      //       success: function (data) {


                  

      //     if(data.status == 0){

            
      //           $.each(data.error, function(prefix, val){
      //               $('span.'+prefix+'_error').text(val[0]);
      //           });

              
      //       }else{
      //         $('#setTolateForm').trigger("reset");

      //         $('#ajaxModel_setTolate').modal('hide');
      //         $(".sErr").html("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>Success!</strong>"+data.success+"</div>");

      //         table.draw();
      //       }



      //     },

      //     error: function (data) {

      //     console.log(data.errors);

      //     }
      //  });

        // $.ajax({

        //   data: $('#setTolateForm').serialize(),

        //   url: "<?php echo e(url('set_Tolate_store')); ?>",

        //   type: "POST",

        //   dataType: 'json',

        //   beforeSend:function(){
        //         $(document).find('span.error-text').text('');
        //     },

        //   success: function (data) {


              

        //       if(data.status == 0){

                
        //             $.each(data.error, function(prefix, val){
        //                 $('span.'+prefix+'_error').text(val[0]);
        //             });

                  
        //         }else{
        //           $('#setTolateForm').trigger("reset");

        //           $('#ajaxModel_setTolate').modal('hide');
        //           $(".sErr").html("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>Success!</strong>"+data.success+"</div>");

        //           table.draw();
        //         }

          

        //   },

        //   error: function (data) {

        //       console.log(data.errors);

        //   }

        // });

      });

    //   jQuery("#setBillForm").validate({
    //   rules: {
    //     flat_no: {
    //       required: true,
         
    //     }
    //   }
    // });
   
    /*------------------------------------------
    --------------------------------------------
    Create Product Code
    --------------------------------------------
    --------------------------------------------*/

    

    $('body').on('click', '.deleteflat', function () {

     

      var product_id = $(this).data("id");

      confirm("Are You sure want to delete !");



      $.ajax({

          type: "DELETE",

          url: "<?php echo e(route('flat-management.store')); ?>"+'/'+product_id,

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
<?php echo $__env->make('admin.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\mydreamhome\resources\views/flatManagement.blade.php ENDPATH**/ ?>