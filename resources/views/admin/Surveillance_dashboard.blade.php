@extends('admin.layout.layout')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">CC TV</h1>
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


    <div class="row">
        <div class="col-sm-3">
            <!-- <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
            </div> -->
            <img src="http://127.0.0.1:5000/video_feed_1" class="center-block" width="80%" alt="Offline"/>
        </div>
        <div class="col-sm-3">
            <!-- <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
            </div> -->
            <img src="http://127.0.0.1:5000/video_feed_2" width="80%" alt="Offline"/>
        </div>
        <div class="col-sm-3">
            <!-- <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
            </div> -->
            <img src="http://127.0.0.1:5000/video_feed_3" width="80%" alt="Offline"/>
        </div>
        <div class="col-sm-3">
            <!-- <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="http://127.0.0.1:5000/video_feed_1"></iframe>
            </div> -->
            <img src="http://127.0.0.1:5000/video_feed_4" width="80%" alt="Offline"/>
        </div>
    </div>

    <br>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <!-- your dynamic table -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Event Table</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Event Name</th>
                                        <th>Event Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($events as $event)
                                    <tr>
                                        <td>{{ $event->event_name }}</td>
                                        <td>{{ $event->event_time }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
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