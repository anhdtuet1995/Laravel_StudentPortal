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
					<form id="form-add-skill" action="{{url('user/addSkill')}}" method="post" accept-charset="utf-8">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="text" name="skill" id="skill">
						<input type="text" name="mark" id="mark">
						<input type="submit" name="submit" value="Thêm kỹ năng">
					</form>
					<h2 style="padding-bottom:30px;">Kỹ năng lập trình</h2>
					<div class="progress-skill">
					@foreach($skills as $skill)
					<div class="progress">
			            <div class="progress-bar active progress-bar-striped" role="progressbar" aria-valuenow="{{$skill->value * 10}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$skill->value * 10 . '%'}};">
			                <span class="sr-only">{{$skill->value * 10}} Complete</span>
			            </div>
			            <span class="progress-type">{{$skill->name}}</span>
			            <span class="progress-completed">{{$skill->value * 10 . "%"}}</span>
			        </div>
			        @endforeach
			        </div>
					@if($languageskills->count() > 0)
			        <h2 style="padding-bottom:30px;padding-top:30px;">Kỹ năng ngôn ngữ</h2>
					@foreach($languageskills as $languageskill)
					<div class="progress">
			            <div class="progress-bar active progress-bar-striped" role="progressbar" aria-valuenow="{{$skill->value * 10}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$skill->value * 10 . '%'}};">
			                <span class="sr-only">{{$languageskill->value * 10}} Complete</span>
			            </div>
			            <span class="progress-type">{{$languageskill->name}}</span>
			            <span class="progress-completed">{{$languageskill->value * 10 . "%"}}</span>
			        </div>
			        @endforeach
			        @endif
				</div>
				
				
				<div class="col-md-6" align="left">
					<h2 style="padding-bottom:30px;">Sở thích</h2>
					<ul style="list-style-type: none; font-size: 20px;">
						@foreach($hobbies as $hobby)
							<li>{{$hobby->name}}</li>
						@endforeach
					</ul>	
				</div>
				
			</section>
			<section id="section-linetriangle-3">
				<div class="container">
					<div class="timeline timeline-alternating timeline-collapsing purple-flirt">
						@foreach($studies as $study)
						<div class="timeline-block">
							<div class="timeline-icon"></div>
								<div class="timeline-content">
									<h2>{{$study->name}}</h2>	       
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

	$(function(){
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
	        })   
	        
	        .fail(function(data) {
	            alert("Thêm kỹ năng thất bại!");
	        });

	        $.get('{{url('user/skill/resJson')}}'+'?user_id=' + {{Auth::user()->id}}, function(data){
	        	console.log(data);
	        	$('.progress-skill').empty();
	        	$.each(data, function(index, skillObj){
                $('.progress-skill').append('<div class="progress"><div class="progress-bar active progress-bar-striped" role="progressbar" aria-valuenow="'+(skillObj.value * 10)+'" aria-valuemin="0" aria-valuemax="100" style="width: '+ (skillObj.value * 10) +'%"><span class="sr-only">'+(skillObj.value * 10)+' Complete</span></div><span class="progress-type">'+(skillObj.name)+'</span><span class="progress-completed">'+(skillObj.value * 10)+'%</span></div>');
            });
	        });
		
		});
	});
</script>
@endsection