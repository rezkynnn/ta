<?php  
$page = base64_decode($_GET['page']);

if ($page == "data_produk") {
	include 'page/data_produk.php';

} elseif ($page == "edit_produk") {
	$id = base64_decode($_GET['id']);
	include 'page/edit_produk.php';

} elseif ($page == "hapus_produk") {
	$id = base64_decode($_GET['id']);
	include 'page/hapus_produk.php';

} elseif ($page == "data_cacat") {
	include 'page/data_cacat.php';

} elseif ($page == "edit_cacat") {
	$id = base64_decode($_GET['id']);
	include 'page/edit_cacat.php';

} elseif ($page == "hapus_cacat") {
	$id = base64_decode($_GET['id']);
	include 'page/hapus_cacat.php';

} elseif ($page == "data_produksi") {
	include 'page/data_produksi.php';

} elseif ($page == "logout") {
	include 'page/logout.php';

} elseif ($page == "kendali_kualitas") {
	include 'page/kendali_kualitas.php';
	
} elseif ($page == "failur") {
	include 'page/failur.php';

} elseif ($page == "edit_produksi") {
	$id = base64_decode($_GET['id']);
	include 'page/edit_produksi.php';

} elseif ($page ==  "hapus_produksi") {
	$id = base64_decode($_GET['id']);
	include 'page/hapus_produksi.php';

} elseif ($page == "hapus_fmea") {
	$id = base64_decode($_GET['id']);
	include 'page/hapus_fmea.php';
} else {
	echo "<script>alert('Page tidak ditemukan')</script>";
}


?>