@extends('layouts.app')

@section('htmlheader_title')
    Timeline Group
@endsection


@section('main-content')
<style>
	.row h3 {
		color: #666666;
	}

	.row.grid {
		margin-left: 0;
	}

	.grid {
		position: relative;
		width: 100%;
		background: #fff;
		color: #666666;
		border-radius: 2px;
		margin-bottom: 25px;
		box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.1);
	}

	.grid .grid-header {
		position: relative;
		border-bottom: 1px solid #ddd;
		padding: 15px 10px 10px 20px;
	}

	.grid .grid-header:before,
	.grid .grid-header:after {
		display: table;
		content: " ";
	}

	.grid .grid-header:after {
		clear: both;
	}

	.grid .grid-header span,
	.grid .grid-header > .fa {
		display: inline-block;
		margin: 0;
		font-weight: 300;
		font-size: 1.5em;
		float: left;
	}

	.grid .grid-header span {
		padding: 0 5px;
	}

	.grid .grid-header > .fa {
		padding: 5px 10px 0 0;
	}

	.grid .grid-header > .grid-tools {
		padding: 4px 10px;
	}

	.grid .grid-header > .grid-tools a {
		color: #999999;
		padding-left: 10px;
		cursor: pointer;
	}

	.grid .grid-header > .grid-tools a:hover {
		color: #666666;
	}

	.grid .grid-body {
		padding: 15px 20px 15px 20px;
		font-size: 0.9em;
		line-height: 1.9em;
	}

	.grid .full {
		padding: 0 !important;
	}

	.grid .transparent {
		box-shadow: none !important;
		margin: 0px !important;
		border-radius: 0px !important;
	}

	.grid.top.black > .grid-header {
		border-top-color: #000000 !important;
	}

	.grid.bottom.black > .grid-body {
		border-bottom-color: #000000 !important;
	}

	.grid.top.blue > .grid-header {
		border-top-color: #007be9 !important;
	}

	.grid.bottom.blue > .grid-body {
		border-bottom-color: #007be9 !important;
	}

	.grid.top.green > .grid-header {
		border-top-color: #00c273 !important;
	}

	.grid.bottom.green > .grid-body {
		border-bottom-color: #00c273 !important;
	}

	.grid.top.purple > .grid-header {
		border-top-color: #a700d3 !important;
	}

	.grid.bottom.purple > .grid-body {
		border-bottom-color: #a700d3 !important;
	}

	.grid.top.red > .grid-header {
		border-top-color: #dc1200 !important;
	}

	.grid.bottom.red > .grid-body {
		border-bottom-color: #dc1200 !important;
	}

	.grid.top.orange > .grid-header {
		border-top-color: #f46100 !important;
	}

	.grid.bottom.orange > .grid-body {
		border-bottom-color: #f46100 !important;
	}

	.grid.no-border > .grid-header {
		border-bottom: 0px !important;
	}

	.grid.top > .grid-header {
		border-top-width: 4px !important;
		border-top-style: solid !important;
	}

	.grid.bottom > .grid-body {
		border-bottom-width: 4px !important;
		border-bottom-style: solid !important;
	}


	/* SUPPORT TICKET */
	.support ul {
	    list-style: none;
		padding: 0px;
	}

	.support ul li {
		padding: 8px 10px;
	}

	.support ul li a {
		color: #999;
		display: block;
	}

	.support ul li a:hover {
		color: #666;
	}

	.support ul li.active {
		background: #0073b7;
	}

	.support ul li.active a {
		color: #fff;
	}

	.support ul.support-label li {
		padding: 2px 0px;
	}

	.support h2,
	.support-content h2 {
		margin-top: 5px;
	}

	.support-content .list-group li {
		padding: 15px 20px 12px 20px;
		cursor: pointer;
	}

	.support-content .list-group li:hover {
		background: #eee;
	}

	.support-content .fa-padding .fa {
		padding-top: 5px;
		width: 1.5em;
	}

	.support-content .info {
		color: #777;
		margin: 0px;
	}

	.support-content a {
		color: #111;
	}

	.support-content .info a:hover {
		text-decoration: underline;
	}

	.support-content .info .fa {
		width: 1.5em;
		text-align: center;
	}

	.support-content .number {
		color: #777;
	}

	.support-content img {
		margin: 0 auto;
		display: block;
	}

	.support-content .modal-body {
		padding-bottom: 0px;
	}

	.support-content-comment {
		padding: 10px 10px 10px 30px;
		background: #eee;
		border-top: 1px solid #ccc;
	}


	/* BACKGROUND COLORS */
	.bg-red, .bg-yellow, .bg-aqua, .bg-blue, .bg-light-blue, .bg-green, .bg-navy, .bg-teal, .bg-olive, .bg-lime, .bg-orange, .bg-fuchsia, .bg-purple, .bg-maroon, bg-gray, bg-black, .bg-red a, .bg-yellow a, .bg-aqua a, .bg-blue a, .bg-light-blue a, .bg-green a, .bg-navy a, .bg-teal a, .bg-olive a, .bg-lime a, .bg-orange a, .bg-fuchsia a, .bg-purple a, .bg-maroon a, bg-gray a, .bg-black a {
	    color: #f9f9f9 !important;
	}
	.bg-white, .bg-white a {
		color: #999999 !important;
	}
	.bg-red {
		background-color: #f56954 !important;
	}
	.bg-yellow {
		background-color: #f39c12 !important;
	}
	.bg-aqua {
		background-color: #00c0ef !important;
	}
	.bg-blue {
		background-color: #0073b7 !important;
	}
	.bg-light-blue {
		background-color: #3c8dbc !important;
	}
	.bg-green {
		background-color: #00a65a !important;
	}
	.bg-navy {
		background-color: #001f3f !important;
	}
	.bg-teal {
		background-color: #39cccc !important;
	}
	.bg-olive {
		background-color: #3d9970 !important;
	}
	.bg-lime {
		background-color: #01ff70 !important;
	}
	.bg-orange {
		background-color: #ff851b !important;
	}
	.bg-fuchsia {
		background-color: #f012be !important;
	}
	.bg-purple {
		background-color: #932ab6 !important;
	}
	.bg-maroon {
		background-color: #85144b !important;
	}
	.bg-gray {
		background-color: #eaeaec !important;
	}
	.bg-black {
		background-color: #222222 !important;
	}

