@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-6  register">
            <div class="card box-shadow">
                @if(count($errors) > 0)
                @foreach($errors->all() as $err)
                <p class="alert alert-danger">{{$err}}</p>
                @endforeach
                @endif
                <div class="card-header bg-white access">
                    <h3><i class="fa fa-book"></i> Participate As <span class="register_as">A Mentor</span></h3>
                    <!-- <a href="{{ route('login') }}" class="float-right text-red"> Back</a> -->
                </div>

                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="sErr text-center"></div>
                        </div>
                    </div>
                    <div class="Participant">
                        <div class="form-group row">
                            <label class="col-md-4">First Name <span class="text-red">*</span></label>
                            <div class="col-md-8">
                                <input id="firstname" type="text" class="form-control required"
                                    placeholder="First Name *">
                                <p class="err d-none"></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4">Last Name <span class="text-red">*</span></label>
                            <div class="col-md-8">
                                <input id="lastname" type="text" class="form-control required"
                                    placeholder="Last Name *">
                                <p class="err d-none"></p>
                            </div>
                        </div>
                    </div>

                    <div class="Participant">
                        <div class="form-group row">
                            <label class="col-md-4">Email</label>
                            <div class="col-md-8">
                                <input id="email" type="text" class="form-control" placeholder="Email">
                                <p class="err d-none"></p>
                                <!-- <p class="text-red mb-0"><em><small>Validation link will be sent in this email</small></em></p> -->
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4">Mobile <span class="text-red">*</span></label>
                            <div class="col-md-8">
                                <input id="Mobile" type="text" class="form-control required" placeholder="Mobile *">
                                <small class="text-red">Use this number as your User ID/Username</small>
                                <p class="err d-none"></p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4">Password <span class="text-red">*</span></label>
                            <div class="col-md-8">
                                <input id="Password" type="password" class="form-control required"
                                    placeholder="Password *" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
                                <small class="text-red">Minimum 6 characters which contain at least one numeric digit,
                                    one uppercase and one lowercase letter</small>
                                <p class="err d-none"></p>
                            </div>
                            <div class="pass"></div>
                        </div>
                        <!-- <div class="form-group row">
                            <label class="col-md-4">OR </label>
                            <div class="col-md-8">
                                <a class=" btn btn-primary btn-block SocialForm" href="{{route('loginWithSchoialMedia', 'facebook')}}">Login with FaceBook</a>

                            </div>
                        </div> -->

                        <form action="{{route('loginWithSchoialMedia', 'facebook')}}" class="SocialForm" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-4">OR </label>
                                <div class="col-md-8">
                                    <input type="hidden" name="user_type" class="fblog" value="Participant">
                                    <!-- <a class="btn btn-primary btn-block Submit" type="submit">Login with FaceBook</a> -->
                                    <!-- <button type="submit" class="btn btn-primary btn-block">Login with FaceBook</button> -->
                                    <input type="submit" class="btn btn-primary btn-block" value="Login with FaceBook">
                                </div>
                            </div>
                        </form>

                        <!-- <div class="form-group row">
                            <label class="col-md-4">OR </label>
                            <div class="col-md-8">
                                 <a class=" btn btn-primary btn-block SocialForm" href="{{route('loginWithSchoialMedia', 'google')}}">Login with Google</a>
                            </div>
                        </div> -->

                        <form action="{{route('loginWithSchoialMedia', 'google')}}" class="SocialForm" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-4">OR </label>
                                <div class="col-md-8">
                                    <input type="hidden" name="user_type" class="fblog" value="Participant">
                                    <!-- <a class="btn btn-primary btn-block Submit" type="submit">Login with FaceBook</a> -->
                                    <!-- <button type="submit" class="btn btn-primary btn-block">Login with FaceBook</button> -->
                                    <input type="submit" class="btn btn-danger btn-block" value="Login with Google">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4"></label>
                        <div class="col-md-8">
                            <a href="javascript:" id="read_terms" data-toggle="modal"
                                data-target="#exampleModalLong">Read Privacy Policy & Terms of Services</a>
                        </div>
                        <div class="pass"></div>
                    </div>

                    <div class="form-group row Participant dflex">
                        <label class="col-md-4"></label>
                        <div class="col-md-5">
                            Already have an account? <a href="{{ url('myLogin') }}">Login</a>
                        </div>
                        <div class="col-md-3">
                            <button type="button" class="btn bg-navy btn-sm float-right user_res">
                                <i class="fa fa-check"></i> Submit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Privacy Policy & Terms of Services</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="col-md-12">
                        <h2>Privacy Policy</h2>
                        <?=$data['privacy-policy'] ? $data['privacy-policy']->content : '';?>
                        <h2>Terms of Services</h2>
                        <?=$data['terms-of-services'] ? $data['terms-of-services']->content : '';?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <label> <input type="checkbox" name="terms_read" class="accept"> Accept</label>
            </div>
        </div>
    </div>
</div>
@endsection

@section("styles")
<style type="text/css">
    .uRegister .box-shadow {
        cursor: pointer;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        margin: 0;
    }
</style>
@endsection

@section("scripts")
<script type="text/javascript">
    $(document).on("click", ".sp_system", function(){
    var type = $(this).attr("val");
    console.log(type);

    if(type == 'Support_System'){
        $(".type1").hide("slow");
        $(".type2").removeClass("d-none");
        $(".type2").show("slow").css("display", "flex");
        $(".cl").removeClass("d-none");
        $(".cl").show("slow").css("display", "flex");
       // $(".Heigh-School").hide("slow");

    }

});

