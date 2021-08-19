<?php 
session_start();
$koneksi = mysqli_connect("localhost", "root", "", "loginsession");
?>
<title>Login Session</title>
<h4>Login Form</h4>
<form method="post">
    <input type="text" name="nip" placeholder="Input NIP"><br>
    <input type="password" name="password" placeholder="Input Password"><br>
    <button type="submit" name="login">Login</button>
</form>

<?php
if(isset($_POST['login'])){
    $nip = $_POST['nip'];
    $pw = $_POST['password'];

    // mengecek apakah data yang di input ada di database
    $sql = $koneksi->query("SELECT * FROM akses WHERE nip='$nip' AND password='$pw'");
    $result = mysqli_num_rows($sql);

    if($result == 1){
        $akun = $sql->fetch_assoc();

        if($akun['role'] == "Dosen"){
            $_SESSION['akses'] = $akun;
            echo"<script>alert('Login Berhasil');document.location='index.php';</script>"; 
        }elseif($akun['role'] == "Mahasiswa"){
            $_SESSION['akses'] = $akun;
            echo"<script>alert('Login Berhasil');document.location='index.php';</script>"; 
        }

    }else{
        echo"<script>alert('pastikan nip/password benar dan pastikan anda sudah terdaftar');
        Document.location='login.php';</script>";

    }
}
?>