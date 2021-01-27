<?php
require_once("inc/conn.php");
include("inc/header.php");
?>

<div class="danhsach">
	
	<link href="https://fonts.googleapis.com/css2?family=Crimson+Text:ital,wght@1,600;1,700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Crimson+Text:ital,wght@1,600&display=swap" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<h1>Laptop gaming</h1>
	<div class="product-list">
		
		<?php
		//page=2=>$get
		if (!empty($_GET['page']))
		{
			$page = $_GET['page']-1;
		}
		else
		{
			$page =0;
		}
		// $page =!empty($_GET['page'])? ($_GET[page]-1):0; lay page hien tai
		$product_per_page = 8;  //1 trang 6 sp 
		$offset = $product_per_page * $page; //offset chinh la phan can bo qua

		$sql = "SELECT * FROM product LIMIT $offset,$product_per_page";
		$rs = mysqli_query($conn, $sql);

		if (mysqli_num_rows($rs) > 0)
		{
			while ($row = mysqli_fetch_assoc($rs)) {
				# code...
				?>
				<a href="singler-product.php?id=<?php echo $row['ID'] ?>" class ="product">
					<img src="images/<?php echo $row["Image"]; ?>" class="img-responsive" /><br />

						<h4 class="text-info"><?php echo $row["NameProduct"]; ?></h4>

						<h4 class="text-price">$ <?php echo $row["Price"]; ?></h4>

						<input type="hidden" name="hidden_name" value="<?php echo $row["NameProdut"]; ?>" />

						<input type="hidden" name="hidden_price" value="<?php echo $row["Price"]; ?>" />

						<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn-success" value="Buy Now" />

				</a>
				<?php
			} //end while
			} //check so hang tra ve
			?>
			<?php include ('inc/pagination.php');?>

	</div>  
	<!-- end leftcorum -->
<?php
	include('inc/footer.php');
	?>