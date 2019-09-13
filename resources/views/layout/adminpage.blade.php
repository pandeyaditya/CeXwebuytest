<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Webuy Admin Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
  /*.container {
    padding: 80px 120px;
  }*/

  .error{
    color:#ff0000;
    font-size:11px;
    float:left;
  }

  label{
    float:left;
  }

  .image_backend{
    width: 200px;
    height: 200px;
  }

  table{
    border:1px solid #ccc;
  }

  th{
    font-weight:bold;
    width:200px;
    text-align:center;
    text-decoration:underline;
  }

  table tr{
    border:1px solid #000;
  }

  table tr td{
    border:1px dotted #000;
  }
  </style>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{ url('/checksession') }}">WebuyCart</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="{{ url('/checksession') }}">Home</a></li>      
      <li><a href="{{ url('/admin/showcategories') }}" >Categories</a></li>
      <li><a href="{{ url('/admin/showproducts') }}" >Products</a></li>      
      <li><a href="{{ url('/admin/showorders') }}" >Orders</a></li> 
      <li><a href="{{ url('/orders') }}" >Orders API /orders</a></li> 
    </ul>
    <li class="pull-right">
        <a href="#" style="color:#ffffff">Welcome, {{ session('email') }}</a>    
        <a href="{{ url('/logout') }}" style="color:#ffffff">&nbsp; &nbsp; &nbsp; Logout ??</a>
    </li>     
  </div>
</nav>
  

<div class="container text-center">
  <div class="row"> 
 @yield('content')     
  </div>
</div>

</body>
</html>
