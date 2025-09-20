@extends('admin.layout.header')
@section('maincontent')
@include('admin.layout.leftmenu')
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
              <li class="breadcrumb-item"> <a class="btn btn-success text-white" href="{{ route('admin_role.create') }}">Add New User</a></li>
              <li class="breadcrumb-item active">Users</li>
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
                  <h3 class="card-title">Users</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                   
                    <div class="clearfix"></div>
                    <div class="data-tables">
                        @include('layouts.messages') 
                        <table id="dataTable" class=" text-center table table-striped table-bordered">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th width="5%">Sl</th>
                                    <th width="10%">Name</th>
                                    <th width="10%">UserName</th>
                                    <th width="10%">Email</th>
                                    <th width="10%">Roles</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($users as $user)
                               <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @foreach ($user->roles as $role)
                                            <span class="badge badge-info mr-1">
                                                {{ $role->name }}
                                            </span>
                                        @endforeach
                                    </td>
                                    <td>
                                        @if (Auth::guard('web')->user()->can('role.edit') && $role->name !='superadmin' )
                                        <a class="btn btn-success text-white" href="{{ route('admin_role.edit', $user->id) }}">Edit</a>
                                        @endif
                                        @if (Auth::guard('web')->user()->can('role.delete') && $role->name !='superadmin' )
                                        <a class="btn btn-danger text-white" href="{{ route('admin_role.destroy', $user->id) }}"
                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $user->id }}').submit();">
                                            Delete
                                        </a>
                                        @endif

                                        <form id="delete-form-{{ $user->id }}" action="{{ route('admin_role.destroy', $user->id) }}" method="POST" style="display: none;">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                               @endforeach
                            </tbody>
                        </table>
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

   

      {{-- ///////// --}}

     
     
    </div>
    <!-- /.content-wrapper -->
{{-- ///////////////////////////// --}}


     



      

@section("scripts2")

<!-- Bootstrap 4 -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('admin/plugins/select2/js/select2.full.min.js')}}"></script>

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

          url: "{{ url('store_payBill') }}",

          type: "POST",

          dataType: 'json',

          success: function (data) {

       

              // $('#productForm_payBill').trigger("reset");

              // $('#ajaxModel_payBill').modal('hide');

              // table.draw();

              $(".sErr").html("<div class='alert alert-danger'>Pay Bill successfully</div>");
            window.location = "{{ url('/receipt/') }}" +"/"+ data.id;

           

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

            url: "{{ route('products-ajax-crud.store') }}"+'/'+product_id,

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