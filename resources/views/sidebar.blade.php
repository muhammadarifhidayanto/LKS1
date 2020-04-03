<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
	<title></title>
</head>
<body>
	<div class="sidebar">
		@foreach($find as $f)
		<div class="sidebar-user">
			<img src="{{ url('/data_file/'.$f->image) }}" class="img-user">
			<p class="name-user">{{ $f->username }}</p>
			<div class="online-user">
				online
			</div>
		</div>
		<div class="sidebar-tanggal">
			<p class="hari-tanggal"><?php echo date('l'); ?></p>
			<p class="bulan-tanggal"><?php echo date('d M'); ?></p>
			<p class="tahun-tanggal"><?php echo date('Y'); ?></p>
		</div>
		<div class="sidebar-menu">
			<h5 class="title-menu">Menu</h5>
			<a href="/admin/manage?id=" class="menu">ADMIN</a>
			<br>
			<!-- <br> -->
			<a href="/post/manage?id=" class="menu">POST</a>
		</div>
		@endforeach
		<a href="/login" class="btn-logout">Logout</a>
	</div>
	<div class="content">
		@yield('content')
	</div>
</body>
</html>