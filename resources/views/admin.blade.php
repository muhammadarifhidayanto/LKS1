@extends('sidebar')

@section('content')
	<div class="allpost">
		<h3 class="title-allpost">All Data</h3>
		<div class="icon-allpost"></div>
		<p class="total-allpost">{{ count($admin) }} post</p>

		<form action="/admin/manage?id=" method="GET">
			<label>cari</label>
			<input type="text" name="cari" class="form-control">
			<input type="submit" value="cari">
		</form>

		<table class="allpost-table">
			<thead class="thead">
				<tr>
					<th class="t-judul-id">ID</th>
					<th class="t-judul">Image</th>
					<th class="t-judul">Full Name</th>
					<th class="t-judul">Username</th>
					<th class="t-judul">Email</th>
					<th class="t-judul">Add By</th>
					<th class="t-judul">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($admin as $a)
				<tr>
					<td>{{ $a->id }}</td>
					<td class="t-image"><img src="{{ url('/data_file/'.$a->image) }}" class="img-table"></td>
					<td class="t-fullName">{{ $a->fullName }}</td>
					<td class="t-username">{{ $a->username }}</td>
					<td class="t-email">{{ $a->email }}</td>
					<td class="t-addBy">{{ $a->addBy }}</td>
					<td>
						<a href=" ? id={{$a->id}}" class="btn btn-success">Edit</a>
						<a href=" /admin/manage/delete/{{$a->id}}" onclick="return confirm('are you sure to delete?')" class="btn btn-danger">Delete</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

	<div class="form-add">
		<h5 class="title-add">Add Form</h5>
		<form action="/admin/manage/add" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-right">
				<div class="form-group">
				<label>Username</label>
				<input type="text" name="username" class="form-control">
			</div>
				<div class="form-group">
				<label>Email</label>
				<input type="email" name="email" class="form-control">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" class="form-control">
			</div>
			</div>
			<div class="form-group">
				<label>First Name</label>
				<input type="text" name="firstName" class="form-control">
			</div>
			<div class="form-group">
				<label>Last Name</label>
				<input type="text" name="lastName" class="form-control">
			</div>
			<div class="form-group">
				<input type="file" name="file" class="form-file">
			</div>

			<input type="submit" name="submit" value="Add" class="btn btn-primary btn-submit">
		</form>
	</div>
	<div class="form-edit">
		<h5 class="title-add">Edit Form</h5>
		<form action="/admin/manage/edit" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<div class="form-right">
				<div class="form-group">
				<label>Username</label>
				<input type="text" name="username" class="form-control">
			</div>
				<div class="form-group">
				<label>Email</label>
				<input type="email" name="email" class="form-control">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" class="form-control">
			</div>
			</div>
			<div class="form-group">
				<label>ID</label>
				<input type="number" name="id" class="form-control" >
			</div>
			<div class="form-group">
				<label>First Name</label>
				<input type="text" name="firstName" class="form-control">
			</div>
			<div class="form-group">
				<label>Last Name</label>
				<input type="text" name="lastName" class="form-control">
			</div>
			<div class="form-group">
				<input type="file" name="file" class="form-file">
			</div>

			<input type="submit" name="submit" value="Edit" class="btn btn-primary btn-submit-2">
		</form>
	</div>
@endsection