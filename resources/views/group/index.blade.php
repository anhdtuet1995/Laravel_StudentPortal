@extends('layouts.app')

@section('htmlheader_title')
	Group
@endsection


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
      <input type="text" class="search-input" placeholder="Search projects">
      <button class="btn search-btn waves waves-effect waves-float" type="button"><i class="fa fa-search"></i></button>
    </div>
  </form>
  <button type="button" class="btn btn-primary" style="font-size:15px; ">Tạo nhóm mới</button>
  <div class="row" style="padding-top:15px">
    <div class="col-lg-12">
      <div class="content-box project-wrapper">
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
              <div class="name">Contract with Zelden Company</div>
              <div class="created">Created <span>14.08.2014</span></div>
            </div>
            <div class="project-progress pull-left">
              <span class="task-title">Completion with: <span>40%</span></span>
              <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
                </div>
              </div>
            </div>

            <div class="pull-left text-center">
              <div class="resp-avatars">
                <img src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar" class="img-circle">
                <img src="http://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar" class="img-circle">
                <img src="http://bootdey.com/img/Content/avatar/avatar3.png" alt="avatar" class="img-circle">
              </div>
            </div>
            <div class="project-tools desktop-tools text-right pull-left">
              <a href="#"><i class="fa fa-eye"></i></a>
              <a href="#"><i class="fa fa-pencil"></i></a>
              <a href="#"><i class="fa fa-close"></i></a>
            </div>
            <div class="clearfix"></div>
          </div>

        </div>

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
              <div class="name">Develop chat app</div>
              <div class="created">Created <span>14.08.2014</span></div>
            </div>
            <div class="project-progress pull-left">
              <span class="task-title">Stage completed: <span>35%</span></span>
              <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-success" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" style="width: 35%;">
                </div>
                
              </div>
            </div>

            <div class="pull-left text-center">
              <div class="resp-avatars">
                <img src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar" class="img-circle">
                <img src="http://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar" class="img-circle">
                <img src="http://bootdey.com/img/Content/avatar/avatar3.png" alt="avatar" class="img-circle">
              </div>
            </div>
            <div class="project-tools desktop-tools text-right pull-left">
              <a href="#"><i class="fa fa-eye"></i></a>
              <a href="#"><i class="fa fa-pencil"></i></a>
              <a href="#"><i class="fa fa-close"></i></a>
            </div>
            <div class="clearfix"></div>
          </div>

        </div>

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
              <div class="name">Develop Android app</div>
              <div class="created">Created <span>14.08.2014</span></div>
            </div>
            <div class="project-progress pull-left">
              <span class="task-title">Completion with: <span>49%</span></span>
              <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-info" role="progressbar" aria-valuenow="49" aria-valuemin="0" aria-valuemax="100" style="width: 49%;">
                </div>
              </div>
            </div>

            <div class="pull-left text-center">
              <div class="resp-avatars">
                <img src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar" class="img-circle">
                <img src="http://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar" class="img-circle">
              </div>
            </div>
            <div class="project-tools desktop-tools text-right pull-left">
              <a href="#"><i class="fa fa-eye"></i></a>
              <a href="#"><i class="fa fa-pencil"></i></a>
              <a href="#"><i class="fa fa-close"></i></a>
            </div>
            <div class="clearfix"></div>
          </div>

        </div>

        <div class="project-item">

          <div class="status-desktop pull-left">
            <span class="unactive">Hoàn thiện</span>
          </div>


          <div class="project-box white-bg pull-left">

            <div class="status-mobile pull-left">
              <span class="unactive">Hoàn thiện</span>
            </div>
            <div class="project-tools mobile-tools text-right pull-left">
              <a href="#"><i class="fa fa-eye"></i></a>
              <a href="#"><i class="fa fa-pencil"></i></a>
              <a href="#"><i class="fa fa-close"></i></a>
            </div>

            <div class="project-name pull-left">
              <div class="name">Contract with support</div>
              <div class="created">Created <span>14.08.2014</span></div>
            </div>
            <div class="project-progress pull-left">
              <span class="task-title">Completion with: <span>100%</span></span>
              <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-info" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                </div>
              </div>
            </div>

            <div class="pull-left text-center">
              <div class="resp-avatars">
                <img src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar" class="img-circle">
              </div>
            </div>
            <div class="project-tools desktop-tools text-right pull-left">
              <a href="#"><i class="fa fa-eye"></i></a>
              <a href="#"><i class="fa fa-pencil"></i></a>
              <a href="#"><i class="fa fa-close"></i></a>
            </div>
            <div class="clearfix"></div>
          </div>

        </div>

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
              <div class="name">New product line</div>
              <div class="created">Created <span>14.08.2014</span></div>
            </div>
            <div class="project-progress pull-left">
              <span class="task-title">Completion with: <span>85%</span></span>
              <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-danger" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;">
                </div>
              </div>
            </div>

            <div class="pull-left text-center">
              <div class="resp-avatars">
                <img src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar" class="img-circle">
                <img src="http://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar" class="img-circle">
                <img src="http://bootdey.com/img/Content/avatar/avatar3.png" alt="avatar" class="img-circle">
              </div>
            </div>
            <div class="project-tools desktop-tools text-right pull-left">
              <a href="#"><i class="fa fa-eye"></i></a>
              <a href="#"><i class="fa fa-pencil"></i></a>
              <a href="#"><i class="fa fa-close"></i></a>
            </div>
            <div class="clearfix"></div>
          </div>

        </div>

      </div>
    </div>
  </div>
</div>
@endsection