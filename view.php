<?php

require 'function.php';

$id_pemeriksaan = $_GET['id_pemeriksaan'];

$data = tampil("SELECT * FROM pemeriksaan WHERE id_pemeriksaan = '$id_pemeriksaan'");

$data2 = tampil("SELECT * FROM pemeriksaan a INNER JOIN pasien b ON a.id_pasien = b.id_pasien WHERE id_pemeriksaan = '$id_pemeriksaan'");

$data3 = tampil("SELECT * FROM pemeriksaan a INNER JOIN bidan b ON a.id_bidan = b.id_bidan WHERE id_pemeriksaan = '$id_pemeriksaan'");

$data4 = tampil("SELECT * FROM pemeriksaan a INNER JOIN obat b ON a.id_pasien = b.id_pasien WHERE id_pemeriksaan = '$id_pemeriksaan'");

$data5 = tampil("SELECT * FROM pemeriksaan a INNER JOIN anamnesis b ON a.id_pasien = b.id_pasien WHERE id_pemeriksaan = '$id_pemeriksaan'");

$data6 = tampil("SELECT * FROM pemeriksaan a INNER JOIN persalinan b ON a.id_pasien = b.id_pasien INNER JOIN bidan c ON a.id_bidan = c.id_bidan WHERE id_pemeriksaan = '$id_pemeriksaan'");

date_default_timezone_set('Asia/Jakarta');

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
                    <div class="col-sm-5 col-4">
                        <h4 class="page-title">Rekam Medis</h4>
                    </div>
                    <div class="col-sm-7 col-8 text-right m-b-30">
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-white"><a href="cetak.php?id_pemeriksaan=<?= $id_pemeriksaan = $_GET['id_pemeriksaan'];?>" target="_blank" ><i class="fa fa-file-pdf-o fa-lg"></i> PDF</a></button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row custom-invoice">
                                    <div class="col-6 col-sm-6 m-b-20">
                                        <img src="assets/img/logo-dark.png" class="inv-logo" alt="">
                                        <ul class="list-unstyled">
                                            <li>Bidan Susi Sulastri</li>
                                            <li>Belahan, Wedoro, Kec. Waru</li>
                                            <li>Kab. Sidoarjo, Jawa Timur, 61256</li>
                                            <li>088237945655</li>
                                        </ul>
                                    </div>
                                    <div class="col-6 col-sm-6 m-b-20">
                                        <div class="invoice-details">
                                        	<?php foreach ($data as $mts) : ?>
                                            <h3 class="text-uppercase">rekam medis <br>#<?= $mts['id_pasien'];?></h3>
                                            <?php endforeach; ?>
                                            <ul class="list-unstyled">
                                            	<li>Time: <span><?= date("h:i:s a") ?></span></li>
                                                <li>Date: <span><?= date('d-m-Y') ?></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-lg-6 m-b-20">
                                        
                                            <h4>Rekam Medis to:</h4>
                                            <ul class="list-unstyled">
                                            	<?php foreach ($data2 as $mts) : ?>
                                                <li>
                                                    <h5><strong><?= $mts['nama_pasien'];?></strong></h5>
                                                </li>
                                                <li><span><?= $mts['tanggal_daftar'];?></span></li>
                                                <li><?= $mts['nama_suami'];?></li>
                                                <li><?= $mts['telepon_pasien'];?></li>
                                                <li><?= $mts['alamat'];?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        
                                    </div>
                                    <div class="col-sm-6 col-lg-6 m-b-20">
                                        <div class="invoices-view">
                                            <h4><span class="text-muted">Detail Bidan :</span> <span class="text-right"><i class="fa fa-user-md"></i></span></h4>
                                            <ul class="list-unstyled invoice-payment-details">
                                            	<?php foreach ($data3 as $mts) : ?>
                                                <li>
                                                    <h5><strong>Nama Bidan : <span class="text-right"><?= $mts['nama_bidan'];?></span></strong></h5>
                                                </li>
                                                <li>No Telepon : <span><?= $mts['telepon_bidan'];?></span></li>
                                                <li>Alamat : <span><?= $mts['alamat'];?></span></li>
                                                <?php endforeach; ?>
											</ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                    	<h4>Hasil Pemeriksaan</h4>
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Pasien</th>
                                        		<th>Tanggal Periksa</th>
                                        		<th>Kunjungan Ke</th>
                                        		<th>Keluhan</th>
                                        		<th>Diagnosa</th>
                                        		<th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php foreach ($data as $mts) : ?>
                                            <tr>
                                            	<td><i class="fa fa-check-circle"></i></td>
                                                <td><?= $mts['nama_pasien']; ?></td>
                                            	<td><?= $mts['tanggal_periksa']; ?></td>
                                            	<td><?= $mts['kunjungan']; ?></td>
                                            	<td><?= $mts['keluhan']; ?></td>
                                            	<td><?= $mts['diagnosa']; ?></td>
                                            	<td><?= $mts['keterangan']; ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                    	<h4>Obat</h4>
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Obat</th>
                                        		<th>Jenis Obat</th>
                                        		<th>Fungsi</th>
                                        		<th>Komposisi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php foreach ($data4 as $mts) : ?>
                                            <tr>
                                            	<td><i class="fa fa-check-circle"></i></td>
                                                <td><?= $mts['nama_obat']; ?></td>
                                            	<td><?= $mts['jenis_obat']; ?></td>
                                            	<td><?= $mts['fungsi']; ?></td>
                                            	<td><?= $mts['komposisi']; ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                    	<h4>Anamnesis</h4>
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Riwayat Penyakit</th>
                                        		<th>Jumlah Keguguran</th>
                                        		<th>Cara Persalinan</th>
                                        		<th>Kehamilan Ke</th>
                                        		<th>Tekanan Darah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php foreach ($data5 as $mts) : ?>
                                            <tr>
                                            	<td><i class="fa fa-check-circle"></i></td>
                                                <td><?= $mts['riwayat_penyakit']; ?></td>
                                            	<td><?= $mts['jml_keguguran']; ?></td>
                                            	<td><?= $mts['cara_persalinan']; ?></td>
                                            	<td><?= $mts['kehamilan']; ?></td>
                                            	<td><?= $mts['tekanan_darah']?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-responsive">
                                    <table class="datatable table table-stripped ">
                                    	<h4>Persalinan</h4>
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Bidan</th>
                                        		<th>Tanggal Persalinan</th>
                                        		<th>Jenis Persalinan</th>
                                        		<th>Status Lahir</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php foreach ($data6 as $mts) : ?>
                                            <tr>
                                            	<td><i class="fa fa-check-circle"></i></td>
                                                <td><?= $mts['nama_bidan']; ?></td>
                                            	<td><?= $mts['tanggal_persalinan']; ?></td>
                                            	<td><?= $mts['jenis_persalinan']; ?></td>
                                            	<td><?= $mts['status_lahir']; ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div>
                                    <div class="invoice-info">
                                        <p class="text-muted"><i class="fa fa-copyright"></i> Sistem Informasi Bidan 2020</p>
                                    </div>
                                </div>
                            </div>
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
    <script src="assets/js/Chart.bundle.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/app.js"></script>

</body>
</html>