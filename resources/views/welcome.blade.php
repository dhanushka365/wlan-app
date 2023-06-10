


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WLAN Edge Computing</title>

    <!-- Laravel 9 AdminLTE CSS -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url ('admin/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ url ('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url ('admin/css/adminlte.min.css')}}">

    <!-- Custom CSS -->
    <style>
        /* Add your custom styles here */
        body {
            background-color: #343a40;
            color: #ffffff;
        }

        .intro-header {
            padding: 100px 0;
            text-align: center;
        }

        .intro-header h1 {
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 30px;
            color: #000000; /* Set heading color to black */
        }

        .intro-text {
            font-size: 20px;
            margin-bottom: 50px;
            color: #000000; /* Set intro text color to black */
        }

        .card {
            background-color: #454d55;
            color: #ffffff;
        }

        .card-header {
            background-color: #343a40;
            border-bottom: none;
        }

        .card-header h3 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 0;
        }

        .card-body {
            padding: 30px;
        }

        .next-button {
            display: inline-block;
            background-color: #007bff;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .next-button:hover {
            background-color: #0056b3;
        }

        @media (max-width: 767px) {
            .intro-header h1 {
                font-size: 36px;
            }

            .intro-text {
                font-size: 18px;
            }
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Add your logo and navbar content here -->
        </nav>

        <!-- Main Sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Add your sidebar content here -->
        </aside>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <!-- Content Header -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 intro-header">
                            <h1>SmartLAN-WLAN Edge Computing</h1>
                            <p class="intro-text">Empowering Next-Generation Applications</p>
                            <a href=" {{url ('admin/login')}}" class="next-button">Next</a> <!-- Replace "another-page.html" with the actual URL of the next page -->
                        </div>
                    </div>
                </div>
            </section>

            <!-- Main Content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Surveillance Video Processing</h3>
                                </div>
                                <div class="card-body">
                                    <p>WLAN Edge Computing provides a powerful solution for real-time surveillance video processing. By leveraging edge computing capabilities, surveillance cameras can offload video processing tasks to nearby WLAN access points. This reduces latency and network congestion, allowing for faster and more efficient video analysis. With WLAN Edge Computing, surveillance systems can detect and respond to events in real-time, enhancing security and situational awareness.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Smart Home</h3>
                                </div>
                                <div class="card-body">
                                    <p>Transform your home into a smart and connected environment with WLAN Edge Computing. By integrating edge computing capabilities into smart home devices, such as thermostats, security systems, and appliances, you can enhance automation and responsiveness. WLAN access points act as edge computing nodes, enabling local processing and decision-making. This minimizes reliance on cloud services and improves privacy and response time. With WLAN Edge Computing, your smart home becomes more efficient, secure, and personalized.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Footer -->
        <footer class="main-footer">
            <!-- Add your footer content here -->
        </footer>
    </div>

    <!-- Laravel 9 AdminLTE JS -->
   <!-- Laravel 9 AdminLTE JS -->
   <script src="{{ url ('admin/plugins/jquery/jquery.min.js')}}">
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ url ('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}">
    </script>
    <!-- AdminLTE App -->
    <script src="{{ url ('admin/js/adminlte.min.js')}}"></script>
</body>

</html>
