<?php 
ob_start();
session_start(); ?>
<?php 

include ("config.php");
if(!$_SESSION['admindata']){ 
	header('Location: admin/index.php');
}

?>

<?php

function hizmetkodu($length = 8) {

	    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

if(isset($_POST['kaydet'])){
	
	$hizmetpaketi = $_POST['hizmetpaketi'];
	$kod     = hizmetkodu();
	$musteri = $_POST['musteri'];
	$tarih	 = date("d-m-Y")." - ".date("H:i"); 

	$sql = "INSERT INTO hizmet (hizmetkodu, musterisite, musteripaket, tarih)
	VALUES ('$kod', '$musteri', '$hizmetpaketi', '$tarih')";

	if ($db->query($sql) === TRUE) {
	    echo "Yeni kayıt başarılı !";
	} else {
	    echo "Hata: " . $sql . "<br>" . $db->error;
	}

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Hizmet Ekle</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container">
<form method="POST">
  <div class="form-group">
    <label for="musteri">Müşteri Site Adresi</label>
    <input type="text" required name="musteri" class="form-control" placeholder="www.site.com" id="musteri">
    <br>
    <label for="hizmetpaketi">Hizmet Paketi</label>
    <input type="text" required name="hizmetpaketi" class="form-control" placeholder="Paket Adı" id="hizmetpaketi">
  </div>
  
  <input name="kaydet" type="submit" class="btn btn-default">
</form>
</div>
</body>
</html>	
