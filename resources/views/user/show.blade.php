@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')

<style>

	#profile-data, #hobby{
		list-style-type: none;
		font-size: 20px;
	}

	#profile-data li strong{
		padding-right: 20px;
	}
	.progress {
	    position: relative;
		height: 25px;
	}
	.progress > .progress-type {
		position: absolute;
		left: 0px;
		font-weight: 800;
		padding: 3px 30px 2px 10px;
		color: rgb(255, 255, 255);
		background-color: rgba(25, 25, 25, 0.2);
	}
	.progress > .progress-completed {
		position: absolute;
		right: 0px;
		font-weight: 800;
		padding: 3px 10px 2px;
	}

</style>
<center><h1>Thông tin chi tiết </h1></center>
<section>
	<div class="tabs tabs-style-linetriangle">
		<nav>
			<ul>
				<li><a href="#section-linetriangle-1"><span>Thông tin cá nhân</span></a></li>
				<li><a href="#section-linetriangle-2"><span>Kỹ năng và sở thích</span></a></li>
				<li><a href="#section-linetriangle-3"><span>Công trình nghiên cứu</span></a></li>
			</ul>
		</nav>
		<div class="content-wrap">
			<section id="section-linetriangle-1">
				<div class="col-md-4">
					@if(Auth::user()->avatar != null)
					<img style="width:200px; height:200px" src="{{url('/user').'/'.Auth::user()->avatar}}" alt="">
					@else
					<img style="width:200px; height:200px" src="{{asset('img/default-avatar.png')}}" alt="">
					@endif
				</div>
				<div class="col-md-8" align="left">
					<ul id="profile-data">
						<li><strong>Họ tên:</strong> {{$user->name}}</li>
						<li><strong>Email:</strong> {{$user->email}}</li>
						<li><strong>Giới tính:</strong> 
							@if($user->gender == 0)
							Nam
							@else
							Nữ
							@endif
						</li>
						<li><strong>Trường học:</strong> {{$user->school}}</li>
						<li><strong>Chuyên ngành:</strong> {{$user->major}}</li>
					</ul>
					
				</div>
				<div class="col-md-12" align="middle">
					<a href="{{url('/user/edit')}}" title=""><button button type="button" class="btn btn-primary" style="font-size:20px;">Sửa thông tin cá nhân</button></a>	
				</div>
				
			</section>
			<section id="section-linetriangle-2">
				<div class="col-md-6" align="left" style="padding right:50px;">
					<meta name="_token" content="{{ csrf_token() }}" />   
					
					<div class="col-md-12" style="padding-bottom:20px">
						<h2 style="padding-bottom:20px">Kỹ năng lập trình</h2>
						<button id="addSkill" type="button" class="btn btn-primary">Thêm kỹ năng</button>
					</div>
					
					<div class="col-md-12">
						<div class="progress-skill">
						@foreach($skills as $skill)
						<div id="progress-skill-{{$skill->id}}">
							<div class="col-md-1">
								<div id="deleteTheSkill['{{$skill->id}}']">
					                <form method="POST" action="{{url('user/skill')."/".$skill->id}}" accept-charset="UTF-8" id="formDeleteSkill"><input name="_method" type="hidden" value="DELETE"><input type="hidden" value="{{ Session::token() }}" name="_token">
					                    <button style="width:20px;height:20px" type="submit" class="btn btn-danger btn-xs deleteSkill" id="btnDeleteSkill" data-id="{{$skill->id}}"><i class="fa fa-trash-o"></i></button>
					               </form>
					           </div>
							</div>
							<div class="col-md-11">
								<div class="progress">	
						            <div class="progress-bar active progress-bar-striped" role="progressbar" aria-valuenow="{{$skill->value * 10}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$skill->value * 10 . '%'}};">
						                <span class="sr-only">{{$skill->value * 10}} Complete</span>
						            </div>
						            <span class="progress-type">{{$skill->name}}</span>
						            <span class="progress-completed">{{$skill->value * 10 . "%"}}</span>
						        </div>
							</div>
						</div>
				        @endforeach
			        </div>
				</div>
				</div>
				
				<div class="col-md-6" align="left">
					<div class="col-md-12" style="padding-bottom:20px;">
						<h2 style="padding-bottom:20px;">Sở thích</h2>
						<button id="addHobby" type="button" class="btn btn-primary">Thêm sở thích</button>
					</div>
					
					<ul id="list-hobbies" style="list-style-type: none; font-size: 20px;">
						@foreach($hobbies as $hobby)
							<li id="hobby-{{$hobby->id}}">
								<div class="col-md-1">
									<form method="POST" action="{{url('user/hobby')."/".$hobby->id}}" accept-charset="UTF-8" id="formDeleteHobby"><input name="_method" type="hidden" value="DELETE"><input type="hidden" value="{{ Session::token() }}" name="_token">
					                    <button style="width:20px;height:20px" type="submit" class="btn btn-danger btn-xs deleteHobby" id="btnDeleteHobby" data-id="{{$hobby->id}}"><i class="fa fa-trash-o"></i></button>
							        </form>
							    </div>
							    <div class="col-md-11">
								{{$hobby->name}}
								</div>
							</li>
						@endforeach
					</ul>	
				</div>
			
			</section>
			<section id="section-linetriangle-3">
				<div class="container">
					<button id="addStudy" type="button" class="btn btn-primary">Thêm công trình nghiên cứu</button>
					<div id="list-studies" class="timeline timeline-alternating timeline-collapsing purple-flirt">

						@foreach($studies as $study)
						<div id="study-{{$study->id}}" class="timeline-block">
							<div class="timeline-icon"></div>
								<div class="timeline-content">
									<h2>{{$study->name}}</h2>
									<p>{{$study->description}}</p>
									<form method="POST" action="{{url('user/study')."/".$study->id}}" accept-charset="UTF-8" id="formDeleteStudy"><input name="_method" type="hidden" value="DELETE"><input type="hidden" value="{{ Session::token() }}" name="_token">
										<button id="deleteStudy" type="submit" class="btn btn-danger" id="btnDeleteStudy" data-id="{{$study->id}}">Xóa</button>	
									</form>       
									<div class="timeline-date">{{$study->publication_date}}</div>
								</div>
						</div>
						@endforeach
					</div>
				</div>
			</section>
		</div><!-- /content -->
	</div><!-- /tabs -->
