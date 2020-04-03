<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style-2.css') }}">
	<title>Login</title>
</head>
<body>
	<div class="login">
		<p class="judul-login">Login</p>
		<form class="form-login" action="/login/user" method="post">
			{{ csrf_field() }}
			<div class="form-group">
				<label>Username</label>
				<input type="text" name="username" class="form-control">
			</div>
			<div class="form-group">
				<label>password</label>
				<input type="password" name="password" class="form-control">
			</div>
			<input type="submit" name="submit" class="btn btn-success btn-login">
					</form>

					@if(count($a) !==1)
						<p>salah</p>
					@endif
	</div>
</body>
</html>