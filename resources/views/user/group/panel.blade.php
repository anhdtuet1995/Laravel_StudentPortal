@extends('layouts.app')

@section('htmlheader_title')
	Group
@endsection


@section('main-content')
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600,700" rel="stylesheet" type="text/css" />
<style>
#menu-metro {
    width: 50%;
    margin: 120px auto;
}
#menu-metro li {
    width: 200px;
    height: 200px;
    margin-right: 10px;
    margin-bottom: 10px;
    float: left;
    list-style: none;
    position: relative;
    cursor: pointer;
    font-family:'Open Sans';
    font-weight: 300;
    -webkit-perspective:1000;
   -moz-perspective:1000;
    -ms-perspective:1000;
     -o-perspective:1000;
        perspective:1000;
}
#menu-metro li div {
    color: #fff;
    width: 100%;
    height: 100%;
    position: absolute;
   /*transition*/
	-webkit-transition:all 0.5s ease;
	   -moz-transition:all 0.5s ease;
	     -o-transition:all 0.5s ease;
	        transition:all 0.5s ease;
	/*backface-visibility*/
	-webkit-backface-visibility:hidden;
	   -moz-backface-visibility:hidden;
	    -ms-backface-visibility:hidden;
	     -o-backface-visibility:hidden;
	        backface-visibility:hidden;
}
.front {
    z-index: 3;
    color: #fff;
    text-align: center;
    line-height: 210px;
    font-size: 20px;
    background: #e3e3e3;
}

.back {
    color: #fff;
    text-align: center;
    line-height: 200px;
    font-size: 22px;
    -webkit-transform:rotateY(180deg);
   -moz-transform:rotateY(180deg);
    -ms-transform:rotateY(180deg);
     -o-transform:rotateY(180deg);
        transform:rotateY(180deg);
    background: #34495e;
}
li:hover > .front{
    z-index: 0;
  -webkit-transform:rotateY(180deg);
   -moz-transform:rotateY(180deg);
    -ms-transform:rotateY(180deg);
     -o-transform:rotateY(180deg);
        transform:rotateY(180deg);
}
li:hover > .back {
    -webkit-transform:rotateY(0deg);
   -moz-transform:rotateY(0deg);
    -ms-transform:rotateY(0deg);
     -o-transform:rotateY(0deg);
        transform:rotateY(0deg);
}
#box1 {
    background: #e74c3c;
}
#box2 {
    background: #2ecc71;
}
#box3 {
    background: #3498db;
}
#box4 {
    background: #f1c40f;
}
#box5 {
    background: #e67e22;
}
#box6 {
    background: #1abc9c;
}	
</style>
@if(Auth::user()->isLeaderGroup($group->id))
<center><h1>Chào mừng đến với nhóm {{$group->name}}</h1></center>
<nav>
<ul id="menu-metro">
	<a href="{{url('user/group')."/".$group->id."/panel/edit"}}"><li>
		<div class="front" id="box1">
			<i class="fa fa-users fa-3x"></i>
		</div>
		<div class="back">Thông tin nhóm</div>
		
	</li></a>
	<a href="{{url('user/group'."/".$group->id."/panel/timeline")}}"><li>
		<div class="front" id="box2">
			<i class="fa fa-calendar-o fa-3x"></i>
		</div>
		<div class="back">Timeline</div></li></a>
	<a href="{{url('user/group')."/".$group->id."/panel/member"}}"><li>
		<div class="front" id="box3">
			<i class="fa fa-user fa-3x" aria-hidden="true"></i>
		</div>
		<div class="back">Quản lý thành viên</div></li></a>
	<a href="{{url('user/group')."/".$group->id."/panel/task/manage"}}"><li>
		<div class="front" id="box4">
			<i class="fa fa-tasks fa-3x" aria-hidden="true"></i>
		</div>
		<div class="back">Quản lý dự án</div></li></a>
    <a href="{{url('user/group')."/".$group->id."/panel/mytask"}}"><li>
        <div class="front" id="box5">
            <i class="fa fa-thumb-tack fa-3x" aria-hidden="true"></i>
        </div>
        <div class="back">My tasks</div></li></a>   
	<a href="#"><li>
		<div class="front" id="box6">
			<i class="fa fa-cog fa-3x" aria-hidden="true"></i>
		</div>
		<div class="back">Cài đặt</div></li></a>
</ul>
</nav>
@elseif(Auth::user()->isMemberGroup($group->id))
<center><h1>Chào mừng đến với nhóm {{$group->name}}</h1></center>
<nav>
<ul id="menu-metro">
	<a href="{{url('user/group')."/".$group->id}}"><li>
		<div class="front" id="box1">
			<i class="fa fa-users fa-3x"></i>
		</div>
		<div class="back">Thông tin nhóm</div>		
	</li></a>
	<a href="{{url('user/group'."/".$group->id."/panel/timeline")}}"><li>
		<div class="front" id="box2">
			<i class="fa fa-calendar-o fa-3x"></i>
		</div>
		<div class="back">Timeline</div></li></a>
	<a href="{{url('user/group')."/".$group->id."/panel/mytask"}}"><li>
		<div class="front" id="box4">
			<i class="fa fa-thumb-tack fa-3x" aria-hidden="true"></i>
		</div>
		<div class="back">My tasks</div></li></a>
	<a href="#"><li>
		<div class="front" id="box5">
			<i class="fa fa-sign-out fa-3x" aria-hidden="true"></i>
		</div>
		<div class="back">Rời nhóm</div></li></a>
</ul>
</nav>
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