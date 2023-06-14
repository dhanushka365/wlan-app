 @extends('admin.layout.layout')
 @section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1 class="m-0">Dashboard Relay Control</h1>
                 </div><!-- /.col -->
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="#">Home</a></li>
                         <li class="breadcrumb-item active">Relay Control</li>
                     </ol>
                 </div><!-- /.col -->
             </div><!-- /.row -->
         </div><!-- /.container-fluid -->
     </div>
     <!-- /.content-header -->

     <!-- Main content -->
     <section class="content">
         <div class="container-fluid">
             <!-- Main row -->
             <div class="row">
                 <!-- Left col -->
                 <div class="col-12">
                     <!-- TABLE: LATEST ORDERS -->
                     <div class="card">
                         <div class="card-header">
                             <h3 class="card-title">Relay Table</h3>
                         </div>
                         <!-- /.card-header -->
                         <div class="card-body">
                             <table id="relaytbl" class="table table-bordered table-striped">
                                 <thead>
                                     <tr>
                                         <th>Relay ID</th>
                                         <th>Status</th>
                                         <th>Description</th>
                                         <th>ON/OFF</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     @foreach ($relayData as $data)
                                     <tr>
                                         <td>{{ $data->Relay_ID }}</td>
                                         <td>
                                             @if ($data->Status == 1)
                                             <span class="badge badge-success">Running</span>
                                             @else
                                             <span class="badge badge-danger">Terminated</span>
                                             @endif
                                         </td>
                                         <td>{{ $data->Relay_Type }}</td>
                                         <td>
                                             <form action="{{ route('device.update_status') }}" method="POST">
                                                 @csrf
                                                 <input type="hidden" name="relayId" value="{{ $data->Relay_ID }}">
                                                 <input type="hidden" name="newStatus"
                                                     value="{{ $data->Status == 1 ? '0' : '1' }}">
                                                 <button type="submit"
                                                     class="btn btn-sm {{ $data->Status == 1 ? 'btn-success' : 'btn-danger' }}">
                                                     {{ $data->Status == 1 ? 'ON' : 'OFF' }}</button>
                                             </form>
                                         </td>
                                     </tr>
                                     @endforeach
                                 </tbody>
                             </table>
                             <!-- /.table-responsive -->
                         </div>
                         <!-- /.card-body -->
                         <div class="card-footer clearfix">

                         </div>
                         <!-- /.card-footer -->
                     </div>
                     <!-- /.card -->
                 </div>
                 <!-- /.card -->
             </div>
             <!-- /.col -->
         </div>
         <!-- /.row -->
 </div>
 <!--/. container-fluid -->
 </section>
 <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->
 @endsection