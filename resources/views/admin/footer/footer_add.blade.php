@extends('admin.admin_master')
@section('admin')
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   <div class="page-content">
      <div class="container-fluid">

         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-body">
                     <h4 class="card-title">Footer Page</h4>
                     <form id="myForm" action="{{ route('store.footer') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- @if ($errors->any())
                           <div class="alert alert-danger">
                              <ul>
                                 @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                 @endforeach
                              </ul>
                           </div>
                        @endif --}}

                        <div class="row mb-3">
                           <label for="number" class="col-sm-2 col-form-label">Number</label>
                           <div class="form-group col-sm-10">
                              <input class="form-control" type="text" id="number" name="number" value="">
                           </div>
                        </div>

                        <div class="row mb-3">
                           <label for="address" class="col-sm-2 col-form-label">Address</label>
                           <div class="form-group col-sm-10">
                              <input class="form-control" type="text" id="address" name="address" value="">
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label for="email" class="col-sm-2 col-form-label">Email</label>
                           <div class="form-group col-sm-10">
                              <input class="form-control" type="email" id="email" name="email" value="">
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label for="facebook" class="col-sm-2 col-form-label">Facebook</label>
                           <div class="form-group col-sm-10">
                              <input class="form-control" type="text" id="facebook" name="facebook" value="">
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label for="twitter" class="col-sm-2 col-form-label">Twitter</label>
                           <div class="form-group col-sm-10">
                              <input class="form-control" type="text" id="twitter" name="twitter" value="">
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label for="copyright" class="col-sm-2 col-form-label">Copyright</label>
                           <div class="form-group col-sm-10">
                              <input class="form-control" type="text" id="copyright" name="copyright" value="">
                           </div>
                        </div>

                        <div class="row mb-3">
                           <label for="description" class="col-sm-2 col-form-label">Short_Description</label>
                           <div class="form-group col-sm-10">
                              <textarea id="elm1" name="description" value=""></textarea>

                           </div>
                        </div>



                        <div class=" row mb-3">
                           <button type="submit" class="btn btn-primary mt-3">Add Footer</button>
                        </div>
                     </form>

                  </div>
               </div>
            </div> <!-- end col -->
         </div>

         <script type="text/javascript">
            $(document).ready(function() {
               $('#myForm').validate({
                  rules: {
                     number: {
                        required: true
                     },
                     address: {
                        required: true
                     },
                     email: {
                        required: true,
                        email: true
                     },
                     facebook: {
                        required: true
                     },
                     twitter: {
                        required: true
                     },
                     copyright: {
                        required: true
                     },
                     description: {
                        required: true
                     }
                  },
                  messages: {
                     number: {
                        required: "Please enter a number"
                     },
                     address: {
                        required: "Please enter an address"
                     },
                     email: {
                        required: "Please enter an email",
                        email: "Please enter a valid email"
                     },
                     facebook: {
                        required: "Please enter a Facebook link"
                     },
                     twitter: {
                        required: "Please enter a Twitter link"
                     },
                     copyright: {
                        required: "Please enter copyright information"
                     },
                     description: {
                        required: "Please enter a short description"
                     }
                  },
                  errorElement: "span",
                  errorPlacement: function(error, element) {
                     error.addClass("invalid-feedback");
                     element.closest(".form-group").append(error);
                  },
                  highlight: function(element, errorClass, validClass) {
                     $(element).addClass("is-invalid");
                  },
                  unhighlight: function(element, errorClass, validClass) {
                     $(element).removeClass("is-invalid");
                  }
               });
            });
         </script>
      @endsection
