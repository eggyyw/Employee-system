<?php
    // include database connection file
    include 'connect.php';
    // Check if form is submitted for user update, then redirect to homepage after update
    if(isset($_POST['update']))
    {	
        $id = $_POST['id']; 
        $remark=$_POST['remark'];
        $status=$_POST['status'];
            
        // update user data
        $result = mysqli_query($con, "UPDATE greencard SET remark='$remark', status='$status' WHERE id=$id");
        
        // Redirect to homepage to display updated user in list
        header("Location: viewgreencard.php?id=$id");
    }
?>
<?php
    // Display selected user data based on id
    // Getting id from url
    $id = $_GET['id'];
    
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
        $image = $user_data['foto'];
    }
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
 
<body class="bg-light">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">           
            <?php 
        		if(ISSET($_SESSION['id'])){
            ?>
            <p style="text-align:right">Anda Login Sebagai : <b><?php echo $nama_pelapor;?></b></p>			
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
                   <form name="update_user" method="post" action="editgreencard.php">
                    <tr> 
                        <td><b>Update Status Tindakan</b></td><td>:</td>
                        <td><textarea name="remark" rows="5" cols="50"><?php echo $remark; ?></textarea></td>
                    </tr>
                    <tr> 
                        <td><b>Status</b></td><td>:</td>
                        <td>
                            <select name="status" required>
                                <option><?php echo $status; ?></option>
                                <option>Open</option>
                                <option>On Progress</option>
                                <option>Close</option>
                            </select> 
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                        <td><input type="submit" name="update" value="Update"></td>
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