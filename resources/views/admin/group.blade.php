@extends('admin.dashboard')

@section('task')
<style>
	@foreach($groups as $group)
    #des-{{$group->id}} .more-text-{{$group->id}} {
        display: none;
    }
    @endforeach
</style>
<h1>Quản lý nhóm</h1>
<a id="add-group"><button type="button" class="btn btn-primary">Thêm nhóm</button></a>
<table class="table">	
	<thead>
		<tr>
			<th></th>
			<th>Tên nhóm</th>
			<th>Mô tả</th>
			<th>Link github</th>
			<th>Trưởng nhóm</th>
			<th>Số thành viên</th>
			<th>Tác vụ</th>
		</tr>
	</thead>
	<tbody>
		<form action="{{url('admin/group/deleteMany')}}" method="post" accept-charset="utf-8">
			<button type="submit" class="btn btn-danger">Xóa nhiều</button>
			@foreach($groups as $group)
			<div id="group-{{$group->id}}">
				<tr>
					<td><input type="checkbox" name="dgroups[]" value="{{$group->id}}"></td>
					<td>{{$group->name}}</td>
					<td id="des-{{$group->id}}">{{$group->description}}</td>
					<script>
						var maxLength = 300;
		                $("#des-{{$group->id}}").each(function(){
		                    var myStr = $(this).text();
		                    if($.trim(myStr).length > maxLength){
		                        var newStr = myStr.substring(0, maxLength);
		                        var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
		                        $(this).empty().html(newStr);
		                        $(this).append(' <a href="javascript:void(0);" class="read-more-{{$group->id}}">Đọc tiếp...</a>');
		                        $(this).append('<span class="more-text-{{$group->id}}">' + removedStr + '</span>');
		                    }
		                });
		                $(".read-more-{{$group->id}}").click(function(){
		                    $(this).siblings(".more-text-{{$group->id}}").contents().unwrap();
		                    $(this).remove();
		                });
					</script>
					<td>{{$group->github}}</td>
					<td>{{$group->getLeader()->name}}</td>	
					<td>{{$group->users()->count()}}/{{$group->limituser}}</td>				
					<td><a href="{{url('admin/group/edit')."/".$group->id}}"><button type="button" class="btn btn-info">Sửa</button></a></td>
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
                <h4 class="modal-title" id="myModalLabel">Tạo nhóm</h4>
            </div>
            <div class="modal-body">

                <form id="formRegister" class="form-horizontal" role="form" method="POST" action="{{ url('admin/group/add') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label class="col-md-4 control-label">Tên nhóm</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="name">
                            <small class="help-block"></small>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Mô tả nhóm</label>
                        <div class="col-md-6">
                            <textarea name="description" rows="5" class="form-control"></textarea>
                            <small class="help-block"></small>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Link github</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="github">
                            <small class="help-block"></small>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Trưởng nhóm</label>
                        <div class="col-md-6">
                            <select name="leader" class="form-control" >
                            	@foreach($users as $user)
                            	<option value="{{$user->id}}">{{$user->name}}</option>
                        		@endforeach
                            </select>
                        </div>
                    </div>
                    
					<div class="form-group">
                        <label class="col-md-4 control-label">Giới hạn số thành viên (từ 3 đến 10)</label>
                        <div class="col-md-6">
                            <input type="number" min="3" max="10" class="form-control" name="limituser">
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
	$('#add-group').click(function(event) {
		/* Act on the event */
		$('#myCreate').modal();
	});

	
</script>
@endsection