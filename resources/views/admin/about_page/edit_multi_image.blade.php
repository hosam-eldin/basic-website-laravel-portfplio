@extends('admin.admin_master')
@section('admin')
   <div class="page-content">
      <div class="container-fluid">

         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-body">
                     <h4 class="card-title">About Multi Images</h4><br><br>
                     <form action="{{ route('update.multi.images', $multiImage->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf


                        <div class="row mb-3">
                           <label for="image" class="col-sm-2 col-form-label">Multi Image</label>
                           <div class="col-sm-10">
                              <input class="form-control" type="file" id="image" name="image">
                           </div>
                        </div>

                        <div class="row mb-3">
                           <label for="showImage" class="col-sm-2 col-form-label"></label>
                           <div class="col-sm-10">
                              <img id="showImage" class="rounded avatar-lg"
                                 src="{{ !empty($multiImage) && !empty($multiImage->image) ? url($multiImage->image) : asset('upload/no_image.png') }}"
                                 alt="slider">
                           </div>
                        </div>


                        <button type="submit" class="btn btn-primary mt-3">Update Multi Images</button>
                     </form>

                  </div>
               </div>
            </div> <!-- end col -->
         </div>



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
