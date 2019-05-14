<!DOCTYPE html>
<html>
<head>
<title>Hizmet Takip Sistemi</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<?php
ob_start();
 session_start(); 
 include ("config.php");
if(!$_SESSION['musteridata']){ header('Location: /istakip/index.php');}
    $kodd = $_SESSION['musteridata'];
    $sqll = "SELECT * FROM islemler WHERE hizmetkod = '$kodd' LIMIT 1";
    $resultt = $db->query($sqll);
    $resultss = $resultt->fetch_assoc(); 

     $sQl ="SELECT musterisite, musteripaket FROM hizmet WHERE hizmetkodu = '$kodd' LIMIT 1";
     $sonuc = $db->query($sQl);
     $sonuc = $sonuc->fetch_object();
?>

<body>

<div class="container">
  <h2><?php echo $sonuc->musteripaket; ?></h2>
  <p>Sitenize yapılan işlemleri ve ne zaman yapıldığını bu ekrandan takip edebilirsiniz.</p>            
  <table class="table">
    <thead>
      <tr>
        <th>Site Adresi</th>
        <th>Yapılan İşlem</th>
        <th>İşlem Tarihi</th>
        <th>İşlem Saati</th>
      </tr>
    </thead>
    <tbody>
    <?php 
    $kod = $_SESSION['musteridata'];
    $sql = "SELECT * FROM islemler WHERE hizmetkod = '$kod'";
    $result = $db->query($sql);
    

    while ($results = $result->fetch_assoc()) { ?>
      <tr>
        <td><?php echo $sonuc->musterisite; ?></td>
        <td><?php echo $results['yapilan_islem']; ?></td>
        <td><?php echo $results['islem_tarih']; ?></td>
        <td><?php echo $results['islem_saati']; ?></td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>
<br>
<center>
<form action="" method="POST">
<button type="submit" name="cikisyap" class="btn btn-primary">Çıkış Yap</button>
</form>
</center>

<?php 
if(isset($_POST['cikisyap'])){
session_destroy();
echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
}

?>

</body>

</html>