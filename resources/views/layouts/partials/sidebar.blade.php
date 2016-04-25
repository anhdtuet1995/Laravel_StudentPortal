<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    @if(Auth::user()->avatar != null)
                    <img src="{{url('/user').'/'.Auth::user()->avatar}}" class="img-circle" alt="User Image">
                    @else
                    <img src="{{asset('img/default-avatar.png')}}" class="img-circle" alt="User Image">
                    @endif
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
        @endif

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Quản lý thông tin cá nhân</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{ url('user') }}">Xem thông tin cá nhân</a></li>
                    <li><a href="{{url('user/edit')}}">Sửa thông tin cá nhân</a></li>
                </ul>
            </li>
            <li><a href="{{ url('user') }}"><i class='fa fa-link'></i> <span>Tìm nhóm</span></a></li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Nhóm của bạn</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">Tìm người thêm vào nhóm</a></li>
                    <li><a href="#">Timeline</a></li>
                    <li><a href="#">Quản lý thành viên</a></li>
                    <li><a href="#">Chat nhóm</a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
