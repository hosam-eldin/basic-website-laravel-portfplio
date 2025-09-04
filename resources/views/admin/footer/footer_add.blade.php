@extends('admin.admin_master')
@section('admin')
   <div class="page-content">
      <div class="container-fluid">

         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-body">
                     <h4 class="card-title">Footer Page</h4>
                     <form action="{{ route('store.footer') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if ($errors->any())
                           <div class="alert alert-danger">
                              <ul>
                                 @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                 @endforeach
                              </ul>
                           </div>
                        @endif

                        <div class="row mb-3">
                           <label for="number" class="col-sm-2 col-form-label">Number</label>
                           <div class="col-sm-10">
                              <input class="form-control" type="text" id="number" name="number" value="">
                           </div>
                        </div>

                        <div class="row mb-3">
                           <label for="address" class="col-sm-2 col-form-label">Address</label>
                           <div class="col-sm-10">
                              <input class="form-control" type="text" id="address" name="address" value="">
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label for="email" class="col-sm-2 col-form-label">Email</label>
                           <div class="col-sm-10">
                              <input class="form-control" type="email" id="email" name="email" value="">
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label for="facebook" class="col-sm-2 col-form-label">Facebook</label>
                           <div class="col-sm-10">
                              <input class="form-control" type="text" id="facebook" name="facebook" value="">
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label for="Twitter" class="col-sm-2 col-form-label">Twitter</label>
                           <div class="col-sm-10">
                              <input class="form-control" type="text" id="Twitter" name="Twitter" value="">
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label for="copyright" class="col-sm-2 col-form-label">Copyright</label>
                           <div class="col-sm-10">
                              <input class="form-control" type="text" id="copyright" name="copyright"
                                 value="{{ $footer->copyright }}">
                           </div>
                        </div>

                        <div class="row mb-3">
                           <label for="description" class="col-sm-2 col-form-label">Short_Description</label>
                           <div class="col-sm-10">
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



      @endsection
