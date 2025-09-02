@extends('admin.admin_master')
@section('admin')
   <div class="page-content">
      <div class="container-fluid">

         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-body">

                     <h4 class="card-title">All Multi Images - About.Page</h4><br><br>


                     <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                           <tr>
                              <th>Sl</th>
                              <th>Image</th>
                              <th>Actions</th>

                           </tr>
                        </thead>


                        <tbody>
                           @php $i = 1; @endphp
                           @foreach ($multiImages as $item)
                              <tr>
                                 <td>{{ $i++ }}</td>
                                 <td><img src="{{ asset($item->image) }}" style="width:60px; height:60px"></td>
                                 <td>
                                    <a href="{{ route('edit.multi.images', $item->id) }}" class="btn btn-info sm"
                                       title="Edit Data"> <i class="fas fa-edit"></i> </a>
                                    <a href="{{ route('delete.multi.images', $item->id) }}" class="btn btn-danger sm"
                                       title="Delete Data" id="delete"> <i class="fas fa-trash-alt"></i> </a>
                                 </td>

                              </tr>
                           @endforeach

                        </tbody>
                     </table>

                  </div>
               </div>
            </div> <!-- end col -->
         </div> <!-- end row -->


      </div>
   </div>
@endsection
