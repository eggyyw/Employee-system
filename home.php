<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sebuku Coal Timeline</title>
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body class="bg-light">   
<?php 
    if(ISSET($_SESSION['id'])){
    $s="select*from user where id='$_SESSION[id]'";
    $qu= mysqli_query($con, $s);
    $f=mysqli_fetch_assoc($qu);
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
        
            <div class="card">
                <div class="card-body text-center">
                    <img class="img img-responsive rounded mb-3" width="120" 
                    img src="<?php echo $f['image'];?>">
                    <h3><?php echo $f['name'];?></h3> <p>
                    <p><?php echo $f["dep"] ?></p>
                    <a href="edit.php">Edit</a> &nbsp;&nbsp;<a href="logout.php">Logout</a>
                  
                    
                </div>
            </div>

            
        </div>


        <div class="col-md-8">

        

<!-- die sementara <form action="" method="post">
    <div class="form-group">
        <textarea class="form-control" placeholder="Apa yang kamu pikirkan?"></textarea>
    </div>
</form>-->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<link rel="shortcut icon" href="https://res.cloudinary.com/phonerefer/image/upload/v1575096088/ve0o2n85nfvgdatgqer2.jpg" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="theme-color" content="#343a40" />
<meta
name="description"
content="Links To My Accounts | Developed By - Your Name"
/>  
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<title>Links - Your Name</title>
<style>
body{
background-color: #faf8ef;
}
h5{
 color: #343a40;
}
.name{
color: #343a40;
}
.love{
color: #343a40 !important;
}
/*----------------- Mail-------------------- */
#email{
text-decoration: none;
float: right;
color:#343a40;
}
.footer{
margin-top: 5% !important;
margin-bottom: 10px;
}
@media (max-width: 479px) {
.footer{
margin-top: 35% !important;
}
}
</style>
</head>
<body>
<div class="container">
<div class="media mt-5">
<div class="media-body m-2">
<p>Wellcome! <?php echo $f['name'] ?> Silahkan Pilih menu dibawah ini : </p>
</div>
</div>
<div class="mt-4">
<a href="greencard.php" class="btn btn-outline-success btn-block" role="button"><i class="fas fa-award">&nbsp;</i>Green Card</a>
<br>
<a href="https://forms.gle/UfJTsZXzhXMiMeBE7" class="btn btn-outline-danger btn-block" role="button" target="_blank"><i class="fas fa-heartbeat">&nbsp;</i>Form Kesehatan</a>
<br>
<a href="https://forms.gle/6dRq1EwhQt3nWXFB7" class="btn btn-outline-warning btn-block" role="button" target="_blank"><i class="fa fa-car">&nbsp;</i>Form P2H</a>
<br>
<a href="https://forms.gle/WG4npytmzDvFmMDB9" class="btn btn-outline-dark btn-block" role="button" target="_blank"><i class="fa fa-plane">&nbsp;</i>Form Cuti</a>
<br>
<a href="http://www.sebukucoalgroup.com" class="btn btn-outline-dark btn-block" role="button" target="_blank"><i class="fas fa-globe">&nbsp;</i>Company Site</a>
</div>
<!--------------------Footer---------------------------->
<div class="footer mt-5">
<hr/>
<h6>Sebuku Coal Group <span class="love"></span> </h6>
<h6><a href="/" class="name" target="_blank"></a>
<a id="email" href="mailto:jimmy.ishak@sebukucoalgroup.co.id"> <i class="fa fa-envelope"> </i> </a>
</h6>
<br>
                <center>© 2022 Copyright SCG All Rights reserved</center>             
                <br><br>
</div>
</div>
        <?php
    	}
		else{ 
			?>
			Anda tidak boleh mengakses halaman ini. <br>
            silahkan <a href="login.php">Login dahulu</a><?php 
		} 
        ?>

</body>

</html>
<!-- Die sampai ingat
<!?php for($i=0; $i < 1; $i++){ ?>
<div class="card mb-3">
    <div class="card-body">
    Green Card - Hazard Report
    </div>
</div>
</div>

</div>
</div>

</body>
</html>

            
        </div>
    
    </div>
</div>

</body>
</html>
