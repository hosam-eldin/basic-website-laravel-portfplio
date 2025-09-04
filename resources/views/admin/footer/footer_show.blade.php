@extends('admin.admin_master')
@section('admin')
   <div class="page-content">
      <div class="container-fluid">

         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-body">

                     <h4 class="card-title">Footer Page</h4><br><br>


                     <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                           <tr>
                              <th>number</th>
                              <th>Email</th>
                              <th>Address</th>

                              <th>twitter</th>
                              <th>Actions</th>

                           </tr>
                        </thead>


                        <tbody>


                           <tr>
                              <td>{{ $footer->number }}</td>
                              <td>{{ $footer->email }}</td>
                              <td>{{ $footer->adress }}</td>

                              <td>{{ $footer->twitter }}</td>


                              <td>
                                 <a href="{{ route('edit.footer', $footer->id) }}" class="btn btn-info sm"
                                    title="Edit Data"> <i class="fas fa-edit"></i> </a>
                                 <a href="{{ route('delete.footer', $footer->id) }}" class="btn btn-danger sm"
                                    title="Delete Data" id="delete"> <i class="fas fa-trash-alt"></i> </a>
                              </td>

                           </tr>


                        </tbody>
                     </table>

                  </div>
               </div>
            </div> <!-- end col -->
         </div> <!-- end row -->


      </div>
   </div>

  
@endsection
