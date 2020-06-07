<?php
	
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

require 'function.php';

$tampil = mysqli_query($conn, "SELECT * FROM bidan");
$tampil2 = mysqli_query($conn, "SELECT * FROM pasien");
$tampil3 = mysqli_query($conn, "SELECT * FROM anamnesis");
$tampil4 = mysqli_query($conn, "SELECT * FROM persalinan");

$jumlah = mysqli_num_rows($tampil);
$jumlah2 = mysqli_num_rows($tampil2);
$jumlah3 = mysqli_num_rows($tampil3);
$jumlah4 = mysqli_num_rows($tampil4);

$label = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];


// for($bulan = 1; $bulan < 13;$bulan++)
// {
//     $query = mysqli_query($conn, "SELECT  * AS jum FROM pasien WHERE MONTH(tanggal_daftar) = $bulan");
//     $row = mysqli_num_rows($query);
//     $jum[] = $row['jum'];
// }

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Sistem Informasi Bidan</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <script type="text/javascript" src="assets/Chart.js"></script>
    
</head>
<body>
	<div class="main-wrapper">
		<div class="header">
			<div class="header-left">
				<a href="index.php" class="logo">
					<img src="assets/img/logo.png" width="35" height="35" alt=""> <span><h4>Sistem Informasi Bidan</h4></span>
				</a>
			</div>
			<a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img">
							<img class="rounded-circle" src="assets/img/user.jpg" width="24" alt="Admin">
						</span>
						<span>Admin</span>
                    </a>	
					<div class="dropdown-menu">
						<a class="dropdown-item" href="logout.php">Keluar</a>
					</div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="logout.php">Keluar</a>
                </div>
            </div>		
		</div>
		<div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Main</li>
                        <li class="active">
                            <a href="index.php"><i class="fa fa-home"></i> <span>Home</span></a>
                        </li>
                        <li>
                            <a href="bidan.php"><i class="fa fa-user-md"></i> <span>Bidan</span></a>
                        </li>
						<li>
                            <a href="pasien.php"><i class="fa fa-wheelchair"></i> <span>Pasien</span></a>
                        </li>
                        <li>
                            <a href="obat.php"><i class="fa fa-medkit"></i> <span>Obat</span></a>
                        </li>
						<li class="submenu">
							<a href="#"><i class="fa fa-file-archive-o"></i> <span> Rekam Medis </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="anamnesis.php">Anamnesis</a></li>
								<li><a href="persalinan.php">Persalinan</a></li>
								<li><a href="pemeriksaan.php">Pemeriksaan</a></li>
							</ul>
						</li>
					</ul>
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg2"><i class="fa fa-user-md" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3><?= $jumlah; ?></h3>
                                <span class="widget-title2">Bidan <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg1"><i class="fa fa-user-o"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3><?= $jumlah2; ?></h3>
                                <span class="widget-title1">Pasien <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg2"><i class="fa fa-heartbeat" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3><?= $jumlah3; ?></h3>
                                <span class="widget-title2">Anamnesis <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg1"><i class="fa fa-heart" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3><?= $jumlah4; ?></h3>
                                <span class="widget-title1">Persalinan <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="chart-title">
                                    <h4>Total Pasien</h4>
                                </div style="width: 800px;height: 800px">  
                                <canvas id="myChart"></canvas>
                            </div>
                            <script>
                            var ctx = document.getElementById("myChart").getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: <?php echo json_encode($label); ?>,
                                    datasets: [{
                                    label: 'Grapich Total Pasien',
                                        data: [
                                        <?php 
                                        $jumlah_1 = mysqli_query($conn,"SELECT * FROM pasien where MONTH(tanggal_daftar)=1");
                                        echo mysqli_num_rows($jumlah_1);
                                        ?>, 
                                        <?php 
                                        $jumlah_2 = mysqli_query($conn,"SELECT * FROM pasien where MONTH(tanggal_daftar)=2");
                                        echo mysqli_num_rows($jumlah_2);
                                        ?>, 
                                        <?php 
                                        $jumlah_3 = mysqli_query($conn,"SELECT * FROM pasien where MONTH(tanggal_daftar)=3");
                                        echo mysqli_num_rows($jumlah_3);
                                        ?>, 
                                        <?php 
                                        $jumlah_3 = mysqli_query($conn,"SELECT * FROM pasien where MONTH(tanggal_daftar)=4");
                                        echo mysqli_num_rows($jumlah_3);
                                        ?>,
                                        <?php 
                                        $jumlah_3 = mysqli_query($conn,"SELECT * FROM pasien where MONTH(tanggal_daftar)=5");
                                        echo mysqli_num_rows($jumlah_3);
                                        ?>,
                                        <?php 
                                        $jumlah_3 = mysqli_query($conn,"SELECT * FROM pasien where MONTH(tanggal_daftar)=6");
                                        echo mysqli_num_rows($jumlah_3);
                                        ?>,
                                        <?php 
                                        $jumlah_3 = mysqli_query($conn,"SELECT * FROM pasien where MONTH(tanggal_daftar)=7");
                                        echo mysqli_num_rows($jumlah_3);
                                        ?>,
                                        <?php 
                                        $jumlah_3 = mysqli_query($conn,"SELECT * FROM pasien where MONTH(tanggal_daftar)=8");
                                        echo mysqli_num_rows($jumlah_3);
                                        ?>,
                                        <?php 
                                        $jumlah_3 = mysqli_query($conn,"SELECT * FROM pasien where MONTH(tanggal_daftar)=9");
                                        echo mysqli_num_rows($jumlah_3);
                                        ?>,
                                        <?php 
                                        $jumlah_3 = mysqli_query($conn,"SELECT * FROM pasien where MONTH(tanggal_daftar)=10");
                                        echo mysqli_num_rows($jumlah_3);
                                        ?>,
                                        <?php 
                                        $jumlah_3 = mysqli_query($conn,"SELECT * FROM pasien where MONTH(tanggal_daftar)=11");
                                        echo mysqli_num_rows($jumlah_3);
                                        ?>,
                                        <?php 
                                        $jumlah_4 = mysqli_query($conn,"SELECT * FROM pasien where MONTH(tanggal_daftar)=12");
                                        echo mysqli_num_rows($jumlah_4);
                                        ?>
                                        ],
                                        backgroundColor: [
                                        'rgba(0, 255, 255, 0.1)',
                                        'rgba(0, 255, 255, 0.3)',
                                        'rgba(255, 255, 0, 0.3)',
                                        'rgba(255, 0, 0, 0.3)',
                                        'rgba(255, 0, 255, 0.3)',
                                        'rgba(2, 99, 95, 0.3)',
                                        'rgba(128, 0, 128, 0.3)',
                                        'rgba(0, 128, 128, 0.3)',
                                        'rgba(255, 6, 6, 0.3)',
                                        'rgba(2, 206, 86, 0.3)',
                                        'rgba(255, 2, 86, 0.3)',
                                        'rgba(255, 206, 8, 0.3)'
                                        ],
                                        borderColor: [
                                        'rgba(0, 0, 255, 1)',
                                        'rgba(0, 255, 255, 1)',
                                        'rgba(255, 255, 0, 1)',
                                        'rgba(255, 0, 0, 1)',
                                        'rgba(255, 0, 255, 1)',
                                        'rgba(2, 99, 95, 1)',
                                        'rgba(128, 0, 128, 1)',
                                        'rgba(0, 128, 128, 1)',
                                        'rgba(255, 6, 6, 1)',
                                        'rgba(2, 206, 86, 1)',
                                        'rgba(255, 2, 86, 1)',
                                        'rgba(255, 206, 8, 1)'
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero:true
                                            }
                                        }]
                                    }
                                }
                            });
                        </script>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="chart-title">
                                    <h4>Jumlah Pemeriksaan Pasien</h4>
                                </div>  
                                <canvas id="myChart2"></canvas>
                            </div>
                            <script>
                            var ctx = document.getElementById("myChart2").getContext('2d');
                            var myChart2 = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: <?php echo json_encode($label); ?>,
                                    datasets: [{
                                    label: 'Grapich Total Pemeriksaan',
                                        data: [
                                        <?php 
                                        $jumlah_1 = mysqli_query($conn,"SELECT * FROM pasien where MONTH(tanggal_daftar)=12");
                                        echo mysqli_num_rows($jumlah_1);
                                        ?>, 
                                        <?php 
                                        $jumlah_2 = mysqli_query($conn,"SELECT * FROM pasien where MONTH(tanggal_daftar)=11");
                                        echo mysqli_num_rows($jumlah_2);
                                        ?>, 
                                        <?php 
                                        $jumlah_3 = mysqli_query($conn,"SELECT * FROM pasien where MONTH(tanggal_daftar)=10");
                                        echo mysqli_num_rows($jumlah_3);
                                        ?>, 
                                        <?php 
                                        $jumlah_3 = mysqli_query($conn,"SELECT * FROM pasien where MONTH(tanggal_daftar)=9");
                                        echo mysqli_num_rows($jumlah_3);
                                        ?>,
                                        <?php 
                                        $jumlah_3 = mysqli_query($conn,"SELECT * FROM pasien where MONTH(tanggal_daftar)=8");
                                        echo mysqli_num_rows($jumlah_3);
                                        ?>,
                                        <?php 
                                        $jumlah_3 = mysqli_query($conn,"SELECT * FROM pasien where MONTH(tanggal_daftar)=7");
                                        echo mysqli_num_rows($jumlah_3);
                                        ?>,
                                        <?php 
                                        $jumlah_3 = mysqli_query($conn,"SELECT * FROM pasien where MONTH(tanggal_daftar)=6");
                                        echo mysqli_num_rows($jumlah_3);
                                        ?>,
                                        <?php 
                                        $jumlah_3 = mysqli_query($conn,"SELECT * FROM pasien where MONTH(tanggal_daftar)=5");
                                        echo mysqli_num_rows($jumlah_3);
                                        ?>,
                                        <?php 
                                        $jumlah_3 = mysqli_query($conn,"SELECT * FROM pasien where MONTH(tanggal_daftar)=4");
                                        echo mysqli_num_rows($jumlah_3);
                                        ?>,
                                        <?php 
                                        $jumlah_3 = mysqli_query($conn,"SELECT * FROM pasien where MONTH(tanggal_daftar)=3");
                                        echo mysqli_num_rows($jumlah_3);
                                        ?>,
                                        <?php 
                                        $jumlah_3 = mysqli_query($conn,"SELECT * FROM pasien where MONTH(tanggal_daftar)=2");
                                        echo mysqli_num_rows($jumlah_3);
                                        ?>,
                                        <?php 
                                        $jumlah_4 = mysqli_query($conn,"SELECT * FROM pasien where MONTH(tanggal_daftar)=1");
                                        echo mysqli_num_rows($jumlah_4);
                                        ?>
                                        ],
                                        backgroundColor: [
                                        'rgba(0, 0, 255, 0.3)',
                                        'rgba(0, 255, 255, 0.3)',
                                        'rgba(255, 255, 0, 0.3)',
                                        'rgba(255, 0, 0, 0.3)',
                                        'rgba(255, 0, 255, 0.3)',
                                        'rgba(2, 99, 95, 0.3)',
                                        'rgba(128, 0, 128, 0.3)',
                                        'rgba(0, 128, 128, 0.3)',
                                        'rgba(255, 6, 6, 0.3)',
                                        'rgba(2, 206, 86, 0.3)',
                                        'rgba(255, 2, 86, 0.3)',
                                        'rgba(255, 206, 8, 0.3)'
                                        ],
                                        borderColor: [
                                        'rgba(0, 0, 255, 1)',
                                        'rgba(0, 255, 255, 1)',
                                        'rgba(255, 255, 0, 1)',
                                        'rgba(255, 0, 0, 1)',
                                        'rgba(255, 0, 255, 1)',
                                        'rgba(2, 99, 95, 1)',
                                        'rgba(128, 0, 128, 1)',
                                        'rgba(0, 128, 128, 1)',
                                        'rgba(255, 6, 6, 1)',
                                        'rgba(2, 206, 86, 1)',
                                        'rgba(255, 2, 86, 1)',
                                        'rgba(255, 206, 8, 1)'
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero:true
                                            }
                                        }]
                                    }
                                }
                            });
                        </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>	
	</div>
	<div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <!-- <script src="assets/js/Chart.bundle.js"></script> -->
    <script src="assets/js/app.js"></script>

</body>
</html>