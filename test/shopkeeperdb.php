<?php
  session_start();
  // Initialization of data
  $product1 = "";
  $stock1 = "";
  $product2 = "";
  $stock2 = "";
  $product3 = "";
  $stock3 = "";
  $product4 = "";
  $stock4 = "";
  $id = 0;
  //$update = false;
  $edit_state=false;
  

  
  // connect to the database
  $db = mysqli_connect('localhost', 'root', '', 'trolly');

  // initialize variables


  // if saved button is clicked
  if (isset($_POST['save'])) {
    $product1 = $_POST['product1'];
    $stock1 = $_POST['stock1'];
    $product2 = $_POST['product2'];
    $stock2 = $_POST['stock2'];
    $product3 = $_POST['product3'];
    $stock3 = $_POST['stock3'];
    $product4 = $_POST['product4'];
    $stock4 = $_POST['stock4'];
    $query="INSERT INTO shopkeeper (product1, stock1, product2, stock2, product3, stock3, product4, stock4) VALUES ('$product1', '$stock1', '$product2', '$stock2', '$product3', '$stock3', '$product4', '$stock4')";
    mysqli_query($db, $query); 
    $_SESSION['msg'] = "Products saved"; 
    header('location: shopping.php'); // redirect to index page after inserted
  }



  //update records 

if (isset($_POST['update'])){
  $product1 = mysqli_real_escape_string($db,$_POST['product1']);
  $stock1 =mysqli_real_escape_string($db,$_POST['stock1']);
  $product2 = mysqli_real_escape_string($db,$_POST['product2']);
  $stock2 =mysqli_real_escape_string($db,$_POST['stock2']);
  $product3 = mysqli_real_escape_string($db,$_POST['product3']);
  $stock3 =mysqli_real_escape_string($db,$_POST['stock3']);
  $product4 = mysqli_real_escape_string($db,$_POST['product4']);
  $stock4 =mysqli_real_escape_string($db,$_POST['stock4']);
  $id =mysqli_real_escape_string($db,$_POST['id']);

  mysqli_query($db, "UPDATE shopkeeper SET product1='$product1', stock1='$stock1', product2='$product2', stock2='$stock2', product3='$product3', stock3='$stock3', product4='$product4', stock4='$stock4' WHERE id=$id");
  $_SESSION['msg'] = "Products updated!"; 
  header('location: shopping.php');
}




//Delete Records

if (isset($_GET['del'])) {
  $id=$_GET['del'];
  mysqli_query($db, "DELETE FROM shopkeeper WHERE id=$id");
  $_SESSION['msg'] = "Products Deleted!"; 
  header('location: shopping.php');
}
  
// Retrive records
  $results=mysqli_query($db,"SELECT * FROM shopkeeper");


?>
