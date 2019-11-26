<?php
include('config.php');
ob_start();
session_start();
if($_SESSION['username']==false){
	header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>First Project of Shaon </title>
  <link rel="icon" href="image/favicon.ico" type="image/x-icon">
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="style.css">
<!--get.php -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<!--end get.php-->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



	<script>
		$(document).ready(function(){
		  $("#myInput").on("keyup", function() {
			var value = $(this).val().toLowerCase();
			$("#myTable tr").filter(function() {
			  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		  });
		});
	</script>
  <style>
html, body, h1, h2, h3, h4, h5, h6 {
  font-family: "Comic Sans MS", cursive, sans-serif;
}
</style>
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top" >
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="admin.php"><?php
    	if(isset($_SESSION['username'])){
    		echo $_SESSION['username'];
    	}
    	?></a>
      
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>