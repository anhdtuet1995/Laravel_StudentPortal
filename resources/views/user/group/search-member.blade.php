@extends('layouts.app')

@section('htmlheader_title')
    Group
@endsection


@section('main-content')
<link rel="stylesheet" type="text/css" href="{{asset('css/timeline.css')}}">
<style>
    .member-entry {
      border: 1px solid #ebebeb;
      padding: 15px;
      margin-top: 15px;
      margin-bottom: 20px;
      -moz-box-shadow: 1px 1px 1px rgba(0, 1, 1, 0.02);
      -webkit-box-shadow: 1px 1px 1px rgba(0, 1, 1, 0.02);
      box-shadow: 1px 1px 1px rgba(0, 1, 1, 0.02);
      -moz-transition: all 300ms ease-in-out;
      -webkit-transition: all 300ms ease-in-out;
      -o-transition: all 300ms ease-in-out;
      transition: all 300ms ease-in-out;
      -webkit-border-radius: 3px;
      -webkit-background-clip: padding-box;
      -moz-border-radius: 3px;
      -moz-background-clip: padding;
      border-radius: 3px;
      background-clip: padding-box;
      background:#fff;
        -webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.2),0 6px 10px 0 rgba(0,0,0,0.3);
        box-shadow: 0 2px 2px 0 rgba(0,0,0,0.2),0 6px 10px 0 rgba(0,0,0,0.3);
    }
    .member-entry:before,
    .member-entry:after {
      content: " ";
      display: table;
    }
    .member-entry:after {
      clear: both;
    }
    .member-entry:hover {
      background: rgba(235, 235, 235, 0.3);
      -moz-box-shadow: 1px 1px 1px rgba(0, 1, 1, 0.06);
      -webkit-box-shadow: 1px 1px 1px rgba(0, 1, 1, 0.06);
      box-shadow: 1px 1px 1px rgba(0, 1, 1, 0.06);
    }
    .member-entry .member-img,
    .member-entry .member-details {
      float: left;
    }
    .member-entry .member-img {
      position: relative;
      display: block;
      width: 10%;
    }
    .member-entry .member-img img {
      width: 100%;
      display: block;
      max-width: 100%;
      height: auto;
    }
    .member-entry .member-img i {
      position: absolute;
      display: block;
      left: 50%;
      top: 50%;
      margin-top: -12.5px;
      margin-left: -12.5px;
      color: #FFF;
      font-size: 25px;
      zoom: 1;
      -webkit-opacity: 0;
      -moz-opacity: 0;
      opacity: 0;
      filter: alpha(opacity=0);
      -moz-transform: scale(0.5);
      -webkit-transform: scale(0.5);
      -ms-transform: scale(0.5);
      -o-transform: scale(0.5);
      transform: scale(0.5);
      -moz-transition: all 300ms ease-in-out;
      -webkit-transition: all 300ms ease-in-out;
      -o-transition: all 300ms ease-in-out;
      transition: all 300ms ease-in-out;
    }
    .member-entry .member-details {
      width: 89.9%;
    }
    .member-entry .member-details h4 {
      font-size: 20px;
      margin-left: 20px;
    }
    .member-entry .member-details h4 a {
      -moz-transition: all 300ms ease-in-out;
      -webkit-transition: all 300ms ease-in-out;
      -o-transition: all 300ms ease-in-out;
      transition: all 300ms ease-in-out;
    }
    .member-entry .member-details .info-list {
      margin-left: 5px;
    }
    .member-entry .member-details .info-list > div {
      margin-top: 5px;
      font-size: 15px;
    }
    .member-entry .member-details .info-list > div a {
      -moz-transition: all 300ms ease-in-out;
      -webkit-transition: all 300ms ease-in-out;
      -o-transition: all 300ms ease-in-out;
      transition: all 300ms ease-in-out;
    }

    @media screen and (max-width: 768px) {
      .member-entry .member-img {
        width: 18%;
      }
      .member-entry .member-details {
        width: 81.9%;
      }
      .member-entry .member-details h4 {
        margin-top: 0;
      }
    }
    @media screen and (max-width: 480px) {
      .member-entry .member-img {
        width: 100%;
        float: none;
        text-align: center;
        position: relative;
        background: #f8f8f8;
        margin-bottom: 15px;
        -webkit-border-radius: 3px;
        -webkit-background-clip: padding-box;
        -moz-border-radius: 3px;
        -moz-background-clip: padding;
        border-radius: 3px;
        background-clip: padding-box;
      }
      .member-entry .member-img img {
        width: auto;
        display: inline-block;
        -webkit-border-radius: 0;
        -webkit-background-clip: padding-box;
        -moz-border-radius: 0;
        -moz-background-clip: padding;
        border-radius: 0;
        background-clip: padding-box;
      }
      .member-entry .member-details {
        width: 100%;
        float: none;
      }
      .member-entry .member-details h4,
      .member-entry .member-details .info-list {
        margin-left: 0;
      }
      .member-entry .member-details h4 > div,
      .member-entry .member-details .info-list > div {
        padding: 0;
      }
      .member-entry .member-details .info-list > div {
        margin-top: 10px;
      }
    }
    .modal-header{
        height: 220px;
        padding: 10px 150px;
        background: #78b1f5;
        
    }
    .modal-header .left{
        width: 400px;
        margin-right: 5px;
        float: left;
    }
    .modal-header .left img{
        width: 200px;
        height: 200px;
        border: 7px solid #4c70ba;
        border-radius: 50%;
    }
    .modal-header .right{
        padding-top: 50px;
        margin-left: 450px;
        
    }
    .info img{
        width: 16px;
        height: 16px;
    }

    .modal-body{
        background: #f4f4f4;
        overflow: hidden;
    }
    .modal-body .left{
        float: left;
        width: 30%;
        padding-left: 70px;
        height: 100%;
    }
    .left .title{
        padding-top: 20px;
        padding-bottom: 10px;
        font-weight: bold;
        color: #335696;
    }
    input{
        width: 350px;
        height: 20px;
        margin-top: 5px;
        background: #dddddd;
    }
    .ip1{
        background: #5e76a8;
        color: white;
        font-weight: bold;
        padding-left: 20px;
    }
    .line{
        border: 1px solid #dddddd;
        margin-top: 5px;
        width: 370px;
    }
    .modal-body .right{

        width: 600px;
        float: left;
        padding-left: 20px;
        margin-left: 150px;
        height: 100%;
    }
    .modal-body .right .title{
        padding-top: 20px;
        padding-bottom: 10px;
        font-weight: bold;
        color: #335696;
    }
    .line2{
        border: 1px solid #dddddd;
        margin-top: 5px;
        width: 600px;
    }
    .title2{
        
    }
    .tf1{
        float: left;
        font-size: 18px;
    }
    .tf2{
        float: left;
        margin-left: 370px;
    }
    .tf2 img{
        
        width: 16px;
        height: 16px;
    }
    .tf3{
        margin-left: 5px;
        float: left;
    }
    .modal-body .right .info{
        padding: 15px 5px;
        padding-top: 5px;
        font-size: 18px;
    }
    p{
        padding-left: 20px;
        margin: 0 auto;
    }
    .progress {
      background-color: #fff; 
      position: relative;
      height: 25px;
      width: 370px;
    }
    .progress > .progress-type {
      position: absolute;
      left: 0px;
      font-weight: 800;
      padding: 3px 30px 2px 10px;
      color: rgb(255, 255, 255);
      background-color: rgba(25, 25, 25, 0.2);
    }
    .progress > .progress-completed {
      position: absolute;
      right: 0px;
      font-weight: 800;
      padding: 3px 10px 2px;
    }
    @media screen and (min-width: 768px) {
  
      #profile-user .modal-dialog  {width:1200px; height: 1200px;}

    }
