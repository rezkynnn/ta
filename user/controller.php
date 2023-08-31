<?php  
$page = base64_decode($_GET['page']);

if ($page == "data_produk") {
	include '../userarea/page/data_produk.php';

} elseif ($page == "edit_produk") {
	$id = base64_decode($_GET['id']);
	include '../userarea/page/edit_produk.php';

} elseif ($page == "hapus_produk") {
	$id = base64_decode($_GET['id']);
	include '../userarea/page/hapus_produk.php';

} elseif ($page == "data_cacat") {
	include '../userarea/page/data_cacat.php';

} elseif ($page == "edit_cacat") {
	$id = base64_decode($_GET['id']);
	include '../userarea/page/edit_cacat.php';

} elseif ($page == "hapus_cacat") {
	$id = base64_decode($_GET['id']);
	include '../userarea/page/hapus_cacat.php';

} elseif ($page == "data_produksi") {
	include '../userarea/page/data_produksi.php';

} elseif ($page == "logout") {
	include '../userarea/page/logout.php';

} elseif ($page == "kendali_kualitas") {
	include '../userarea/page/kendali_kualitas.php';
	
} elseif ($page == "failur") {
	include '../userarea/page/failur.php';

} elseif ($page == "data_produk_user") {
	include '../userarea/page/data_produk_user.php';

}elseif ($page == "data_produksi_user") {
	include '../userarea/page/data_produksi_user.php';

}

?>