@extends('layouts.app')

@section('htmlheader_title')
    Task
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

	.testimonials .carousel-info img {
	    border: 1px solid #f5f5f5;
	    border-radius: 150px !important;
	    height: 75px;
	    padding: 3px;
	    width: 75px;
	}
	.testimonials .carousel-info {
	    overflow: hidden;
	}
	.testimonials .carousel-info img {
	    margin-right: 15px;
	}
	.testimonials .carousel-info span {
	    display: block;
	}
	.testimonials span.testimonials-name {
	    font-size: 16px;
	    font-weight: 300;
	    margin: 23px 0 7px;
	}
</style>
<!-- BEGIN TICKET -->
<div class="grid support-content">
	 <div class="grid-body">
		 <h2>Quản lý tác vụ</h2>
		 
		 <hr>
		 
		 <div class="btn-group">
			<button type="button" class="btn btn-default active">{{$group->tasks()->count()}} tác vụ</button>
		</div>
		
		<!-- BEGIN NEW TICKET -->
		<button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#newTask">Tạo tác vụ mới</button>
		<div class="modal fade" id="newTask" tabindex="-1" role="dialog" aria-labelledby="newIssue" aria-hidden="true">
			<div class="modal-wrapper">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header bg-blue">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title"><i class="fa fa-pencil"></i>Tạo tác vụ mới</h4>
						</div>
						<form id="form-add-task" action="{{url('user/group')."/".$group->id."/panel/task/manage/addTask"}}" method="post">
							<meta name="_token" content="{!! csrf_token() !!}" /> 
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="modal-body">
								<div class="form-group">
									<input name="name" id="name" type="text" class="form-control" placeholder="Tên tác vụ">
								</div>
								<div class="form-group">
									<textarea id="description" name="description" class="form-control" placeholder="Mô tả tác vụ" style="height: 120px;"></textarea>
								</div>
								<div class="form-group">
									<label for="person">Phân công cho:</label>
									<select class="form-control" name="person">
										@foreach($users as $user)
										<option value="{{$user->id}}">{{$user->name}}</option>
										@endforeach
									</select>
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

		<!-- Modal edit -->
		<div class="modal fade" id="editTask" tabindex="-1" role="dialog" aria-labelledby="editTask" aria-hidden="true">
			<div class="modal-wrapper">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header bg-blue">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title"><i class="fa fa-pencil"></i>Sửa tác vụ</h4>
						</div>
						<div id="form-edit"></div>
						
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End modal edit-->
		<div class="padding"></div>
		 
		<div class="row">
			<!-- BEGIN TICKET CONTENT -->
			<div class="col-md-12">
				<ul class="list-group fa-padding">
					@foreach($users as $user)
					<div class="row" style="padding-top:20px; padding-left: 20px">
				        <div class="testimonials">
				           	<div class="active item">
				                <div class="carousel-info">
				                    <img alt="" src="{{url('user/')."/".$user->avatar}}" class="pull-left">
				                    <div class="pull-left">
				                      	<span class="testimonials-name">{{$user->name}}</span>
				                    </div>
				                </div>
				            </div>
				        </div>
				    </div>
				    <table class="table" style="font-size:15px">
				    	<thead>
				    		<tr>
				    			<th>Tên tác vụ</th>
				    			<th>Mô tả tác vụ</th>
				    			<th>Trạng thái</th>
				    			<th>Tùy chọn</th>
				    		</tr>
				    	</thead>
				    	<tbody>
				    		@foreach($user->tasks()->where('group_id', $group->id)->get() as $task)
				    		<tr id="task-{{$task->id}}">
				    			<td width="20%">{{$task->name}}</td>
				    			<td width="60%">{{$task->description}}</td>
				    			<td width="10%">
				    				@if($task->status == "started")
									{{ Form::open(['route' => ['changeStatus', $group->id, $task->id], 'method' => 'POST']) }}
						            {{ Form::submit('started', ['class' => 'btn btn-info'])}}
						            {{ Form::close() }}
						            @elseif($task->status == "finished")
						            {{ Form::open(['route' => ['changeStatus', $group->id, $task->id], 'method' => 'POST']) }}
						            {{ Form::submit('finished', ['class' => 'btn btn-success'])}}
						            {{ Form::close() }}
						            @else
						            {{ Form::open(['route' => ['changeStatus', $group->id, $task->id], 'method' => 'POST']) }}
						            {{ Form::submit('pending', ['class' => 'btn btn-warning'])}}
						            {{ Form::close() }}
						            @endif
        						</td>
        						<td width="10%">
						            <div id="deleteTheTask['{{$task->id}}']">
						                <form method="POST" action="{{url('user/group')."/".$group->id."/panel/task/manage/".$task->id}}" accept-charset="UTF-8" id="formDeleteTask"><input name="_method" type="hidden" value="DELETE"><input type="hidden" value="{{ Session::token() }}" name="_token">
						                	<button id="edit-task-{{$task->id}}" type="button" class="btn btn-default">Sửa</button>
						                    <button type="submit" class="btn btn-danger deleteTask" id="btnDeleteTask" data-id="{{$task->id}}">Xóa</button>
						               </form>
						           </div>
        						</td>
				    		</tr>
				    		@endforeach
				    	</tbody>
				    </table>
				    
				    
				    
					@endforeach
				</ul>
			</div>
			<!-- END TICKET CONTENT -->
		</div>
	</div>
</div>
<!-- END TICKET -->
<script>
	@foreach($group->tasks()->get() as $task)
		$('#edit-task-{{$task->id}}').click(function(event) {
			$('#editTask').modal();
			$('#form-edit').empty();
			$('#form-edit').append('<form id="form-edit-task" action="{{url('user/group')."/".$group->id."/panel/task/manage/".$task->id."/editTask"}}" method="post"><meta name="_token" content="{!! csrf_token() !!}" /><input type="hidden" name="_token" value="{{ csrf_token() }}"><div class="modal-body"><div class="form-group"><input name="name" id="name" type="text" class="form-control" placeholder="Tên tác vụ" value="{{$task->name}}"></div><div class="form-group"><textarea id="description" name="description" class="form-control" placeholder="Mô tả tác vụ" value="" style="height: 120px;">{{$task->description}}</textarea></div><div class="form-group"><label for="person">Phân công cho:</label><select class="form-control" name="person">@foreach($users as $user)<option value="{{$user->id}}">{{$user->name}}</option>@endforeach</select></div></div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Bỏ qua</button><button type="submit" class="btn btn-primary pull-right"><i class="fa fa-pencil"></i> Sửa</button></div></form>');
		});
	@endforeach

	$('.deleteTask').on('click', function(e) {
	    var inputData = $('#formDeleteTask').serialize();

	    var dataId = $(this).attr('data-id');

	    $.ajax({
	        url: '{{ url('/user/group') }}'+"/"+ {{$group->id}}+ '/panel/task/manage/' + dataId,
	        type: 'DELETE',
	        data: inputData,
	        success: function( msg ) {
	            locaton.reload();
	        },
	        error: function( data ) {
	            console.log("Xóa bị lỗi");
	        }
	    });

	    return false;
	});

	$(document).on('submit', '#form-add-task', function(e){
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
            alert("Thêm tác vụ thành công!");
            $('#newTask').modal('hide');
            location.reload();
        })   
        
        .fail(function(data) {
            alert("Thêm tác vụ thất bại!");
        });
	});
</script>
@endsection

