@extends('admin.admin_master')
@section('admin')
   <div class="page-content">
      <div class="container-fluid">

         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-body">

                     <h4 class="card-title">contact Page</h4><br><br>


                     <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                           <tr>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Subject</th>
                              <th>Actions</th>
                           </tr>
                        </thead>

                        <tbody>
                           @foreach ($messages as $message)
                              <tr>
                                 <td>{{ $message->name }}</td>
                                 <td>{{ $message->email }}</td>
                                 <td>{{ $message->subject }}</td>
                                 <td>
                                    <a href="{{ route('delete.message', $message->id) }}" class="btn btn-danger sm"
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
