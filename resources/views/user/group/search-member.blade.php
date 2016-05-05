@extends('layouts.app')

@section('htmlheader_title')
    Group
@endsection


@section('main-content')
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
                    <h4> <a href="{{url('user/profile')."/$user->id"}}">{{$user->name}}</a> </h4> 
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
