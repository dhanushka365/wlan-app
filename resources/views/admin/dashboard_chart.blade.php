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
             <div class="row">
                 <div class="col-md-12">
                     <div class="card">
                         <div class="card-header">
                             <h5 class="card-title">Actual vs Forecast</h5>

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


                                     <div class="chart">
                                         <!-- Sales Chart Canvas -->
                                         <canvas id="canvas" height="85" style="height: 85px;"></canvas>
                                         <button onclick="updateChart()">Fetch</button>
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
             </div>
             <!-- /.row -->
         </div>
         <!--/. container-fluid -->
     </section>
     <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->
 @endsection
 @section('scripts')
 @parent
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
 <script>
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [],
        datasets: [{
            label: 'Speed',
            data: [],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            xAxes: [],
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
var updateChart = function() {
    $.ajax({
        url: "http://localhost:8000/device/chart",
        type: 'GET',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
            myChart.data.labels = data.labels;
            myChart.data.datasets[0].data = data.data;
            myChart.update();
        },
        error: function(data) {
            console.log(data);
        }
    });
}

updateChart();
setInterval(() => {
    updateChart();
}, 100);
 </script>

 @endsection