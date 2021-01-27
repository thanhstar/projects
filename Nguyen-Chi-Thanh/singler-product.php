<?php  
session_start();//lưu lại 1 phiên làm việc của 1 địa chỉ
require_once('inc/conn.php');
include('inc/header.php');

?>
		<?php
		$id = $_GET['id'];
		$sql = "SELECT * FROM product WHERE ID = {$id}";
		$rs = mysqli_query($conn ,$sql);
		while ($row= mysqli_fetch_assoc($rs)) {
		?>	<div class="alone">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<div class="singler-product" style="border: 1px solid#333; background color:#fdcb6e;border-radius: 10px;padding: 16px; margin: 5px; width: 50%; height:auto; overflow: auto; text-align: center;text-decoration: none; "> 

			<div class="singlerproduct-image" style=" max-width: 100%; padding:5px;">
				<img src="images/<?php echo $row['Image']?>" style=" max-width:100%; max-height: 380px;">
			</div>
			<div class=" conten" >
            <div class="product-information">
             <h2 class="singlerproduct-title" style="max-width: 100%;color: #6c5ce7;font-family: 'Crimson Text', serif;">
			 <?php echo $row['NameProduct']?>
             </h2>

             <div class="siglerproduct-content">
                <p >product information: </p><br>
                <div class="siglernote" style="max-width: 100%;color: #f53b57;font-family: 'Roboto', sans-serif;
">
                <?php echo $row['Content'] ?> 
                </div>
			 </div> 

			 <p class="singlerproduct-price" style="max-width: 100%;color: #00b894;font-family: 'Roboto', sans-serif;
">
				<?php echo  $row['Price'] ." $"?>
			 </p>
			 <form method="POST" action="cart.php" style="color: #3d3d3d;border-radius: 5px; cursor: pointer; position: relative; padding: 7px; font-family: sans-serif; border: none; font-size: 16px;">
				Quantity:
				<input type="number" name="sl" value="1"><br>
				<input type="hidden" name="ID" value="<?=$id ?>">
				<input type="submit" class="button-buy" value="Add Cart"></button>

			 </form>
            </div>
			<!-- end product conten -->
			<?php
		} //dont the while
		?>
		 </div>
		</div>
		</div>
	<!-- end left column -->
	<?php
	include('inc/footer.php');
	?>