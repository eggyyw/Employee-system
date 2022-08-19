<?php
    include 'connect.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;            

    require_once "kirim-email/library/PHPMailer.php";
    require_once "kirim-email/library/Exception.php";
    require_once "kirim-email/library/OAuth.php";
    require_once "kirim-email/library/POP3.php";
    require_once "kirim-email/library/SMTP.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Identifikasi Bahaya</title>
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body class="bg-light">
    <?php 
		if(ISSET($_SESSION['id'])){
    ?>			
    <?php
        $s="select*from user where id='$_SESSION[id]'";
        $qu= mysqli_query($con, $s);
        $fe=mysqli_fetch_assoc($qu);
        if(isset($_POST['sub'])){
            $a=$_POST['nama_pelapor'];
            $b=$_POST['tanggal'];
            $c=$_POST['dept'];
            $d=$_POST['dept_terkait'];
            $g=$_POST['lok_area'];
            $e=$_POST['lok_lain'];
            $f=$g.$e;
            $h=$_POST['lokasi'];
            $i=$_POST['kondisi'];
            $j=$_POST['rekomendasi'];
            $k=$_POST['tindakan'];
            $l=$_POST['status'];
            $m=$_POST['kategori'];
            $alpa=$_POST['duedate'];
            $n = date('d-m-Y h:i a', strtotime($alpa, strtotime($b)));
            $n2 = date('Y-m-d H:i:s',strtotime($n)); 
            if($_FILES['f1']['name']){
                move_uploaded_file($_FILES['f1']['tmp_name'], "bukti/".$_FILES['f1']['name']);
                $img="bukti/".$_FILES['f1']['name'];
                $gambar="http://localhost/e-sebuku/bukti/".$_FILES['f1']['name'];
            }else{
                $img="";
                $gambar="Tidak Ada Foto";
            }
            $pos="insert into greencard(id,nama_pelapor,tanggal,dept,dept_terkait,
            lok_area,lokasi,kondisi,rekomendasi,tindakan,status,remark,foto,kategori,duedate)
            value
            ('','$a','$b','$c','$d','$f','$h','$i','$j','$k','$l','tidak ada','$img','$m','$n2')";
            mysqli_query($con, $pos);
            $idisi="select*from greencard where tanggal='$b'";
            $idqu= mysqli_query($con, $idisi);
            $idfe=mysqli_fetch_assoc($idqu);
            $idnya=$idfe['id'];
            $poslagi="SELECT DATE_ADD(`duedate`, INTERVAL 1 DAY) from greencard where MAX(id)";
            mysqli_query($con, $poslagi);
            $date=$b;
            $tgl = date_create($date);
            $formatted_date = date_format($tgl, 'd-m-Y h:i a'); 
            $tgl2 = date_create($n);
            $formatted_date2 = date_format($tgl2, 'd-m-Y h:i a'); 
                $mail = new PHPMailer;
             
                //Enable SMTP debugging. 
                $mail->SMTPDebug = 3;                               
                //Set PHPMailer to use SMTP.
                $mail->isSMTP();            
                //Set SMTP host name                          
                $mail->Host = "mail.sebukucoalgroup.co.id"; //host mail server
                //Set this to true if SMTP host requires authentication to send email
                $mail->SMTPAuth = true;                          
                //Provide username and password     
                $mail->Username = "eggy.winanto@sebukucoalgroup.co.id";   //nama-email smtp          
                $mail->Password = "ITc0r3stc";           //password email smtp
                //If SMTP requires TLS encryption then set it
                $mail->SMTPSecure = "ssl";                           
                //Set TCP port to connect to 
                $mail->Port = 465;                                   
             
                $mail->From = "eggy.winanto@sebukucoalgroup.co.id"; //email pengirim
                $mail->FromName = "System IT Employee (Greencard)"; //nama pengirim
             
                $mail->addAddress("eggy.it@gmail.com", "Eggy Yuli Winanto"); //email penerima
             
                $mail->isHTML(true);
             
                $mail->Subject = "Laporan Greencard Lokasi ($f - $h) untuk Dept $d"; //subject
                $Body= "
                            <table class='table'>
                                <tr>
                                    <td><b>Nama Pelapor</b></td><td>:</td><td>$a($c)</td>
                                </tr>
                                <tr>
                                    <td><b>Tanggal</b></td><td>:</td><td>$formatted_date</td>
                                </tr>
                                <tr>
                                    <td><b>Departemen Terkait</b></td><td>:</td><td>$d</td>
                                </tr>
                                <tr>
                                    <td><b>Lokasi Area</b></td><td>:</td><td>($f) $h</td>
                                </tr>
                                <tr>
                                    <td><b>Kategori</b></td><td>:</td><td>$m</td>
                                </tr>
                                <tr>
                                    <td><b>Due Date</b></td><td>:</td><td>$formatted_date2</td>
                                </tr>
                                <tr>
                                    <td><b>Kondisi / Tindakan Bahaya yang ditemukan</b></td><td>:</td><td>$i</td>
                                </tr>
                                <tr>
                                    <td><b>Rekomendasi Tindakan Perbaikan</b></td><td>:</td><td>$j</td>
                                </tr>
                                <tr>
                                    <td><b>Tindakan Perbaikan yang sudah dilakukan</b></td><td>:</td><td>$k</td>
                                </tr>
                                <tr>
                                    <td><b>URL Foto</b></td><td>:</td><td>$gambar</td>
                                </tr>
                                <tr> 
                                    <td><b>Status</b></td><td>:</td>
                                    <td>
                                        $l
                                    </td>
                                </tr> 
                         </table> 
                         <br><br>
                         Note : Mohon dapat segera melakukan tindakan mengenai laporan greencard tsb. <br>
                         URL Aplikasi : http://localhost/e-sebuku
                         <br>
 
                         <br>Terima kasih.<br>
                        <br>
                         Best Regards,<br>
                         System IT Employee (Greencard)

                ";
                $mail->Body    = $Body; //isi email
                $mail->IsHTML(true);
                $mail->AltBody = "PHP mailer"; //body email (optional)
            	if(!$mail->send()) 
                    {
                    } 
                    else 
                    {
                    }
                    header("Location: greencardreport.php");
        }
    ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <p style="text-align:right">Anda Login Sebagai : <b><?php echo $fe['name'];?></b> | <a href="logout.php">Logout</a></p>
                <p>&larr; <a href="home.php">Home</a>
                <p>&larr; <a href="greencardreport.php">Greencard Report</a>
                <h4>Kartu Identifikasi Bahaya</h4>
                <p>Sebuku Coal Group (Green Card Hazard Report)</p>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="text">Nama Pelapor<font color="Red">*</font></label>
                        <input class="form-control" type="text" name="nama_pelapor" value="<?php echo $fe['name'];?>" readonly/>
                    </div>
                    <div class="form-group">
                        <label for="text">Departemen<font color="Red">*</font></label>
                        <input class="form-control" type="text" name="dept" value="<?php echo $fe['dep'];?>" readonly/>
                    </div>
                    <div class="form-group">
                        <label for="text">Hari / Tanggal<font color="Red">*</font></label>
                        <input class="form-control" type="datetime-local" name="tanggal" placeholder="Jawaban Anda" required/>
                    </div>
                    <div class="form-group">
                        <label for="dep">Departemen Terkait<font color="Red">*</font></label>
                        <select class="form-control" name="dept_terkait" required>
                        <option>-Pilih-</option>
                            <option>ITC</option>
                            <option>SCM</option>
                            <option>Sales/Marketing</option>
                            <option>Finance Accounting</option>
                            <option>Logistic</option>
                            <option>HRGA</option>
                            <option>MEP</option>
                            <option>technical Services</option>
                            <option>Shipping</option>
                            <option>CPP</option>
                            <option>HSE</option>
                            <option>Prodev</option>
                            <option>CSR</option>
                            <option>Legal</option>
                            <option>GIS</option>
                            <option>Hilcon Jaya Sakti</option>
                            <option>Hanwa</option>
                            <option>AWDU</option>
                            <option>ARCO</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="text">Lokasi Area<font color="Red">*</font> :
                        <br>
                            <input for="nik" type="radio" name="lok_area" value="Kantor" />
                            <label>Kantor</label><br>
                            <input for="nik" type="radio" name="lok_area" value="Tambang/PIT" />
                            <label>Tambang/PIT</label><br>
                            <input for="nik" type="radio" name="lok_area" value="Workshop" />
                            <label>Workshop</label><br>
                            <input for="nik" type="radio" name="lok_area" value="CPP" />
                            <label>CPP</label><br>
                            <input for="nik" type="radio" name="lok_area" value="Jetty" />
                            <label>Jetty</label><br>
                            <input for="nik" type="radio" name="lok_area" value="Mess" />
                            <label>Mess</label><br>
                            <input for="nik" type="radio" name="lok_area" value="Jalan Hauling" />
                            <label>Jalan Hauling</label><br>
                            <input for="nik" type="radio" name="lok_area" value="TPS LB3" />
                            <label>TPS LB3</label><br>
                            <input for="nik" type="radio" name="lok_area" value="Nursery" />
                            <label>Nursery</label><br>
                            <input for="nik" type="radio" name="lok_area" data-for="s"/>
                            <label>Lainnya :</label>
                            <input class="form-control" type="text" name="lok_lain" />
                    </div>
                    <div class="form-group">
                        <label for="text">Lokasi / Area secara spesifik<font color="Red">*</font></label>
                        <input class="form-control" type="text" name="lokasi" placeholder="Jawaban Anda" required/>
                    </div>
                    <div class="form-group">
                        <label for="text">Kondisi / Tindakan Bahaya yang ditemukan<font color="Red">*</font></label>
                        <input class="form-control" type="text" name="kondisi" placeholder="Jawaban Anda" required/>
                    </div>
                    <div class="form-group">
                        <label for="nik">Rekomendasi Tindakan Perbaikan<font color="Red">*</font></label>
                        <input class="form-control" type="text" name="rekomendasi" placeholder="Jawaban Anda" required/>
                    </div>
                    <div class="form-group">
                        <label for="nik">Tindakan Perbaikan yang sudah dilakukan</label>
                        <input class="form-control" type="text" name="tindakan" placeholder="Jawaban Anda"/>
                    </div>
                    <div class="mb-3">
                        <label for="f1" class="form-label">Upload Foto Kejadian</label>
                        <input class="form-control" type="file" name="f1">
                    </div>
                    <div class="form-group">
                        <label for="dep">Kategori<font color="Red">*</font></label>
                        <select class="form-control" name="kategori" required>
                        <option>-Pilih-</option>
                            <option>TTA / Tindakan Tidak Aman</option>
                            <option>KTA / Kondisi Tidak Aman</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Due Date<font color="Red">*</font></label>
                        <select class="form-control" name="duedate" required>
                            <option>-Pilih-</option>
                            <option value="+1 days">1 Hari</option>
                            <option value="+2 days">2 Hari</option>
                            <option value="+7 days">1 Minggu</option>
                            <option value="+14 days">2 Minggu</option>
                            <option value="+1 month">1 Bulan</option>
                        </select>
                    </div>

                    <div class="form-group">
                    <label for="dep">Status<font color="Red">*</font></label>
                        <select class="form-control" name="status" required>
                            <option>-Pilih-</option>
                            <option>Open</option>
                            <option>On Progress</option>
                            <option>Close</option>
                        </select>
                    </div>

                    <input type="submit" class="btn btn-success btn-block" name="sub" value="Kirim" />
                    
                </form>
                <br>
                <center>© 2022 Copyright SCG All Rights reserved</center>             
                <br><br>
            </div>

        </div>
    </div>
    <?php
   	    }else{ 
	?>
	Anda tidak boleh mengakses halaman ini. <br>
    silahkan <a href="login.php">Login dahulu</a>
    <?php 
	    } 
    ?>
</body>
</html>
