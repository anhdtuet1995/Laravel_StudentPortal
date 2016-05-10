@extends('admin.dashboard')

@section('task')
<h2>Sửa nhóm {{$group->name}}</h2>
<form id="formRegister" class="form-horizontal" role="form" method="POST" action="{{ url('admin/group/edit')."/".$group->id }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-group">
        <label class="col-md-4 control-label">Tên nhóm</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="name" value="{{$group->name}}">
            <small class="help-block"></small>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Mô tả nhóm</label>
        <div class="col-md-6">
            <textarea name="description" rows="5" class="form-control">{{$group->description}}</textarea>
            <small class="help-block"></small>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Link github</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="github" value="{{$group->github}}">
            <small class="help-block"></small>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Trưởng nhóm</label>
        <div class="col-md-6">
            <select name="leader" class="form-control" value="{{$group->leader}}">
            	@foreach($users as $user)
            	<option value="{{$user->id}}">{{$user->name}}</option>
        		@endforeach
            </select>
        </div>
    </div>
    
	<div class="form-group">
        <label class="col-md-4 control-label">Giới hạn số thành viên (từ 3 đến 10)</label>
        <div class="col-md-6">
            <input type="number" min="3" max="10" class="form-control" name="limituser" value="{{$group->limituser}}">
        </div>
    </div>
	
    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                Sửa
            </button>
        </div>
    </div>
</form>                       

@endsection