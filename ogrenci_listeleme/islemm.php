<?php 

require_once 'baglan.php';

if (isset($_POST['insertislemi'])) {
	
	$kaydet=$db->prepare("INSERT into ogrenci_listesi set 

		 ogrenci_ad=:ogrenci_ad,
		 ogrenci_soyad=:ogrenci_soyad,
		 ogrenci_mail=:ogrenci_mail,
		 ogrenci_no=:ogrenci_no
		");

	$insert=$kaydet->execute(array(
		'ogrenci_ad' => $_POST['ogrenci_ad'],
		'ogrenci_soyad' => $_POST['ogrenci_soyad'],
		'ogrenci_mail' => $_POST['ogrenci_mail'],
		'ogrenci_no' => $_POST['ogrenci_no']

	));


	if ($insert) {

		//echo "Kayıt Başarılı.";
		header("Location:indexxxx.php?durum=ok");
		exit;
	} else {

		//echo "Kayıt Başarısız.";
		header("Location:indexxxx.php?durum=no");
		exit;
	}


}


if (isset($_POST['updateislemi'])) {

	$ogrenci_id=$_POST['ogrenci_id'];
	
	$kaydet=$db->prepare("UPDATE ogrenci_listesi set 

		 ogrenci_ad=:ogrenci_ad,
		 ogrenci_soyad=:ogrenci_soyad,
		 ogrenci_mail=:ogrenci_mail,
		 ogrenci_no=:ogrenci_no
		 where ogrenci_id={$_POST['ogrenci_id']}
		");

	$insert=$kaydet->execute(array(
		'ogrenci_ad' => $_POST['ogrenci_ad'],
		'ogrenci_soyad' => $_POST['ogrenci_soyad'],
		'ogrenci_mail' => $_POST['ogrenci_mail'],
		'ogrenci_no' => $_POST['ogrenci_no']

	));


	if ($insert) {

		//echo "Kayıt Başarılı.";
		header("Location:duzenle.php?durum=ok&ogrenci_id=$ogrenci_id");
		exit;
	} else {

		//echo "Kayıt Başarısız.";
		header("Location:duzenle.php?durum=no&ogrenci_id=$ogrenci_id");
		exit;
	}


}

if ($_GET['bilgilerimsil']=="ok") {
	
	$sil=$db->prepare("DELETE from ogrenci_listesi where ogrenci_id=:id");
	$kontrol=$sil->execute(
		[

		'id' => $_GET['ogrenci_id']
		]
	);

	if ($kontrol) {

		//echo "Kayıt Başarılı.";
		header("Location:indexxxx.php?durum=ok");
		exit;
	} else {

		//echo "Kayıt Başarısız.";
		header("Location:indexxxx.php?durum=no");
		exit;
	}


}



?>