</style>
<!-- BEGIN TICKET -->
<div class="grid support-content">
	 <div class="grid-body">
		 <h2>Issues</h2>
		 
		 <hr>
		 
		 <div class="btn-group">
			<button type="button" class="btn btn-default active">162 Open</button>
			<button type="button" class="btn btn-default">95,721 Closed</button>
		</div>
		 
		 <div class="btn-group">
			<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> Sort: <strong>Newest</strong> <span class="caret"></span></button>
			<ul class="dropdown-menu fa-padding" role="menu">
				<li><a href="#"><i class="fa fa-check"></i> Newest</a></li>
				<li><a href="#"><i class="fa"> </i> Oldest</a></li>
				<li><a href="#"><i class="fa"> </i> Recently updated</a></li>
				<li><a href="#"><i class="fa"> </i> Least recently updated</a></li>
				<li><a href="#"><i class="fa"> </i> Most commented</a></li>
				<li><a href="#"><i class="fa"> </i> Least commented</a></li>
			</ul>
		</div>
		
		<!-- BEGIN NEW TICKET -->
		<button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#newIssue">Tạo bài đăng mới</button>
		<div class="modal fade" id="newIssue" tabindex="-1" role="dialog" aria-labelledby="newIssue" aria-hidden="true">
			<div class="modal-wrapper">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header bg-blue">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title"><i class="fa fa-pencil"></i>Tạo bài đăng mới</h4>
						</div>
						<form id="form-add-post" action="" method="post">
							<meta name="_token" content="{!! csrf_token() !!}" /> 
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="modal-body">
								<div class="form-group">
									<input name="subject" id="subject" type="text" class="form-control" placeholder="Subject">
								</div>
								<div class="form-group">
									<textarea id="content" name="content" class="form-control" placeholder="Điền câu hỏi vào đây" style="height: 120px;"></textarea>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Bỏ qua</button>
								<button type="submit" class="btn btn-primary pull-right"><i class="fa fa-pencil"></i> Tạo</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- END NEW TICKET -->
		 
		<div class="padding"></div>
		 
		<div class="row">
			<!-- BEGIN TICKET CONTENT -->
			<div class="col-md-12">
				<ul class="list-group fa-padding">
					@foreach($posts as $post)
					<li class="list-group-item" id="list-issue-{{$post->id}}">
						<div class="media">
							<i class="fa fa-cog pull-left"></i>
							<div class="media-body">
								<strong>{{$post->subject}}</strong>
								<p class="info">Gửi bởi <a href="#">{{$post->user()->first()->name}}</a><i class="fa fa-comments"></i> <a href="#">{{$post->comments()->count()}} comments</a></p>
							</div>
						</div>
					</li>
					@endforeach
				</ul>
				
				<!-- BEGIN DETAIL TICKET -->
				<div class="modal fade" id="issue" tabindex="-1" role="dialog" aria-labelledby="issue" aria-hidden="true">
					<div class="modal-wrapper">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header bg-blue">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									<h4 class="modal-title"><i class="fa fa-cog"></i><div id="modal-subject-name"> Add drag and drop config import closes</h4>
								</div>
								<form action="#" method="post">
									<div class="modal-body">
										<div class="row">
											<div class="col-md-2">
												<img id="modal-avatar-question" src="assets/img/user/avatar01.png" class="img-circle" alt="" width="50">
											</div>
											<div class="col-md-10" id="modal-question">
												<p>Issue tạo bởi <a href="#">jqilliams</a></p>
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
												<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
											</div>
										</div>
										<div class="row support-content-comment">
											<div id="modal-answer">
												<div class="col-md-2">
													<img src="assets/img/user/avatar02.png" class="img-circle" alt="" width="50">
												</div>
												<div class="col-md-10">
													<p>Đăng bởi <a href="#">ehernandez</a> on 16/06/2014 at 14:12</p>
													<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
													
												</div>	
											</div>
										</div>
										<div id="modal-reply" style="padding-top:20px">
											<form id="form-reply" role="form" action="#" method="post" accept-charset="utf-8">
												<input type="hidden" name="_token" value="{{ csrf_token() }}">
												<div class="form-group">
													<textarea id="reply" name="content" class="form-control" placeholder="Điền câu hỏi vào đây" style="height: 120px;" rows="5"></textarea>
												</div>
												<button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i> Reply</button>
											</form>	
										</div>
										
										
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- END DETAIL TICKET -->
			</div>
			<!-- END TICKET CONTENT -->
		</div>
	</div>
