@extends('layouts.app')

@section('htmlheader_title')
	Group
@endsection


@section('main-content')
<?php use App\User; ?>
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

<ul class="menu">
    @foreach(Auth::user()->notifications()->whereIn('category_id', array(1, 4))->where('read', 0)->get() as $notification)
    @if($notification->category_id == 1)
    <li><!-- start notification -->
        <a href="#">
            <i class="fa fa-users text-aqua"></i> {{User::find($notification->from_id)->name . "muốn tham gia vào nhóm của bạn"}}
            
        </a>
        <center>
            <a href="{{url('user/profile')."/".$notification->from_id}}"><button type="button" class="btn btn-info">Xem thông tin</button></a>
            <a href="{{url('user/group')."/".$group->id."/panel/member/accept/".$notification->from_id."/".$notification->id}}"><button type="button" class="btn btn-primary">Đồng ý</button></a>
            <a href="{{url('user/notification/delete')."/".$notification->id}}"><button type="button" class="btn btn-danger">Xóa</button></a>    
        </center>
        
    </li><!-- end notification -->
    @elseif($notification->category_id == 4)
    <li><!-- start notification -->
        <a href="#">
            <i class="fa fa-users text-aqua"></i> {{User::find($notification->from_id)->name . " đã tham gia vào nhóm"}}
            
        </a>
        <center>
            <a href="{{url('user/notification/delete')."/".$notification->id}}"><button type="button" class="btn btn-danger">Xóa</button></a>    
        </center>
        
    </li><!-- end notification -->
    @endif
    @endforeach
</ul>
@endsection