$(document).on("click", ".accept", function(){
    $('#exampleModalLong').modal('hide');

});

$(document).on("click", ".close_utp", function(){
    $(".type2").hide("slow");
    $(".type1").show("slow");
    $(".close_utp").hide("slow");
});

$(function(){
    $(".rightside").html('<li class="nav-item"> <a href="{{ url('myLogin') }}"> <i class="fa fa-lock"></i> Login </a> </li>');
});

$(document).on("click", "#read_terms", function(){
    $(".data_submit").attr("disabled", false);
});

$(document).on("click", ".login_facebook", function(){
    var uType = $(".register_as").text();
    console.log("type");
    console.log(uType);
    if(uType){
        $.ajax({
          url: "{{ url('login_with_facebook_usertype') }}/"+uType,
          method: "get",
          beforeSend: function(){
            $(this).removeClass("btn-primary").addClass("bg-primary ").html("<i class='fa fa-spinner fa-spin'></i>")
          },
          success: function(rsp){
            // var info = rsp.data.info;
            // $("#InstitutionName").val(info.name);
          },
          error: function(err, txt, sts){
            console.log(err);
            console.log(txt);
            console.log(sts);
          }
        });
      }
});



$(document).on("blur", "#InstitutionCode", function(){
    var val = $(this).val();
    if(val){
        $.ajax({
          url: "{{ url('institution-check') }}/"+val,
          method: "get",
          beforeSend: function(){
            //$("#InstitutionName").attr("disabled", true);
          },
          success: function(rsp){
            var info = rsp.data.info;
            //if(rsp.error == false){
              $("#InstitutionName").val(info.name);//.attr("disabled", false).focus();
            /*} else {
              $("#InstitutionName").attr("disabled", false).val("");
            }*/
          },
          error: function(err, txt, sts){
            console.log(err);
            console.log(txt);
            console.log(sts);
          }
        });
      }
});

$(document).on("click", ".col-md-3 .box-shadow", function(){
    $(".dnone").hide();
    $(this).parents(".uRegister").find(".bg-green").removeClass("bg-green").addClass("bg-primary ");
    $(this).parents(".uRegister").find(".cUrrent").removeClass("cUrrent");
    $(this).removeClass("bg-primary ").addClass("bg-green");
    $(this).addClass("cUrrent");
    $(".dnone").show("slow");
    var rAs = $(this).attr("tp");
    // $(document).find(".SocialForm").each(function() {
    //    // console.log($(this).attr('href')+'/'+rAs);
    //     var scurl = $(this).attr('href')+'/'+rAs;
    //     $(this).attr('href', scurl);
    // });
    $(".register_as").text(rAs);

    $(".fblog").val(rAs);
    $(".card-body .c-show").removeClass("c-show").addClass("d-none");
    $("."+rAs).removeClass("d-none").addClass("c-show");
});

$(document).on("click", ".user_res", function(){
    var ts = $(this);
    var uType = "Participant";//$("input[name=RegisterAs]:checked").val();
    var Mobile = $("#Mobile").val();
    var email = $("#email").val();
    var Password = $("#Password").val();

    if(Mobile == '' && Password == ''){
        alert("Mobile and Password Fields cannot left empty");
        return;
    }

    var passw = /^(?=.*\d)(?=.*[a-z]).{6,20}$/;
    if($("#Password").val().match(passw))
    {
   // alert('Correct, try another...')
   // return true;
    }
    else
    {
    alert('Wrong Password...! menimum 6 characters which contain at least one numeric digit, one uppercase and one lowercase letter');
    return false;
    }


    if(uType == 'Authority'){
        var InstitutionName = $("#InstitutionName").val();
        var InstitutionCode = $("#InstitutionCode").val();
        //data += "InstName:"+ InstitutionName+", InstCode:"+ InstitutionCode+", ";
        if(InstitutionName == '' && InstitutionCode == ''){
            alert("Please input institution name and institution code");
            return;
        }
        var data = {
            uType: uType,
            InstName: InstitutionName,
            InstCode: InstitutionCode,
            mobile: Mobile,
            email: email,
            password: Password
        };
    } else if(uType == 'Teacher' || uType == 'Parent' || uType == 'Innovator' || uType == 'Mentor' || uType == 'Enterprenuer' || uType == 'Educator' || uType == 'Manufacturers' || uType == 'Small_Investors' || uType == 'Innovation_Investors' || uType == 'Innovation_Donners'|| uType == 'Participant'){
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
            uType: uType,
            firstname: firstname,
            lastname: lastname,
            mobile: Mobile,
            email: email,
            password: Password
        };
    } else if(uType == 'Student'){
        var StudentFirstName = $("#StudentFirstName").val();
        var StudentLastName = $("#StudentLastName").val();
        var StudentID = $("#StudentID").val();
        var StdClass = $("#StdClass").val();
        if(StudentFirstName == ''){
            alert("Please input firstname");
            return;
        }
        var data = {
            uType: uType,
            StdFName: StudentFirstName,
            StdLName: StudentLastName,
            StdID: StudentID,
            StdClass: StdClass,
            mobile: Mobile,
            email: email,
            password: Password
        };
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: "{{ url('myRegistration') }}",
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
                    window.location = "{{ url('innovation-gsettings') }}" + "#success";
                       }
                   else{
                     //window.location = "{{ url('user-dashboard') }}";
                     $(".sErr").html("<div class='alert alert-danger'>Please First Update Your Profile</div>");
                    window.location = "{{ url('innovation-gsettings') }}" + "#success";
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
