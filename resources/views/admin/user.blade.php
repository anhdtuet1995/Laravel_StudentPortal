@extends('admin.dashboard')

@section('task')
<h1>Quản lý thành viên</h1>
<a id="add-user"><button type="button" class="btn btn-primary">Thêm thành viên mới</button></a>
<table class="table">	
	<thead>
		<tr>
			<th></th>
			<th>Họ tên</th>
			<th>Email</th>
			<th>Trường</th>
			<th>Chuyên ngành</th>
			<th>Tác vụ</th>
		</tr>
	</thead>
	<tbody>
		<form action="{{url('admin/user/deleteMany')}}" method="post" accept-charset="utf-8">
			<button type="submit" class="btn btn-danger">Xóa nhiều</button>
			@foreach($users as $user)
			<div id="user-{{$user->id}}">
				<tr>
					<td><input type="checkbox" name="dusers[]" value="{{$user->id}}"></td>
					<td>{{$user->name}}</td>
					<td>{{$user->email}}</td>
					<td>{{$user->school}}</td>
					<td>{{$user->major}}</td>
					<td><a href="{{url('admin/user/edit')."/".$user->id}}" id="edit-user-{{$user->id}}"><button type="button" class="btn btn-info">Sửa</button></a></td>
				</tr>
			</div>
			@endforeach
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			
		</form>
	</tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="myCreate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Đăng ký thành viên</h4>
            </div>
            <div class="modal-body">

                <form id="formRegister" class="form-horizontal" role="form" method="POST" action="{{ url('admin/user/add') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label class="col-md-4 control-label">Họ tên</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="name">
                            <small class="help-block"></small>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Email</label>
                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email">
                            <small class="help-block"></small>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Password</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" name="password">
                            <small class="help-block"></small>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Nhập lại password</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" name="password_confirmation">
                        </div>
                    </div>
                    
					<div class="form-group">
                        <label class="col-md-4 control-label">Trường</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="school">
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-md-4 control-label">Chuyên ngành</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="major">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Tạo
                            </button>
                        </div>
                    </div>
                </form>                       

            </div>
        </div>
    </div>
</div>

<script>
	$('#add-user').click(function(event) {
		/* Act on the event */
		$('#myCreate').modal();
	});

	$(document).on('submit', '#formRegister', function(e) {  
        e.preventDefault();
        $.ajax({
            method: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json"
        })
        .done(function(data) {
            $('#myModal').modal('hide');
            location.reload();
        })
        .fail(function(data) {
            $.each(data.responseJSON, function (key, value) {
                var input = '#formRegister input[name=' + key + ']';
                $(input + '+small').text(value);
                $(input).parent().addClass('has-error');
            });
        });
    });
</script>

@endsection

