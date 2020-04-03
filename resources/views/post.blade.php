@extends('sidebar')

@section('content')
	<div class="allpost">
		<h3 class="title-allpost">All Data</h3>
		<div class="icon-allpost"></div>
		<p class="total-allpost">{{ count($post) }} post</p>

		<table class="allpost-table">
			<thead class="thead">
				<tr>
					<th class="t-judul-id">ID</th>
					<th class="t-judul">Image</th>
					<th class="t-judul">Title</th>
					<th class="t-judul">Location</th>
					<th class="t-judul">Category</th>
					<th class="t-judul">PhotoBy</th>
					<th class="t-judul">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($post as $a)
				<tr>
					<td>{{ $a->id }}</td>
					<td class="t-image"><img src="{{ url('/data_file/'.$a->image) }}" class="img-table"></td>
					<td class="t-fullName">{{ $a->title }}</td>
					<td class="t-username">{{ $a->location }}</td>
					<td class="t-email">{{ $a->category }}</td>
					<td class="t-addBy">{{ $a->photoBy }}</td>
					<td>
						<a href=" ? id={{$a->id}}" class="btn btn-success">Edit</a>
						<a href="/post/manage/delete/{{$a->id}}" onclick="return confirm('are you sure to delete?')" class="btn btn-danger">Delete</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

	<div class="form-add">
		<h5 class="title-add">Add Form</h5>
		<form action="/post/manage/add" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-right">
				<div class="form-group">
				<label>Photo By</label>
				<input type="text" name="photoBy" class="form-control" required>
			</div>
				<div class="form-group">
				<label>Category</label>
				<select class="form-control" name="category" required>
					<option value="Lomba Anak">Lomba Anak</option>
					<option value="Lomba Umum">Lomba Umum</option>
				</select>
			</div>
			<div class="form-group">
				<label>Description</label>
				<textarea class="form-control" name="description" required></textarea>
			</div>
			</div>
			<div class="form-group">
				<label>Title</label>
				<input type="text" name="title" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Location</label>
				<input type="text" name="location" class="form-control" required>
			</div>
			<div class="form-group">
				<input type="file" name="file" class="form-file" required>
			</div>

			<input type="submit" name="submit" value="Add" class="btn btn-primary btn-submit">
		</form>
	</div>
	<div class="form-edit">
		<h5 class="title-add">Edit Form</h5>
		<form action="/post/manage/edit" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<div class="form-right-2">
				<div class="form-group">
				<label>Photo By</label>
				<input type="text" name="photoBy" class="form-control" required>
			</div>
				<div class="form-group">
				<label>Category</label>
				<select class="form-control" name="category" required>
					<option value="Lomba Anak">Lomba Anak</option>
					<option value="Lomba Umum">Lomba Umum</option>
				</select>
			</div>
			<div class="form-group">
				<label>Description</label>
				<textarea class="form-control" name="description" required></textarea>
			</div>
			</div>
			<div class="form-group">
				<label>ID</label>
				<input type="text" name="id" class="form-control" value="<?php echo $_GET['id']; ?>" required>
			</div>
			<div class="form-group">
				<label>Title</label>
				<input type="text" name="title" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Location</label>
				<input type="text" name="location" class="form-control" required>
			</div>
			<div class="form-group">
				<input type="file" name="file" class="form-file" required>
			</div>

			<input type="submit" name="submit" value="Edit" class="btn btn-primary btn-submit-2">
		</form>
	</div>
@endsection