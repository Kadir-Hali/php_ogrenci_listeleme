<?php require_once 'baglan.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DÜZENLEME İŞLEMLERİ</title>
</head>
<body>

	<h1>Veritabanı Öğrenci Kayıt Düzenleme İşlemleri</h1>
	<hr>
	<?php 
	if ($_GET['durum']=="ok") {
		
		//echo "İşlem Başarılı";
		header("Location:indexxxx.php");
	
	} elseif($_GET['durum']=="no"){

		//echo "İşlem Başarısız";
		header("Location:indexxxx.php");
	}
	?>

	<?php 

	$bilgilerimsor=$db->prepare("SELECT * from ogrenci_listesi WHERE ogrenci_id=:id");
		$bilgilerimsor->execute(
			[
			'id' => $_GET['ogrenci_id']
			]
		);

		$bilgilerimcek=$bilgilerimsor->fetch(PDO::FETCH_ASSOC);


	?>
	<form action="islemm.php" method="POST">
		
		<input type="text" required="" name="ogrenci_ad" value="<?php echo $bilgilerimcek['ogrenci_ad'] ?>">
		<input type="text" required="" name="ogrenci_soyad" value="<?php echo $bilgilerimcek['ogrenci_soyad'] ?>">
		<input type="email" required="" name="ogrenci_mail" value="<?php echo $bilgilerimcek['ogrenci_mail'] ?>">
		<input type="text" required="" minlength="8" maxlength="8" name="ogrenci_no" value="<?php echo $bilgilerimcek['ogrenci_no'] ?>">
		

		<input type="hidden" value="<?php echo $bilgilerimcek['ogrenci_id'] ?>" name="ogrenci_id">
		<button type="submit" name="updateislemi">Kayıt Düzenle</button>

		
	</form>

		<br>

		

</body>
</html>