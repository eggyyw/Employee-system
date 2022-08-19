<?php
include'connect.php';
if(isset($_POST['sub'])){
    $u=addslashes(trim($_POST['nik']));
    $p=addslashes($_POST['pass']);
    $s= "select * from user where nik='$u' and password= '$p'";   
   $qu= mysqli_query($con, $s);
   if(mysqli_num_rows($qu)>0){
    $f= mysqli_fetch_assoc($qu);
    $_SESSION['id']=$f['id'];
    header ('location:home.php');
}else{
    echo 'INFO : username atau password tidak ada';
}}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login SCG</title>
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <p>&larr; <a href="index.php">Home</a>
            <h4>Silahkan Login untuk Melanjutkan </h4>
            <p>Belum punya akun? <a href="mailto:admin.it2@sebukucoalgroup.com">Hubungi Department IT</a></p>
            <form action="" method="POST">
                <div class="col-md-6">
                    <img class="img img-responsive" src="img/index.png" />
                </div>
                <div class="form-group">
                    <label for="username">NIK</label>
                    <input class="form-control" type="text" name="nik" placeholder="Masukkan NIK Anda" />
                </div>
                <div class="form-group">
                    <label for="pass">Password</label>
                    <input class="form-control" type="password" name="pass" placeholder="Masukan 4 Digit Terakhir NIK Anda " />
                </div>
                <input type="submit" class="btn btn-success btn-block" name="sub" value="submit" />
                <?php
                    
                ?>            
            
            </form>
            <br>
            <center>© 2022 Copyright SCG All Rights reserved</center>             
            <br><br>
        </div>
    </div>
</div>
    
</body>
</html>