<?php
ob_start();
session_start(); ?>
<?php 

include ("config.php");
if(!$_SESSION['admindata']){ 
	header('Location: admin/index.php');
}


if (isset($_POST['kaydet'])) {
	
	$kod = $_GET['hkodu'];
	$yislem = $_POST['islem'];
	$tarih = date("d.m.Y");
	$saat = date("H:i");

	$sql = "INSERT INTO islemler (hizmetkod, yapilan_islem, islem_saati, islem_tarih)
	 VALUES ('$kod', '$yislem', '$saat', '$tarih')";
	if ($db->query($sql) === TRUE) {

		echo "Kayıt İşlemi Başarılı";

	}else{ echo "Başarısız"; }

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>İşlem Ekle</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container">
<H4><?=$_GET['hkodu'];?> kod numaralı hizmete işlem ekle</H4>
<form method="POST">
  <div class="form-group">
    <label for="islem">Yapılan İşlem</label>
    <textarea name="islem" class="form-control" id="islem"></textarea>
  </div>

  
  <input name="kaydet" type="submit" class="btn btn-default">
</form>
</div>
</body>
</html>