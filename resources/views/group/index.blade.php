@extends('layouts.app')

@section('htmlheader_title')
	Group
@endsection

<?php use App\Group; ?>
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
.email-container, .contacts-search, .projects-search {
    position: relative;
}
.inbox-head, .contacts-search, .projects-search {
    min-height: 80px;
    padding: 20px 0;
}
.email-container .search-input, .contacts-search .search-input, .projects-search .search-input {
    width: -webkit-calc(100% - 60px);
    width: calc(100% - 60px);
}
.inbox-head .search-input, .contacts-search .search-input, .projects-search .search-input {
    border: 1px solid #E7EBEC;
    -webkit-border-radius: 3px 0 0 3px;
    border-radius: 3px 0 0 3px;
    -webkit-box-shadow: none;
    box-shadow: none;
    color: #8a8a8a;
    float: left;
    height: 40px;
    padding: 0 10px;
}
.email-container .search-btn, .contacts-search .search-btn, .projects-search .search-btn {
    width: 60px;
}
.inbox-head .search-btn, .contacts-search .search-btn, .projects-search .search-btn {
    background: #63A8EB;
    border: none;
    -webkit-border-radius: 0 3px 3px 0;
    border-radius: 0 3px 3px 0;
    color: #fff;
    height: 40px;
    padding: 0 20px;
    -webkit-box-shadow: none;
    box-shadow: none;
}
.project-wrapper {
    background: transparent !important;
}
.content-box {
    position: relative;
    background: #fff;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    margin-bottom: 30px;
    overflow: hidden;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.05);
    box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.05);
}
.project-item {
    margin-bottom: 12px;
    display: inline-block;
    width: 100%;
    position: relative;
}
.project-item .status-desktop, .project-item .status-mobile {
    margin-top: 20px;
    font-weight: 400;
    width: 100px;
}
.project-box {
    -webkit-border-radius: 3px;
    border-radius: 3px;
    padding: 10px;
    width: -webkit-calc(100% - 100px);
    width: calc(100% - 100px);
}
.white-bg {
    background: #fff !important;
}
.project-item .status-desktop .active:before, .project-item .status-mobile .active:before {
    background: #42b382;
}
.project-item .status-desktop span:before, .project-item .status-mobile span:before {
    content: "";
    display: inline-block;
    width: 15px;
    height: 15px;
    -webkit-border-radius: 50%;
    border-radius: 50%;
    margin-right: 8px;
    vertical-align: middle;
}
.project-item .status-desktop .unactive:before, .project-item .status-mobile .unactive:before {
    background: #E9585B;
}
.project-item .status-mobile {
    position: absolute;
    top: -5px;
    left: 10px;
    display: none;
    background: #fff;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    color: #76828E;
    padding: 5px;
}
.project-item .status-desktop, .project-item .status-mobile {
    margin-top: 20px;
    font-weight: 400;
    width: 100px;
}
.project-box .mobile-tools {
    display: none;
}
.project-box .project-tools {
    margin-top: 5px;
}
.project-box > div {
    width: 25%;
}
.project-box .project-tools a {
    font-size: 20px;
    margin-right: 12px;
    color: #76828E;
}
.project-box .project-progress {
    margin-top: 4px;
}
.project-box > div {
    width: 25%;
}
.project-box .project-progress .progress {
    -webkit-border-radius: 3px;
    border-radius: 3px;
    margin-bottom: 0;
}
.project-box .project-tools {
    margin-top: 5px;
}
.project-box .project-tools a {
    font-size: 20px;
    margin-right: 12px;
    color: #76828E;
}
.resp-avatars img{
	width:40px;
	height:40px;
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
@media screen and (min-width: 768px) {
  
    #profile-group .modal-dialog  {width:800px; }

}
</style>
<script>
    $(document).ready(function(){
        
    });
</script>
<style>
    .des-content .more-text {
        display: none;
    }
</style>
<div id="content" class="content container-fluid" style="min-height: 682px;">
  	<div class="row">
    	<div class="col-lg-12">
     		<div class="page-header">
        		<h2>Các nhóm dự án</h2>

      		</div>
    	</div>
  	</div>
  	<form>
    	<div class="projects-search">
                <input type="text" name="keyword" class="search-input" placeholder="Search projects">
                <button class="btn search-btn waves waves-effect waves-float" type="submit"><i class="fa fa-search"></i></button>   	
    	</div>
  	</form>
  	<a href="{{url('group/create')}}"><button type="button" class="btn btn-primary" style="font-size:15px; ">Tạo nhóm mới</button></a>
  	<div class="row" style="padding-top:15px">
    	<div class="col-lg-12">
      		<div class="content-box project-wrapper">
      			@foreach($groups as $group)
        		<div class="project-item">
          			<div class="status-desktop pull-left">
	            		<span class="active">Hoạt động</span>
	          		</div>
	          		<div class="project-box white-bg pull-left">
	            		<div class="status-mobile pull-left">
	              			<span class="active">Hoạt động</span>
	            		</div>
		            	<div class="project-tools mobile-tools text-right pull-left">
		              		<a href="#"><i class="fa fa-eye"></i></a>
		              		<a href="#"><i class="fa fa-pencil"></i></a>
		              		<a href="#"><i class="fa fa-close"></i></a>
		            	</div>

		            	<div class="project-name pull-left">
		              		<div class="name">{{$group->name}}</div>
		              		<div class="created">Created <span>{{$group->created_at}}</span></div>
		            	</div>
		            	
		            	<div class="project-progress pull-left">
		              		
                                @if($group->tasks()->count() > 0)
                                <?php $finished = $group->tasks()->where('status', 'finished')->count();
                                $total = $group->tasks()->count();
                                $percent = floor(($finished/$total)*100);
                                ?>
                                <span class="task-title">Mức độ hoàn thành dự án: <span>{{$percent}}%</span></span>
                                <div class="progress">
    		                		<div class="progress-bar progress-bar-striped progress-bar-warning" role="progressbar" aria-valuenow="{{$percent}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$percent}}%;">
    		                		</div>
                                </div>
                                @else
                                <span class="task-title">Mức độ hoàn thành dự án: <span>0%</span></span>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                                    </div>
                                </div>
                                @endif
		              		
		            	</div>

		            	<div class="pull-left text-center">
		              		<div class="resp-avatars">
		              			@foreach($group->users()->get() as $user)
		                		<img src="{{url('user')."/".$user->avatar}}" alt="avatar" class="img-circle">
		                		@endforeach
		              		</div>
		            	</div>
		            	<div class="project-tools desktop-tools text-right pull-left">
		              		<a id="group-{{$group->id}}" ><button type="button" class="btn btn-danger">Xem</button></a>
                            @if(!$group->isFull())
		              		<a href="{{url('/user/request')."/". $group->id}}"><button type="button" class="btn btn-primary">Tham gia</button></a>
                            @else
                            <a id="group-full" href="#"><button type="button" class="btn btn-warning">Nhóm đầy</button></a>
                            @endif
		            	</div>
		            	<div class="clearfix"></div>
	          		</div>

        		</div>
				@endforeach
      		</div>
    	</div>
  	</div>
</div>
<div class="modal fade" id="profile-group" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--modal-header-->
            <div class="modal-header" style="background-color: #0073b7 !important;">
                <div class="right">
                    <div id="modal-group-name" style="font-size:32px;text-transform: uppercase; color: #fff;" class="name">
                        NGUYỄN THANH VIỆT
                    </div>
                    <br/>
                </div>
            </div>
            <!--end modal-header-->
            <!--modal-body-->
            <div class="modal-body">
               <div class="description">
                    <h2>Mô tả nhóm</h2>
                    <hr>
                    <div class="des-content">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.
                    </div>
               </div>                   
               <br>
               <div class="user-member" style="overflow: hidden;">
                    
               </div>
            </div>
            <!--end modal-body-->
        </div>
    </div>
</div>
<script>
    if($('li').hasClass('active')){
        $('li').removeClass('active');
        $('#search-group').addClass('active');
    };
    $(function(){
        @foreach($groups as $group)
            $('#group-{{$group->id}}').click(function(event) {
                $('#profile-group').modal();
                $('#modal-group-name').empty();
                $('#modal-group-name').append('Thông tin nhóm {{$group->name}}');
                $('.des-content').empty();
                $('.des-content').append('{{$group->description}}');
                var maxLength = 300;
                $(".des-content").each(function(){
                    var myStr = $(this).text();
                    if($.trim(myStr).length > maxLength){
                        var newStr = myStr.substring(0, maxLength);
                        var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
                        $(this).empty().html(newStr);
                        $(this).append(' <a href="javascript:void(0);" class="read-more">Đọc tiếp...</a>');
                        $(this).append('<span class="more-text">' + removedStr + '</span>');
                    }
                });
                $(".read-more").click(function(){
                    $(this).siblings(".more-text").contents().unwrap();
                    $(this).remove();
                });
                $('.user-member').empty();
                $('.user-member').append('<h2>Sô thành viên {{$group->users()->count()}}/{{$group->limituser}}</h2><hr>');
                @foreach($group->users()->get() as $u)
                     $('.user-member').append('<div class="col-md-6"><div class="row" style="padding-left: 20px"><div class="testimonials"><div class="active item"><div class="carousel-info"><img alt="" src="{{url('user/')."/".$u->avatar}}" class="pull-left"><div class="pull-left"><span class="testimonials-name">{{$u->name}}</span></div></div></div></div></div></div>');
                @endforeach
            });
            
        @endforeach
        $(".search-input").keyup(function(event) {
            $.ajax({
                url: "{{url('group/search/res')}}",
                type: "get",
                data:{
                    keyword: $(this).val(),
                },
                success: function(response){
                    console.log(response);
                    $('.project-wrapper').empty();
                    $.each(response, function(index, groupObj){
                        var str = '<div class="project-item"><div class="status-desktop pull-left"><span class="active">Hoạt động</span></div><div class="project-box white-bg pull-left"><div class="status-mobile pull-left"><span class="active">Hoạt động</span></div><div class="project-tools mobile-tools text-right pull-left"><a href="#"><i class="fa fa-eye"></i></a><a href="#"><i class="fa fa-pencil"></i></a><a href="#"><i class="fa fa-close"></i></a></div><div class="project-name pull-left"><div class="name">'+groupObj.name+'</div><div class="created">Created <span>'+groupObj.created_at+'</span></div></div><div class="project-progress pull-left">';
                        if(groupObj.taskTotal > 0){
                            var percent = groupObj.taskFinished/groupObj.taskTotal * 100;
                            str += '<span class="task-title">Mức độ hoàn thành dự án: <span>'+percent+'%</span></span><div class="progress"><div class="progress-bar progress-bar-striped progress-bar-warning" role="progressbar" aria-valuenow="'+percent+'" aria-valuemin="0" aria-valuemax="100" style="width: '+percent+'%;"></div></div>';
                        }
                        else{
                            str += '<span class="task-title">Mức độ hoàn thành dự án: <span>0%</span></span><div class="progress"><div class="progress-bar progress-bar-striped progress-bar-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div></div>';
                        }
                        str += '</div>';

                        str += '<div class="pull-left text-center"><div class="resp-avatars">';

                        //user
                        groupObj.members.forEach(function(entry){
                            str += '<img src="{{url('user')."/"}}'+entry+'" alt="avatar" class="img-circle">';
                        });

                        str += '</div></div>';

                        str += '<div class="project-tools desktop-tools text-right pull-left"><a id="group-'+groupObj.id+'" ><button type="button" class="btn btn-danger">Xem</button></a>';
                        if(groupObj.full == 1){
                            str += '<a id="group-full" href="#"><button type="button" class="btn btn-warning">Nhóm đầy</button></a>';
                        }
                        else{
                            str += '<a href="{{url('/user/request')."/"}}'+groupObj.id+'"><button type="button" class="btn btn-primary">Tham gia</button></a>';
                        }
                        
                        str += '</div><div class="clearfix"></div></div></div>';
                        $('.project-wrapper').append(str);
                    })
                }
            });
        });
        
        
    });
    
</script>
@endsection
