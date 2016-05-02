@extends('layouts.app')

@section('htmlheader_title')
	Group
@endsection


@section('main-content')
<style>
	.content {
	    margin: 0;
	    padding: 20px 30px 66px;
	    position: relative;
	    background: #F1F4F5;
	    -webkit-transition: margin, .4s;
	    transition: margin, .4s;
	}
</style>
<div id="content" class="content container-fluid" style="min-height: 682px;">
  	<div class="row">
    	<div class="col-lg-12">
      		<div class="page-header">
        		<h2>Tạo nhóm mới</h2>
      		</div>
    	</div>
  	</div>
  	<form role="form">
	  	<div class="form-group">
		    <label for="name">Tên nhóm</label>
		    <input name="name" type="text" class="form-control" id="name">
	  	</div>
	  	
	  	<div class="form-group">
		    <label for="description">Mô tả nhóm</label>
		    <textarea name="description" class="form-control" rows="5" id="description"></textarea>
	  	</div>
	  	
	  	<div class="form-group">
		    <label for="github">Link github project</label>
		    <input name="github" type="text" class="form-control" id="github">
	  	</div>

	  	<button type="submit" class="btn btn-default">Tạo</button>
	</form>
</div>
@endsection