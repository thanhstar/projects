<?php
include("../inc/conn.php");
if ($_SERVER['REQUEST_METHOD']=='POST') {
	$tensp= $_POST['tensp'];
	$mota = $_POST['noidung'];
	$giasp= $_POST['giasp'];
	$sql = "INSERT INTO product(NameProduct,Content,Price)VALUES (?,?,?)";
	$stmt =mysqli_prepare($conn,$sql);
	mysqli_stmt_bind_param($stmt,"ssd",$tensp,$mota,$giasp);

	if (mysqli_stmt_execute($stmt)) {
		echo "da them sp thanh cong";
		# code...
	}
	else{
		echo "loi". mysqli_error($conn);
	}
}
include("inc/header.php");
?>
<form class="form" method="post" >
	  <label>Nhập tên sản phẩm </label>
		<input type="text" name="tensp" />
		<label>Nhập giá SP</label>
		<input type="number" name="giasp" >

		<label>Nhập mô tả sản phẩm</label>
		<textarea name="noidung"></textarea>
		<label>Chọn ảnh sản phẩm</label>
		<img class="anhsp"  />
	    <input type="file" name="anhsp" >
		<input type="submit" name="submit" value="Cập nhật ">
	</form>