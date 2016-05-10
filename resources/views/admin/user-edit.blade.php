@extends('admin.dashboard')

@section('task')
<h2>Sửa người dùng {{$user->name}}</h2>
<form id="formRegister" class="form-horizontal" role="form" method="POST" action="{{ url('admin/user/edit')."/".$user->id }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-group">
        <label class="col-md-4 control-label">Họ tên</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="name" value="{{$user->name}}">
            <small class="help-block"></small>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Email</label>
        <div class="col-md-6">
            <input type="email" class="form-control" name="email" value="{{$user->email}}" disabled>
            <small class="help-block"></small>
        </div>
    </div>
    
	<div class="form-group">
        <label class="col-md-4 control-label">Trường</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="school" value="{{$user->school}}">
        </div>
    </div>
	
	<div class="form-group">
        <label class="col-md-4 control-label">Chuyên ngành</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="major" value="{{$user->major}}">
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