<?php

session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

    require 'function.php';

    //membuat id otomatis
    $query = "SELECT max(id_bidan) as id_bidan From bidan";
    $hasil = mysqli_query($conn,$query);
    $data = mysqli_fetch_array($hasil);
    $id_bidan = $data['id_bidan'];
    $auto_id = (int) substr($id_bidan, 3, 5);
    $auto_id++;
    $char = "BDN";
    $id_bidan = $char.sprintf("%03s",$auto_id);

    //proses submit data
    if(isset($_POST['submit'])){
        if( tambah_bidan($_POST) > 0){
            echo "<script>
                setTimeout(function(){
                    Swal.fire({
                        icon: 'success',
                        title: 'Data berhasil ditambahkan',
                        timer: 3000,
                        showConfirmButton: true
                    });
                },20);
                window.setTimeout(function(){
                    window.location.replace('bidan.php');
                },3000);
                </script>";
        } else {
            echo "
            <script>
            setTimeout(function(){
                Swal.fire({
                    icon: 'error',
                    title: 'Data gagal ditambahkan',
                    text: 'Periksa kembali kondingan'
                });
            },20);
            </script>";
        }
    }

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
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="dist/sweetalert2.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="dist/sweetalert2.min.css">

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
                    <a class="dropdown-item" href="index.php">Keluar</a>
                </div>
            </div>		
		</div>
		<div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Main</li>
                        <li>
                            <a href="index.php"><i class="fa fa-home"></i> <span>Home</span></a>
                        </li>
                        <li class="active">
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
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Tambah Data Bidan</h4>
                    </div>
                </div>
                <header>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                            <input type="hidden" name="id_bidan" value="<?php echo $id_bidan?>">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Foto</label>
                                        <div class="profile-upload">
                                            <div class="upload-img">
                                                <img alt="" src="assets/img/user.jpg">
                                            </div>
                                            <div class="upload-input">
                                                <input type="file" class="form-control" name="foto" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nama Bidan <span class="text-danger">*</span></label>
                                        <input type="text" name="nama_bidan" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Alamat <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="alamat" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>NO Telepon <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="telepon_bidan" required>
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-20 text-center">
                                <button type="submit" name="submit" class="btn btn-primary submit-btn">Tambah Data</button>
                            </div>
                        </form>
                    </div>
                </div>
                </header>
            </div>
        </div>	
	</div>
	<div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="dist/sweetalert2.all.min.js"></script>
    <script src="dist/sweetalert2.all.js"></script>
    <script src="dist/sweetalert2.js"></script>
    <script src="dist/sweetalert2.min.js"></script>
    
</body>
</html>