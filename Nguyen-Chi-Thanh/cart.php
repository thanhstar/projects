<?php
session_start();
include('inc/conn.php');
include('inc/header.php');


if ($_SERVER['REQUEST_METHOD']=='POST'){
	$id=$_POST['ID'];
	if (empty($_SESSION['cart'][$id]))
	{//kiem tra gio hang
		$q= mysqli_query($conn,"SELECT * FROM product WHERE ID={$id}");
		$product = mysqli_fetch_assoc($q);
		//them sp vao gio hang
		$_SESSION['cart'][$id]= $product;
		$_SESSION['cart'][$id]['sl']= $_POST['sl'];
	}
	else
	{
		//neu sp ton tai tron session roi
		$slMoi = $_SESSION['cart'][$id]['sl']+$_POST['sl']; //sl cu + sl moi
		$_SESSION['cart'][$id]['sl']= $slMoi;

	}

}


// if(isset($_GET["action"]))
// {
// 	if($_GET["action"] == "delete")
// 	{
// 		foreach($_SESSION["cart"] as $keys => $values)
// 		{
// 			if($values["id"] == $_GET["id"])
// 			{
// 				unset($_SESSION["cart"][$keys]);
// 				echo '<script>alert("Item Removed")</script>';
// 				echo '<script>window.location="product.php"</script>';
// 			}
// 		}
// 	}
// }
?>

<!-- 

<div class="row">
	<link rel="stylesheet" type="text/css" href="css/card.css">
	<div class="leftcolumn">
			<h3 style="text-align: center;" class="title">gio hang</h3>
			<?php
			//loop tu session lay product
			if (!empty($_SESSION['cart'])) 
			foreach ($_SESSION ['cart'] as $item):
				?>
				<a href="singler-product.php?id=<?php echo $item['ID']?>" class="product">
					<h2 class="product-title"><?php echo $item['NameProduct']?></h2>
					<div class="product-image"> <img src="images/<?php echo $item['Image']?>"></div>
					<p class="product-price"><?php echo $item['Price'] . "VND"?></p>
					<p class="sl"> so luong: <?php echo $item['sl'] ?></p>
				</a>

				<?php
			endforeach;
			else
				echo "kho co trong gio hang!";
			?>
			<div id="total" class="clearfix">
				<?php
				$tong =0;
			
				foreach ($_SESSION['cart'] as $item) {
					$tong = $tong + ($item['sl']*$item['Price']);
					# code...
				}
				?>
				<h3>thanh tien: <?php echo number_format($tong)?> D</h3>
			</div>
	</div>
</div>
 -->
 <div style="clear:both"></div>
 <link rel="stylesheet" type="text/css" href="css/card.css">
			<br />
			<h3>Order Details</h3>
			<div class="table-responsive">
				<table class="table-bordered">
					<tr>
						<th width="50%">Item Name</th>
						<th width="15%">Quantity</th>
						<th width="15%">Price</th>
						<th width="20%">Total</th>
					<!-- 	<th width="5%">Action</th> -->
					</tr>
					<?php
					if(!empty($_SESSION["cart"]))
					{
						$total = 0;
						foreach($_SESSION["cart"] as $keys => $values)
						{
					?>
					<tr>
						<td><?php echo $values["NameProduct"]; ?></td>
						<td><?php echo $values["sl"]; ?></td>
						<td>$ <?php echo $values["Price"]; ?></td>
						<td>$ <?php echo number_format($values["sl"] * $values["Price"], 2);?></td>
						<!-- <td><a href="product.php?action=delete&id=<?php echo $values["id"]; ?>"><span class="text-danger">Remove</span></a></td> -->
					</tr>
					<?php
							$total = $total + ($values["sl"] * $values["Price"]);
						}
					?>
					<tr>
						<td colspan="3" align="right">Total</td>
						<td align="right">$ <?php echo number_format($total, 2); ?></td>
						<td></td>
					</tr>
					<?php
					}
					?>
						
				</table>
			</div>
		</div>
			<?php
	include('inc/footer.php');
	?>