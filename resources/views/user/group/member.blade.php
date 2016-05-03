@extends('layouts.app')

@section('htmlheader_title')
	Group
@endsection


@section('main-content')
<table class="table">
	<caption>table title and/or explanatory text</caption>
	<thead>
		<tr>
			<th>Họ tên</th>
			<th>Email</th>
			<th>Tác vụ</th>
		</tr>
	</thead>
	<tbody>
		@foreach($users as $user)
		<tr>
			<td>{{$user->name}}</td>
			<td>{{$user->email}}</td>
			<td><button type="button" class="btn btn-danger">Xóa</button></td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection