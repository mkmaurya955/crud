<?php 
include "customerdb.php";
//fetch the record to be updated
if(isset($_GET['edit'])){
	$id=$_GET['edit'];
	$edit_state=true;
	$rec=mysqli_query($db, "SELECT * FROM customer WHERE id=$id");
	$record=mysqli_fetch_array($rec);
	$product1=$record['product1'];
	$price1=$record['price1'];
	$product2=$record['product2'];
	$price2=$record['price2'];
	$product3=$record['product3'];
	$price3=$record['price3'];
	$product4=$record['product4'];
	$price4=$record['price4'];
	$total=$record['total'];
	$id=$record['id'];
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Customer Page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	</head>
	<style type="text/css">
		.msg {
    margin: 30px auto; 
    padding: 10px; 
    border-radius: 5px; 
    color: #3c763d; 
    background: #dff0d8; 
    border: 1px solid #3c763d;
    width: 50%;
    text-align: center;
}
	</style>
<body>
	<img src="logo.png" width="100%">
	<div class="container">
	<h1 align="center" style="color: #9D3375;margin-top: 30px"> Smart Shopping Trolly</h1>
	<hr>

	<h3 align="center" style="color: blue;margin-top: 20px"><u>Customer Page</u></h3>
	<br><br>
	
	<?php if (isset($_SESSION['msg'])):?>
		<div class="msg">
			<?php
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			?>
		</div>
	<?php endif ?>
	<table border="1" width="100%" style="background-color: silver">
		<tr>
		    <th style="padding: 10px;text-align: center;">Product 1</th>
			<th style="padding: 10px;text-align: center;">Price 1</th>
			<th style="padding: 10px;text-align: center;">Product 2</th>
			<th style="padding: 10px;text-align: center;">Price 2</th>
			<th style="padding: 10px;text-align: center;">Product 3</th>
			<th style="padding: 10px;text-align: center;">Price 3</th>
			<th style="padding: 10px;text-align: center;">Product 4</th>
			<th style="padding: 10px;text-align: center;">Price 4</th>
			<th style="padding: 10px;text-align: center;">Total</th>
			<th colspan="2" style="padding: 20px;text-align: center;">Action</th>
		</tr>
		
			<?php while($row=mysqli_fetch_array($results)){ ?>
			<tr>
				<td style="padding: 10px;text-align: center;"><?php echo $row['product1']; ?></td>
				<td style="padding: 10px;text-align: center;"><?php echo $row['price1']; ?></td>
				<td style="padding: 10px;text-align: center;"><?php echo $row['product2']; ?></td>
				<td style="padding: 10px;text-align: center;"><?php echo $row['price2']; ?></td>
				<td style="padding: 10px;text-align: center;"><?php echo $row['product3']; ?></td>
				<td style="padding: 10px;text-align: center;"><?php echo $row['price3']; ?></td>
				<td style="padding: 10px;text-align: center;"><?php echo $row['product4']; ?></td>
				<td style="padding: 10px;text-align: center;"><?php echo $row['price4']; ?></td>
				<td style="padding: 10px;text-align: center;"><?php echo $row['total']; ?></td>
				<td style="padding: 10px;text-align: center;">
					<a class="btn btn-success" href="customer.php?edit=<?php echo $row['id']; ?>">Edit</a>
				</td>
				<td style="padding: 10px;text-align: center;">
					<a class="btn btn-danger" href="customerdb.php?del=<?php echo $row['id']; ?>">Delete</a>
				</td>
			</tr>
			<?php }?>
		
	</table>
	<hr>
	<table border="0" width="800px" align="center" style="background-color:pink;border-radius: 20px;margin-top: 25px">
	<form method="post" action="customerdb.php">
		<tr>
			<th style="padding: 15px;text-align: center;"><h4><u>Product</u></h4></th>
			<th style="padding: 15px;text-align: center;"><h4><u>Price</u></h4></th>
		</tr>
		<tr>
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<div class="input-group">
				<td style="padding: 15px;text-align: center;">
					<input type="text" name="product1" value="<?php echo $product1; ?>">
				</td>	
			</div>
			<div class="input-group">
				<td style="padding: 15px;text-align: center;">
					<input type="text" name="price1" value="<?php echo $price1; ?>">	
				</td>
			</div>
		</tr>
		<tr>
			<div class="input-group">
				<td style="padding: 15px;text-align: center;">
					<input type="text" name="product2" value="<?php echo $product2; ?>">	
				</td>
			</div>
			<div class="input-group">
				<td style="padding: 15px;text-align: center;">
					<input type="text" name="price2" value="<?php echo $price2; ?>">	
				</td>
			</div>
		</tr>
		<tr>
			<div class="input-group">
				<td style="padding: 15px;text-align: center;">
					<input type="text" name="product3" value="<?php echo $product3; ?>">	
				</td>
			</div>
			<div class="input-group">
				<td style="padding: 15px;text-align: center;">
					<input type="text" name="price3" value="<?php echo $price3; ?>">	
				</td>
			</div>
		</tr>
		<tr>
			<div class="input-group">
				<td style="padding: 15px;text-align: center;">
					<input type="text" name="product4" value="<?php echo $product4; ?>">	
				</td>
			</div>
			<div class="input-group">
				<td style="padding: 15px;text-align: center;">
					<input type="text" name="price4" value="<?php echo $price4; ?>">	
				</td>
			</div>
		</tr>
		<tr>
			<div class="input-group">
				<td style="padding: 15px;text-align: center;">Total:</td>
				<td style="padding: 15px;text-align: center;">
					<input type="text" name="total" value="<?php echo $total; ?>">	
				</td>
			</div>
		</tr>
		<tr>
			<div class="input-group">
				<td style="padding: 15px;text-align: center;">
			<?php if($edit_state==false): ?>
				<button type="submit" name="save" class="btn btn-primary">Save</button>
			<?php else: ?>
				<button type="submit" name="update" class="btn btn-primary">Update</button>
			<?php endif ?>
				</td>
				<td style="padding: 15px;text-align: center">
					<a href="index.php" class="btn btn-primary" role="button">Back</a>
				</td>
			</div>
		</tr>
	
	</form>
</table>
<hr>
</div>
</body>
</html>