@extends('layouts.app')

@section('htmlheader_title')
	Group
@endsection


@section('main-content')
@if(Auth::user()->isLeaderGroup($group->id))
<ul>
	<li><a href="{{url('user/group')."/".$group->id."/panel/edit"}}">Thông tin nhóm</a></li>
	<li><a href="#">Timeline</a></li>
	<li><a href="#">Chat nhóm</a></li>
	<li><a href="{{url('user/group')."/".$group->id."/panel/member"}}">Quản lý thành viên</a></li>
	<li><a href="#">Quản lý dự án</a></li>
	<li><a href="#">Cài đặt</a></li>
</ul>
@elseif(Auth::user()->isMemberGroup($group->id))
	<li><a href="#">Thông tin nhóm</a></li>
	<li><a href="#">Timeline</a></li>
	<li><a href="#">Quản lý dự án</a></li>
	<li><a href="#">Chat nhóm</a></li>
@endif
@endsection