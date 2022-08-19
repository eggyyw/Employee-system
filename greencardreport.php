<?php
    include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Identifikasi Bahaya</title>
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
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
        //echo $fe['dep']; 
        $sau="select*from greencard where dept_terkait='$fe[dep]' ORDER BY `greencard`.`status` DESC , `greencard`.`tanggal` ASC"  ;            
        //$sau="select*from greencard where dept_terkait='$fe[dep]' AND status='Open' OR dept_terkait='$fe[dep]' AND status='On Progress' ORDER BY `greencard`.`tanggal` DESC" ;            
    ?>
			
    <div class="container mt-5">
        <div class="row">
            <div>
                <p style="text-align:right">Anda Login Sebagai : <b><?php echo $fe['name'];?></b> | <a href="logout.php">Logout</a></p>
                <p>&larr; <a href="greencard.php">Kembali</a>
                <h4>Laporan Kartu Identifikasi Bahaya</h4>
                <p>Sebuku Coal Group (Green Card Hazard Report)</p>
                <br><br>
                <h4>Status Greencard Yang Diterima Dari Dept Lain</h4>
                <?php
                    $qua= mysqli_query($con, $sau);
                ?>
                <table class="table">
                    <tr style="background-color:#9DA0A8">
                        <th>id</th>
                        <th>Nama Pelapor</th>
                        <th>Tanggal</th>
                        <th>Lokasi Area / Lokasi Detail</th>
                        <th>Kategori</th>
                        <th>Due Date</th>
                        <th>Departemen Terkait</th>
                        <th>Kondisi / Tindakan Bahaya yang ditemukan</th>
                        <th>Rekomendasi Tindakan Perbaikan</th>
                        <th>Tindakan Perbaikan yang sudah dilakukan</th>
                        <th>Status</th>
                        <th width="100px">Action</th>
                    </tr>
                    <?php  
                        $status_colors = array('Open' => '#F49C9C', 'On Progress' => '#9CB5F4', 'Close' => '#FFF');
                        while($user_data = mysqli_fetch_array($qua)) {     
                            $f3 = $user_data['status'];    
                            echo "<tr style=background-color:".$status_colors[$f3].">";
                            echo "<td>".$user_data['id']."</td>";
                            echo "<td>".$user_data['nama_pelapor']." (".$user_data['dept'].")</td>";
                            $date=$user_data['tanggal'];
                            $tgl = date_create($date);
                            $formatted_date = date_format($tgl, 'd-m-Y h:i a');
                            echo "<td>".$formatted_date."</td>";
                            echo "<td>".$user_data['lok_area']." / ";
                            echo "".$user_data['lokasi']."</td>";
                            echo "<td>".$user_data['kategori']."</td>";
                            $date2=$user_data['duedate'];
                            $tgl2 = date_create($date2);
                            $formatted_date2 = date_format($tgl2, 'd-m-Y h:i a');
                            echo "<td>".$formatted_date2."</td>";
                            echo "<td>".$user_data['dept_terkait']."</td>";    
                            echo "<td>".$user_data['kondisi']."</td>";    
                            echo "<td>".$user_data['rekomendasi']."</td>";    
                            echo "<td>".$user_data['tindakan']."</td>";    
                            echo "<td>".$user_data['status']."</td>";    
                            echo "<td><a class='btn btn-flat btn-success btn-sm' href='viewgreencard.php?id=$user_data[id]'><span class='glyphicon glyphicon-eye-open'></span></a>
                            <a class='btn btn-flat btn-primary btn-sm' href='editgreencard.php?id=$user_data[id]'><span class='glyphicon glyphicon-edit'></span></a>
                    </tr>";       
                        }
                    ?>
                </table>
                <?php
                    $su="select*from user where id='$_SESSION[id]'";
                    $qu= mysqli_query($con, $su);
                    $fe=mysqli_fetch_assoc($qu);
                    //echo $fe['dep']; 
                    $sau="select*from greencard where dept='$fe[dep]' ORDER BY `greencard`.`status` DESC , `greencard`.`tanggal` ASC" ;            
                    //$sau="select*from greencard where dept='$fe[dep]' AND status='Open' OR dept='$fe[dep]' AND status='On Progress' ORDER BY `greencard`.`tanggal` DESC" ;            
                    $qua= mysqli_query($con, $sau);
                ?>
                <br><br>
                <h4>Status Greencard Yang Dilaporkan<?php //echo $fe['dep'];?></h4>
                <table class="table">
                    <tr style="background-color:#9DA0A8">
                        <th>id</th>
                        <th>Nama Pelapor</th>
                        <th>Tanggal</th>
                        <th>Lokasi Area / Lokasi Detail</th>
                        <th>Kategori</th>
                        <th>Due Date</th>
                        <th>Departemen Terkait</th>
                        <th>Kondisi / Tindakan Bahaya yang ditemukan</th>
                        <th>Rekomendasi Tindakan Perbaikan</th>
                        <th>Tindakan Perbaikan yang sudah dilakukan</th>
                        <th>Status</th>
                        <th width="100px">Action</th>
                    </tr>
                <?php  
                    $status_colors = array('Open' => '#F49C9C', 'On Progress' => '#9CB5F4', 'Close' => '#FFF');
                    while($user_data = mysqli_fetch_array($qua)) {     
                        $f3 = $user_data['status'];    
                        echo "<tr style=background-color:".$status_colors[$f3].">";
                        echo "<td>".$user_data['id']."</td>";
                        echo "<td>".$user_data['nama_pelapor']." (".$user_data['dept'].")</td>";
                        $date=$user_data['tanggal'];
                        $tgl = date_create($date);
                        $formatted_date = date_format($tgl, 'd-m-Y h:i a');
                        echo "<td>".$formatted_date."</td>";
                        echo "<td>".$user_data['lok_area']." / ";
                        echo "".$user_data['lokasi']."</td>";
                        echo "<td>".$user_data['kategori']."</td>";
                        $date2=$user_data['duedate'];
                        $tgl2 = date_create($date2);
                        $formatted_date2 = date_format($tgl2, 'd-m-Y h:i a');
                        echo "<td>".$formatted_date2."</td>";
                        echo "<td>".$user_data['dept_terkait']."</td>";    
                        echo "<td>".$user_data['kondisi']."</td>";    
                        echo "<td>".$user_data['rekomendasi']."</td>";
                        echo "<td>".$user_data['tindakan']."</td>";    
                        echo "<td>".$user_data['status']."</td>";    
                        echo "<td><a class='btn btn-flat btn-success btn-sm' href='viewgreencard.php?id=$user_data[id]'><span class='glyphicon glyphicon-eye-open'></span></a></td>
                </tr>";       
                    }
                ?>
                </table>
                
                <?php  
                    if($fe['dep']=="admin"){
                ?>
                        <br><br>
                        <h4>Status ALL Greencard</h4>
                        <br> <a href="greencardexcell.php">Export Data Ke excel</a>
                        <table class="table">
                            <tr style="background-color:#9DA0A8">
                                <th>id</th>
                                <th>Nama Pelapor</th>
                                <th>Tanggal</th>
                                <th>Lokasi Area / Lokasi Detail</th>
                                <th>Kategori</th>
                                <th>Due Date</th>
                                <th>Departemen Terkait</th>
                                <th>Kondisi / Tindakan Bahaya yang ditemukan</th>
                                <th>Rekomendasi Tindakan Perbaikan</th>
                                <th>Tindakan Perbaikan yang sudah dilakukan</th>
                                <th>Status</th>
                                <th width="100px">Action</th>
                            </tr>        
                            <?php
                                $sau="select*from greencard ORDER BY `greencard`.`status` DESC , `greencard`.`tanggal` ASC"  ;
                                $qua= mysqli_query($con, $sau);
                                $status_colors = array('Open' => '#F49C9C', 'On Progress' => '#9CB5F4', 'Close' => '#FFF');
                                while($user_data = mysqli_fetch_array($qua)) {     
                                    $f3 = $user_data['status'];    
                                    echo "<tr style=background-color:".$status_colors[$f3].">";
                                    echo "<td>".$user_data['id']."</td>";
                                    echo "<td>".$user_data['nama_pelapor']." (".$user_data['dept'].")</td>";
                                    $date=$user_data['tanggal'];
                                    $tgl = date_create($date);
                                    $formatted_date = date_format($tgl, 'd-m-Y h:i a');
                                    echo "<td>".$formatted_date."</td>";
                                    echo "<td>".$user_data['lok_area']." / ";
                                    echo "".$user_data['lokasi']."</td>";
                                    echo "<td>".$user_data['kategori']."</td>";
                                    $date2=$user_data['duedate'];
                                    $tgl2 = date_create($date2);
                                    $formatted_date2 = date_format($tgl2, 'd-m-Y h:i a');
                                    echo "<td>".$formatted_date2."</td>";
                                    echo "<td>".$user_data['dept_terkait']."</td>";    
                                    echo "<td>".$user_data['kondisi']."</td>";    
                                    echo "<td>".$user_data['rekomendasi']."</td>";    
                                    echo "<td>".$user_data['tindakan']."</td>";    
                                    echo "<td>".$user_data['status']."</td>";    
                                    echo "<td><a class='btn btn-flat btn-success btn-sm' href='viewgreencard.php?id=$user_data[id]'><span class='glyphicon glyphicon-eye-open'></span></a>
                                    <a class='btn btn-flat btn-primary btn-sm' href='editgreencard.php?id=$user_data[id]'><span class='glyphicon glyphicon-edit'></span></a>
                                    </tr>";       
                                }
                }else{            
                }
                

                ?>
                </table>
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
