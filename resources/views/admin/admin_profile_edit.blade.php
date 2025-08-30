@extends('admin.admin_master')
@section('admin')
   <div class="page-content">
      <div class="container-fluid">

         <div class="row">
            <div class="col-8">
               <div class="card">
                  <div class="card-body">

                     <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                           <label for="name" class="col-sm-2 col-form-label">Name</label>
                           <div class="col-sm-10">
                              <input class="form-control" type="text" id="name" name="name"
                                 value="{{ $user->name }}">
                           </div>
                        </div>

                        <div class="row mb-3">
                           <label for="email" class="col-sm-2 col-form-label">Email</label>
                           <div class="col-sm-10">
                              <input class="form-control" type="email" id="email" name="email"
                                 value="{{ $user->email }}">
                           </div>
                        </div>

                        <div class="row mb-3">
                           <label for="user_name" class="col-sm-2 col-form-label">UserName</label>
                           <div class="col-sm-10">
                              <input class="form-control" type="text" id="user_name" name="user_name"
                                 value="{{ $user->user_name }}">
                           </div>
                        </div>

                        <div class="row mb-3">
                           <label for="image" class="col-sm-2 col-form-label">Profile Image</label>
                           <div class="col-sm-10">
                              <input class="form-control" type="file" id="image" name="profile_image"
                                 value="{{ $user->user_image ?? '' }}">
                           </div>
                        </div>

                        <div class="row mb-3">
                           <label for="showImage" class="col-sm-2 col-form-label"></label>
                           <div class="col-sm-10">
                              <img id="showImage" class="rounded avatar-lg " alt="200x200" data-holder-rendered="true"
                                 src="{{ $user->profile_image ? asset('upload/admin_images/' . $user->profile_image) : gravatar($user->email, 150) }}"
                                 class="rounded-circle" alt="avatar">
                           </div>

                           <button type="submit" class="btn btn-primary mt-3">Update Profile</button>
                     </form>

                  </div>
               </div>
            </div> <!-- end col -->
         </div>


         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
         <script type="text/javascript">
            $(document).ready(function() {
               $('#image').change(function(e) {
                  var reader = new FileReader();
                  reader.onload = function(e) {
                     $('#showImage').attr('src', e.target.result);
                  }
                  reader.readAsDataURL(e.target.files['0']);
               });
            });
         </script>
      @endsection
