@extends('admin.admin_master')
@section('admin')
   <div class="page-content">
      <div class="container-fluid">

         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-body">
                     <h4 class="card-title">About Page</h4>
                     <form action="{{ route('about.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $aboutSlides->id ?? '' }}">


                        <div class="row mb-3">
                           <label for="title" class="col-sm-2 col-form-label">Title</label>
                           <div class="col-sm-10">
                              <input class="form-control" type="text" id="title" name="title"
                                 value="{{ $aboutSlides->title ?? '' }}">
                           </div>
                        </div>

                        <div class="row mb-3">
                           <label for="subtitle" class="col-sm-2 col-form-label">Subtitle</label>
                           <div class="col-sm-10">
                              <input class="form-control" type="text" id="subtitle" name="subtitle"
                                 value="{{ $aboutSlides->subtitle ?? '' }}">
                           </div>
                        </div>

                        <div class="row mb-3">
                           <label for="short_description" class="col-sm-2 col-form-label">Short Description</label>
                           <div class="col-sm-10">
                              <textarea required="" class="form-control" rows="5" id="short_description" name="short_description">{{ $aboutSlides->short_description ?? '' }}</textarea>
                           </div>
                        </div>

                        <div class="row mb-3">
                           <label for="long_description" class="col-sm-2 col-form-label">Long Description</label>
                           <div class="col-sm-10">
                              <textarea id="elm1" name="long_description" ">{!! $aboutSlides->long_description ?? '' !!}</textarea>

                           </div>
                        </div>



                        <div class="row mb-3">
                           <label for="image" class="col-sm-2 col-form-label">About Image</label>
                           <div class="col-sm-10">
                              <input class="form-control" type="file" id="image" name="image">
                           </div>
                        </div>

                        <div class="row mb-3">
                           <label for="showImage" class="col-sm-2 col-form-label"></label>
                           <div class="col-sm-10">
                              <img id="showImage" class="rounded avatar-lg"
                                 src="{{ !empty($aboutSlides) && !empty($aboutSlides->about_image) ? url($aboutSlides->about_image) : asset('upload/no_image.png') }}"
                                 alt="slider">
                           </div>
                        </div>


                        <button type="submit" class="btn btn-primary mt-3">Update About Slide</button>
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
