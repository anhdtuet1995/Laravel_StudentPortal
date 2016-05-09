<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        @if(Auth::guard('web')->check())
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
            <li id="menu-profile" class="treeview active">
                <a href="#"><i class='fa fa-link'></i> <span>Quản lý thông tin cá nhân</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li id="show-profile" class="active"><a href="{{ url('user') }}">Xem thông tin cá nhân</a></li>
                    <li id="edit-profile"><a href="{{url('user/edit')}}">Sửa thông tin cá nhân</a></li>
                </ul>
            </li>
            <li id="search-group"><a href="{{ url('group') }}"><i class='fa fa-link'></i> <span>Tìm nhóm</span></a></li>
            <li id="menu-my-group" class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Nhóm của bạn</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    @foreach(Auth::user()->getAllGroupAdmin() as $group)
                    <li id="my-group-{{$group->id}}"><a href="{{url('user/group')."/".$group->id."/panel"}}">{{$group->name}}</a></li>
                    @endforeach
                </ul>
            </li>
            <li id="menu-other-group" class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Các nhóm khác</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    @foreach(Auth::user()->getOtherGroup() as $group)
                    <li id="other-group-{{$group->id}}"><a href="{{url('user/group')."/".$group->id."/panel"}}">{{$group->name}}</a></li>
                    @endforeach
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
        @endif
    </section>
    <!-- /.sidebar -->
</aside>