</style>

<div class="container">
    <h2>Tìm người</h2>
    <form id="form-search" class="form-inline" action="">
        <div class="form-group">
            <label for="skill">Kỹ năng:</label>
            <input id="skill" name="skill" type="text" class="form-control input-lg" placeholder="Kỹ năng">
        </div>
        <div class="form-group">
            <label for="hobby">Sở thích:</label>
            <input id="hobby" name="hobby" type="text" class="form-control input-lg" placeholder="Sở thích">
        </div>
    </form>
    <div class="search-result" style="padding-top:30px;padding-bottom:30px;">
        @foreach($users as $user)
        <div class="member-entry"> 
            <a href="#" class="member-img">
                @if($user->avatar == null)
                <img src="{{asset('img/default-avatar.png')}}" class="img-rounded">
                @else
                <img src="{{url('get/')."/".$user->avatar}}" class="img-rounded">
                @endif 
            </a> 
            <div class="member-details"> 
                <div class="col-md-4">
                    <h4> <a id="show-profile-{{$user->id}}" href="#">{{$user->name}}</a> </h4> 
                    <div class="row info-list">  
                        <div class="col-sm-12">
                            @if($user->getSkills())
                            Kỹ năng: {{$user->getSkills()}}
                            @else
                            Kỹ năng: Chưa có
                            @endif
                            
                        </div> 
                        <div class="clear"></div> 
                        <div class="col-sm-12"> 
                            @if($user->getHobbies())
                            Sở thích: {{$user->getHobbies()}}
                            @else
                            Sở thích: Chưa có
                            @endif
                        </div> 
                    </div> 
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4" >
                    <div class="invite" >
                        <div class="col-sm-12"> 
                            <a href="{{url('user/group')."/".$group->id."/panel/member/request"."/".$user->id}}"><button type="button" class="btn btn-primary">Mời vào nhóm</button></a>    
                        </div>
                        
                    </div>
                </div>
            </div>
            
        </div>
        @endforeach
    </div>