</section>
<!-- Modal -->
    <div class="modal fade" id="modalSkill" tabindex="-1" role="dialog" aria-labelledby="modalSkill" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="modalSkillLabel">Thêm kỹ năng</h4>
                </div>
                <div class="modal-body">

                    <form id="form-add-skill" class="form-horizontal" role="form" method="POST" action="{{url('user/skill/add')}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label">Kỹ năng</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="skill" id="skill">
                                <small class="help-block"></small>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Tự đánh giá mức độ (Thang điểm 10)</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="mark" id="mark" min="1" max="10">
                                <small class="help-block"></small>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Thêm
                                </button>
                            </div>
                        </div>
                    </form>                       

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalHobby" tabindex="-1" role="dialog" aria-labelledby="modalHobby" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="modalHobbyLabel">Thêm kỹ năng</h4>
                </div>
                <div class="modal-body">

                    <form id="form-add-hobby" class="form-horizontal" role="form" method="POST" action="{{url('user/hobby/add')}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label">Loại sở thích</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="hobby" id="hobby">
                                <small class="help-block"></small>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Thêm
                                </button>
                            </div>
                        </div>
                    </form>                       

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalStudy" tabindex="-1" role="dialog" aria-labelledby="modalStudy" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="modalStudyLabel">Thêm kỹ năng</h4>
                </div>
                <div class="modal-body">

                    <form id="form-add-study" class="form-horizontal" role="form" method="POST" action="{{url('user/study/add')}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label">Tên công trình nghiên cứu</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="study-name" id="study-name">
                                <small class="help-block"></small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Mô tả về công trình</label>
                            <div class="col-md-6">
                                <textarea name="study-description" rows="5" class="form-control"></textarea>
                                <small class="help-block"></small>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-md-4 control-label">Ngày công bố</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control" name="study-date" id="study-date">
                                <small class="help-block"></small>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Thêm
                                </button>
                            </div>
                        </div>
                    </form>                       

                </div>
            </div>
        </div>
    </div>
