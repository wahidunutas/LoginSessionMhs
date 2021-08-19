<?php
$koneksi = mysqli_connect("localhost", "root", "", "loginsession");
session_start();

if(!isset($_SESSION["akses"])){
    header("location:login.php");
}

$id = $_SESSION['akses']['id'];
$sql = $koneksi->query("SELECT * FROM akses WHERE id='$id'");
$data = $sql->fetch_assoc();
?>

<title>Login Session</title>
<h4>LOGIN SESSION DOSEN/MAHASISWA MENGGUNAKAN PHP-MYSQL</h4>

Halo <b><?= $data['nama'];?></b>, Anda Login Sebagai <b><?= $_SESSION['akses']['role'];?></b>, Dengan NIP <b><?= $data['nip'];?></b><br>
<ul>
    <?php
        if($_SESSION["akses"]['role']=="Dosen"){
            echo"<li>Ini Adalah Hak Akses Dosen</li>";
            echo"<li><a href='logout.php'>Logout</a></li>";
        }else{
            echo"<li>Ini Adalah Hak Akses Mahasiswa</li>";
            echo"<li><a href='logout.php'>Logout</a></li>";
        }
    ?>
    
</ul>