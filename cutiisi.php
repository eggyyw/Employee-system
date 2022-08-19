<?php
include 'connect.php';
if(isset($_POST['sub'])){
    $a=$_POST['email'];
    $b=$_POST['nama'];
    $c=$_POST['nik'];
    $d=$_POST['jabatan'];
    $e=$_POST['dept'];
    $f=$_POST['poh'];
    $g=$_POST['periode_kerja'];
    $h=$_POST['jadwal_cuti'];
    $i=$_POST['tgl_mulai_cuti'];
    $j=$_POST['tgl_kmbli_cuti'];
    $k=$_POST['tgl_kompss_ph'];
    $l=$_POST['tgl_untuk_ph'];
    $m=$_POST['jadwal_off'];
    $n=$_POST['jadwal_mulai_efektif_kerja'];
    $o=$_POST['job_pending'];
    $p=$_POST['penerima_jp'];
    $q=$_POST['alamat_cuti'];
    $r=$_POST['hp'];
    $s=$_POST['bantuan_transport'];
/*!  */;
    $t=$_POST['realisasi'];

    $u=$_POST['keterangan'];
    $v=$_POST['email_diatas_atasan'];
    $w=$_POST['email_atasan'];
    $pos="insert into cuti(email,nama,nik,jabatan,dept,
    poh,periode_kerja,jadwal_cuti,tgl_mulai_cuti,
    tgl_kmbli_cuti,tgl_kompss_ph,tgl_untuk_ph,jadwal_off,
    jadwal_mulai_efektif_kerja,job_pending,penerima_jp,
    alamat_cuti,hp,bantuan_transport,realisasi,
    keterangan,email_diatas_atasan,email_atasan)
    value
    ('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m'
    ,'$n','$o','$p','$q','$r','$s','','$u','$v','$w')";
    mysqli_query($con, $pos);
/*!
    $to      = 'eggy.winanto@sebukucoalgroup.co.id';
    $subject = 'Permohonan Cuti Lapangan';
    $message = 'hello';
    $headers = 'From: eggy.winanto@sebukucoalgroup.co.id' . "\r\n" .
    'Reply-To: eggy.winanto@sebukucoalgroup.co.id' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    mail($to, $subject, $message, $headers);
 */;

    }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Permohonan Cuti Lapangan</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">

        <p>&larr; <a href="index.php">Home</a>

        <h4>Form Permohonan Cuti Lapangan</h4>
        <p>Sebuku Coal Group <a href="login.php">Login di sini</a></p>

        <form action="" method="POST" enctype="multipart/form-data">

        <div class="form-group">
                <label for="text">Email</label>
                <input class="form-control" type="text" name="email" placeholder="Jawaban Anda" />
            </div>

            <div class="form-group">
                <label for="text">Nama Pemohon</label>
                <input class="form-control" type="text" name="nama" placeholder="Jawaban Anda" />
            </div>

            <div class="form-group">
                <label for="text">NIK</label>
                <input class="form-control" type="text" name="nik" placeholder="Jawaban Anda" />
            </div>

            <div class="form-group">
                <label for="text">Jabatan</label>
                <input class="form-control" type="text" name="jabatan" placeholder="Jawaban Anda" />
            </div>

            <div class="form-group">
                <label for="text">Dept</label>
                <input class="form-control" type="text" name="dept" placeholder="Jawaban Anda" />
            </div>

            <div class="form-group">
                <label for="text">POH</label>
                <input class="form-control" type="text" name="poh" placeholder="Jawaban Anda" />
            </div>

            <div class="form-group">
                <label for="text">Periode Bekerja Lapangan</label>
                <input class="form-control" type="text" name="periode_kerja" placeholder="Jawaban Anda" />
            </div>

            <div class="form-group">
                <label for="text">Jadwal Cuti Lapangan</label>
                <input class="form-control" type="text" name="jadwal_cuti" placeholder="Jawaban Anda" />
            </div>

            <div class="form-group">
                <label for="nik">Tanggal Mulai Pengambilan Cuti Lapangan</label>
                <input class="form-control" type="date" name="tgl_mulai_cuti" placeholder="Jawaban Anda" />
            </div>
            <div class="form-group">
                <label for="nik">Tanggal Kembali Pengambilan Cuti Lapangan</label>
                <input class="form-control" type="date" name="tgl_kmbli_cuti" placeholder="Jawaban Anda" />
            </div>
            <div class="form-group">
                <label for="nik">Tanggal Pengambilan Kompensasi PH</label>
                <input class="form-control" type="date" name="tgl_kompss_ph" placeholder="Jawaban Anda" />
            </div>
            <div class="form-group">
                <label for="nik">Untuk PH Tanggal</label>
                <input class="form-control" type="date" name="tgl_untuk_ph" placeholder="Jawaban Anda" />
            </div>
            <div class="form-group">
                <label for="nik">Jadwal Off</label>
                <input class="form-control" type="date" name="jadwal_off" placeholder="Jawaban Anda" />
            </div>
            <div class="form-group">
                <label for="nik">Jadwal Mulai Efektif Kerja</label>
                <input class="form-control" type="date" name="jadwal_mulai_efektif_kerja" placeholder="Jawaban Anda" />
            </div>
            <div class="form-group">
                <label for="nik">Job Pending</label>
                <input class="form-control" type="text" name="job_pending" placeholder="Jawaban Anda" />
            </div>
            <div class="form-group">
                <label for="nik">Penerima Job Pending</label>
                <input class="form-control" type="text" name="penerima_jp" placeholder="Jawaban Anda" />
            </div>
            <div class="form-group">
                <label for="nik">Alamat Cuti Lapangan</label>
                <input class="form-control" type="text" name="alamat_cuti" placeholder="Jawaban Anda" />
            </div>
            <div class="form-group">
                <label for="nik">Nomor Handphone</label>
                <input class="form-control" type="text" name="hp" placeholder="Jawaban Anda" />
            </div>
            <div class="form-group">
                <label for="nik">Bantuan Transport</label>
                <input class="form-control" type="text" name="bantuan_transport" placeholder="Jawaban Anda" />
            </div>
<!--
-->

            <div class="form-group">
                <label>Permintaan Realisasi Bantuan Transport</label>
                <br>
                <input for="nik"  type="radio" name="realisasi" value="tunai" />
                <label> Tunai </label><br>
                <input for="nik" type="radio" name="realisasi" value="transfer" />
                <label> Transfer </label>

            </div>
            <div class="form-group">
                <label for="nik">Keterangan</label>
                <input class="form-control" type="text" name="keterangan" placeholder="Jawaban Anda" />
            </div>
            <div class="form-group">
                <label for="nik">Email Setingkat diatas Atasan Langsung</label>
                <input class="form-control" type="text" name="email_diatas_atasan" placeholder="Jawaban Anda" />
            </div>
            <div class="form-group">
                <label for="nik">Email Atasan Langsung</label>
                <input class="form-control" type="text" name="email_atasan" placeholder="Jawaban Anda" />
            </div>
            <input type="submit" class="btn btn-success btn-block" name="sub" value="Kirim" />
            <br><br><br><br><br>
        </form>
            
        </div>

    </div>
</div>

</body>
</html>
