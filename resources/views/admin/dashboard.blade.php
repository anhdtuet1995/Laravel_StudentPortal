@extends('admin.layout')

@section('content')
<div class="container bootstrap snippet">
  
  <!-- upper section -->
  <div class="row">
    	<div class="col-md-3">
	      	<!-- left -->
	      	<a href="#"><strong><i class="glyphicon glyphicon-briefcase"></i> Tác vụ</strong></a>
	      	<hr>
	      
	      	<ul class="nav nav-pills nav-stacked">
	        	<li><a href="{{url('admin/user')}}"><i class="glyphicon glyphicon-flash"></i> Quản lý thành viên</a></li>
	        	<li><a href="{{url('admin/group')}}"><i class="glyphicon glyphicon-link"></i> Quản lý nhóm</a></li>
	      	</ul>
	      
	      	<hr>
	      
    	</div><!-- /span-3 -->
    	<div class="col-md-9">      
      	<!-- column 2 --> 
       		<a href="#"><strong><i class="glyphicon glyphicon-dashboard"></i> My Dashboard</strong></a>     
       		<hr>
       		<div class="row">
            @yield('task')
       		</div><!--/row-->
    	</div><!--/col-span-9-->
 	</div><!--/row-->
  	<!-- /upper section -->
</div><!--/container-->
@endsection
