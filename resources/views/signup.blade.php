
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

    <title>Webuy Signup</title>

    <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Custom styles for this template -->

	<style>
		.error{
			color:red;
		}
	</style>	
  </head>

  <body>

    <div class="container">
	  <div class="row">
	  <div class="col-md-3"></div>
	  <div class="col-md-6">
		@if (session('invalid_login'))
			<div class="alert alert-danger">
				{{ session('invalid_login') }}
			</div>
		@endif

    @if (session('status'))
			<div class="alert alert-success">
				{{ session('status') }}
			</div>
		@endif
	    <form class="form-signup" name="frmsignup" action="/user/checksignup" method="post">
        <h2 class="form-signup-heading">Webuy Signup</h2>
        
        <p>
            <label>Name : </label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
            <div class="error">{{ $errors->first('name') }}</div>
        </p>
        <p>
            <label> Address : </label>
            <input type="text" class="form-control" name="address" id ="address" placeholder="Enter Address">
            <div class="error">{{ $errors->first('address') }}</div>
        </p>
        <p>
            <label>Email address</label>
            <input type="text" id="email" name="email" class="form-control" placeholder="Email">
            <div class="error">{{ $errors->first('email') }}</div>
        </p>

        <p>
            <label>Mobile No : </label>
            <input type="text" class="form-control" name="mobileno" id="mobileno" placeholder="Enter Mobile">
            <div class="error">{{ $errors->first('mobileno') }}</div>
        </p>

        <p>
        <label>Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password" >
        <div class="error">{{ $errors->first('password') }}</div>
        </p>
		
		<br/>
		 {{ csrf_field() }}
        <input type="submit" name="submit" id="submit" class="btn btn-lg btn-primary btn-block" value="Register">
        <br/>
        <center>
          Already Registered ?
          <a href="/user/" class="btn btn-lg btn-success">Login</a>
        </center>
      </form>

    </div>
	<div class="col-md-3"></div>	
    </div>
    </div>


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
