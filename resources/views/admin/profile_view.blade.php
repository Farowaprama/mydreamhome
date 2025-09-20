
@extends('admin.layout.header')
@section('maincontent')
@include('admin.layout.leftmenu')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Profile</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">User Profile</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        
        <!-- /.col -->
        <div class="col-md-12">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">View Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Update Profile</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
               
                <!-- /.tab-pane -->
                <div class="active tab-pane" id="timeline">
                  {{-- ////////// --}}
                  <div class="row">
                  <div class="col-md-4">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                      <div class="card-body box-profile">
                        <div class="text-center">
                          <img class="profile-user-img img-fluid img-circle"
                               src="@if(isset($data)){{ asset('profile_img/'.$data->profile_image) }}@endif"
                               alt="User profile picture">
                        </div>
          
                        <h3 class="profile-username text-center">@if(isset($data)){{ $data->firstname }}@endif @if(isset($data)){{ $data->lastname }}@endif</h3>
          
                        {{-- <p class="text-muted text-center">Software Engineer</p> --}}
          
                        <ul class="list-group list-group-unbordered mb-3">
                          <li class="list-group-item">
                            <b>Mobile</b><a class="float-right"> @if(isset($data)){{ $data->mobile }}@endif</a>
                          </li>
                          <li class="list-group-item">
                            <b>Email</b><a class="float-right"> @if(isset($data)){{ $data->email }}@endif</a>
                          </li>
                        </ul>
          
                        <strong><i class="fas fa-book mr-1"></i>Address</strong>
          
                        <p class="text-muted">
                          @if(isset($data)){{ $data->present_address }}@endif
                        </p>
                        <hr>
          
                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Designation</strong>
          
                        <p class="text-muted">@if(isset($data)){{ $data->designation }}@endif</p>
          
                        <hr>
                        
          
                        {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
          
                   
                  </div>
                  {{-- //////////// --}}
                  <div class="col-md-8">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">About Me</h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <strong><i class="fas fa-book mr-1"></i>Permanent Address</strong>
          
                        <p class="text-muted">
                          @if(isset($data)){{ $data->permanent_address }}@endif
                        </p>
          
                        <hr>
                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Gender</strong>
          
                        <p class="text-muted">@if(isset($data)){{ $data->gender }}@endif</p>
          
                        <hr>
          
                        <strong><i class="fas fa-pencil-alt mr-1"></i> Date of Birth </strong>
                  
                        <p class="text-muted">@if(isset($data)){{ $data->date_of_birth }}@endif</p>
                  
                                <hr>
          
                        <strong><i class="fas fa-map-marker-alt mr-1"></i>NID</strong>
          
                        <p class="text-muted">@if(isset($data)){{ $data->nid_image }}@endif</p>
          
                        <hr>
                       
          
                        
          
                    
          
                       
                      </div>
                      <!-- /.card-body -->
                    </div>
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">About House</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <strong><i class="fas fa-book mr-1"></i>House Name</strong>
        
                      <p class="text-muted">
                        @if(isset($data)){{ $data->house_name }}@endif
                      </p>
        
                      <hr>
        
                      <strong><i class="fas fa-map-marker-alt mr-1"></i>House Location</strong>
        
                      <p class="text-muted">@if(isset($data)){{ $data->location }}@endif</p>
        
                      <hr>
                      <strong><i class="fas fa-map-marker-alt mr-1"></i>Holding No</strong>
        
                      <p class="text-muted">@if(isset($data)){{ $data->holding_no }}@endif</p>
        
                      <hr>
                      <strong><i class="fas fa-map-marker-alt mr-1"></i>Logo</strong>
        
                      <p class="text-muted">@if(isset($data)){{ $data->logo }}@endif</p>
        
                      <hr>
        
                      
        
                  
        
                     
                    </div>
                    <!-- /.card-body -->
                  </div>
                </div></div>
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="settings">
                  <!-- Main content -->
                  <section class="content">
                    <div class="container-fluid">
                      <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                          <!-- jquery validation -->
                          <div class="card card-primary">
                            <div class="card-header">
                              <h3 class="card-title">Update Profile </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="quickForm" enctype="multipart/form-data" method="POST">
                              {{ csrf_field() }}
                              <div class="card-body">

                                <div class="form-group row">
                                  <div class="col-md-6">
                                    <label for="exampleInputEmail1">First Name</label>
                                    <input type="text" name="firstname" class="form-control" id="firstname" value="@if(isset($data)){{ $data->firstname }}@endif" placeholder="Enter First Name">

                                    <input type="hidden" name="usertype" class="form-control" id="usertype" value="{{ auth()->user()->usertype }}" placeholder="Enter email">
                                    <input type="hidden" name="user_id" class="form-control" id="user_id" value="@if(isset($data)){{ $data->id }}@endif" placeholder="Enter email">
                                    <input type="hidden" name="information_id" class="form-control" id="user_id" value="@if(isset($data)){{ $data->information_id }}@endif" placeholder="Enter email">
                                  </div>
                                  <div class="col-md-6">
                                    <label for="exampleInputEmail1">Last Name</label>
                                    <input type="text" name="lastname" class="form-control" id="lastname" value="@if(isset($data)){{ $data->lastname }}@endif" placeholder="Enter Last Name">
                                  </div>
                                </div>

                             

                                <div class="form-group row">
                                  <div class="col-md-6">
                                    <label for="exampleInputEmail1">Mobile</label>
                                    <input type="mobile" name="mobile" class="form-control" id="mobile" value="@if(isset($data)){{ $data->mobile }}@endif" placeholder="Enter Mobile">
                                  </div>
                                  <div class="col-md-6">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" value="@if(isset($data)){{ $data->email }}@endif" placeholder="Enter Email">
                                  </div>
                                </div>


                                <div class="form-group">
                                  <label for="exampleInputPassword1">Present Address</label>
                                  <input type="text" name="present_address" class="form-control" id="present_address" value="@if(isset($data)){{ $data->present_address }}@endif" placeholder="Present Address">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Permanent Address</label>
                                  <input type="text" name="permanent_address" class="form-control" id="permanent_address" value="@if(isset($data)){{ $data->permanent_address }}@endif" placeholder="Permanent Address">
                                </div>

                                <div class="form-group row">
                                  <div class="col-md-6">
                                    <label for="exampleInputEmail1">Date of Birth</label>
                                    <input type="date" class="form-control" name="date_of_birth" value="@if(isset($data)){{  date("m/d/Y", strtotime($data->date_of_birth)) }}@endif" data-target=""/>
                                  </div>
                                  <div class="col-md-6">
                                    <label for="exampleInputEmail1">Gender</label>
                                    <input type="text" name="gender" class="form-control" id="gender" value="@if(isset($data)){{ $data->gender }}@endif" placeholder="Enter Gender">
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <div class="col-md-6">
                                    <label for="exampleInputEmail1">Designation</label>
                                    <input type="text" name="designation" class="form-control" id="designation" value="@if(isset($data)){{ $data->designation }}@endif" placeholder="Designation">
                                  </div>
                                  <div class="col-md-6">
                                    <label for="exampleInputEmail1">Sign</label>
                                    <input type="file" name="sign_image" class="form-control" id="sign_image" value="@if(isset($data)){{ $data->sign_image }}@endif" placeholder="Enter ">
                                    <img class="profile-user-img img-fluid"
                                    src="@if(isset($data)){{ asset('profile_img/'.$data->sign_image) }}@endif"
                                    alt="User profile picture">
                                  </div>
                                </div>

    


                                <div class="form-group row">
                                  <div class="col-md-6">
                                    <label for="exampleInputEmail1">NID Image</label>
                                    <input type="file" name="nid_image" class="form-control" id="nid_image" value="@if(isset($data)){{ $data->nid_image }}@endif" placeholder="Enter ">
                                    <img class="profile-user-img img-fluid"
                                    src="@if(isset($data)){{ asset('profile_img/'.$data->nid_image) }}@endif"
                                    alt="NID picture">
                                  </div>
                                  <div class="col-md-6">
                                    <label for="exampleInputEmail1">Profile Image</label>
                                    <input type="file" name="profile_image" class="form-control" id="profile_image" value="@if(isset($data)){{ $data->profile_image }}@endif" placeholder="Enter ">
                                    <img class="profile-user-img img-fluid "
                                    src="@if(isset($data)){{ asset('profile_img/'.$data->profile_image) }}@endif"
                                    alt="User profile picture">
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <div class="col-md-6">
                                    <label for="exampleInputEmail1">House Name</label>
                                    <input type="text" name="house_name" class="form-control" id="mobile" value="@if(isset($data)){{ $data->house_name }}@endif" placeholder="Enter House Name">
                                  </div>
                                  <div class="col-md-6">
                                    <label for="exampleInputEmail1">House Location</label>
                                    <input type="text" name="location" class="form-control" id="location" value="@if(isset($data)){{ $data->location }}@endif" placeholder="Enter Location">
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <div class="col-md-6">
                                    <label for="exampleInputEmail1">Holding No</label>
                                    <input type="text" name="holding_no" class="form-control" id="holding_no" value="@if(isset($data)){{ $data->holding_no }}@endif" placeholder="Enter holding_no">
                                  </div>
                                  <div class="col-md-6">
                                    <label for="exampleInputEmail1">Logo</label>
                                    <input type="file" name="logo" class="form-control" id="logo" value="@if(isset($data)){{ $data->logo }}@endif" placeholder="Enter logo">
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label for="exampleInputPassword1">Username</label>
                                  <input type="text" name="username" class="form-control" id="username" value="@if(isset($data)){{ $data->username }}@endif" placeholder="Username">
                                </div>

                                {{-- <div class="form-group">
                                  <label for="exampleInputPassword1">Password</label>
                                  <input type="password" name="password" class="form-control" id="password" value="@if(isset($data)){{ $data->lastname }}@endif" placeholder="Password">
                                </div> --}}
                                {{-- <div class="form-group mb-0">
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                                    <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label>
                                  </div>
                                </div> --}}
                              </div>
                              <!-- /.card-body -->
                              <div class="card-footer">
                                <button type="submit" class="btn btn-primary renter_res">Submit</button>
                              </div>
                            </form>
                          </div>
                          <!-- /.card -->
                          </div>
                        <!--/.col (left) -->
                        <!-- right column -->
                        <div class="col-md-6">

                        </div>
                        <!--/.col (right) -->
                      </div>
                      <!-- /.row -->
                    </div><!-- /.container-fluid -->
                  </section>
                  <!-- /.content -->
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
  @section("scripts2")
  <script>
    $(function () {
      $.validator.setDefaults({
        submitHandler: function () {
          alert( "Form successful submitted!" );
        }
      });
      $('#quickForm').validate({
        rules: {
          email: {
            required: true,
            email: true,
          },
          password: {
            required: true,
            minlength: 5
          },
          terms: {
            required: true
          },
        },
        messages: {
          email: {
            required: "Please enter a email address",
            email: "Please enter a valid email address"
          },
          password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long"
          },
          terms: "Please accept our terms"
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });

    // $('.renter_res').click(function (e) {

    //   e.preventDefault();

    //   $(this).html('Sending..');



    //   $.ajax({

    //     data: $('#quickForm').serialize(),

    //     url: "{{ url('profile_update') }}",

    //     type: "POST",

    //     dataType: 'json',

    //     success: function (data) {



    //         $('#quickForm').trigger("reset");

    //         //$('#ajaxModel_payBill').modal('hide');

    //         table.draw();

        

    //     },

    //     error: function (data) {

    //         console.log('Error:', data);

    //         //$('#saveBtn_payBill').html('Submit');

    //     }

    //   });

    // });

    $('#quickForm').submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    console.log(formData);
    $.ajax({
        type: 'POST',
        url: "{{ url('profile_update') }}",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
            this.reset();
            location.reload();
        },
        error: function (data) {
            console.log(data);
        }
    });
});

    $(document).on("click", ".renter_res1", function(){
                //alert('gg');exit;
                var ts = $(this);
                var usertype = $("#usertype").val();
                var landlord_id = $("#landlord_id").val();
                alert(landlord_id);
                var mobile = $("#mobile").val();
                var email = $("#email").val();
                var username = $("#username").val();
                var password = $("#password").val();
                var error_mobile = '';
                var mobfilter = /^\d*(?:\.\d{1,2})?$/;
            
                if($.trim($('#mobile').val()).length != 0)
                {
            
            
                  if (mobfilter.test($('#Mobile').val()))
                  {
                    if($.trim($('#Mobile').val()).length != 11 )
                    {
            
                      error_mobile = 'Please put 11  digit mobile number';
                    $('#error_mobile').text(error_mobile);
                    $('#Mobile').addClass('has-error');
                    }
            
                  }
                  else
                  {
                    error_mobile = 'Invalid Mobile No';
                    $('#error_mobile').text(error_mobile);
                    $('#Mobile').addClass('has-error');
                  }
                }
                else
                {
                  error_mobile = 'Mobile Number is required';
                 $('#error_mobile').text(error_mobile);
                 $('#Mobile').addClass('has-error');
                }
            
                if(mobile == '' && password == ''){
                    alert("Mobile and Password Fields cannot left empty");
                    return;
                }
            
                var passw = /^(?=.*\d)(?=.*[a-z]).{6,20}$/;
                if($("#password").val().match(passw))
                {
               // alert('Correct, try another...')
               // return true;
                }
                else
                {
                alert('Wrong Password...! menimum 6 characters which contain at least one numeric digit, one uppercase and one lowercase letter');
                return false;
                }
            
            
                
                    var firstname = $("#firstname").val();
                    var lastname = $("#lastname").val();
                    //alert(firstname);exit;
                    console.log(firstname);
                    console.log(lastname);
                    if(firstname == ''){
                        alert("Please input firstname");
                        return;
                    }
                    var data = {
                        usertype: usertype,
                        landlord_id: landlord_id,
                        firstname: firstname,
                        lastname: lastname,
                        mobile: mobile,
                        email: email,
                        username: username,
                        password: password
                    };
               
            
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            
                $.ajax({
                    url: "{{ url('submit_registration') }}",
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
                                // window.location = "{{ url('home') }}";
                                $(".sErr").html("<div class='alert alert-danger'>Please First Update Your Profile</div>");
                                window.location = "{{ url('gsettings') }}" + "#success";
                                }
                                else if(rsp.data['type'] == 'Teacher'){
                                var id = rsp.data['user_id'];
                                console.log("id");
                                console.log(id);
                               // window.location = "{{ url('otp-verification') }}-"+id;
                                //window.location = "{{ url('home') }}";
                                 $(".sErr").html("<div class='alert alert-danger'>Please First Update Your Profile</div>");
                                window.location = "{{ url('gsettings') }}"+ "#success";
                               }
                               else if(rsp.data['type'] == 'Participant'){
                                $(".sErr").html("<div class='alert alert-danger'>Please First Update Your Profile</div>");
                                window.location = "{{ url('/dashboard') }}" + "#success";
                                   }
                               else{
                                 //window.location = "{{ url('user-dashboard') }}";
                                 $(".sErr").html("<div class='alert alert-danger'>Please First Update Your Profile</div>");
                             // window.location = "{{ url('/render_list/') }}/"+Auth::user()->id ;

                                location.reload(); 
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
            });
    </script>

@endsection
@stop

