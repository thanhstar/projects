<?php
include("conn.php");
?>
<?php
$product_per_page = 8; //limit = 3
$q = mysqli_query($conn, "SELECT COUNT(ID) AS total FROM product");
$rs = mysqli_fetch_assoc($q); //tra ve 1 mang assoc ( key => value ) => $rs = [ 'total' => 5 ]
$total_products = $rs['total']; //so luong san pham trong db
$page=ceil($total_products/$product_per_page);
if(!empty($_GET['page']))
{
	$curent_page = $_GET['page'];
}
else{
	$curent_page = 1;
}
?>
<div class="pagination-wrap">
<div class="pagination">
	<?php for ($i = 0; $i< $page; $i++) { ?>
	<a href="index.php?page= <?= $i+1?>"
	<?php
	if($curent_page==($i+1))
	{
		echo "class='active'";
	}
	else
	{
		echo "";
	}
	?>
	> 

	<?php echo $i+1 ?></a>
<?php } ?>
</div>
</div>