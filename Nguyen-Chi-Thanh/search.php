
	<meta charset="utf-8">
<?php
include('inc//conn.php');
include('inc/header.php');

$timkiem = "";

if( !empty($_GET['s']) )
{
	$timkiem = $_GET['s'];
}
?>

<div class="row">
	<div class="leftcolumn">
		<h3 class="title"> <?= $timkiem ?></h3>
	<?php
	if( !empty( $timkiem ) ){
		$rs = mysqli_query( $conn, "SELECT * FROM product WHERE NameProduct LIKE '%{$timkiem}%' ");
		while ($row = mysqli_fetch_assoc($rs) ){
	?>
	    <a href="single-product.php?id=<?php echo $row['ID']?>" class="product">
	    	<h2 class="product-title"><?php echo $row['NameProduct'] ?></h2>
	    	<div class="product-image"><img src="images/<?php echo $row['Image'] ?>" /></div>
	    	<p class="product-price" style="color: red"><?php echo $row['Price'] . "vnd" ?></p>
	    	<p class="product_content"><?php echo $row['Content']?></p>
	    </a>
	<?php    
		}//end while
	}
?>
	</div>
</div>