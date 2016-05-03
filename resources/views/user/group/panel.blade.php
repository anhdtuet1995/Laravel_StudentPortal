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

@if(Auth::user()->isLeaderGroup($group->id))
<script>
	if($('li').hasClass('active')){
    	$('li').removeClass('active');
    	$('#menu-my-group').addClass('active');
    	$('#my-group-{{$group->id}}').addClass('active');
    };
</script>
@elseif(Auth::user()->isMemberGroup($group->id))
<script>
	if($('li').hasClass('active')){
    	$('li').removeClass('active');
    	$('#menu-other-group').addClass('active');
    	$('#other-group-{{$group->id}}').addClass('active');
    };
</script>
@endif
@endsection