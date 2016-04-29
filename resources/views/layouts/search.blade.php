<!DOCTYPE html>
<!--
Landing page based on Pratt: http://blacktie.co/demo/pratt/
-->
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Trang chủ</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('/css/jquery.tag-editor.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="{{ asset('/js/smoothscroll.js') }}"></script>
    <link rel="stylesheet" href="https://daneden.github.io/animate.css/animate.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
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
</head>

<body data-spy="scroll" data-offset="0" data-target="#navigation">

    <!-- Fixed navbar -->
    <div id="navigation" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/')}}"><b>ConnectWF</b></a>
            </div>
            <div class="navbar-collapse collapse">
                
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Đăng nhập</a></li>
                        <li><a href="#" id="register">Đăng ký</a></li>
                    @else
                        <li><a href="/home">{{ Auth::user()->name }}</a></li>
                    @endif
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
    
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
                    <h4> <a href="#">{{$user->name}}</a> </h4> 
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
            </div>
            @endforeach
        </div>
    </div>
        
    

    <section id="footer" name="footer"></section>
    <div id="footerwrap">
        <div class="container">
            <div class="col-lg-5">
                <h3>Nhóm 1</h3>
                <p>
                    Đào Tuấn Anh<br/>
                    Đặng Văn Đô<br/>
                    Lê Hồng Thăng<br/>
                    Nguyễn Thanh Việt<br/>
                    Bế Văn Khánh
                </p>
            </div>

            <div class="col-lg-7">
                <h3>Hệ thống quản lý thông tin cá nhân</h3>
                <br>
                Đây là một hệ thống được đưa ra để giúp cho sinh viên có một môi trường học tập năng động hơn.
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Đăng ký thành viên</h4>
                </div>
                <div class="modal-body">

                    <form id="formRegister" class="form-horizontal" role="form" method="POST" action="{{ url('register') }}">
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
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>                       

                </div>
            </div>
        </div>
    </div>
    
    <script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/jquery.caret.min.js')}}"></script>
    <script src="{{asset('/js/jquery.tag-editor.js')}}"></script>
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
                    url: "{{url('test')}}",
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
                            str += '<div class="member-details"><h4><a href="#">'+userObj.name+'</a></h4><div class="row info-list"><div class="col-sm-12">Kỹ năng: '+userObj.skill+'</div><div class="clear"></div><div class="col-sm-12">Sở thích: '+userObj.hobby+'</div></div></div></div>';
                            $('.search-result').append(str);
                        })

                    }
                });
            });


            $('#register').click(function() {
                $('#myModal').modal();
            });
        

            $('#register2').click(function(){
                $('#myModal').modal();
            });
            
            $(document).on('submit', '#formRegister', function(e) {  
                e.preventDefault();
                  
                $('input+small').text('');
                $('input').parent().removeClass('has-error');
                  
                $.ajax({
                    method: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    dataType: "json"
                })
                .done(function(data) {
                    $('.alert-success').removeClass('hidden');
                    $('#myModal').modal('hide');
                })
                .fail(function(data) {
                    $.each(data.responseJSON, function (key, value) {
                        var input = '#formRegister input[name=' + key + ']';
                        $(input + '+small').text(value);
                        $(input).parent().addClass('has-error');
                    });
                });
            });
      
        })

        
        
    </script>
</body>
</html>