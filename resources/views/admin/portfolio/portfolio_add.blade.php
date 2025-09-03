@extends('admin.admin_master')
@section('admin')
   <div class="page-content">
      <div class="container-fluid">

         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-body">
                     <h4 class="card-title">Portfolio Page</h4>
                     <form action="{{ route('store.portfolio') }}" method="POST" enctype="multipart/form-data">
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
                           <label for="name" class="col-sm-2 col-form-label">Name</label>
                           <div class="col-sm-10">
                              <input class="form-control" type="text" id="name" name="name" value="">
                           </div>
                        </div>

                        <div class="row mb-3">
                           <label for="title" class="col-sm-2 col-form-label">Title</label>
                           <div class="col-sm-10">
                              <input class="form-control" type="text" id="title" name="title" value="">
                           </div>
                        </div>

                        <div class="row mb-3">
                           <label for="description" class="col-sm-2 col-form-label">Description</label>
                           <div class="col-sm-10">
                              <textarea id="elm1" name="description" value=""></textarea>

                           </div>
                        </div>

                        <div class="row mb-3">
                           <label for="image" class="col-sm-2 col-form-label">Portfolio Image</label>
                           <div class="col-sm-10">
                              <input class="form-control" type="file" id="image" name="image">
                           </div>
                        </div>

                        <div class="row mb-3">
                           <label for="showImage" class="col-sm-2 col-form-label"></label>
                           <div class="col-sm-10">
                              <img id="showImage" class="rounded avatar-lg" src="" alt="slider">
                           </div>
                        </div>

                        <div class=" row mb-3">
                           <button type="submit" class="btn btn-primary mt-3">Add Portfolio</button>
                        </div>
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
