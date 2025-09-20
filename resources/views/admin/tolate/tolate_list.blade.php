@extends('admin.layout.header')
@section('maincontent')
@include('admin.layout.leftmenu')
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
              <li class="breadcrumb-item"> <a class="btn btn-success setBill" href="javascript:void(0)" id=""> Add New Tolate</a></li>
              <li class="breadcrumb-item active">Tolate</li>
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
                  <h3 class="card-title">Tolate List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  
                  @if(session()->has('success'))
                  <div class="alert alert-success">
                    {{ session()->get('success') }}
                  </div>
                @elseif(session()->has('error'))
                  <div class="alert alert-danger">
                    {{ session()->get('error') }}
                  </div>
                @endif
        
             @if ($errors->any())
             @foreach ($errors->all() as $error)
                 <div class="alert alert-danger">{{$error}}</div>
             @endforeach
             @endif

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

              

                 {{-- <div class="sErr text-center"></div> --}}
                  <div class="alert alert-danger" style="display:none"></div>
    
                    <form id="setBillForm" name="productForm" class="form-horizontal">

                       <!-- /.row -->
        <div class="row">
          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">bs-stepper</h3>
              </div>
              <div class="card-body p-0">
                <div class="bs-stepper">
                  <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here -->
                    <div class="step" data-target="#logins-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                        <span class="bs-stepper-circle">1</span>
                        <span class="bs-stepper-label">Logins</span>
                      </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#information-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                        <span class="bs-stepper-circle">2</span>
                        <span class="bs-stepper-label">Various information</span>
                      </button>
                    </div>
                  </div>
                  <div class="bs-stepper-content">
                    <!-- your steps content here -->
                    <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                      </div>
                      <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                    </div>
                    <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                      <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                          </div>
                        </div>
                      </div>
                      <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                      <button type="submit" class="btn btn-primary">Submit</button>
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
    
                      {{-- <input type="hidden" name="flat_id" id="flat_id" value="">
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
                      </div> --}}
                      
                
    
                        {{-- <div class="col-sm-offset-2 col-sm-10">
    
                         <button type="submit"  class="btn btn-primary" id="saveBtn_setBill" value="create">Submit
    
                         </button>
    
                        </div> --}}
    
                    </form>
    
                </div>
    
            </div>
    
        </div>
    
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
{{-- ///////////////////////////// --}}


     



      

@section("scripts2")

      

<script type="text/javascript">



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

     

        ajax: "{{ route('flat-management.index') }}",

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

        $.get("{{ route('flat-management.index') }}" +'/' + flat_id +'/edit', function (data) {

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

          url: "{{ url('set_bill_store') }}",

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

          url: "{{ route('flat-management.store') }}"+'/'+product_id,

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

@endsection
@stop