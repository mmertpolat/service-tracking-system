<?php 
ob_start();
session_start(); ?>
<?php 

include ("../config.php");
if(!$_SESSION['admindata']){ 
	header('Location: index.php');
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
<title>Admin Paneli</title>
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
<center><br><br><br>
<a href="../hizmet-listele.php" class="btn btn-primary" role="button">Hizmetleri Gör</a>
<br><br><br><br>
<a href="../hizmet-ekle.php" class="btn btn-primary" role="button">Hizmet Ekle</a>
<br><br><br><br>
<form action="" method="post"><button type="submit" name="cikisyap" class="btn btn-primary">Çıkış Yap</button></form>
</center>
</body>

<?php if(isset($_POST['cikisyap'])){
                session_destroy();
                header("Location:index.php"); 
                } ?>

</html>