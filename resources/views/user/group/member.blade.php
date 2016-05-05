@extends('layouts.app')

@section('htmlheader_title')
	Group
@endsection


@section('main-content')
<h1>Quản lý thành viên</h1>
<a href="{{url('user/group/')."/".$group->id."/panel/member/search"}}"><button type="button" class="btn btn-primary">Tìm kiếm thành viên</button></a>
<table class="table">

	<thead>
		<tr>
			<th>Họ tên</th>
			<th>Email</th>
			<th>Chức vụ trong nhóm</th>
			<th>Tác vụ</th>
		</tr>
	</thead>
	<tbody>
		@foreach($users as $user)
		<tr>
			<td>{{$user->name}}</td>
			<td>{{$user->email}}</td>
			<td>
			@if($user->isMemberGroup($group->id))
			Thành viên
			@else
			Trưởng nhóm
			@endif	
			</td>
			<td>
			@if($user->isMemberGroup($group->id))
			{{ Form::open(['url' => 'user/group/' . $group->id . '/panel/member/' . $user->id, 'method' => 'DELETE']) }}
            {{ Form::submit('Xóa', ['class' => 'btn btn-danger'])}}
            {{ Form::close() }}
			
			{{ Form::open(['url' => 'user/group/' . $group->id . '/panel/member/change/' . $user->id, 'method' => 'POST']) }}
            {{ Form::submit('Nhượng quyền', ['class' => 'btn btn-primary'])}}
            {{ Form::close() }}
            @endif
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

<h1>Quản lý yêu cầu tham gia nhóm</h1>
@endsection