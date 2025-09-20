
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
            <h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('profile_view/'. Auth::user()->id)}}">View Profile</a></li>
              <li class="breadcrumb-item active">Update Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-10">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Profile </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm">
                {{ csrf_field() }}
                <div class="card-body">

                  <div class="form-group row">
                    <div class="col-md-6">
                      <label for="exampleInputEmail1">First Name</label>
                      <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Enter First Name">

                      <input type="hidden" name="usertype" class="form-control" id="usertype" value="renter" placeholder="Enter email">
                      <input type="hidden" name="landlord_id" class="form-control" id="landlord_id" value="{{ auth()->user()->id }}" placeholder="Enter email">
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
                    <label for="exampleInputPassword1">Prasent Address</label>
                    <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Parmanent Address</label>
                    <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                  </div>

                  <div class="form-group row">
                    <div class="col-md-6">
                      <label for="exampleInputEmail1">Date of Birth</label>
                      <input type="mobile" name="mobile" class="form-control" id="mobile" placeholder="Enter Mobile">
                    </div>
                    <div class="col-md-6">
                      <label for="exampleInputEmail1">Gender</label>
                      <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email">
                    </div>
                  </div>


                  <div class="form-group row">
                    <div class="col-md-6">
                      <label for="exampleInputEmail1">NID Image</label>
                      <input type="mobile" name="mobile" class="form-control" id="mobile" placeholder="Enter Mobile">
                    </div>
                    <div class="col-md-6">
                      <label for="exampleInputEmail1">Profile Image</label>
                      <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email">
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-md-6">
                      <label for="exampleInputEmail1">House Name</label>
                      <input type="mobile" name="mobile" class="form-control" id="mobile" placeholder="Enter Mobile">
                    </div>
                    <div class="col-md-6">
                      <label for="exampleInputEmail1">Location</label>
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
                  <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                      <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="button" class="btn btn-primary renter_res">Submit</button>
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

    $(document).on("click", ".renter_res", function(){
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

