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

</head>
<body class="bg-light">
    <?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Greencard".date("d-m-Y").".xls");
	?>
    <?php
        $s="select*from user where id='$_SESSION[id]'";
        $qu= mysqli_query($con, $s);
        $fe=mysqli_fetch_assoc($qu);
        //echo $fe['dep']; 
        $sau="select*from greencard where dept_terkait='$fe[dep]' AND status='Open' OR dept_terkait='$fe[dep]' AND status='On Progress' ORDER BY `greencard`.`tanggal` DESC" ;            
    ?>
			
    <div class="container mt-5">
        <div class="row">
            <div>
                <h4>Laporan Kartu Identifikasi Bahaya</h4>
                Sebuku Coal Group (Green Card Hazard Report)
                <br>
                <table class="table">
                    <tr style="background-color:#9DA0A8">
                        <th>id</th>
                        <th>Nama Pelapor</th>
                        <th>Dept</th>
                        <th>Tanggal</th>
                        <th>Lokasi Area </th>
                        <th>Lokasi Detail</th>
                        <th>Kategori</th>
                        <th>Due Date</th>
                        <th>Departemen Terkait</th>
                        <th>Kondisi / Tindakan Bahaya yang ditemukan</th>
                        <th>Rekomendasi Tindakan Perbaikan</th>
                        <th>Tindakan Perbaikan yang sudah dilakukan</th>
                        <th>Status</th>
                        <th>Update On Progress</th>
                        <th>Tanggal On Progress</th>
                        <th>Update On penyelesaian</th>
                        <th>Tanggal On Progress</th>
                    </tr>        
                    <?php
                        $sau="select*from greencard ORDER BY `greencard`.`status` DESC , `greencard`.`tanggal` ASC"  ;
                        $qua= mysqli_query($con, $sau);
                        $status_colors = array('Open' => '#F49C9C', 'On Progress' => '#9CB5F4', 'Close' => '#FFF');
                        while($user_data = mysqli_fetch_array($qua)) {     
                            $f3 = $user_data['status'];    
                            echo "<tr style=background-color:".$status_colors[$f3].">";
                            echo "<td>".$user_data['id']."</td>";
                            echo "<td>".$user_data['nama_pelapor']."</td>";
                            echo "<td>".$user_data['dept']."</td>";
                            $date=$user_data['tanggal'];
                            $tgl = date_create($date);
                            $formatted_date = date_format($tgl, 'd-m-Y h:i a');
                            echo "<td>".$formatted_date."</td>";
                            echo "<td>".$user_data['lok_area']."</td>";
                            echo "<td>".$user_data['lokasi']."</td>";
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
                            echo "<td>".$user_data['upd_onprog']."</td>";
                            $date2=$user_data['tgl_onprog'];
                            $tgl2 = date_create($date2);
                            $formatted_date2 = date_format($tgl2, 'd-m-Y h:i a');
                            if ($date2=='0000-00-00 00:00:00') {
                                echo "<td></td>";
                            } else {
                                echo "<td>".$formatted_date2."</td>";
                            }
                            echo "<td>".$user_data['upd_close']."</td>";
                            $date3=$user_data['tgl_close'];
                            $tgl3 = date_create($date3);
                            $formatted_date3 = date_format($tgl3, 'd-m-Y h:i a');
                            if ($date2=='0000-00-00 00:00:00') {
                                echo "<td></td>";
                            } else {
                                echo "<td>".$formatted_date3."</td>";
                            }
                            echo "</tr>";       
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
