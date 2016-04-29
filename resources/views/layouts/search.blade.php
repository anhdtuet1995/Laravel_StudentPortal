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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="{{ asset('/js/smoothscroll.js') }}"></script>
    <link rel="stylesheet" href="https://daneden.github.io/animate.css/animate.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
    .profile_view {
        margin-bottom: 20px;
        display: inline-block;
        width: 100%;
            -webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.2),0 6px 10px 0 rgba(0,0,0,0.3);
        box-shadow: 0 2px 2px 0 rgba(0,0,0,0.2),0 6px 10px 0 rgba(0,0,0,0.3);
    }
    .profile_view:hover {
        -webkit-box-shadow: 0 14px 12px 0 rgba(0,0,0,0.17),0 20px 40px 0 rgba(0,0,0,0.3);
        box-shadow: 0 14px 12px 0 rgba(0,0,0,0.17),0 20px 40px 0 rgba(0,0,0,0.3);    
    }
    .well.profile_view {
        padding: 10px 0 0;
    }

    .well.profile_view .divider {
        border-top: 1px solid #e5e5e5;
        padding-top: 5px;
        margin-top: 5px;
    }

    .well.profile_view .ratings {
        margin-bottom: 0;
    }

    .pagination.pagination-split li {
        display: inline-block;
        margin-right: 3px;
    }

    .pagination.pagination-split li a {
        border-radius: 4px;
        color: #768399;
        -moz-border-radius: 4px;
        -webkit-border-radius: 4px;
    }

    .well.profile_view {
        background: #fff;
    }

    .well.profile_view .bottom {
        margin-top: -20px;
        background: #F2F5F7;
        padding: 9px 0;
        border-top: 1px solid #E6E9ED;
    }

    .well.profile_view .left {
        margin-top: 20px;
    }

    .well.profile_view .left p {
        margin-bottom: 3px;
    }

    .well.profile_view .right {
        margin-top: 0px;
        padding: 10px;
    }

    .well.profile_view .img-circle {
        border: 1px solid #E6E9ED;
        padding: 2px;
    }

    .well.profile_view h2 {
        margin: 5px 0;
        font-size:14px;
        font-weight:bold;
    }

    .well.profile_view .ratings {
        text-align: left;
        font-size: 16px;
    }

    .well.profile_view .brief {
        margin: 0;
        font-weight: 300;
    }

    .profile_left {
        background: white;
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
                <a class="navbar-brand" href="#"><b>ConnectWF</b></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#home" class="smoothScroll">Home</a></li>
                    <li><a href="#desc" class="smoothScroll">Giới thiệu</a></li>
                    <li><a href="#features" class="smoothScroll">Thống kê</a></li>
                    <li><a href="{{url('/search')}}" id="searchPerson">Tìm kiếm</a></li>
                </ul>
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
        <h2>Tìm kiếm theo kỹ năng</h2>
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

        <div style="padding-top:50px" class="col-md-12 bootstrap snippets">
            <div class="x_panel">
                <div class="x_content">
                    <div id="result" class="row">
                        <div class="clearfix"></div>
                        <div class="col-md-4 col-sm-4 col-xs-12 animated fadeInDown">
                            <div class="well profile_view">
                                <div class="col-sm-12">
                                    <h4 class="brief"><i>Đào Tuấn Anh</i></h4>
                                    <div class="left col-xs-7">
                                        <p><strong>Kỹ năng: </strong> C++, Java </p>
                                        <p><strong>Sở thích: </strong> Đá bóng, chơi thể thao </p>
                                        
                                    </div>
                                    <div class="right col-xs-5 text-center">
                                        <img src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="img-circle img-responsive">
                                    </div>
                                </div>
                                <div class="col-xs-12 bottom text-center">
                                    <div class="col-xs-12 col-sm-6 emphasis">
                                        <button type="button" class="btn btn-primary btn-xs"> 
                                            <i class="fa fa-user"></i> View Profile 
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 animated fadeInDown">
                            <div class="well profile_view">
                                <div class="col-sm-12">
                                    <h4 class="brief"><i>Đào Tuấn Anh</i></h4>
                                    <div class="left col-xs-7">
                                        <p><strong>Kỹ năng: </strong> VS, Da </p>
                                        <p><strong>Sở thích: </strong> C++ </p>
                                        
                                    </div>
                                    <div class="right col-xs-5 text-center">
                                        <img src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="img-circle img-responsive">
                                    </div>
                                </div>
                                <div class="col-xs-12 bottom text-center">
                                    <div class="col-xs-12 col-sm-6 emphasis">
                                        <button type="button" class="btn btn-primary btn-xs"> 
                                            <i class="fa fa-user"></i> View Profile 
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                        $('.row').empty();
                        $('.row').append('<div class="clearfix"></div>');
                        $.each(test, function(index, userObj){
                            var str = '<div class="col-md-4 col-sm-4 col-xs-12 animated fadeInDown"><div class="well profile_view"><div class="col-sm-12"><h4 class="brief"><i>'+ userObj.name +'</i></h4><div class="left col-xs-7"><p><strong>Kỹ năng: </strong> '+ userObj.skill +' </p><p><strong>Sở thích: </strong> Đá bóng, chơi thể thao </p></div><div class="right col-xs-5 text-center">';
                            if(userObj.avatar != ""){
                                str += '<img src="{{url('get')."/"}}'+userObj.avatar+'" alt="" class="img-circle img-responsive">';
                            }
                            else{
                                str += '<img src="{{asset('img/default-avatar.png')}}" alt="" class="img-circle img-responsive">';
                            }
                            str += '</div></div><div class="col-xs-12 bottom text-center"><div class="col-xs-12 col-sm-6 emphasis"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-user"></i> View Profile</button></div></div></div></div>'
                            $('.row').append(str);
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
