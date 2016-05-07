<?php use App\Group; ?>
<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{ url('/user') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>C</b>WF</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Connect</b>WF </span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->

                <!-- Notifications Menu -->
                <li class="dropdown notifications-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">{{Auth::user()->notifications()->whereIn('category_id', array(2, 3))->where('read', 0)->count()}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Bạn có {{Auth::user()->notifications()->whereIn('category_id', array(2, 3))->where('read', 0)->count()}} thông báo mới</li>
                        <li>
                            <!-- Inner Menu: contains the notifications -->
                            <ul class="menu">
                                @foreach(Auth::user()->notifications()->whereIn('category_id', array(2, 3))->where('read', 0)->get() as $notification)
                                <?php  
                                $group = json_decode($notification->extra, true);
                                ?>
                                @if($notification->category_id == 3)
                                <li><!-- start notification -->
                                    <a href="#">
                                        <i class="fa fa-users text-aqua"></i>  {{"Nhóm " . Group::find($group['group_id'])->name." muốn mời bạn tham gia"}}
                                        
                                    </a>
                                    <center>
                                        <a href="{{url('user/profile/')."/".$notification->from_id}}"><button type="button" class="btn btn-info">Xem thông tin</button></a>
                                        <a href="{{url('user/accept')."/".$group['group_id']."/".$notification->id}}"><button type="button" class="btn btn-primary">Đồng ý</button></a>
                                        <a href="{{url('user/notification/delete')."/".$notification->id}}"><button type="button" class="btn btn-danger">Xóa</button></a>    
                                    </center>
                                    
                                </li><!-- end notification -->
                                @elseif($notification->category_id == 2)
                                <li><!-- start notification -->
                                    <a href="#">
                                        <i class="fa fa-users text-aqua"></i> {{"Yêu cầu tham gia nhóm " .Group::find($group['group_id'])->name . " của bạn đã được chấp nhận"}}
                                        
                                    </a>
                                    <center>
                                        <a href="{{url('user/notification/delete')."/".$notification->id}}"><button type="button" class="btn btn-danger">Xóa</button></a>    
                                    </center>
                                    
                                </li><!-- end notification -->
                                @endif
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- Tasks Menu -->
                
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            @if(Auth::user()->avatar != null)
                            <img src="{{url('/user').'/'.Auth::user()->avatar}}" class="user-image" alt="User Image">
                            @else
                            <img src="{{asset('img/default-avatar.png')}}" class="user-image" alt="User Image">
                            @endif
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                @if(Auth::user()->avatar != null)
                                <img src="{{url('/user').'/'.Auth::user()->avatar}}" class="img-circle" alt="User Image">
                                @else
                                <img src="{{asset('img/default-avatar.png')}}" class="img-circle" alt="User Image">
                                @endif
                                <p>
                                    {{ Auth::user()->name }}
                                    <small>Ngày gia nhập {{Auth::user()->created_at->format('d-m-Y')}}</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ url('/logout') }}" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                @endif

                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>