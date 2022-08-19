<?php
include'connect.php';
if(isset($_POST['sub'])){
    $t=$_POST['text'];
    $u=$_POST['nik'];
    $p=$_POST['pass'];
    if($_FILES['f1']['name']){
    move_uploaded_file($_FILES['f1']['tmp_name'], "image/".$_FILES['f1']['name']);
    $img="image/".$_FILES['f1']['name'];
    }
    else{
        $img=$_POST['img1'];
    }
    $i="update user set name='$t',nik='$u',password='$p',image='$img' where id='$_SESSION[id]'";
    mysqli_query($con, $i);
    header('location:home.php');
}
     $s="select*from user where id='$_SESSION[id]'";
    $qu= mysqli_query($con, $s);
    $f=mysqli_fetch_assoc($qu);
    ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi Karyawan</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>

<body class="bg-light">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
        <p>&larr; <a href="home.php">Back</a>
    
<form method="POST" enctype="multipart/form-data">
            <table>
            <div class="form-group">
                <label for="text">Nama Lengkap</label>
                <input class="form-control" type="text" name="text" readonly value="<?php echo $f['name']?>"/>
            </div>

            <div class="form-group">
                <label for="text">NIK</label>
                <input class="form-control" type="text" name="nik" readonly value="<?php echo $f['nik']?>"/>
            </div>

            <div class="form-group">
                <label for="pass">Password</label>
                <input class="form-control" type="password" name="pass"  value="<?php echo $f['password']?>" />
            </div>

            
            
            <div class="mb-3">
                <label for="f1" class="form-label">Foto Profil</label>
                <img src="<?php echo $f['image']?>" width="100px" height="100px">
                        <input type="file" name="f1">
                        <input type="hidden" name="img1" value="<?php echo $f['image']?>">
            </div>

            <input type="submit" class="btn btn-success btn-block" name="sub" value="submit" />
</div>
</form>
            

        
    </div>
</div>

</body>
</html>