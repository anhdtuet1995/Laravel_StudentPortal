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
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Language', 'Quantity'],
          ['JavaScript',     11],
          ['Java',      2],
          ['C++',  2],
          ['PHP', 2],
          ['Ngôn ngữ khác',    7]
        ]);

        var options = {
            backgroundColor: 'transparent',
            title: 'Programming languages statistics'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

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


<section id="home" name="home"></section>
<div id="headerwrap">
    <div class="container">
        <div class="row centered">
            <div class="col-lg-12">
                <h1>CONNECTWF</h1>
                <h3>Cổng thông tin sinh viên</h3>
                <h3><a href="#" id="register2" class="btn btn-lg btn-success">Đăng ký ngay!</a></h3>
            </div>
        </div>
    </div> <!--/ .container -->
</div><!--/ #headerwrap -->


<section id="desc" name="desc"></section>
<!-- INTRO WRAP -->
<div id="intro">
    <div class="container">
        <div class="row centered">
            <h1>Trang web này có gì</h1>
            <br>
            <br>
            <div class="col-lg-4">
                <img src="{{ asset('/img/home/community.png') }}" alt="">
                <h3>Cộng đồng</h3>
                <p>Tham gia vào cộng đồng ConnectWP</p>
            </div>
            <div class="col-lg-4">
                <img src="{{ asset('/img/home/search.png') }}" alt="">
                <h3>Tìm kiếm</h3>
                <p>Tìm kiếm những người có cùng kỹ năng, sở thích.</p>
            </div>
            <div class="col-lg-4">
                <img src="{{ asset('/img/home/group.png') }}" alt="">
                <h3>Nhóm</h3>
                <p>Thành lập các nhóm để hỗ trợ nhau học tập.</p>
            </div>
        </div>
        <br>
        <hr>
    </div> <!--/ .container -->
</div><!--/ #introwrap -->

<section id="features" name="desc"></section>
<!-- FEATURES WRAP -->
<div id="features">
    <div class="container">
        <div class="row">
            <h1 class="centered">Thống kê các ngôn ngữ lập trình được sử dụng</h1>
            <br>
            <br>
            <div align="middle" id="piechart" style="width: 100%; height: 500px;"></div>
        </div>
    </div><!--/ .container -->
</div><!--/ #features -->

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
     $(function(){
  
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
