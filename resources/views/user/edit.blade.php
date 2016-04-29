@extends('layouts.app')

@section('htmlheader_title')
	Edit profile
@endsection


@section('main-content')
<center><h1>Sửa thông tin cá nhân</h1></center>
<div class="container bootstrap snippet">
	<div class="row">
      	<!-- left column -->
      	<form action="{{ url('user/edit') }}" class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
	      	<div class="col-md-3" style="padding-top:20px">
	        	<div class="text-center">
	          		<img src="{{url('user/') . "/". Auth::user()->avatar}}" id="avatar" class="avatar img-circle" alt="avatar" style="width:150px; height:150px">
	          		<h6>Chọn một bức ảnh khác...</h6>
	          
	          		<input type="file" id="jimage" class="form-control" name="image">
	        	</div>
	     	</div>
	      
	      	<!-- edit form column -->
	      	<div class="col-md-9 personal-info" style= "padding-top:20px">
	      		<div class="form-group">
	        		<label class="col-lg-3 control-label">Họ tên:</label>
	       			<div class="col-lg-8">
	          			<input name="name" class="form-control" type="text" value="{{Auth::user()->name}}">
	        		</div>
	      		</div>

	      		<div class="form-group">
	        		<label class="col-lg-3 control-label">Email: </label>
	       			<div class="col-lg-8">
	          			<input name="email" class="form-control" type="text" value="{{Auth::user()->email}}" disabled>
	        		</div>
	      		</div>

	      		<div class="form-group">
	        		<label class="col-lg-3 control-label">Giới tính: </label>
	       			<div class="col-lg-8">
	          			<select name="gender" class="form-control">
	          				<option value="0">Nam</option>
	          				<option value="1">Nữ</option>
	          			</select>
	        		</div>
	      		</div>
				
				<div class="form-group">
	        		<label class="col-lg-3 control-label">Trường học: </label>
	       			<div class="col-lg-8">         		
	          			<input name="school" class="form-control" type="text" value="{{Auth::user()->school}}">
	        		</div>
	      		</div>
				
				<div class="form-group">
	        		<label class="col-lg-3 control-label">Chuyên ngành: </label>
	       			<div class="col-lg-8">         		
	          			<input name="major" class="form-control" type="text" value="{{Auth::user()->major}}">
	        		</div>
	      		</div>
	      	</div>
			
			<div class="col-md-12" align="middle" style="padding-top:20px">
	      		<button type="submit" class="btn btn-primary">Lưu lại</button>
    			<input type="hidden" value="{{ Session::token() }}" name="_token">
    		</div>
      	</form>
  	</div>
</div>
<hr>

<script>
	$(document).ready(function() {
	    document.getElementById("jimage").onchange = function () {
	        var reader = new FileReader();

	        reader.onload = function (e) {
	            document.getElementById("avatar").src = e.target.result;
	        };
	        reader.readAsDataURL(this.files[0]);
	    };
	});
</script>
@endsection