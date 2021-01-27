<div id="main">
  		<table>
  			<thead>
  				<th width="5%">ID</th>
  				<th width="20%">Images</th>
  				<th width="55%">Name Product</th>
  				<th width="10%">Price</th>
  				<th width="5%">Action</th>
  				<th width="5%">Action</th>
  			</thead>

  			<tbody>

  				<?php 
  					$query = "SELECT * FROM product";
  					$rs = mysqli_query( $conn, $query );
  					if( mysqli_num_rows( $rs ) > 0  )
  						while( $row = mysqli_fetch_assoc( $rs ) ){
  				?>
  					<tr>
  						<td><?= $row['ID'] ?></td>
  						<td><img class="image-sp" src="../images/<?= $row['Image']?>"/></td>
  						<td><?= $row['NameProduct']?></td>
  						<td><?= $row['Price'] . " đ"?> </td> 
              <!-- chu y ten phai match voi ten cot trong db -->
  						<td><a href="suasp.php?id=<?= $row['ID']?>">Sửa</a></td>
  						<td><a href="?idxoa=<?= $row['ID']?>">Xóa</a></td>
  					</tr>

  				<?php 

  					}

  				?>
  					
  			</tbody>
  		</table>
  	</div><!-- #main -->
