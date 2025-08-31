@extends('admin.admin_master')
@section('admin')
   <div class="page-content">
      <div class="container-fluid">

         <div class="row">
            <div class="col-8">
               <div class="card">
                  <div class="card-body">
                     <h4 class="card-title">Home Slide Page</h4>
                     <form action="{{ route('home.slide.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $homeSlides->id ?? '' }}">
                        <div class="row mb-3">
                           <label for="title" class="col-sm-2 col-form-label">Title</label>
                           <div class="col-sm-10">
                              <input class="form-control" type="text" id="title" name="title"
                                 value="{{ $homeSlides->title ?? '' }}">
                           </div>
                        </div>

                        <div class="row mb-3">
                           <label for="subtitle" class="col-sm-2 col-form-label">Subtitle</label>
                           <div class="col-sm-10">
                              <input class="form-control" type="text" id="subtitle" name="subtitle"
                                 value="{{ $homeSlides->subtitle ?? '' }}">
                           </div>
                        </div>

                        <div class="row mb-3">
                           <label for="video_url" class="col-sm-2 col-form-label">Video URL</label>
                           <div class="col-sm-10">
                              <input class="form-control" type="text" id="video_url" name="video_url"
                                 value="{{ $homeSlides->video_url ?? '' }}">
                           </div>
                        </div>



                        <div class="row mb-3">
                           <label for="image" class="col-sm-2 col-form-label">HomeSlide Image</label>
                           <div class="col-sm-10">
                              <input class="form-control" type="file" id="image" name="image">
                           </div>
                        </div>

                        <div class="row mb-3">
                           <label for="showImage" class="col-sm-2 col-form-label"></label>
                           <div class="col-sm-10">
                              <img id="showImage" class="rounded avatar-lg"
                                 src="{{ !empty($homeSlides) && !empty($homeSlides->image) ? url($homeSlides->image) : asset('upload/no_image.png') }}"
                                 alt="slider">
                           </div>
                        </div>


                        <button type="submit" class="btn btn-primary mt-3">Update Home Slide</button>
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
