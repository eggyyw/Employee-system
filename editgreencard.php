<?php
    // include database connection file
    include 'connect.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;            

    require_once "kirim-email/library/PHPMailer.php";
    require_once "kirim-email/library/Exception.php";
    require_once "kirim-email/library/OAuth.php";
    require_once "kirim-email/library/POP3.php";
    require_once "kirim-email/library/SMTP.php";
    // Check if form is submitted for user update, then redirect to homepage after update
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <title>Form Identifikasi Bahaya</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<?php 
        		if(ISSET($_SESSION['id'])){
            ?>
<?php
    // Display selected user data based on id
    // Getting id from url
    $id = $_GET['id'];
    $s="select*from user where id='$_SESSION[id]'";
    $qu= mysqli_query($con, $s);
    $fe=mysqli_fetch_assoc($qu);
    // Fetech user data based on id
    $result = mysqli_query($con, "SELECT * FROM greencard WHERE id=$id");
    
    while($user_data = mysqli_fetch_array($result))
    {
        $nama_pelapor = $user_data['nama_pelapor'];
        $date = $user_data['tanggal'];
        $tgl = date_create($date);
        $tanggal = date_format($tgl, 'd-m-Y h:i a');
        $dept = $user_data['dept'];
        $dept_terkait = $user_data['dept_terkait'];
        $lok_area = $user_data['lok_area'];
        $lokasi = $user_data['lokasi'];
        $kondisi = $user_data['kondisi'];
        $rekomendasi = $user_data['rekomendasi'];
        $tindakan = $user_data['tindakan'];
        $status = $user_data['status'];
        $remark = $user_data['remark'];
        $kategori = $user_data['kategori'];
        $date2 = $user_data['duedate'];
        $tgl2 = date_create($date2);
        $duedate = date_format($tgl2, 'd-m-Y h:i a');
        $image = $user_data['foto'];
        if ($image=='') {
            $imaghasil="Tidak ada gambar";
        } else {
            $imaghasil=$image;
        }
        $upd_onprog = $user_data['upd_onprog'];
        $date3 = $user_data['tgl_onprog'];
        $tgl3 = date_create($date3);
        $tgl_onprog = date_format($tgl3, 'd-m-Y h:i a');
        $foto_onprog = $user_data['foto_onprog'];
        $upd_close = $user_data['upd_close'];
        $date4 = $user_data['tgl_close'];
        $tgl4 = date_create($date4);
        $tgl_close = date_format($tgl4, 'd-m-Y h:i a');
        $foto_close = $user_data['foto_close'];
        $imageonprog = '';
    }
?>
<?php
    if(isset($_POST['form_upd_onprog']))
    {	
        $id = $_POST['id']; 
        $upd_onprog=$_POST['upd_onprog'];
        $tgl_onprog=$_POST['tgl_onprog'];
        $tgl3 = date_create($tgl_onprog);
        $tgl_onprog1 = date_format($tgl3, 'd-m-Y h:i a');
        $status='On Progress';
        if($_FILES['f1']['name']){
            move_uploaded_file($_FILES['f1']['tmp_name'], "bukti/".$_FILES['f1']['name']);
            $img="bukti/".$_FILES['f1']['name'];
            $gambar="http://localhost/e-sebuku/bukti/".$_FILES['f1']['name'];
        }else{
            $img=$_POST['foto_onprog'];
            $gambar="Tidak Ada Foto";
        }                    
                // update user data
                $result = mysqli_query($con, "UPDATE greencard SET upd_onprog='$upd_onprog', tgl_onprog='$tgl_onprog', status='$status', foto_onprog='$img' WHERE id=$id");        
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
             
                $mail->Subject = "On Progress Greencard Lokasi ($lok_area - $lokasi) untuk Dept $dept_terkait"; //subject
                $Body= "
                            <table class='table'>
                                <tr> 
                                    <td colspan='3'><h4><u><font color='green'>On Progress Tindakan</font></u></h4></td>
                                </tr>
                                <tr>
                                    <td><b>Update</b></td><td>:</td><td>$upd_onprog</td>
                                </tr>
                                <tr>
                                    <td><b>Tanggal</b></td><td>:</td><td>$tgl_onprog1</td>
                                </tr>
                                <tr>
                                    <td><b>Foto</b></td><td>:</td><td>$gambar</td>
                                </tr>
                                <tr> 
                                    <td colspan='3'><h4><u><font color='green'>Detail Laporan</font></u></h4></td>
                                </tr>
                                <tr>
                                    <td><b>Nama Pelapor</b></td><td>:</td><td>$nama_pelapor($dept)</td>
                                </tr>
                                <tr>
                                    <td><b>Tanggal</b></td><td>:</td><td>$tanggal</td>
                                </tr>
                                <tr>
                                    <td><b>Departemen Terkait</b></td><td>:</td><td>$dept_terkait</td>
                                </tr>
                                <tr>
                                    <td><b>Lokasi Area</b></td><td>:</td><td>($lok_area) $lokasi</td>
                                </tr>
                                <tr>
                                    <td><b>Kategori</b></td><td>:</td><td>$kategori</td>
                                </tr>
                                <tr>
                                    <td><b>Due Date</b></td><td>:</td><td>$duedate</td>
                                </tr>
                                <tr>
                                    <td><b>Kondisi / Tindakan Bahaya yang ditemukan</b></td><td>:</td><td>$kondisi</td>
                                </tr>
                                <tr>
                                    <td><b>Rekomendasi Tindakan Perbaikan</b></td><td>:</td><td>$rekomendasi</td>
                                </tr>
                                <tr>
                                    <td><b>Tindakan Perbaikan yang sudah dilakukan</b></td><td>:</td><td>$tindakan</td>
                                </tr>
                                <tr>
                                    <td><b>URL Foto</b></td><td>:</td><td>$imagehasil</td>
                                </tr>
                                <tr> 
                                    <td><b>Status</b></td><td>:</td>
                                    <td>
                                        $status
                                    </td>
                                </tr> 
                         </table> 
                         <br><br>
                         Note : Mohon dapat segera melakukan tindakan mengenai laporan greencard tsb. <br>
                         URL Aplikasi : http://localhost/e-sebuku/
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
        // Redirect to homepage to display updated user in list
        header("Location: viewgreencard.php?id=$id");        
    }
    if(isset($_POST['form_upd_close']))
    {	
        $id = $_POST['id']; 
        $upd_close=$_POST['upd_close'];
        $tgl_close=$_POST['tgl_close'];
        $tgl4 = date_create($tgl_close);
        $tgl_close2 = date_format($tgl4, 'd-m-Y h:i a');
        $status='Close';
        if($_FILES['f1']['name']){
            move_uploaded_file($_FILES['f1']['tmp_name'], "bukti/".$_FILES['f1']['name']);
            $img="bukti/".$_FILES['f1']['name'];
            $gambar="http://localhost/e-sebuku/bukti/".$_FILES['f1']['name'];
        }else{
            $img=$_POST['foto_close'];
            $gambar="Tidak Ada Foto";
        }                    
        // update user data
        $result = mysqli_query($con, "UPDATE greencard SET upd_close='$upd_close', tgl_close='$tgl_close', status='$status', foto_close='$img' WHERE id=$id");        
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
        
        $mail->Subject = "Penyelesaian Greencard Lokasi ($lok_area - $lokasi) untuk Dept $dept_terkait"; //subject
        $Body= "
                    <table class='table'>
                        <tr> 
                            <td colspan='3'><h4><u><font color='green'>Penyelesaian Tindakan</font></u></h4></td>
                        </tr>
                        <tr>
                            <td><b>Update</b></td><td>:</td><td>$upd_close</td>
                        </tr>
                        <tr>
                            <td><b>Tanggal</b></td><td>:</td><td>$tgl_close2</td>
                        </tr>
                        <tr>
                            <td><b>Foto</b></td><td>:</td><td>$gambar</td>
                        </tr>
                        <tr> 
                            <td colspan='3'><h4><u><font color='green'>Detail Laporan</font></u></h4></td>
                        </tr>
                        <tr>
                            <td><b>Nama Pelapor</b></td><td>:</td><td>$nama_pelapor($dept)</td>
                        </tr>
                        <tr>
                            <td><b>Tanggal</b></td><td>:</td><td>$tanggal</td>
                        </tr>
                        <tr>
                            <td><b>Departemen Terkait</b></td><td>:</td><td>$dept_terkait</td>
                        </tr>
                        <tr>
                            <td><b>Lokasi Area</b></td><td>:</td><td>($lok_area) $lokasi</td>
                        </tr>
                        <tr>
                            <td><b>Kategori</b></td><td>:</td><td>$kategori</td>
                        </tr>
                        <tr>
                            <td><b>Due Date</b></td><td>:</td><td>$duedate</td>
                        </tr>
                        <tr>
                            <td><b>Kondisi / Tindakan Bahaya yang ditemukan</b></td><td>:</td><td>$kondisi</td>
                        </tr>
                        <tr>
                            <td><b>Rekomendasi Tindakan Perbaikan</b></td><td>:</td><td>$rekomendasi</td>
                        </tr>
                        <tr>
                            <td><b>Tindakan Perbaikan yang sudah dilakukan</b></td><td>:</td><td>$tindakan</td>
                        </tr>
                        <tr>
                                    <td><b>URL Foto</b></td><td>:</td><td>$gambarhasil</td>
                        </tr>
                        <tr> 
                            <td><b>Status</b></td><td>:</td>
                            <td>
                                $status
                            </td>
                        </tr> 
                    </table> 
                    <br><br>
                    Note : Mohon dapat segera melakukan tindakan mengenai laporan greencard tsb. <br>
                    URL Aplikasi: http://localhost/e-sebuku/
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
            // Redirect to homepage to display updated user in list
        header("Location: viewgreencard.php?id=$id");
    }
?>
 
<body class="bg-light">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">           
            <p style="text-align:right">Anda Login Sebagai : <b><?php echo $fe['name'];?></b> | <a href="logout.php">Logout</a></p>			
            <p>&larr; <a href="greencardreport.php">Kembali</a>
                <table class="table">
                    <tr>
                        <td><b>Nama Pelapor</b></td><td>:</td><td><?php echo $nama_pelapor; ?> (<?php echo $dept; ?>)</td>
                    </tr>
                    <tr>
                        <td><b>Tanggal</b></td><td>:</td><td><?php echo $tanggal; ?></td>
                    </tr>
                    <tr>
                        <td><b>Departemen Terkait</b></td><td>:</td><td><?php echo $dept_terkait; ?></td>
                    </tr>
                    <tr>
                        <td><b>Lokasi Area</b></td><td>:</td><td>(<?php echo $lok_area; ?>) <?php echo $lokasi; ?></td>
                    </tr>
                    <tr>
                        <td><b>Kategori</b></td><td>:</td><td><?php echo $kategori; ?></td>
                    </tr>
                    <tr>
                        <td><b>Due Date</b></td><td>:</td><td><?php echo $duedate; ?></td>
                    </tr>
                    <tr>
                        <td><b>Kondisi / Tindakan Bahaya yang ditemukan</b></td><td>:</td><td><?php echo $kondisi; ?></td>
                    </tr>
                    <tr>
                        <td><b>Rekomendasi Tindakan Perbaikan</b></td><td>:</td><td><?php echo $rekomendasi; ?></td>
                    </tr>
                    <tr>
                        <td><b>Tindakan Perbaikan yang sudah dilakukan</b></td><td>:</td><td><?php echo $tindakan; ?></td>
                    </tr>
                    <tr>
                        <td><b>Foto Kejadian</b></td><td>:</td>
                        <td>
                            <?php
                                if (file_exists($image)) {
                                    echo "<img class='img img-responsive rounded mb-3' width='150' img src='$image'>";
                                }else{
                                    echo "Tidak ada gambar";
                                }
                            ?>
                        </td>
                    </tr>
                    <tr> 
                        <td><b>Status</b></td><td>:</td>
                        <td>
                            <?php echo $status; ?>
                        </td>
                    </tr>
                    <tr> 
                        <td colspan="3"><h4><u>On Progress Tindakan</u></h4></td>
                        <form method="POST" enctype="multipart/form-data">
                    </tr>
                    <tr>
                        <td><b>Update </b></td><td>:</td>
                        <td>
                        <textarea name="upd_onprog" rows="4" cols="40" require><?php echo $upd_onprog ?></textarea>
                        </td>
                    </tr>
                    <tr> 
                        <td><b> Tanggal</b></td><td>:</td>
                        <td>
                         <?php
                            if ($date3=='0000-00-00 00:00:00') {
                                echo "<input class='form-control' type='datetime-local' name='tgl_onprog' placeholder='Jawaban Anda' required/>";
                            } else {
                                echo "<textarea hidden name='tgl_onprog' rows='4' cols='40'>".$date3."</textarea>";
                                echo $tgl_onprog;

                            }
                        
                        ?>
                        </td>
                    </tr>
                    <tr> 
                        <td><b> Foto</b></td><td>:</td><td>
                            <?php
                                if (file_exists($foto_onprog)) {
                                    echo "<input class='form-control' type='hidden' name='foto_onprog' value='$foto_onprog'>";
                                    echo "<img class='img img-responsive rounded mb-3' width='150' img src='$foto_onprog'>";
                                }else{
                                    echo "<input class='form-control' type='file' name='f1'>";
                                }
                            ?>
                    
                        </td>
                        </td>
                    </tr>
                    <tr> 
                    <td></td><td></td><td>
                    <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
                    <input type="submit" class="btn btn-success btn-block" name="form_upd_onprog" value="Submit On Progress" />
                        </form>
                        </td>
                        </tr>

                    <tr> 
                        <td colspan="3"><h4><u>Penyelesaian Tindakan</u></h4></td>
                        <form method="POST" enctype="multipart/form-data">
                    </tr>
                    <tr>
                        <td><b>Update </b></td><td>:</td>
                        <td>
                        <textarea name="upd_close" rows="4" cols="40" require><?php echo $upd_close ?></textarea>
                        </td>
                    </tr>
                    <tr> 
                        <td><b> Tanggal</b></td><td>:</td>
                        <td>
                         <?php
                            if ($date4=='0000-00-00 00:00:00') {
                                echo "<input class='form-control' type='datetime-local' name='tgl_close' placeholder='Jawaban Anda' required/>";
                            } else {
                                echo "<textarea hidden name='tgl_close' rows='4' cols='40'>".$date4."</textarea>";
                                echo $tgl_close;
                            }
                        
                        ?>
                        </td>
                    </tr>
                    <tr> 
                        <td><b> Foto</b></td><td>:</td><td>
                            <?php
                                if (file_exists($foto_close)) {
                                    echo "<input class='form-control' type='hidden' name='foto_close' value='$foto_close'>";
                                    echo "<img class='img img-responsive rounded mb-3' width='150' img src='$foto_close'>";
                                }else{
                                    echo "<input class='form-control' type='file' name='f1'>";
                                }
                            ?>
                    
                        </td>
                        </td>
                    </tr>
                    <tr> 
                    <td></td><td></td><td>
                    <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
                    <input type="submit" class="btn btn-success btn-block" name="form_upd_close" value="Submit Tindakan Penyelesaian" />
                        </form>
                        </td>
                        </tr>
                    </form>
                </table>  
                <br>
                <center>© 2022 Copyright SCG All Rights reserved</center>             
                <br><br>
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