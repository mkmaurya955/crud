<?php
	session_start();
	// Initialization of data
	$name = "";
	$address = "";
	$id = 0;
	//$update = false;
	$edit_state=false;
  

	
	// connect to the database
	$db = mysqli_connect('localhost', 'root', '', 'crud');

	// initialize variables


  // if saved button is clicked
	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$address = $_POST['address'];
		$query="INSERT INTO info (name, address) VALUES ('$name', '$address')";
		mysqli_query($db, $query); 
		$_SESSION['msg'] = "Address saved"; 
		header('location: index.php'); // redirect to index page after inserted
	}



	//update records 

if (isset($_POST['update'])){
	$name = mysqli_real_escape_string($db,$_POST['name']);
	$address =mysqli_real_escape_string($db,$_POST['address']);
	$id =mysqli_real_escape_string($db,$_POST['id']);

	mysqli_query($db, "UPDATE info SET name='$name', address='$address' WHERE id=$id");
	$_SESSION['msg'] = "Address updated!"; 
	header('location: index.php');
}




//Delete Records

if (isset($_GET['del'])) {
	$id=$_GET['del'];
	mysqli_query($db, "DELETE FROM info WHERE id=$id");
	$_SESSION['msg'] = "Address Deleted!"; 
	header('location: index.php');
}
	
// Retrive records
	$results=mysqli_query($db,"SELECT * FROM info");


?>