</div>

<!-- Modal -->
    <div class="modal fade" id="profile-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!--modal-header-->
                <div class="modal-header">
                    <div class="left">
                        <img id="avatar-modal" src="images/167.jpg">
                    </div>
                    <div class="right">
                        <div id="modal-name" style="font-size:32px;text-transform: uppercase;" class="name">
                            NGUYỄN THANH VIỆT
                        </div>
                        <br/>
                        <div id="modal-info" class="info">
                            CEO & WEB DEVELOPER<br>
                            Xuân Thủy, Hà Nội.<br>
                            <i>---"Cuộc sống của tôi là gắn bó với chiếc máy tính và viết các chương trình pro!"---</i>
                        </div>
                    </div>
                </div>
                <!--end modal-header-->
                <!--modal-body-->
                <div class="modal-body">
                    <div class="left">
                        <div class="title">
                            KỸ NĂNG PROGRAMMING
                            <div class="line"></div>
                        </div>
                        <div class="skill" id="modal-skill">
                            
                        </div>
                        <div class="title">
                            SỞ THÍCH
                            <div class="line"></div>
                        </div>
                        <div id="modal-hobby" class="hobby">
                            
                        </div>
                    </div>
                    <div class="right">
                        <div class="title">
                            CÁC CÔNG TRÌNH NGHIÊN CỨU
                            <div class="line2"></div>
                        </div>
                        <div  class="info">
                                
                            <div id="modal-study" class="timeline-centered timeline-sm">
                            
                            </div>
                                                                    
                        </div>
                    </div>
                </div>
                <!--end modal-body-->
            </div>
        </div>
    </div>

