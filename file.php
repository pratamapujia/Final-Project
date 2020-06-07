<?php 

require 'function.php';


  	//function registrasi
function register($data){
	global $conn;

	$username = strtolower(stripslashes($data['username']));
	$password = mysqli_real_escape_string($conn, $data['password']);
	$password2 = mysqli_real_escape_string($conn, $data['password2']);

	//cek username sudah ada apa belum
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username' ");

	if(mysqli_fetch_assoc($result)){
		echo "<script>
        	Swal.fire({
                icon: 'warning',
                title: 'Username sudah terdaftar'
            });
        </script>";
        return false;
	}

	//cek konfirmasi pasword
	if($password !== $password2){
		echo "<script>
        	Swal.fire({
                icon: 'warning',
                title: 'Password tidak sesuai!!'
            });
        </script>";
		return false;
	}

	//enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	//menambah user ke database
	mysqli_query($conn, "INSERT INTO user VALUES('','$username','$password')");

	return mysqli_affected_rows($conn);

}
?>

<head>
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Sistem Informasi Bidan</title>
	<link rel='stylesheet' type='text/css' href='dist/sweetalert2.css'>
    <link rel='stylesheet' type='text/css' href='dist/sweetalert2.min.css'>
</head>
<body>
	<script src='dist/sweetalert2.all.min.js'></script>
	<script src='dist/sweetalert2.all.js'></script>
    <script src='dist/sweetalert2.js'></script>
    <script src='dist/sweetalert2.min.js'></script>
</body>