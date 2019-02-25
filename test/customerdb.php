<?php
	session_start();
	// Initialization of data
	$product1 = "";
	$price1 = "";
	$product2 = "";
	$price2 = "";
	$product3 = "";
	$price3 = "";
	$product4 = "";
	$price4 = "";
	$total = "";
	$id = 0;
	//$update = false;
	$edit_state=false;
  

	
	// connect to the database
	$db = mysqli_connect('localhost', 'root', '', 'trolly');

	// initialize variables


  // if saved button is clicked
	if (isset($_POST['save'])) {
		$product1 = $_POST['product1'];
		$price1 = $_POST['price1'];
		$product2 = $_POST['product2'];
		$price2 = $_POST['price2'];
		$product3 = $_POST['product3'];
		$price3 = $_POST['price3'];
		$product4 = $_POST['product4'];
		$price4 = $_POST['price4'];
		$total = $_POST['total'];
		$query="INSERT INTO customer (product1, price1, product2, price2, product3, price3, product4, price4, total) VALUES ('$product1', '$price1', '$product2', '$price2', '$product3', '$price3', '$product4', '$price4', '$total')";
		mysqli_query($db, $query); 
		$_SESSION['msg'] = "Products saved"; 
		header('location: customer.php'); // redirect to index page after inserted
	}



	//update records 

if (isset($_POST['update'])){
	$product1 = mysqli_real_escape_string($db,$_POST['product1']);
	$price1 =mysqli_real_escape_string($db,$_POST['price1']);
	$product2 = mysqli_real_escape_string($db,$_POST['product2']);
	$price2 =mysqli_real_escape_string($db,$_POST['price2']);
	$product3 = mysqli_real_escape_string($db,$_POST['product3']);
	$price3 =mysqli_real_escape_string($db,$_POST['price3']);
	$product4 = mysqli_real_escape_string($db,$_POST['product4']);
	$price4 =mysqli_real_escape_string($db,$_POST['price4']);
	$total = mysqli_real_escape_string($db,$_POST['total']);
	$id =mysqli_real_escape_string($db,$_POST['id']);

	mysqli_query($db, "UPDATE customer SET product1='$product1', price1='$price1', product2='$product2', price2='$price2', product3='$product3', price3='$price3', product4='$product4', price4='$price4', total='$total' WHERE id=$id");
	$_SESSION['msg'] = "Products updated!"; 
	header('location: customer.php');
}




//Delete Records

if (isset($_GET['del'])) {
	$id=$_GET['del'];
	mysqli_query($db, "DELETE FROM customer WHERE id=$id");
	$_SESSION['msg'] = "Products Deleted!"; 
	header('location: customer.php');
}
	
// Retrive records
	$results=mysqli_query($db,"SELECT * FROM customer");


?>







