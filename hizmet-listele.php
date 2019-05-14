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

if (isset($_GET['islem']) and $_GET['islem'] == 'sil') {
	
	$id = $_GET['id'];

	$sql = "DELETE FROM hizmet WHERE id = $id";

	if ($db->query($sql) === TRUE) {

		header('Location:hizmet-listele.php');

	}else{
		echo "Başarısız";
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
		<table class="table">
		    <thead>
		      <tr>
		        <th>Site Adresi</th>
		        <th>Hizmet Kodu</th>
		        <th>Tarih</th>
		        <th>İşlem</th>
		      </tr>
		    </thead>
		    <tbody>
		      <?php 
		      	$sql = "SELECT hizmetkodu, musterisite, tarih ,id FROM hizmet ORDER BY id DESC";
				$results = $db->query($sql);

				if($results->num_rows > 0)
					while ($result = $results->fetch_assoc()) { ?>
						<tr>
							<td><?=$result['musterisite'];?></td>
							<td><?=$result['hizmetkodu'];?></td>
							<td><?php echo $result["tarih"];?></td>
							<td><a href="hizmet-listele.php?islem=sil&id=<?=$result['id'];?>">Sil</a>   /  <a href="islem-ekle.php?hkodu=<?=$result['hizmetkodu'];?>">İşlem Ekle</a></td>
						</tr>
				<?php	}
				else
					echo "Kayıt Yok";
		      ?>
		    </tbody>
	  </table>
	</div>
</body>
</html>