<script>
	function autoRefresh1()
	{
		   window.location.reload();
	}
 

	(function() {
		[].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
			new CBPFWTabs( el );
		});
	})();

	$(document).ready(function(){
		$('.deleteSkill').on('click', function(e) {
		    var inputData = $('#formDeleteSkill').serialize();

		    var dataId = $(this).attr('data-id');

		    $.ajax({
		        url: '{{ url('/user/skill') }}' + '/' + dataId,
		        type: 'DELETE',
		        data: inputData,
		        success: function( msg ) {
		            // $('#process-a-Skill-['+msg.skill_id+']').hide();
		            console.log(msg.skill_id);
		            $("#progress-skill-"+msg.skill_id).hide();
		        },
		        error: function( data ) {
		            console.log("Xóa bị lỗi");
		        }
		    });

		    return false;
		});

		$('.deleteHobby').on('click', function(e) {
		    var inputData = $('#formDeleteHobby').serialize();

		    var dataId = $(this).attr('data-id');

		    $.ajax({
		        url: '{{ url('/user/hobby') }}' + '/' + dataId,
		        type: 'DELETE',
		        data: inputData,
		        success: function( msg ) {
		            // $('#process-a-Skill-['+msg.skill_id+']').hide();
		            console.log(msg.hobby_id);
		            $("#hobby-"+msg.hobby_id).hide();
		        },
		        error: function( data ) {
		            console.log("Xóa bị lỗi");
		        }
		    });

		    return false;
		});

		$('#deleteStudy').on('click', function(e) {
		    var inputData = $('#formDeleteStudy').serialize();

		    var dataId = $(this).attr('data-id');

		    $.ajax({
		        url: '{{ url('/user/study') }}' + '/' + dataId,
		        type: 'DELETE',
		        data: inputData,
		        success: function( msg ) {
		            // $('#process-a-Skill-['+msg.skill_id+']').hide();
		            console.log(msg.study_id);
		            $("#study-"+msg.study_id).hide();
		        },
		        error: function( data ) {
		            console.log("Xóa bị lỗi");
		        }
		    });

		    return false;
		});
	});
	$(function(){
		$('#addSkill').click(function() {
            $('#modalSkill').modal();  
        });

		$('#addHobby').click(function() {
			$('#modalHobby').modal();
		});

		$('#addStudy').click(function() {
			$('#modalStudy').modal();
		});

		$(document).on('submit', '#form-add-skill', function(e){
			
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
	            alert("Thêm kỹ năng thành công!");
	            $('#modalSkill').modal('hide');
	        })   
	        
	        .fail(function(data) {
	            alert("Thêm kỹ năng thất bại!");
	        });

	        $.get('{{url('user/skill/resJson')}}'+'?user_id=' + {{Auth::user()->id}}, function(data){
	        	console.log(data);
	        	$('.progress-skill').empty();
	        	$.each(data, function(index, skillObj){
                $('.progress-skill').append('<div class="col-md-1"><div id="deleteTheSkill"><form method="POST" action="{{url('user/skill')."/"}}'+skillObj.id+'" accept-charset="UTF-8" id="formDeleteSkill"><input name="_method" type="hidden" value="DELETE"><input type="hidden" value="{{ Session::token() }}" name="_token"><button style="width:20px;height:20px" type="submit" class="btn btn-danger btn-xs deleteSkill" id="btnDeleteSkill" data-id="'+skillObj.id+'"><i class="fa fa-trash-o"></i></button></form></div></div><div class="col-md-11"><div class="progress"><div class="progress-bar active progress-bar-striped" role="progressbar" aria-valuenow="'+(skillObj.value * 10)+'" aria-valuemin="0" aria-valuemax="100" style="width: '+ (skillObj.value * 10) +'%"><span class="sr-only">'+(skillObj.value * 10)+' Complete</span></div><span class="progress-type">'+(skillObj.name)+'</span><span class="progress-completed">'+(skillObj.value * 10)+'%</span></div></div>');
            });
	        });
		
		});

		$(document).on('submit', '#form-add-hobby', function(e){
			
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
	            alert("Thêm sở thích thành công!");
	            $('#modalHobby').modal('hide');
	        })   
	        
	        .fail(function(data) {
	            alert("Thêm sở thích thất bại!");
	        });
			
			$.get('{{url('user/hobby/resJson')}}'+'?user_id=' + {{Auth::user()->id}}, function(data){
	        	console.log(data);
	        	$('#list-hobbies').empty();
	        	$.each(data, function(index, hobbyObj){
                $('#list-hobbies').append('<li id="hobby-'+hobbyObj.id+'"><div class="col-md-1"><form method="POST" action="{{url('user/hobby')."/"}}'+hobbyObj.id+'" accept-charset="UTF-8" id="formDeleteHobby"><input name="_method" type="hidden" value="DELETE"><input type="hidden" value="{{ Session::token() }}" name="_token"><button style="width:20px;height:20px" type="submit" class="btn btn-danger btn-xs deleteHobby" id="btnDeleteHobby" data-id="'+hobbyObj.id+'"><i class="fa fa-trash-o"></i></button></form></div><div class="col-md-11">'+hobbyObj.name+'</div></li>');
            	});
			});
		});

		$(document).on('submit', '#form-add-study', function(e){
			
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
	            alert("Thêm công trình nghiên cứu thành công!");
	            $('#modalHobby').modal('hide');
	        })   
	        
	        .fail(function(data) {
	            alert("Thêm công trình nghiên cứu thất bại!");
	        });
			
			$.get('{{url('user/study/resJson')}}'+'?user_id=' + {{Auth::user()->id}}, function(data){
	        	console.log(data);
	        	$('#list-studies').empty();
	        	$.each(data, function(index, studyObj){
                $('#list-studies').append('<div class="timeline-block"><div class="timeline-icon"></div><div class="timeline-content"><h2>'+studyObj.name+'</h2><p>'+studyObj.description+'</p><button id="deleteStudy" type="button" class="btn btn-danger">Xóa</button><div class="timeline-date">'+studyObj.publication_date+'</div></div></div>');
            	});
			});
		});
	});
</script>
@endsection

