<?php require_once 'baglan.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>KAYIT İŞLEMLERİ</title>
</head>
<body>

	<h1>Veritabanı Öğrenci Kayıt İşlemleri</h1>
	<hr>
	<?php 
	if ($_GET['durum']=="ok") {
		
		echo "İşlem Başarılı";

	
	} elseif($_GET['durum']=="no"){

		echo "İşlem Başarısız";
	}


	?>
	<form action="islemm.php" method="POST">
		<input type="text" required="" name="ogrenci_ad" placeholder="Adınızı Giriniz">
		<input type="text" required="" name="ogrenci_soyad" placeholder="Soyadınızı Giriniz">
		<input type="email" required="" name="ogrenci_mail" placeholder="Mailinizi Giriniz">
		<input type="text" required="" name="ogrenci_no" minlength="8" maxlength="8" placeholder="Numaranızı Giriniz">
		<button type="submit" name="insertislemi">Kaydı Gönder</button>
	</form>

		<br>

		<h4>Kayıtlı Öğrencilerin Listelenmesi</h4>
		<hr>


		<table style="width: 60%" border="1">
			
			<tr>
				<th width="40">Sıra No</th>
				<th>ID</th>
				<th>Ad</th>
				<th>Soyad</th>
				<th>Mail</th>
				<th>Numara</th>
				<th width="40">İşlemler</th>
				<th width="40">İşlemler</th>
			</tr>
			<?php 
			$bilgilerimsor=$db->prepare("SELECT * from ogrenci_listesi");
			$bilgilerimsor->execute();
		
			$say=0;

		while($bilgilerimcek=$bilgilerimsor->fetch(PDO::FETCH_ASSOC)) {$say++?>

			
			<tr>
				<td><?php echo $say; ?></td>
				<td><?php echo $bilgilerimcek['ogrenci_id'] ?></td>
				<td><?php echo $bilgilerimcek['ogrenci_ad'] ?></td>
				<td><?php echo $bilgilerimcek['ogrenci_soyad'] ?></td>
				<td><?php echo $bilgilerimcek['ogrenci_mail'] ?></td>
				<td><?php echo $bilgilerimcek['ogrenci_no'] ?></td>
				<td align="center"><a href="duzenle.php?ogrenci_id=<?php echo $bilgilerimcek['ogrenci_id'] ?>"><button>Düzenle</button></td>
				<td align="center"><a href="islemm.php?ogrenci_id=<?php echo $bilgilerimcek['ogrenci_id'] ?>&bilgilerimsil=ok"><button>Sil</button></td>
			</tr>
		<?php } ?>
		</table>

</body>
</html>