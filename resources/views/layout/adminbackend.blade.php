<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Address Book</title>

    <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Custom styles for this template -->

	<style>
		.error{
			color:red;
		}
		
		.heading{
			color:brown;
			font-size:16px;
			text-decoration:underline dotted;
		}
	</style>	
  </head>

  <body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
		<div class="navbar-header">
		  <a class="navbar-brand" href="#">Address Book</a>
		</div>
		<ul class="nav navbar-nav">
		  <!-- <li class="active"><a href="#">Home</a></li> -->
		  <li><a href="adminaddress">Manage Address</a></li>
			<li><a href="adminprofile">Manage Profile</a></li>
		</ul>
		
		<div style="float:right;margin-top:5px;">
			<a href="#">Welcome {{ session('username') }}</a>
			<a href="/user/logout" class="btn btn-danger">Logout</a>
		</div>
	  </div>
	</nav>
	
	
	<div class="container-fluid">
		<div class="container">
			@yield('content')
		</div>
	</div>
  </body>
  </html>