</div>
<!-- END TICKET -->
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

<script>
	@foreach($posts as $post)
	$('#list-issue-{{$post->id}}').click(function(event) {
		$('#issue').modal();
		$('#modal-subject-name').empty();
		$('#modal-subject-name').append('{{$post->subject}}');
		$('#modal-avatar-question').attr('src', '{{url('/user/')."/".$post->user()->first()->avatar}}');
		$('#modal-question').empty();
		$('#modal-question').append('<p>{{$post->subject}} tạo bởi <a href="#">{{$post->user()->first()->name}}</a></p><p>{{$post->content}}</p>');
		$('#modal-answer').empty();
		@foreach($post->comments()->get() as $comment)
		$('#modal-answer').append('<div class="col-md-2"><img src="{{url('/user/')."/".$comment->user()->first()->avatar}}" class="img-circle" alt="" width="50"></div><div class="col-md-10"><p>Đăng bởi <a href="#">{{$comment->user()->first()->name}}</a> </p><p>{{$comment->content}}</p>')
		@endforeach
		$('#modal-reply').empty();
		$('#modal-reply').append('<form id="form-reply" role="form" action="{{url('/user/group'."/".$group->id."/panel/timeline/post/".$post->id."/reply")}}" method="post" accept-charset="utf-8"><input type="hidden" name="_token" value="{{ csrf_token() }}"><div class="form-group"><textarea id="reply" name="content" class="form-control" placeholder="Điền câu hỏi vào đây" style="height: 120px;" rows="5"></textarea></div><button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i> Reply</button></form>');
		
	});
	@endforeach
	$(document).on('submit', '#form-add-post', function(e){
		$.ajaxSetup({
	        header:$('meta[name="_token"]').attr('content')
	    })
	    
	    console.log(e);
		e.preventDefault();
		
		$.ajax({
            method: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json",
            success: function (data) {
	            console.log(data);
	        }
        })
        
        .done(function(data) {
            alert("Thêm bài đăng thành công!");
            $('#newIssue').modal('hide');
            location.reload();
        })   
        
        .fail(function(data) {
            alert("Thêm bài đăng thất bại!");
        });

        // $.get('{{url('user/skill/resJson')}}'+'?user_id=' + {{Auth::user()->id}}, function(data){
        // 	console.log(data);
        // 	$('.progress-skill').empty();
        // 	$.each(data, function(index, skillObj){
        //     $('.progress-skill').append('<div class="col-md-1"><div id="deleteTheSkill"><form method="POST" action="{{url('user/skill')."/"}}'+skillObj.id+'" accept-charset="UTF-8" id="formDeleteSkill"><input name="_method" type="hidden" value="DELETE"><input type="hidden" value="{{ Session::token() }}" name="_token"><button style="width:20px;height:20px" type="submit" class="btn btn-danger btn-xs deleteSkill" id="btnDeleteSkill" data-id="'+skillObj.id+'"><i class="fa fa-trash-o"></i></button></form></div></div><div class="col-md-11"><div class="progress"><div class="progress-bar active progress-bar-striped" role="progressbar" aria-valuenow="'+(skillObj.value * 10)+'" aria-valuemin="0" aria-valuemax="100" style="width: '+ (skillObj.value * 10) +'%"><span class="sr-only">'+(skillObj.value * 10)+' Complete</span></div><span class="progress-type">'+(skillObj.name)+'</span><span class="progress-completed">'+(skillObj.value * 10)+'%</span></div></div>');
        // });
        // });
	
	});

	$(document).on('submit', '#form-reply', function(e){
		$.ajaxSetup({
	        header:$('meta[name="_token"]').attr('content')
	    })
	    
	    console.log(e);
		e.preventDefault();
		
		$.ajax({
            method: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json",
            success: function (data) {
            	window.location.replace('{{url('user/group')."/".$group->id."/panel/timeline"}}');
	            console.log(data);
	        }
        })
        
        .done(function(data) {
        	
            alert("Thêm bình luận thành công!");
        })   
        
        .fail(function(data) {
            alert("Thêm bình luận thất bại!");
        });

        $.get('/', function(data){
         	console.log(data);
        // 	$('.progress-skill').empty();
        // 	$.each(data, function(index, skillObj){
        //     $('.progress-skill').append('<div class="col-md-1"><div id="deleteTheSkill"><form method="POST" action="{{url('user/skill')."/"}}'+skillObj.id+'" accept-charset="UTF-8" id="formDeleteSkill"><input name="_method" type="hidden" value="DELETE"><input type="hidden" value="{{ Session::token() }}" name="_token"><button style="width:20px;height:20px" type="submit" class="btn btn-danger btn-xs deleteSkill" id="btnDeleteSkill" data-id="'+skillObj.id+'"><i class="fa fa-trash-o"></i></button></form></div></div><div class="col-md-11"><div class="progress"><div class="progress-bar active progress-bar-striped" role="progressbar" aria-valuenow="'+(skillObj.value * 10)+'" aria-valuemin="0" aria-valuemax="100" style="width: '+ (skillObj.value * 10) +'%"><span class="sr-only">'+(skillObj.value * 10)+' Complete</span></div><span class="progress-type">'+(skillObj.name)+'</span><span class="progress-completed">'+(skillObj.value * 10)+'%</span></div></div>');
        });
        // });
	
	});
</script>
@endsection

