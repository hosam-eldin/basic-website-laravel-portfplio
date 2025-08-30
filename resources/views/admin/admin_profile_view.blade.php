@extends('admin.admin_master')
@section('admin')
   <div class="page-content">
      <div class="container-fluid">

         <div class="row">
            <div class="col-lg-6">
               <div class="card"><br><br>
                  <center>
                     <img class="rounded-circle avatar-xl " alt="200x200" data-holder-rendered="true"
                        src="{{ $user->profile_image ? asset('upload/admin_images/' . $user->profile_image) : gravatar($user->email, 150) }}"
                        class="rounded-circle" alt="avatar">
                  </center>
                  <div class="card-body">
                     <h4 class="card-title">Name : {{ $user->name }}</h4>
                     <hr>
                     <h4 class="card-title">Email : {{ $user->email }}</h4>
                     <hr>
                     <h4 class="card-title">UserName : {{ $user->user_name }}</h4>
                     <hr>
                     <a href="{{ route('admin.profile.edit') }}" class="btn btn-info">Edit Profile</a>

                     </p>
                  </div>
               </div>
            </div>
         </div>
      @endsection
