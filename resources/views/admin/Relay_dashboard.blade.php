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
                 <div class="col-md-12">
                     <!-- TABLE: LATEST ORDERS -->
                     <div class="card">
                         <div class="card-header border-transparent">
                             <h3 class="card-title">Latest Orders</h3>

                             <div class="card-tools">
                                 <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                     <i class="fas fa-minus"></i>
                                 </button>
                                 <button type="button" class="btn btn-tool" data-card-widget="remove">
                                     <i class="fas fa-times"></i>
                                 </button>
                             </div>
                         </div>
                         <!-- /.card-header -->
                         <div class="card-body p-0">
                             <div class="table-responsive">
                                 <table class="table m-0">
                                     <thead>
                                         <tr>
                                             <th>Relay ID</th>
                                             <th>Description</th>
                                             <th>Status</th>
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
                                                 <div class="checkbox">
                                                     <label>
                                                         <input type="checkbox" data-toggle="toggle"
                                                             data-relayid="{{ $data->Relay_ID }}" @if ($data->Status ==
                                                         1) checked @endif>
                                                     </label>
                                                 </div>
                                             </td>
                                         </tr>
                                         @endforeach
                                     </tbody>
                                 </table>
                             </div>
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