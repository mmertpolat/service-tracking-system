<?php 
require 'config.php';
session_start(); ?>

<!DOCTYPE html>
<html>
<head>
<body background="assets/images/codekingxdombg.jpg">
  <meta charset="UTF-8">
<title>Hizmet Takip Sistemi</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="Library/notifIt/css/notifIt.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="Library/notifIt/js/notifIt.js"></script>
</head>

<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Hizmet Takip Sistemi</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Ana Sayfa</a></li>
    </ul>
  </div>
</nav>
<?php include("config.php"); ?>
<br><br><br><center><img src="assets/images/logo.png" alt="Code Kingdom Logo"></center>
<center>
	<?php
	if (isset($_GET['hata']) and $_GET['hata'] == 'KodYok') { ?>
		
		<script type="text/javascript">
			notif({
			  type: "error",
			  msg: "Kayıt Bulunamadı!",
			  position: "right",
			  timeout: 1500
			});
		</script>

	<?php }?>
</center>

<center><form action="" method="post">
  <b>Hizmet Takip Numarası:</b> <input type="text" required="required" name="workid" /><br><br>
  <button type="submit" class="btn btn-primary" name="sorgula">SORGULA</button>
</form></center>

<?php

if(isset($_POST['sorgula'])){
	$workid = $_POST['workid'];
	if ($workid) {

		$sqll = "SELECT * FROM islemler WHERE hizmetkod = '$workid' LIMIT 1";
	    $resultt = $db->query($sqll);
		if ($resultt->num_rows > 0){

			$_SESSION['musteridata'] = $workid;
			echo "<meta http-equiv=\"refresh\" content=\"0;URL=hizmet.php\">";

		}else{

			echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php?hata=KodYok\">";

		}
	
	
}
}



 ?>

</body>

</html>