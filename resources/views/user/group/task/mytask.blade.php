@extends('layouts.app')

@section('htmlheader_title')
    My tasks
@endsection


@section('main-content')
<style>
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
</style>

<div class="grid support-content">
	<div class="grid-body">
		<h1>My Tasks</h1>
		<hr>
		<table style="padding-left:20px"class="table" style="font-size:15px">
			<thead>
				<tr>
					<th>Tên tác vụ</th>
					<th>Mô tả tác vụ</th>
					<th>Trạng thái</th>
				</tr>
			</thead>
			<tbody>
				@foreach($tasks as $task)
				<tr>
					<td width="20%">{{$task->name}}</td>
					<td width="60%">{{$task->description}}</td>
					<td width="20%">
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
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection