<?php

//Koneksi Ke Database
$conn = mysqli_connect("localhost", "root", "", "db_bidan");

//Function Tampil Data
function tampil($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}
	return $rows;
}

//Function Tambah Data
function tambah_pasien($data){
	global $conn;

	$id_pasien = $data['id_pasien'];
	$nama_pasien = htmlspecialchars($data['nama_pasien']);
	$tanggal_daftar = htmlspecialchars($data['tanggal_daftar']);
	$tanggal_daftar = date('Y-m-d', strtotime($tanggal_daftar));
	$umur = htmlspecialchars($data['umur']);
	$nama_suami = htmlspecialchars($data['nama_suami']);
	$pekerjaan = htmlspecialchars($data['pekerjaan']);
	$alamat = htmlspecialchars($data['alamat']);
	$telepon_pasien = htmlspecialchars($data['telepon_pasien']);

	$query = "INSERT INTO pasien VALUES ('$id_pasien','$nama_pasien','$tanggal_daftar','$umur','$nama_suami','$pekerjaan','$telepon_pasien','$alamat')";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);

}

function tambah_bidan($data){
	global $conn;

	$id_bidan = $data['id_bidan'];
	$nama_bidan = htmlspecialchars($data['nama_bidan']);
	$alamat = htmlspecialchars($data['alamat']);
	$telepon_bidan = htmlspecialchars($data['telepon_bidan']);
	$foto = $_FILES['foto']['name'];
	$sumber = $_FILES['foto']['tmp_name'];
	$folder = './assets/img/';

	//untuk memindahkan foto ke folder yang telah di buat
	move_uploaded_file($sumber, $folder.$foto);

	$query = "INSERT INTO bidan VALUES ('$id_bidan','$foto','$nama_bidan','$alamat','$telepon_bidan')";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function tambah_obat($data){
	global $conn;

	$id_obat = $data['id_obat'];
    $id_pasien = htmlspecialchars($data['id_pasien']);
    $nama_obat = htmlspecialchars($data['nama_obat']);
    $jenis_obat = htmlspecialchars($data['jenis_obat']);
    $fungsi = htmlspecialchars($data['fungsi']);
    $komposisi = htmlspecialchars($data['komposisi']);

    $query = "INSERT INTO obat VALUES ('$id_obat','$id_pasien','$nama_obat','$jenis_obat','$fungsi','$komposisi')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function tambah_anamnesis($data){
	global $conn;

	$id_anamnesis = $data['id_anamnesis'];
    $id_pasien = htmlspecialchars($data['id_pasien']);
    $riwayat_penyakit = htmlspecialchars($data['riwayat_penyakit']);
    $jml_keguguran = htmlspecialchars($data['jml_keguguran']);
    $cara_persalinan = htmlspecialchars($data['cara_persalinan']);
    $kehamilan = htmlspecialchars($data['kehamilan']);
    $tekanan_darah = htmlspecialchars($data['tekanan_darah']);

    $query = "INSERT INTO anamnesis VALUES ('$id_anamnesis','$id_pasien','$riwayat_penyakit','$jml_keguguran','$cara_persalinan','$kehamilan','$tekanan_darah')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function tambah_persalinan($data){
	global $conn;

	$id_persalinan = $data['id_persalinan'];
    $id_pasien = htmlspecialchars($data['id_pasien']);
    $id_bidan = htmlspecialchars($data['id_bidan']);
    $tanggal_persalinan = htmlspecialchars($data['tanggal_persalinan']);
    $tanggal_persalinan = date('Y-m-d', strtotime($tanggal_persalinan));
    $jenis_persalinan = htmlspecialchars($data['jenis_persalinan']);
    $status_lahir = htmlspecialchars($data['status_lahir']);

    $query = "INSERT INTO persalinan VALUES ('$id_persalinan','$id_pasien','$id_bidan','$tanggal_persalinan','$jenis_persalinan','$status_lahir')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function tambah_pemeriksaan($data){
	global $conn;

	$id_pemeriksaan = $data['id_pemeriksaan'];
    $id_pasien = htmlspecialchars($data['id_pasien']);
    $id_bidan = htmlspecialchars($data['id_bidan']);
    $id_obat = htmlspecialchars($data['id_obat']);
    $nama_pasien = htmlspecialchars($data['nama_pasien']);
    $tanggal_periksa = htmlspecialchars($data['tanggal_periksa']);
    $tanggal_periksa = date('Y-m-d', strtotime($tanggal_periksa));
    $kunjungan = htmlspecialchars($data['kunjungan']);
    $keluhan  = htmlspecialchars($data['keluhan']);
    $diagnosa  = htmlspecialchars($data['diagnosa']);
    $keterangan  = htmlspecialchars($data['keterangan']);

    $query = "INSERT INTO pemeriksaan VALUES ('$id_pemeriksaan','$id_pasien','$id_bidan','$id_obat','$nama_pasien','$tanggal_periksa','$kunjungan','$keluhan','$diagnosa','$keterangan')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

//Function Hapus data
function hapus_pasien($id_pasien){
	global $conn;
	mysqli_query($conn, "DELETE FROM pasien WHERE id_pasien = '$id_pasien'");
	return mysqli_affected_rows($conn);
}

function hapus_obat($id_obat){
	global $conn;
	mysqli_query($conn, "DELETE FROM obat wHERE id_obat = '$id_obat'");
	return mysqli_affected_rows($conn);
}

function hapus_anamnesis($id_anamnesis){
	global $conn;
	mysqli_query($conn, "DELETE FROM anamnesis wHERE id_anamnesis = '$id_anamnesis'");
	return mysqli_affected_rows($conn);
}

function hapus_persalinan($id_persalinan){
	global $conn;
	mysqli_query($conn, "DELETE FROM persalinan wHERE id_persalinan = '$id_persalinan'");
	return mysqli_affected_rows($conn);
}

function hapus_pemeriksaan($id_pemeriksaan){
	global $conn;
	mysqli_query($conn, "DELETE FROM pemeriksaan wHERE id_pemeriksaan = '$id_pemeriksaan'");
	return mysqli_affected_rows($conn);
}

function hapus_bidan($id_bidan){
	global $conn;
	mysqli_query($conn, "DELETE FROM bidan wHERE id_bidan = '$id_bidan'");
	return mysqli_affected_rows($conn);
}


//function edit data
function edit_pasien($data){
	global $conn;

	$id_pasien = $data['id_pasien'];
	$nama_pasien = htmlspecialchars($data['nama_pasien']);
	$tanggal_daftar = htmlspecialchars($data['tanggal_daftar']);
	$tanggal_daftar = date('Y-m-d', strtotime($tanggal_daftar));
	$umur = htmlspecialchars($data['umur']);
	$nama_suami = htmlspecialchars($data['nama_suami']);
	$pekerjaan = htmlspecialchars($data['pekerjaan']);
	$alamat = htmlspecialchars($data['alamat']);
	$telepon_pasien = htmlspecialchars($data['telepon_pasien']);

	$query = "UPDATE pasien SET nama_pasien = '$nama_pasien', tanggal_daftar = '$tanggal_daftar', umur = '$umur', nama_suami = '$nama_suami', pekerjaan = '$pekerjaan', alamat = '$alamat', telepon_pasien = '$telepon_pasien' wHERE id_pasien = '$id_pasien'";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);

}

function edit_bidan($data){
	global $conn;

	$id_bidan = $data['id_bidan'];
	$nama_bidan = htmlspecialchars($data['nama_bidan']);
	$alamat = htmlspecialchars($data['alamat']);
	$telepon_bidan = htmlspecialchars($data['telepon_bidan']);
	$foto = $_FILES['foto']['name'];
	$sumber = $_FILES['foto']['tmp_name'];
	$folder = './assets/img/';

	//untuk memindahkan foto ke folder yang telah di buat
	move_uploaded_file($sumber, $folder.$foto);

	$query = "UPDATE bidan SET foto = '$foto', nama_bidan = '$nama_bidan', alamat = '$alamat', telepon_bidan = '$telepon_bidan' WHERE id_bidan = '$id_bidan'";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function edit_obat($data){
	global $conn;

	$id_obat = $data['id_obat'];
    $id_pasien = htmlspecialchars($data['id_pasien']);
    $nama_obat = htmlspecialchars($data['nama_obat']);
    $jenis_obat = htmlspecialchars($data['jenis_obat']);
    $fungsi = htmlspecialchars($data['fungsi']);
    $komposisi = htmlspecialchars($data['komposisi']);

    $query = "UPDATE obat SET id_pasien = '$id_pasien', nama_obat = '$nama_obat', jenis_obat = '$jenis_obat', fungsi = '$fungsi', komposisi = '$komposisi' WHERE id_obat = '$id_obat'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function edit_anamnesis($data){
	global $conn;

	$id_anamnesis = $data['id_anamnesis'];
    $id_pasien = htmlspecialchars($data['id_pasien']);
    $riwayat_penyakit = htmlspecialchars($data['riwayat_penyakit']);
    $jml_keguguran = htmlspecialchars($data['jml_keguguran']);
    $cara_persalinan = htmlspecialchars($data['cara_persalinan']);
    $kehamilan = htmlspecialchars($data['kehamilan']);
    $tekanan_darah = htmlspecialchars($data['tekanan_darah']);

    $query = "UPDATE anamnesis SET id_pasien = '$id_pasien', riwayat_penyakit = '$riwayat_penyakit', jml_keguguran = '$jml_keguguran', cara_persalinan = '$cara_persalinan', kehamilan = '$kehamilan', tekanan_darah = '$tekanan_darah' wHERE id_anamnesis = '$id_anamnesis'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function edit_persalinan($data){
	global $conn;

	$id_persalinan = $data['id_persalinan'];
    $id_pasien = htmlspecialchars($data['id_pasien']);
    $id_bidan = htmlspecialchars($data['id_bidan']);
    $tanggal_persalinan = htmlspecialchars($data['tanggal_persalinan']);
    $tanggal_persalinan = date('Y-m-d', strtotime($tanggal_persalinan));
    $jenis_persalinan = htmlspecialchars($data['jenis_persalinan']);
    $status_lahir = htmlspecialchars($data['status_lahir']);

    $query = "UPDATE persalinan SET id_pasien = '$id_pasien', id_bidan = '$id_bidan', tanggal_persalinan = '$tanggal_persalinan', jenis_persalinan = '$jenis_persalinan', status_lahir = '$status_lahir' wHERE id_persalinan = '$id_persalinan'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function edit_pemeriksaan($data){
	global $conn;

	$id_pemeriksaan = $data['id_pemeriksaan'];
    $id_pasien = htmlspecialchars($data['id_pasien']);
    $id_bidan = htmlspecialchars($data['id_bidan']);
    $id_obat = htmlspecialchars($data['id_obat']);
    $nama_pasien = htmlspecialchars($data['nama_pasien']);
    $tanggal_periksa = htmlspecialchars($data['tanggal_periksa']);
    $kunjungan = htmlspecialchars($data['kunjungan']);
    $keluhan  = htmlspecialchars($data['keluhan']);
    $diagnosa  = htmlspecialchars($data['diagnosa']);
    $keterangan  = htmlspecialchars($data['keterangan']);

    $query = "UPDATE pemeriksaan SET id_pasien = '$id_pasien', id_bidan = '$id_bidan', id_obat = '$id_obat', nama_pasien = '$nama_pasien', tanggal_periksa = '$tanggal_periksa', kunjungan = '$kunjungan', keluhan = '$keluhan', diagnosa = '$diagnosa', keterangan = '$keterangan' wHERE id_pemeriksaan = '$id_pemeriksaan'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


?>

