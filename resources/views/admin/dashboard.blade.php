 @extends('admin.layout.layout')
 @section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1 class="m-0">Dashboard Energy Meter</h1>
                 </div><!-- /.col -->
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="#">Home</a></li>
                         <li class="breadcrumb-item active">Dashboard Energy Meter</li>
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
                         <span class="info-box-icon bg-info elevation-1"><i class="fas fa-info"></i></span>

                         <div class="info-box-content">
                             <span class="info-box-text">Volatge</span>
                             <span class="info-box-number">
                                 {{ $energyData->voltage }}
                             </span>

                         </div>
                         <!-- /.info-box-content -->
                     </div>
                     <!-- /.info-box -->
                 </div>
                 <!-- /.col -->
                 <div class="col-12 col-sm-6 col-md-3">
                     <div class="info-box mb-3">
                         <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-info"></i></span>

                         <div class="info-box-content">
                             <span class="info-box-text">Power</span>
                             <span class="info-box-number">{{ $energyData->power }}</span>
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
                         <span class="info-box-icon bg-success elevation-1"><i class="fas fa-info"></i></span>

                         <div class="info-box-content">
                             <span class="info-box-text">Current</span>
                             <span class="info-box-number">{{ $energyData->current }}</span>
                         </div>
                         <!-- /.info-box-content -->
                     </div>
                     <!-- /.info-box -->
                 </div>
                 <!-- /.col -->
                 <div class="col-12 col-sm-6 col-md-3">
                     <div class="info-box mb-3">
                         <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-info"></i></span>

                         <div class="info-box-content">
                             <span class="info-box-text">Energy</span>
                             <span class="info-box-number">{{ $energyData->energy }}</span>
                         </div>
                         <!-- /.info-box-content -->
                     </div>
                     <!-- /.info-box -->
                 </div>
                 <!-- /.col -->
             </div>
             <!-- /.row -->

             <div class="row">
                 <div class="col-md-8">
                     <div class="card">
                         <div class="card-header">
                             <h5 class="card-title">Live Energy vs time</h5>

                             <div class="card-tools">
                                 <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                     <i class="fas fa-minus"></i>
                                 </button>
                                 <div class="btn-group">
                                     <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                                         <i class="fas fa-wrench"></i>
                                     </button>
                                     <div class="dropdown-menu dropdown-menu-right" role="menu">
                                         <a href="#" class="dropdown-item">Action</a>
                                         <a href="#" class="dropdown-item">Another action</a>
                                         <a href="#" class="dropdown-item">Something else here</a>
                                         <a class="dropdown-divider"></a>
                                         <a href="#" class="dropdown-item">Separated link</a>
                                     </div>
                                 </div>
                                 <button type="button" class="btn btn-tool" data-card-widget="remove">
                                     <i class="fas fa-times"></i>
                                 </button>
                             </div>
                         </div>
                         <!-- /.card-header -->
                         <div class="card-body">
                             <div class="row">
                                 <div class="col-md-12">
                                     <p class="text-center">
                                         <strong>{{ $energyData->date }}</strong>
                                     </p>

                                     <div class="chart">
                                         <!-- Sales Chart Canvas -->
                                         <canvas id="canvas1" height="85" style="height: 85px;"></canvas>
                                         <!-- <button onclick="updateChart()">Fetch</button> -->
                                     </div>
                                     <!-- /.chart-responsive -->
                                 </div>
                                 <!-- /.col -->
                                 <!-- /.col -->
                             </div>
                             <!-- /.row -->
                         </div>
                         <!-- ./card-body -->

                         <!-- /.card-footer -->
                     </div>
                     <!-- /.card -->
                 </div>
                 <!-- /.col -->
                 <div class="col-md-4">
                     <div class="card">
                         <div class="card-header">
                             <h5 class="card-title">Live Energy vs time</h5>

                             <div class="card-tools">
                                 <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                     <i class="fas fa-minus"></i>
                                 </button>
                                 <div class="btn-group">
                                     <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                                         <i class="fas fa-wrench"></i>
                                     </button>
                                     <div class="dropdown-menu dropdown-menu-right" role="menu">
                                         <a href="#" class="dropdown-item">Action</a>
                                         <a href="#" class="dropdown-item">Another action</a>
                                         <a href="#" class="dropdown-item">Something else here</a>
                                         <a class="dropdown-divider"></a>
                                         <a href="#" class="dropdown-item">Separated link</a>
                                     </div>
                                 </div>
                                 <button type="button" class="btn btn-tool" data-card-widget="remove">
                                     <i class="fas fa-times"></i>
                                 </button>
                             </div>
                         </div>
                         <!-- /.card-header -->
                         <div class="card-body">
                             <div class="row">
                                 <div class="col-md-12">
                                     <p class="text-center">
                                         <strong>{{ $energyData->date }}</strong>
                                     </p>
                                     <div class="chart d-flex justify-content-center align-items-center">
                                         <!-- Sales Chart Canvas -->
                                         <div id="gauge" height="200" style="height: 200px; font-size: 10px;"></div>
                                         <!-- <button onclick="updateChart()">Fetch</button> -->
                                     </div>
                                     <!-- /.chart-responsive -->
                                 </div>
                                 <!-- /.col -->
                                 <!-- /.col -->
                             </div>
                             <!-- /.row -->
                         </div>
                         <!-- ./card-body -->

                         <!-- /.card-footer -->
                     </div>
                     <!-- /.card -->
                 </div>
             </div>
             <!-- /.row -->

             <!-- Main row -->
             <div class="row">
                 <!-- Left col -->
                 <div class="col-md-12">
                     <!-- MAP & BOX PANE -->
                     <!-- TABLE: LATEST ORDERS -->
                     <div class="card">
                         <!-- /.card-header -->
                         <div class="card-body p-0">
                             <div class="table-responsive">
                                 <table class="table m-0">
                                     <thead>
                                         <tr>
                                             <th>Account No</th>
                                             <th>Voltage</th>
                                             <th>Current</th>
                                             <th>Power</th>
                                             <th>Energy</th>
                                             <th>Frequency</th>
                                             <th>Pf</th>
                                             <th>Date</th>
                                             <th>Time</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         @foreach ($energyDataAll as $data)
                                         @php
                                         $voltage = $data->voltage;$color = '';if ($voltage >= 230 && $voltage <= 245) {
                                             $color='lightgreen' ; } elseif ($voltage> 245) {
                                             $color = 'lightcoral';
                                             }
                                             @endphp
                                             <tr style="background-color: {{ $color }}">
                                                 <td>{{ $data->account_no }}</td>
                                                 <td>{{ $data->voltage }}</td>
                                                 <td>{{ $data->current }}</td>
                                                 <td>{{ $data->power }}</td>
                                                 <td>{{ $data->energy }}</td>
                                                 <td>{{ $data->frequency }}</td>
                                                 <td>{{ $data->pf }}</td>
                                                 <td>{{ $data->date }}</td>
                                                 <td>{{ $data->time}}</td>
                                             </tr>
                                     </tbody>
                                     @endforeach
                                 </table>
                             </div>
                             <!-- /.table-responsive -->
                         </div>
                         <!-- /.card-body -->
                         <!-- /.card-footer -->
                     </div>
                     <!-- /.card -->
                 </div>
                 <!-- /.col -->

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