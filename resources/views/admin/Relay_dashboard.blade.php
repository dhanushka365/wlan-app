 @extends('admin.layout.layout')
 @section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1 class="m-0">Dashboard v2</h1>
                 </div><!-- /.col -->
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="#">Home</a></li>
                         <li class="breadcrumb-item active">Dashboard v2</li>
                     </ol>
                 </div><!-- /.col -->
             </div><!-- /.row -->
         </div><!-- /.container-fluid -->
     </div>
     <!-- /.content-header -->

     <!-- Main content -->
     <section class="content">
         <div class="container-fluid">
             <!-- Info boxes -->
             <div class="row">
                 <div class="col-12 col-sm-6 col-md-3">
                     <div class="info-box">
                         <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                         <div class="info-box-content">
                             <span class="info-box-text">CPU Traffic</span>
                             <span class="info-box-number">
                                 10
                                 <small>%</small>
                             </span>
                         </div>
                         <!-- /.info-box-content -->
                     </div>
                     <!-- /.info-box -->
                 </div>
                 <!-- /.col -->
                 <div class="col-12 col-sm-6 col-md-3">
                     <div class="info-box mb-3">
                         <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                         <div class="info-box-content">
                             <span class="info-box-text">Likes</span>
                             <span class="info-box-number">41,410</span>
                         </div>
                         <!-- /.info-box-content -->
                     </div>
                     <!-- /.info-box -->
                 </div>
                 <!-- /.col -->

                 <!-- fix for small devices only -->
                 <div class="clearfix hidden-md-up"></div>

                 <div class="col-12 col-sm-6 col-md-3">
                     <div class="info-box mb-3">
                         <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                         <div class="info-box-content">
                             <span class="info-box-text">Sales</span>
                             <span class="info-box-number">760</span>
                         </div>
                         <!-- /.info-box-content -->
                     </div>
                     <!-- /.info-box -->
                 </div>
                 <!-- /.col -->
                 <div class="col-12 col-sm-6 col-md-3">
                     <div class="info-box mb-3">
                         <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                         <div class="info-box-content">
                             <span class="info-box-text">New Members</span>
                             <span class="info-box-number">2,000</span>
                         </div>
                         <!-- /.info-box-content -->
                     </div>
                     <!-- /.info-box -->
                 </div>
                 <!-- /.col -->
             </div>
             <!-- /.row -->

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
                                         <tr>
                                             <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                             <td>Call of Duty IV</td>
                                             <td><span class="badge badge-success">Shipped</span></td>
                                             <td>
                                                 <div class="checkbox">
                                                     <label>
                                                         <input type="checkbox" data-toggle="toggle">
                                                     </label>
                                                 </div>
                                             </td>
                                         </tr>
                                         <tr>
                                             <td><a href="pages/examples/invoice.html">OR1848</a></td>
                                             <td>Samsung Smart TV</td>
                                             <td><span class="badge badge-warning">Pending</span></td>
                                             <td>
                                                 <div class="checkbox">
                                                     <label>
                                                         <input type="checkbox" data-toggle="toggle">
                                                     </label>
                                                 </div>
                                             </td>
                                         </tr>
                                         <tr>
                                             <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                             <td>iPhone 6 Plus</td>
                                             <td><span class="badge badge-danger">Delivered</span></td>
                                             <td>
                                                 <div class="checkbox">
                                                     <label>
                                                         <input type="checkbox" data-toggle="toggle">
                                                     </label>
                                                 </div>
                                             </td>
                                         </tr>
                                         <tr>
                                             <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                             <td>Samsung Smart TV</td>
                                             <td><span class="badge badge-info">Processing</span></td>
                                             <td>
                                                 <div class="checkbox">
                                                     <label>
                                                         <input type="checkbox" data-toggle="toggle">
                                                     </label>
                                                 </div>
                                             </td>
                                         </tr>
                                     </tbody>
                                 </table>
                             </div>
                             <!-- /.table-responsive -->
                         </div>
                         <!-- /.card-body -->
                         <div class="card-footer clearfix">
                             <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New
                                 Order</a>
                             <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All
                                 Orders</a>
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