<script>
    function removeDuplicates(arr, prop) {
        var new_arr = [];
        var lookup  = {};
     
        for (var i in arr) {
            lookup[arr[i][prop]] = arr[i];
        }
     
        for (i in lookup) {
            new_arr.push(lookup[i]);
        }
     
        return new_arr;
    }

    $(function(){
        @foreach($users as $user)
        $('#show-profile-{{$user->id}}').click(function(){
            $('#avatar-modal').attr('src', '{{url('user')."/".$user->avatar}}');
            $('#modal-name').empty();
            $('#modal-name').append('{{$user->name}}');
            $('#modal-info').empty();
            $('#modal-info').append('Email: {{$user->email}}<br>Giới tính: Nam<br>Trường: {{$user->school}}');
            $('#modal-skill').empty();
            @foreach($user->skills()->get() as $skill)
            $('#modal-skill').append('<div class="progress"><div class="progress-bar active progress-bar-striped" role="progressbar" aria-valuenow="{{$skill->value * 10}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$skill->value * 10 . '%'}};"><span class="sr-only">{{$skill->value * 10}} Complete</span></div><span class="progress-type">{{$skill->name}}</span><span class="progress-completed">{{$skill->value * 10 . "%"}}</span></div>');
            @endforeach
            $('#modal-hobby').empty();
            @foreach($user->hobbies()->get() as $hobby)
             $('#modal-hobby').append('{{$hobby->name}}<br>')
            @endforeach
            $('#modal-study').empty();
            {{$i=0}}
            @foreach($user->studies()->orderBy('publication_date', 'desc')->get() as $study)
              @if($i % 2 == 0)
              $('#modal-study').append('<article class="timeline-entry"><div class="timeline-entry-inner"><time class="timeline-time"><span>{{$study->publication_date}}</span><span>Today</span></time><div class="timeline-icon bg-green"><i class="fa fa-group"></i></div><div class="timeline-label bg-green"><h4 class="timeline-title">{{$study->name}}</h4></div></div></article>');
              @else
              $('#modal-study').append('<article class="timeline-entry left-aligned"><div class="timeline-entry-inner"><time  class="timeline-time"><span>{{$study->publication_date}}</span><span>Today</span></time><div class="timeline-icon bg-orange"><i class="fa fa-paper-plane"></i></div><div class="timeline-label bg-orange"><h4 class="timeline-title">{{$study->name}}</h4></div></div></article>');
              @endif
              {{$i++}}
            @endforeach
            $('#profile-user').modal();

        });

        @endforeach
        $("#form-search input").keyup(function(event) {
            $.ajax({
                url: "{{url('user/group')."/".$group->id."/panel/member/filter"}}",
                type: "get",
                data:{
                    skill: $("#skill").val(),
                    hobby: $("#hobby").val()
                },
                success: function(response){
                    var test = removeDuplicates(response, "id");
                    console.log(test);
                    $('.search-result').empty();
                    $.each(test, function(index, userObj){
                        var str = '<div class="member-entry">';
                        if(userObj.avatar != ""){
                            str += '<a href="#" class="member-img"><img src="{{url('get')."/"}}'+userObj.avatar+'" class="img-rounded"></a>';
                        }
                        else{
                            str += '<a href="#" class="member-img"><img src="{{asset('img/default-avatar.png')}}" class="img-rounded"></a>';
                        }
                        str += '<div class="member-details"><div class="col-md-4"><h4><a href="#">'+userObj.name+'</a></h4><div class="row info-list"><div class="col-sm-12">Kỹ năng: '+userObj.skill+'</div><div class="clear"></div><div class="col-sm-12">Sở thích: '+userObj.hobby+'</div></div></div><div class="col-md-4"></div><div class="col-md-4"><div class="invite" ><div class="col-sm-12"><a href="{{url('user/group')."/".$group->id."/panel/member/request"."/"}}'+userObj.id+'"><button type="button" class="btn btn-primary">Mời vào nhóm</button></a></div></div></div></div></div>';
                        $('.search-result').append(str);
                    })

                }
            });
        });
    });
</script>
@endsection

