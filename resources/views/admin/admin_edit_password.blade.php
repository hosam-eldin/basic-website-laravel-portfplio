@extends('admin.admin_master')
@section('admin')
   <div class="page-content">
      <div class="container-fluid">

         <div class="row">
            <div class="col-8">
               <div class="card">
                  <div class="card-body">

                     <form action="{{ route('admin.change.password') }}" method="POST" ">
                                                                        @csrf
                                                                                @if (count($errors) > 0)
                        <div class="alert alert-danger">
                           <ul>
                              @foreach ($errors->all() as $error)
                                 <li>{{ $error }}</li>
                              @endforeach
                           </ul>
                        </div>
                        @endif
                        <div class="row mb-3">
                           <label for="password" class="col-sm-2 col-form-label">Old Password</label>
                           <div class="col-sm-10">
                              <input class="form-control" type="password" placeholder="Old Password" id="password"
                                 name="old_password" ">
                                          </div>
                                       </div>
                                       <div class="row mb-3">
                                          <label for="new_password" class="col-sm-2 col-form-label">New Password</label>
                                          <div class="col-sm-10">
                                             <input class="form-control" type="password" placeholder="New Password" id="new_password"
                                                name="new_password" ">
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label for="confirm_password" class="col-sm-2 col-form-label">Confirm Password</label>
                           <div class="col-sm-10">
                              <input class="form-control" type="password" placeholder="Confirm Password"
                                 id="confirm_password" name="confirm_password" ">
                                          </div>
                                       </div>
                                       <div class="row mb-3">
                                          <button type="submit" class="btn btn-primary mt-3">Update Password</button>
                                       </div>
                                       </form>

                                    </div>
                                 </div>
                              </div> <!-- end col -->
                           </div>
@endsection
